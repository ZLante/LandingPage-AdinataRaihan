<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management - POLNEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="{{ route('dashboard') }}" class="text-decoration-none">&larr; Dashboard</a>
                <h1 class="h3 mt-2 mb-0">News Management</h1>
            </div>
            <a href="{{ route('news.create') }}" class="btn btn-primary">Add News</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($newsItems->isEmpty())
            <div class="card border-0 shadow-sm"><div class="card-body">No news has been added yet.</div></div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead><tr><th>Title</th><th>Tag</th><th>Status</th><th>Published</th><th class="text-end">Actions</th></tr></thead>
                        <tbody>
                            @foreach($newsItems as $news)
                                <tr>
                                    <td><strong>{{ $news->title }}</strong><br><small class="text-muted">{{ Str::limit($news->description, 80) }}</small></td>
                                    <td>{{ $news->tag ?: 'No tag' }}</td>
                                    <td><span class="badge text-bg-{{ $news->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($news->status) }}</span></td>
                                    <td>{{ $news->published_at?->format('M d, Y') ?? '-' }}</td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('news.edit', $news) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('news.destroy', $news) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this news item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white">{{ $newsItems->links() }}</div>
            </div>
        @endif
    </main>
</body>
</html>
