@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST">
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
