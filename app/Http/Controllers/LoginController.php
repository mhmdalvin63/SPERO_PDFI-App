<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\User;
use App\Models\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function postlogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ],[
            'email' => 'Email Harus Diisi',
            'email.email' => 'Format Email Salah',
            'password' => 'Password Harus Diisi',
            'password.min' => 'Password Harus Diisi Minimal 8 Karakter',
       ]);

        $infologin = [ 
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(auth()->user()->level == 'admin'){
                return redirect()->route('dashboard');
            }
            else{
                return redirect('/admin/login')->with('error', 'Username atau Password Salah!');
            }
        }else{
            return redirect('/admin/login')->with('error', 'Username atau Password Salah!');
        }
    }

    public function loginuser(){
        return view('login-user');
    }

    public function register(){
        return view('register');
    }

   

    public function postregister(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'password' => 'required|min:8',
        ],[
            'email' => 'Input Your Email',
            'name' => 'Input Your Username',
            'password' => 'Input Your Password',
            'password.min' => 'Password Must Be 8 Character',
        ]
    );   
    try{
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 'user';
        $user->verification = 'not verified';
        $user->save();
        $kepada = $user->email;
        $verify = route('postverified.user', $user->id);
        $mail = [ 
            'kepada' => $user->email, 
            'nama' => $request->name,
            'email' => 'pdfi@gmail.com', 
            'dari' => 'PDFI Jaya', 
            'subject' => 'Berikut Adalah Link Verifikasi Anda',
            'url' => $verify,
        ]; 
    
        Mail::send('email', $mail, function($message) use ($mail){ 
            $message->to($mail['kepada']) 
            ->from($mail['email'], $mail['dari']) 
            ->subject($mail['subject']); 
        });

        return redirect()->route('verified.user')->with('success','Lanjutkan Verifikasi Aku Anda');
        
        }catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function verified(){
        return view('after-register');
    }

    public function postverified(Request $request, $id){
       
            $userv = User::where('id', $id)->first();
            $userv->verification = 'verified';
            $userv->save();
            // dd($dd);
            return redirect('/home')->with('success', 'Welcome in PDFI');
       
    }

    public function postloginuser(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ],[
            'email' => 'Email Harus Diisi',
            'email.email' => 'Format Email Salah',
            'password' => 'Password Harus Diisi',
            'password.min' => 'Password Harus Diisi Minimal 8 Karakter',
       ]);

        $infologin = [ 
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(auth()->user()->level == 'user' && auth()->user()->verification == 'verified'){
                return redirect()->route('home');
            }
            if(auth()->user()->level == 'user' && auth()->user()->verification == 'not verified'){
                return redirect('/cabang/login')->with('verif', 'Akun Anda Belum Terverifikasi, Hubungi Admin Untuk Memverifikasi Akun');
            }
            else{
                return redirect('/cabang/login')->with('error', 'Username atau Password Salah!');
            }
        }else{
            return redirect('/cabang/login')->with('error', 'Username atau Password Salah!');
        }
    }

    public function resetpassword(){
        return view('reset-password');
    }

    public function postresetpassword(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
        ],[
            'email' => 'Email Harus Diisi!',
            'email.email' => 'Format Email Salah!',
        ]);
        $token = Str::random(64);
        $verify = route('mailreset.user', $token);
        $userforgot = User::where('email', $request->email)->where('level', 'user')->count();
        if($userforgot > 0){

            $resetpassword = new ResetPassword();
            $resetpassword->email = $request->email;
            $resetpassword->token = $token;
            $resetpassword->save();
            $mail = [ 
                'kepada' => $request->email,
                'email' => 'pdfi@gmail.com', 
                'dari' => 'PDFI Jaya', 
                'subject' => 'Reset Password',
                'url' => $verify,
            ]; 
        
            Mail::send('mail-reset-password', $mail, function($message) use ($mail){ 
                $message->to($mail['kepada']) 
                ->from($mail['email'], $mail['dari']) 
                ->subject($mail['subject']); 
            });
            
        Alert::success('Success', 'Link Telah Dikirim Ke Email Anda');
        return redirect()->back();
        }else{
            Alert::error('Error', 'Email Anda Tidak Terdaftar');
            return redirect()->back();
        }
    }

    public function mailreset($token){
        $email = ResetPassword::where('token', $token)->first();
        return view('reset', compact('token', 'email'));
    }

    public function aftermailreset(Request $request){
        // dd($request);
        $this->validate($request, [
            'password' => 'required|min:8',
        ],[
            'password' => 'Password Harus Diisi',
            'password.min' => 'Password Harus Diisi Minimal 8 Karakter',
        ]);

        $email = ResetPassword::where('token', $request->token);
        $user = User::where('email', $request->email)->first();

        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Success', 'Password Telah Di Ubah Silahkan Login');
        return redirect('/login');
    }

    public function logincabang(){
        return view('cabang.login');
    }

    public function postlogincabang(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ],[
            'email' => 'Email Harus Diisi',
            'email.email' => 'Format Email Salah',
            'password' => 'Password Harus Diisi',
            'password.min' => 'Password Harus Diisi Minimal 8 Karakter',
       ]);

        $infologin = [ 
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(auth()->user()->level == 'cabang'){
                return redirect()->route('cbdashboard');
            }
            else{
                return redirect('/cabang/login')->with('error', 'Username atau Password Salah!');
            }
        }else{
            return redirect('/cabang/login')->with('error', 'Username atau Password Salah!');
        }
    }

    public function registercabang(){
        return view('cabang.register-cabang');
    }

    public function postregistercabang(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ],[
            'email' => 'Input Your Email',
            'name' => 'Input Your Username',
            'no_telp' => 'Input Your Phone Number',
            'password' => 'Input Your Password',
            'password.min' => 'Password Must Be 8 Character',
        ]
    );
    try{
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->password = bcrypt($request->password);
        $user->level = 'cabang';
        $user->verification = 'verified';
        $user->save();
        $alert = Alert::success('Success', 'Anda Sudah Terdaftar Silahkan Login');
        return redirect('/cabang/login')->with('success', $alert);
        
    }
        catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }   

    }
    
    public function logout()
    {
     Auth::logout();
     return redirect('/');
    }
}
