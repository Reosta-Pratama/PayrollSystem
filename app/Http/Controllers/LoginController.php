<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view(){
        return view('highFidelity.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        }

        return redirect()->back()->withErrors(['error' => 'Email atau password salah']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil');
    }
}
