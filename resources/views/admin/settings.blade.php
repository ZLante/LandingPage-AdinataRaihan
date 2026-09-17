@extends('admin.layout', ['title' => 'Settings', 'heading' => 'Account Settings'])

@section('content')
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
        </div>
        <div class="mb-4">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
        </div>
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </form>
@endsection
