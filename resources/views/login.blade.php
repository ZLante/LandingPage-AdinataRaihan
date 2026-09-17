<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - POLNEP</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f1f3f5;
        }

        .login-container {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(0,0,0,.15);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 180px;
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #0099e5;
        }

        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            color: #333;
            background: white;
            font-size: 15px;
        }

        .login-button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 7px;
            background: #0099e5;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .login-button:hover {
            background: #000;
            transform: translateY(-2px);
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .register {
            text-align: center;
            margin-top: 20px;
        }

        .register a {
            color: #0099e5;
            text-decoration: none;
        }

        .register a:hover {
            color: #000;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="POLNEP">
    </div>

    <h2>Login</h2>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="role">Sign in as</label>
            <select id="role" name="role" required>
                <option value="user" @selected(old('role', 'user') === 'user')>User</option>
                <option value="admin" @selected(old('role') === 'admin')>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="login">Username / Email</label>

            <input
                type="text"
                id="login"
                name="login"
                placeholder="Enter username or email"
                value="{{ old('login') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
            >
        </div>

        <button type="submit" class="login-button">
            Login
        </button>

    </form>

    <div class="register">
        Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </div>

</div>

</body>
</html>
