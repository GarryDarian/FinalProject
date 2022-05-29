<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function showRegistration(){
        return view('auth.register');
    }
    public function prosesLogin(Request $request){
        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|max:255',
        ]);
        $credentials = $request->only(['email','password']);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect('/Login')->with('error_status','Login Failed');
    }
    public function prosesRegistration(Request $request){
        $request->validate([
            'username'=>'required|string|max:255|unique:users',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|string|min:6|confirmed',
            'number'=>'string|min:10',
        ]);
        User::create([
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        return redirect('/Login')->with('success_status', 'Akun berhasil dibuat. Silahkan Login.');
    }
}
