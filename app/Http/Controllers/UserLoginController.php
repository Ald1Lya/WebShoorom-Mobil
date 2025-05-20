<?php

// UserLoginController.php
namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{

    
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = UserLogin::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_logins' => $user]);
            return redirect()->intended('/')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_logins');
        return redirect('/')->with('success', 'Berhasil logout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_logins,email',
            'password' => 'required|confirmed|min:6',
        ]);

        UserLogin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil, silakan login');
    }

}
