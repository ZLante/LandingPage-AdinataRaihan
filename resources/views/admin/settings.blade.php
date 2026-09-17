@extends('admin.layout', ['title' => 'Settings', 'heading' => 'Account Settings'])

@section('content')
    <style>
        .settings-avatar { width: 82px; height: 82px; display: grid; place-items: center; border-radius: 50%; color: white; background: #ef7b32; font-size: 32px; font-weight: 700; object-fit: cover; }
        .settings-section { padding: 18px 0; border-bottom: 1px solid #e5e7eb; }
        .settings-section:last-child { border-bottom: 0; }
    </style>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <section class="settings-section pt-0">
            <h2 class="h5">Profile</h2>
            <div class="d-flex align-items-center gap-3 mb-3">
                @if(auth()->user()->profile_photo)
                    <img class="settings-avatar" src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile photo">
                @else
                    <div class="settings-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                @endif
                <div>
                    <label class="form-label" for="profile_photo">Profile picture</label>
                    <input class="form-control" type="file" id="profile_photo" name="profile_photo" accept=".jpg,.jpeg,.png,.webp">
                    <div class="form-text">JPG, PNG, or WebP up to 5 MB.</div>
                    @if(auth()->user()->profile_photo)
                        <div class="form-check mt-2"><input class="form-check-input" type="checkbox" id="remove_profile_photo" name="remove_profile_photo" value="1"><label class="form-check-label" for="remove_profile_photo">Remove photo</label></div>
                    @endif
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label" for="name">Name</label><input class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required></div>
                <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required></div>
            </div>
        </section>

        <section class="settings-section">
            <h2 class="h5">Security</h2>
            <p class="text-muted small">Leave these fields blank if you do not want to change your password.</p>
            <div class="row g-3">
                <div class="col-md-4"><label class="form-label" for="current_password">Current password</label><input class="form-control" type="password" id="current_password" name="current_password" autocomplete="current-password"></div>
                <div class="col-md-4"><label class="form-label" for="password">New password</label><input class="form-control" type="password" id="password" name="password" autocomplete="new-password"></div>
                <div class="col-md-4"><label class="form-label" for="password_confirmation">Confirm password</label><input class="form-control" type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"></div>
            </div>
        </section>

        <section class="settings-section">
            <h2 class="h5">Language &amp; Preferences</h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label" for="language">Website language</label>
                    <select class="form-select" id="language" name="language" required>
                        @foreach(['en' => 'English', 'id' => 'Indonesia', 'ms' => 'Melayu', 'zh' => '中文 (Chinese)'] as $code => $label)
                            <option value="{{ $code }}" @selected(old('language', auth()->user()->language ?? 'en') === $code)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="timezone">Timezone</label>
                    <select class="form-select" id="timezone" name="timezone" required>
                        @foreach(['Asia/Jakarta' => 'WIB (Jakarta)', 'Asia/Makassar' => 'WITA (Makassar)', 'Asia/Jayapura' => 'WIT (Jayapura)', 'Asia/Kuala_Lumpur' => 'Malaysia', 'Asia/Shanghai' => 'China'] as $zone => $label)
                            <option value="{{ $zone }}" @selected(old('timezone', auth()->user()->timezone ?? 'Asia/Jakarta') === $zone)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="notifications_enabled" name="notifications_enabled" value="1" @checked(old('notifications_enabled', auth()->user()->notifications_enabled ?? true))><label class="form-check-label" for="notifications_enabled">Enable notifications</label></div></div>
            </div>
        </section>

        <button class="btn btn-primary mt-4" type="submit">Save Settings</button>
    </form>
@endsection
