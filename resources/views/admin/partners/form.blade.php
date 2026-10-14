@php($editing = isset($partner))
@extends('admin.layout', ['title' => $editing ? 'Edit Collaboration' : 'Add Collaboration', 'heading' => $editing ? 'Edit Collaboration' : 'Add Collaboration'])

@section('content')
    <form action="{{ $editing ? route('partners.update', $partner) : route('partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($editing) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label" for="name">Partner or collaboration category</label>
            <input class="form-control" id="name" name="name" value="{{ old('name', $partner->name ?? '') }}" maxlength="255" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" maxlength="2000">{{ old('description', $partner->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="website">Website or details link</label>
            <input class="form-control" type="url" id="website" name="website" value="{{ old('website', $partner->website ?? '') }}" maxlength="2048">
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label" for="icon">Fallback icon</label>
                <select class="form-select" id="icon" name="icon" required>
                    @foreach(\App\Models\Partner::ICONS as $icon)
                        <option value="{{ $icon }}" @selected(old('icon', $partner->icon ?? 'bi bi-building') === $icon)>{{ str_replace(['bi bi-', '-'], ['', ' '], $icon) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="theme">Tile theme</label>
                <select class="form-select" id="theme" name="theme" required>
                    @foreach(\App\Models\Partner::THEMES as $theme)
                        <option value="{{ $theme }}" @selected(old('theme', $partner->theme ?? 'blue') === $theme)>{{ ucfirst($theme) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="sort_order">Display order</label>
                <input class="form-control" type="number" id="sort_order" name="sort_order" min="0" max="9999" value="{{ old('sort_order', $partner->sort_order ?? 0) }}" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label" for="logo">Logo</label>
            <input class="form-control" type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png,.webp">
            <div class="form-text">Optional. JPG, PNG, or WebP up to 5 MB. The selected icon and theme are used when no logo is uploaded.</div>
            @if($editing && $partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Current {{ $partner->name }} logo" class="mt-3 rounded" width="80" height="80" style="object-fit: contain;">
            @endif
        </div>

        <button class="btn btn-primary" type="submit">{{ $editing ? 'Save Collaboration' : 'Add Collaboration' }}</button>
        <a class="btn btn-light" href="{{ route('partners.index') }}">Cancel</a>
    </form>
@endsection
