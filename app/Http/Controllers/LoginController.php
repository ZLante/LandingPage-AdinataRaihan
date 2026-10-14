<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Login page
    public function showLogin()
    {
        if (Auth::check()) {
            return Auth::user()->role === 'admin'
                ? redirect()->route('dashboard')
                : redirect()->route('home');
        }

        return view('login');
    }

    // Process login
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $login = trim($request->login);

        $user = User::query()
            ->where(function ($query) use ($login) {
                $query->whereRaw('LOWER(name) = ?', [strtolower($login)])
                    ->orWhereRaw('LOWER(email) = ?', [strtolower($login)]);
            })
            ->first();

        if ($user && Auth::attempt([
            'email' => $user->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();

            return $user->role === 'admin'
                ? redirect()->route('dashboard')
                : redirect()->route('home');
        }

        return back()
            ->withInput($request->only('login'))
            ->with('error', 'The username/email or password is incorrect.');
    }


    // Register page
    public function showRegister()
    {
        if (Auth::check()) {
            return Auth::user()->role === 'admin'
                ? redirect()->route('dashboard')
                : redirect()->route('home');
        }

        return view('register');
    }


    // Process registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}