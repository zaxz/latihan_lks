<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function tampilLogin()
    {
        return view('auth.login');
    }
    public function tampilRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $register = $request->validate([
            'nis'=> 'required|integer',
            'nama'=> 'required',
            'password' => 'required|min:7',
        ]);
        
        User::create([
            'nis'=> $request->nis,
            'nama'=> $request->nama,
            'password'=> Hash::make($request->password),
        ]);

        if (Auth::attempt($register)) {
            return redirect()->intended(route('index'));
        }

        return redirect()->route('index');
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'nis' => 'required|integer',
            'password' => 'required|min:7'
        ]);

        if(Auth::attempt($login)){
            return redirect()->intended(route('index'));
        } else {
            return redirect()->back()->withErrors('Email atau Password salah!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
