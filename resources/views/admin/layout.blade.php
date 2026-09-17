<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - POLNEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <a href="{{ route('dashboard') }}" class="text-decoration-none">&larr; Dashboard</a>
        <div class="card border-0 shadow-sm mt-3">
            <div class="card-body p-4">
                <h1 class="h3 mb-4">{{ $heading ?? $title ?? 'Admin' }}</h1>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
