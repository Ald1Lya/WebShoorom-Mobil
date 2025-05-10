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
}
