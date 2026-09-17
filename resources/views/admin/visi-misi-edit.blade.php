<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visi Misi - POLNEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <a href="{{ route('visi-misi') }}" class="text-decoration-none">&larr; Visi &amp; Misi</a>
        <div class="card border-0 shadow-sm mt-3"><div class="card-body p-4">
            <h1 class="h3 mb-4">Edit Visi &amp; Misi</h1>
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('admin.visi-misi.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="form-label" for="visi">Visi</label>
                    <textarea class="form-control" id="visi" name="visi" rows="4" required>{{ old('visi', $content->visi) }}</textarea>
                </div>
                <label class="form-label">Misi</label>
                @foreach(old('misi', $content->misi) as $index => $mission)
                    <div class="input-group mb-2">
                        <span class="input-group-text">{{ $index + 1 }}</span>
                        <input class="form-control" name="misi[]" value="{{ $mission }}" required>
                    </div>
                @endforeach
                <button class="btn btn-primary mt-3" type="submit">Save Changes</button>
                <a class="btn btn-light mt-3" href="{{ route('visi-misi') }}">Cancel</a>
            </form>
        </div></div>
    </main>
</body>
</html>
