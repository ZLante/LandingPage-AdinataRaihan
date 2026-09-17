@extends('admin.layout', ['title' => isset($organization) ? 'Edit Organization Member' : 'Add Organization Member', 'heading' => isset($organization) ? 'Edit Organization Member' : 'Add Organization Member'])

@section('content')
    <form action="{{ isset($organization) ? route('organization.update', $organization) : route('organization.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($organization)) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ old('name', $organization->name ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="position">Rank / Role</label>
            <input class="form-control" id="position" name="position" value="{{ old('position', $organization->position ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="parent_id">Reports To</label>
            <select class="form-select" id="parent_id" name="parent_id">
                <option value="">Top level</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" @selected((string) old('parent_id', $organization->parent_id ?? '') === (string) $member->id)>{{ $member->name }} - {{ $member->position }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="sort_order">Display Order</label>
            <input class="form-control" type="number" min="0" id="sort_order" name="sort_order" value="{{ old('sort_order', $organization->sort_order ?? 0) }}">
        </div>
        <div class="mb-4">
            <label class="form-label" for="photo">Profile Photo</label>
            <input class="form-control" type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp">
            <div class="form-text">Optional. JPG, PNG, or WebP up to 5 MB.</div>
        </div>
        <button class="btn btn-primary" type="submit">Save Member</button>
        <a class="btn btn-light" href="{{ route('organization.index') }}">Cancel</a>
    </form>
@endsection
