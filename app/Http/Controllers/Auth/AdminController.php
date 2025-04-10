<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'admin',
            'status' => 'active',
        ]);

        Auth::login($admin);

        return redirect()->route('admin.dashboard');
    }
}
