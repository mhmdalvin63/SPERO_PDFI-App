<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                return redirect('/login')->with('verif', 'Akun Anda Belum Terverifikasi, Hubungi Admin Untuk Memverifikasi Akun');
            }
            else{
                return redirect('/login')->with('error', 'Username atau Password Salah!');
            }
        }else{
            return redirect('/login')->with('error', 'Username atau Password Salah!');
        }
    }

    public function resetpassword(){
        return view('reset-password');
    }

    
    public function logout()
    {
     Auth::logout();
     return redirect('/');
    }
}
