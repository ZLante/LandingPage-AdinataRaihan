@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="mb-3">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" id="title" name="title" value="{{ old('title', $news->title ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="tag">Tag</label>
        <input class="form-control" id="tag" name="tag" value="{{ old('tag', $news->tag ?? '') }}" placeholder="Example: Campus, Announcement">
    </div>

    <div class="mb-3">
        <label class="form-label" for="link">News Link</label>
        <input class="form-control" type="url" id="link" name="link" value="{{ old('link', $news->link ?? '') }}" placeholder="https://example.com/news">
    </div>

    <div class="mb-3">
        <label class="form-label" for="image">News Image</label>
        <input class="form-control" type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp">
        <div class="form-text">Optional. JPG, PNG, or WebP up to 5 MB.</div>
        @if(isset($news) && $news->image)
            <img class="mt-2 rounded" src="{{ asset('storage/' . $news->image) }}" alt="Current news image" style="max-width: 180px; max-height: 100px; object-fit: cover;">
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="7" required>{{ old('description', $news->description ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="form-label" for="status">Status</label>
        <select class="form-select" id="status" name="status" required>
            @foreach(['draft', 'published'] as $status)
                <option value="{{ $status }}" @selected(old('status', $news->status ?? 'draft') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary" type="submit">{{ $button }}</button>
    <a class="btn btn-light" href="{{ route('news.index') }}">Cancel</a>
</form>
