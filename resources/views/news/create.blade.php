<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News - POLNEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <a href="{{ route('news.index') }}" class="text-decoration-none">&larr; News Management</a>
        <div class="card border-0 shadow-sm mt-3"><div class="card-body p-4">
            <h1 class="h3 mb-4">Add News</h1>
            @include('news.form', ['action' => route('news.store'), 'method' => 'POST', 'button' => 'Save News'])
        </div></div>
    </main>
</body>
</html>
