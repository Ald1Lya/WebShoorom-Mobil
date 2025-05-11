<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_logins,email',
            'password' => 'required|confirmed',
        ]);
        // Simpan data ke database
        $user = UserLogin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('beranda')->with('success', 'Pendaftaran berhasil, silakan login');
    }

    public function login(Request $request)
        {
            // Validasi input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Cari user berdasarkan email
            $user = UserLogin::where('email', $request->email)->first();

            // Periksa apakah user ada dan password cocok
            if ($user && Hash::check($request->password, $user->password)) {
                // Simpan user ke dalam session
                session(['user_logins' => $user]);

                return redirect()->route('beranda')->with('success', 'Login berhasil');
            }

            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        public function logout()
        {
            session()->forget('user_logins');

            return redirect()->route('beranda')->with('success', 'Berhasil logout');
        }

}
