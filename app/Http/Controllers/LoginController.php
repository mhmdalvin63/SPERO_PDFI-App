<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
