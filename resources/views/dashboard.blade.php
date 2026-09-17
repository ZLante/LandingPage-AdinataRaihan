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
        .product-button { display: flex; align-items: center; gap: 9px; border: 0; border-radius: 4px; padding: 8px 11px; color: white; background: #443ab8; font-size: 10px; }
        .profile { display: flex; align-items: center; gap: 7px; margin-left: 3px; color: white; font-size: 10px; }
        .avatar { width: 25px; height: 25px; display: grid; place-items: center; border-radius: 50%; color: #fff; background: #ef7b32; font-weight: 700; }
        .account-menu { position: relative; }
        .account-menu form { position: absolute; top: calc(100% + 5px); right: 0; z-index: 5; display: none; padding: 5px; border-radius: 5px; background: #172747; box-shadow: 0 5px 14px rgba(0, 0, 0, .3); }
        .account-menu:hover form, .account-menu:focus-within form { display: block; }
        .account-logout { display: block; width: 76px; border: 0; border-radius: 3px; padding: 6px 8px; color: white; background: #d84755; font-size: 10px; cursor: pointer; }
        .workspace-content { padding: 36px 25px; }
        .getting-started { overflow: hidden; border: 1px solid var(--surface); border-radius: 13px; background: var(--muted-surface); transition: background .25s ease, border-color .25s ease; }
        .getting-title { padding: 9px 16px; border-bottom: 1px solid var(--surface); color: var(--text); font-size: 14px; }
        .getting-items { display: grid; grid-template-columns: repeat(3, 1fr); gap: 55px; padding: 12px 30px 17px; }
        .getting-item { height: 63px; padding: 12px; background: var(--surface); color: var(--text); }
        .getting-item strong { display: block; margin-bottom: 5px; font-size: 11px; }
        .getting-item span { color: var(--muted-text); font-size: 9px; }
        .content-grid { display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 101px 91px; gap: 24px 54px; margin-top: 32px; }
        .info-card { min-width: 0; padding: 12px 10px; border-radius: 8px; background: var(--surface); color: var(--text); transition: background .25s ease, color .25s ease; }
        .info-card.tall { grid-column: 2; grid-row: 1 / span 2; }
        .info-card small { display: block; margin-bottom: 7px; color: var(--muted-text); font-size: 8px; }
        .info-card h2 { margin: 0 0 5px; font-size: 15px; }
        .info-card p { margin: 0; color: var(--muted-text); font-size: 9px; line-height: 1.4; }
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
                <a href="{{ route('news.index') }}"><i class="bi bi-chat"></i>News</a>
                <a href="#"><i class="bi bi-envelope"></i>Email</a>
                <a href="#"><i class="bi bi-people"></i>Organization Structure</a>
                <a href="#"><i class="bi bi-phone"></i>Visi &amp; Misi</a>
                <a href="{{ url('/') }}"><i class="bi bi-globe"></i>Landing Page</a>
                <hr>
                <a href="#"><i class="bi bi-gear"></i>Settings</a>
                <a href="#"><i class="bi bi-question-circle"></i>Help</a>
            </nav>
        </aside>

        <main class="workspace">
            <header class="toolbar">
                <h1>Home</h1>
                <div class="toolbar-actions">
                    <input class="toolbar-search" type="search" placeholder="Search Anything..." aria-label="Search Anything">
                    <button class="toolbar-icon" id="theme-toggle" type="button" aria-label="Switch to dark mode" title="Switch theme"><i class="bi bi-moon"></i></button>
                    <a class="toolbar-icon" href="#" aria-label="Notifications"><i class="bi bi-bell"></i></a>
                    <div class="account-menu">
                        <div class="profile" title="{{ auth()->user()->name }}" tabindex="0">
                            <span class="avatar" aria-hidden="true">{{ $initial }}</span>
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
                    <div class="getting-title">Getting Started</div>
                    <div class="getting-items">
                        <div class="getting-item"><strong>Complete your profile</strong><span>Add your information</span></div>
                        <div class="getting-item"><strong>Explore the portal</strong><span>Review campus updates</span></div>
                        <div class="getting-item"><strong>Find academic resources</strong><span>Open useful documents</span></div>
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
                        <p>Stay up to date with schedules, academic documents, and important announcements.</p>
                    </article>
                    <article class="info-card">
                        <small>Title</small>
                        <h2>Latest News</h2>
                        <p>Read the latest news and activities from the POLNEP community.</p>
                    </article>
                </section>
            </section>
        </main>
    </div>
    <script>
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
    </script>
</body>
</html>
