<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - POLNEP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cyan: #18a8ce; --navy: #203766; --line: #5d6b89; --surface: #fff; --muted-surface: #d5d5d5; --text: #111; --muted-text: #526381; }
        body.dark-mode { --cyan: #08728f; --navy: #101b35; --line: #556786; --surface: #253554; --muted-surface: #3c4659; --text: #f5f7fb; --muted-text: #c2cce0; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; font-family: Arial, sans-serif; background: var(--cyan); color: var(--text); transition: background .25s ease, color .25s ease; }
        .admin-shell { min-height: 100vh; display: grid; grid-template-columns: 222px 1fr; gap: 0; padding: 20px 0 9px; }
        .sidebar { padding: 0 18px; }
        .brand { display: block; margin: 3px 18px 30px; }
        .brand img { width: 155px; display: block; }
        .side-menu { border: 3px solid #078fcd; padding: 1px; }
        .side-menu a { display: flex; align-items: center; gap: 7px; padding: 5px 3px; color: #001a2a; font-size: 16px; line-height: 20px; text-decoration: none; }
        .side-menu a:hover, .side-menu a.active { border: 1px solid #0094bc; border-radius: 6px; background: #3ccbd0; }
        .side-menu hr { margin: 2px 0; border: 0; border-top: 1px solid white; }
        .workspace { min-height: calc(100vh - 29px); margin-right: 5px; overflow: hidden; border-radius: 14px; background: var(--navy); }
        .toolbar { height: 48px; display: flex; align-items: center; justify-content: space-between; padding: 0 18px; border-bottom: 1px solid var(--line); color: white; }
        .toolbar h1 { margin: 0; font-size: 16px; }
        .toolbar-actions { display: flex; align-items: center; gap: 8px; }
        .toolbar-search { width: 145px; height: 25px; border: 0; border-radius: 4px; padding: 5px 9px; background: #e1e1e1; font-size: 10px; }
        .toolbar-icon { border: 0; color: white; background: transparent; font-size: 16px; cursor: pointer; }
        .notification-menu { position: relative; }
        .notification-count { position: absolute; top: -6px; right: -6px; min-width: 14px; height: 14px; display: grid; place-items: center; border-radius: 50%; color: white; background: #e74c5b; font-size: 8px; }
        .notification-panel { position: absolute; top: calc(100% + 10px); right: 0; z-index: 8; display: none; width: 260px; padding: 10px; border-radius: 7px; color: #17213a; background: #fff; box-shadow: 0 8px 22px rgba(0, 0, 0, .28); }
        .notification-menu.open .notification-panel { display: block; }
        .notification-panel h2 { margin: 0 0 8px; font-size: 12px; }
        .notification-item { padding: 7px 0; border-top: 1px solid #e6e8ed; font-size: 10px; }
        .notification-item strong, .notification-item span { display: block; }
        .notification-item span { margin-top: 3px; color: #697386; font-size: 9px; }
        .product-button { display: flex; align-items: center; gap: 9px; border: 0; border-radius: 4px; padding: 8px 11px; color: white; background: #443ab8; font-size: 10px; }
        .profile { display: flex; align-items: center; gap: 7px; margin-left: 3px; color: white; font-size: 10px; }
        .avatar { width: 25px; height: 25px; display: grid; place-items: center; border-radius: 50%; color: #fff; background: #ef7b32; font-weight: 700; }
        .account-menu { position: relative; }
        .account-menu form { position: absolute; top: calc(100% + 5px); right: 0; z-index: 5; display: none; padding: 5px; border-radius: 5px; background: #172747; box-shadow: 0 5px 14px rgba(0, 0, 0, .3); }
        .account-menu:hover form, .account-menu:focus-within form { display: block; }
        .account-logout { display: block; width: 76px; border: 0; border-radius: 3px; padding: 6px 8px; color: white; background: #d84755; font-size: 10px; cursor: pointer; }
        .workspace-content { padding: 36px 25px; }
        .getting-started { overflow: hidden; border: 1px solid var(--surface); border-radius: 13px; background: var(--muted-surface); transition: background .25s ease, border-color .25s ease; }
        .getting-title { display: flex; align-items: center; justify-content: space-between; padding: 9px 16px; border-bottom: 1px solid var(--surface); color: var(--text); font-size: 14px; }
        .progress-summary { display: flex; align-items: center; gap: 9px; color: var(--muted-text); font-size: 10px; }
        .progress-track { width: 105px; height: 7px; overflow: hidden; border-radius: 8px; background: rgba(0, 0, 0, .16); }
        .progress-bar { width: 0; height: 100%; border-radius: inherit; background: #22c997; transition: width .3s ease; }
        .getting-items { display: grid; grid-template-columns: repeat(3, 1fr); gap: 55px; padding: 12px 30px 17px; }
        .getting-item { position: relative; height: 63px; padding: 12px 12px 12px 37px; background: var(--surface); color: var(--text); transition: background .2s ease, opacity .2s ease; }
        .getting-item:hover { background: color-mix(in srgb, var(--surface) 88%, var(--cyan)); }
        .getting-item.completed { opacity: .65; }
        .getting-item.completed strong { text-decoration: line-through; }
        .task-check { position: absolute; top: 14px; left: 12px; width: 16px; height: 16px; margin: 0; accent-color: #22c997; cursor: pointer; }
        .getting-item.locked { opacity: .42; pointer-events: none; }
        .getting-item strong { display: block; margin-bottom: 5px; font-size: 11px; }
        .getting-item span { color: var(--muted-text); font-size: 9px; }
        .content-grid { display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 125px 110px; gap: 24px 54px; margin-top: 32px; }
        .info-card { min-width: 0; padding: 12px 10px; border-radius: 8px; background: var(--surface); color: var(--text); transition: background .25s ease, color .25s ease; }
        .info-card.tall { grid-column: 2; grid-row: 1 / span 2; }
        .info-card small { display: block; margin-bottom: 7px; color: var(--muted-text); font-size: 8px; }
        .info-card h2 { margin: 0 0 5px; font-size: 15px; }
        .info-card p { margin: 0; color: var(--muted-text); font-size: 9px; line-height: 1.4; }
        .news-list { display: grid; gap: 7px; margin-top: 10px; }
        .news-item { display: flex; align-items: center; gap: 7px; min-width: 0; padding-top: 6px; border-top: 1px solid var(--muted-text); }
        .news-item img, .news-placeholder { width: 34px; height: 28px; flex: 0 0 34px; border-radius: 4px; object-fit: cover; }
        .news-placeholder { display: grid; place-items: center; color: var(--muted-text); background: var(--muted-surface); font-size: 12px; }
        .news-item strong, .news-item span { display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .news-item strong { color: var(--text); font-size: 9px; }
        .news-item span { margin-top: 2px; color: var(--muted-text); font-size: 8px; }
        .news-item a { min-width: 0; text-decoration: none; }
        @media (max-width: 720px) {
            .admin-shell { grid-template-columns: 1fr; padding: 0; }
            .sidebar { padding: 14px; }
            .brand { margin: 0 0 14px; }
            .side-menu { display: grid; grid-template-columns: repeat(2, 1fr); }
            .side-menu hr { display: none; }
            .workspace { min-height: calc(100vh - 190px); margin: 0; border-radius: 14px 14px 0 0; }
            .toolbar { height: auto; min-height: 55px; flex-wrap: wrap; gap: 10px; padding: 10px 14px; }
            .toolbar-actions { flex-wrap: wrap; }
            .workspace-content { padding: 22px 14px; }
            .getting-items { gap: 10px; padding: 12px; }
            .content-grid { grid-template-columns: 1fr; grid-template-rows: auto; gap: 16px; }
            .info-card.tall { grid-column: auto; grid-row: auto; min-height: 150px; }
        }
    </style>
</head>
<body>
    @php
        $firstName = explode(' ', trim(auth()->user()->name))[0];
        $initial = strtoupper(substr($firstName, 0, 1));
    @endphp
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('dashboard') }}"><img src="{{ asset('images/logo.png') }}" alt="POLNEP"></a>
            <nav class="side-menu" aria-label="Dashboard navigation">
                <a class="active" href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i>Home</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('news.index') }}"><i class="bi bi-chat"></i>News</a>
                @endif
                <a href="{{ route('admin.email') }}"><i class="bi bi-envelope"></i>Email</a>
                <a href="{{ route('organization.index') }}"><i class="bi bi-people"></i>Organization Structure</a>
                <a href="{{ route('visi-misi') }}"><i class="bi bi-phone"></i>Visi &amp; Misi</a>
                <a href="{{ url('/') }}"><i class="bi bi-globe"></i>Landing Page</a>
                <hr>
                <a href="{{ route('admin.settings') }}"><i class="bi bi-gear"></i>Settings</a>
                <a href="{{ route('admin.help') }}"><i class="bi bi-question-circle"></i>Help</a>
            </nav>
        </aside>

        <main class="workspace">
            <header class="toolbar">
                <h1>Home</h1>
                <div class="toolbar-actions">
                    <input class="toolbar-search" type="search" placeholder="Search Anything..." aria-label="Search Anything">
                    <button class="toolbar-icon" id="theme-toggle" type="button" aria-label="Switch to dark mode" title="Switch theme"><i class="bi bi-moon"></i></button>
                    <div class="notification-menu" id="notification-menu">
                        <button class="toolbar-icon" id="notification-toggle" type="button" aria-label="Notifications" aria-expanded="false"><i class="bi bi-bell"></i>@if($emails->count() + $notifications->count() > 0)<span class="notification-count">{{ min($emails->count() + $notifications->count(), 9) }}</span>@endif</button>
                        <div class="notification-panel" role="region" aria-label="Notifications">
                            <h2>Notifications</h2>
                            @forelse($emails as $email)
                                <div class="notification-item"><strong>New email from {{ $email->name }}</strong><span>{{ Str::limit($email->message, 60) }}</span></div>
                            @empty
                            @endforelse
                            @forelse($notifications as $notification)
                                <div class="notification-item"><strong>News: {{ $notification->title }}</strong><span>{{ $notification->created_at?->diffForHumans() }}</span></div>
                            @empty
                            @endforelse
                            @if($emails->isEmpty() && $notifications->isEmpty())<div class="notification-item">No new activity.</div>@endif
                        </div>
                    </div>
                    <div class="account-menu">
                        <div class="profile" title="{{ auth()->user()->name }}" tabindex="0">
                            @if(auth()->user()->profile_photo)
                                <img class="avatar" src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}">
                            @else
                                <span class="avatar" aria-hidden="true">{{ $initial }}</span>
                            @endif
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="account-logout" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <section class="workspace-content">
                <div class="getting-started">
                    <div class="getting-title">
                        <strong>Getting Started</strong>
                        <div class="progress-summary"><span id="progress-label">0% complete</span><div class="progress-track" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar" id="progress-bar"></div></div></div>
                    </div>
                    <div class="getting-items">
                        <label class="getting-item" data-task="profile" data-url="{{ route('admin.settings') }}">
                            <input class="task-check" type="checkbox" aria-label="Complete your profile">
                            <strong>Complete your profile</strong><span>Add your information in Settings</span>
                        </label>
                        <label class="getting-item" data-task="portal" data-url="{{ url('/') }}">
                            <input class="task-check" type="checkbox" aria-label="Explore the portal">
                            <strong>Explore the portal</strong><span>Review the POLNEP landing page</span>
                        </label>
                        <label class="getting-item" data-task="resources" data-url="{{ route('admin.help') }}">
                            <input class="task-check" type="checkbox" aria-label="Find academic resources">
                            <strong>Find academic resources</strong><span>Open the academic information</span>
                        </label>
                    </div>
                </div>

                <section class="content-grid" aria-label="Dashboard information">
                    <article class="info-card">
                        <small>Title</small>
                        <h2>Welcome, {{ auth()->user()->name }}</h2>
                        <p>Manage your POLNEP account and access your campus workspace.</p>
                    </article>
                    <article class="info-card tall">
                        <small>Title</small>
                        <h2>Academic Information</h2>
                        <p>Stay up to date with the latest POLNEP news and announcements.</p>
                        <div class="news-list">
                            @forelse($latestNews as $news)
                                <div class="news-item">
                                    @if($news->image)
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="">
                                    @else
                                        <div class="news-placeholder"><i class="bi bi-newspaper"></i></div>
                                    @endif
                                    <a href="{{ $news->link ?: '#' }}" @if($news->link) target="_blank" rel="noopener" @endif>
                                        <strong>{{ $news->title }}</strong>
                                        <span>{{ $news->tag ?: 'News' }} · {{ $news->published_at?->format('M d, Y') }}</span>
                                    </a>
                                </div>
                            @empty
                                <p>No published news yet.</p>
                            @endforelse
                        </div>
                    </article>
                    <article class="info-card latest-news-card">
                        <small>Title</small>
                        <h2>Latest News</h2>
                        <div class="news-list">
                            @forelse($latestNews as $news)
                                <div class="news-item">
                                    @if($news->image)
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="">
                                    @else
                                        <div class="news-placeholder"><i class="bi bi-newspaper"></i></div>
                                    @endif
                                    <a href="{{ $news->link ?: '#' }}" @if($news->link) target="_blank" rel="noopener" @endif>
                                        <strong>{{ $news->title }}</strong>
                                        <span>{{ $news->tag ?: 'News' }} · {{ $news->published_at?->format('M d, Y') }}</span>
                                    </a>
                                </div>
                            @empty
                                <p>No published news yet.</p>
                            @endforelse
                        </div>
                    </article>
                </section>
            </section>
        </main>
    </div>
    <script>
        const taskStorageKey = 'polnep-getting-started-{{ auth()->id() }}';
        const taskItems = [...document.querySelectorAll('.getting-item[data-task]')];
        const progressBar = document.getElementById('progress-bar');
        const progressLabel = document.getElementById('progress-label');
        const progressTrack = document.querySelector('.progress-track');

        function updateTaskProgress() {
            const completed = taskItems.filter((item) => item.querySelector('.task-check').checked).length;
            const progress = Math.round((completed / taskItems.length) * 100);
            progressBar.style.width = `${progress}%`;
            progressLabel.textContent = progress === 100 ? 'All complete' : `${progress}% complete`;
            progressTrack.setAttribute('aria-valuenow', progress);
            let nextTaskFound = false;
            taskItems.forEach((item) => {
                const checkbox = item.querySelector('.task-check');
                const complete = checkbox.checked;
                item.classList.toggle('completed', complete);
                item.classList.toggle('locked', !complete && nextTaskFound);
                checkbox.disabled = !complete && nextTaskFound;
                if (!complete && !nextTaskFound) nextTaskFound = true;
            });
            localStorage.setItem(taskStorageKey, JSON.stringify(taskItems.filter((item) => item.querySelector('.task-check').checked).map((item) => item.dataset.task)));
        }

        const savedTasks = JSON.parse(localStorage.getItem(taskStorageKey) || '[]');
        taskItems.forEach((item) => {
            const checkbox = item.querySelector('.task-check');
            checkbox.checked = savedTasks.includes(item.dataset.task);
            checkbox.addEventListener('change', updateTaskProgress);
            item.addEventListener('click', function (event) {
                if (event.target === checkbox || checkbox.disabled || checkbox.checked) return;
                window.location.href = item.dataset.url;
            });
        });
        updateTaskProgress();

        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = themeToggle.querySelector('i');

        function applyTheme(theme) {
            const darkMode = theme === 'dark';
            document.body.classList.toggle('dark-mode', darkMode);
            themeIcon.className = darkMode ? 'bi bi-sun' : 'bi bi-moon';
            themeToggle.setAttribute('aria-label', darkMode ? 'Switch to light mode' : 'Switch to dark mode');
        }

        applyTheme(localStorage.getItem('polnep-theme') || 'light');

        themeToggle.addEventListener('click', function () {
            const nextTheme = document.body.classList.contains('dark-mode') ? 'light' : 'dark';
            localStorage.setItem('polnep-theme', nextTheme);
            applyTheme(nextTheme);
        });

        const notificationMenu = document.getElementById('notification-menu');
        const notificationToggle = document.getElementById('notification-toggle');
        notificationToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            const open = notificationMenu.classList.toggle('open');
            notificationToggle.setAttribute('aria-expanded', open);
        });
        document.addEventListener('click', function () {
            notificationMenu.classList.remove('open');
            notificationToggle.setAttribute('aria-expanded', 'false');
        });
    </script>
</body>
</html>
