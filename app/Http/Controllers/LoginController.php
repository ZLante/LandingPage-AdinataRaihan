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
        return view('login');
    }

    // Process login
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,user',
        ]);

        $login = $request->login;

        $field = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'name';

        $user = User::whereRaw("LOWER($field) = ?", [strtolower($login)])
            ->where('role', $request->role)
            ->first();

        $credentials = [
            $field => $login,
            'password' => $request->password,
            'role' => $request->role,
        ];

        if ($user) {
            $credentials[$field] = $user->{$field};
        }

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()
            ->withInput($request->only('login', 'role'))
            ->with('error', 'The selected account type, username/email, or password is incorrect.');
    }


    // Register page
    public function showRegister()
    {
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

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}