<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi - POLNEP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cyan: #1aa8d0; --blue: #139fe6; --yellow: #e4be25; --ink: #111; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; color: var(--ink); font-family: Arial, sans-serif; background: #fff; }
        .visi-page { min-height: 100vh; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 31px 220px 1fr 190px; }
        .topbar { grid-column: 1 / -1; display: flex; justify-content: flex-end; align-items: center; padding: 0 11px; background: var(--blue); }
        .language-toggle { display: inline-flex; align-items: center; gap: 3px; margin: 0; }
        .language-toggle-button { display: inline-flex; align-items: center; justify-content: center; padding: 2px; border: 1px solid transparent; border-radius: 3px; background: transparent; opacity: .65; cursor: pointer; }
        .language-toggle-button:hover, .language-toggle-button:focus-visible, .language-toggle-button.active { border-color: #fff; opacity: 1; }
        .language-toggle-button img { width: 23px; height: 15px; object-fit: cover; }
        .flags { display: flex; gap: 3px; }
        .flags img { width: 23px; height: 15px; object-fit: cover; }
        .hero { grid-column: 1 / -1; position: relative; display: grid; place-items: center; overflow: hidden; color: white; background: #354b42; }
        .hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .5)), url('{{ asset('images/hero.jpg') }}') center 43% / cover; }
        .hero-content { position: relative; text-align: center; }
        .hero h1 { margin: 0 0 12px; color: var(--yellow); font-size: 36px; letter-spacing: 1px; }
        .breadcrumb { display: flex; justify-content: center; gap: 12px; margin: 0; font-size: 10px; text-transform: uppercase; }
        .breadcrumb a { color: white; text-decoration: none; }
        .breadcrumb .current { color: var(--yellow); }
        .content { grid-column: 1 / -1; position: relative; padding: 42px 24px 54px; background: #f3f7fb; }
        .content-inner { position: relative; max-width: 960px; margin: 0 auto; padding: 32px 38px; border: 1px solid #e2eaf1; border-radius: 16px; background: #fff; box-shadow: 0 12px 35px rgba(20, 58, 89, .09); }
        .content-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin-bottom: 28px; }
        .home-link, .edit-link { display: inline-flex; align-items: center; gap: 7px; padding: 9px 14px; border: 1px solid #139fe6; border-radius: 7px; color: #0878ad; background: #fff; font-size: 13px; font-weight: 700; text-decoration: none; }
        .edit-link { color: white; background: #139fe6; }
        .content h2 { margin: 27px 0 10px; color: #123b61; font-size: 20px; font-weight: 800; letter-spacing: .04em; }
        .content p, .content li { max-width: 850px; color: #34475a; font-size: 17px; font-weight: 400; line-height: 1.75; }
        .content p { margin: 0 0 5px; }
        .content ol { margin: 0 0 0 22px; padding-left: 10px; }
        .content li { padding: 5px 0 5px 6px; }
        .footer-about { display: flex; flex-direction: column; justify-content: center; padding: 16px; background: var(--cyan); }
        .footer-about img { width: 190px; margin-bottom: 7px; }
        .footer-about p { max-width: 200px; margin: 0; font-size: 9px; line-height: 1.25; }
        .footer-about strong { margin-top: 7px; font-size: 8px; }
        .socials { display: flex; gap: 10px; margin-top: 7px; }
        .socials a { width: 33px; height: 33px; display: grid; place-items: center; border-radius: 50%; color: white; text-decoration: none; }
        .socials a:nth-child(1) { color: #111; background: #ddd; }
        .socials a:nth-child(2) { background: #e63d45; }
        .socials a:nth-child(3) { background: #d918db; }
        .footer-contact { display: flex; flex-direction: column; justify-content: center; padding: 22px 16px; color: white; background: #c8c8c8; }
        .footer-contact h3 { margin: 0 0 11px; font-size: 9px; }
        .footer-contact p { margin: 7px 0; font-size: 8px; }
        @media (max-width: 700px) {
            .visi-page { grid-template-columns: 1fr; grid-template-rows: 31px 180px auto auto auto; }
            .hero h1 { font-size: 29px; }
            .content { padding: 24px 14px 32px; }
            .content-inner { padding: 24px 20px; }
            .content p, .content li { font-size: 16px; }
            .footer-about, .footer-contact { grid-column: 1; }
        }
    </style>
</head>
<body>
    <div class="visi-page">
        <header class="topbar">
            @include('components.language-toggle')
        </header>
        <section class="hero">
            <div class="hero-content">
                <h1>{{ __('VISION & MISSION') }}</h1>
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">{{ __('Home') }}</a><span>&gt;</span><a href="{{ url('/') }}#profile">{{ __('Profile') }}</a><span>&gt;</span><span class="current">{{ __('Vision & Mission') }}</span>
                </nav>
            </div>
        </section>
        <main class="content">
            <div class="content-inner">
                <div class="content-actions">
                    <a class="home-link" href="{{ route('home') }}"><i class="bi bi-arrow-left"></i> {{ __('Back to Home') }}</a>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a class="edit-link" href="{{ route('admin.visi-misi.edit') }}"><i class="bi bi-pencil"></i> {{ __('Edit Vision & Mission') }}</a>
                    @endif
                </div>
                @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
                <h2>{{ __('VISION') }}</h2>
                <p>{{ $content->visi }}</p>
                <h2>{{ __('MISSION') }}</h2>
                <ol>
                    @foreach($content->misi as $mission)
                        <li>{{ $mission }}</li>
                    @endforeach
                </ol>
            </div>
        </main>
        <section class="footer-about">
            <img src="{{ asset('images/logo.png') }}" alt="POLNEP">
            <p>Politeknik Negeri Pontianak is a vocational Freedom Campus initiative that makes the learning process in vocational higher education more free to produce graduates that meet industry needs.</p>
            <strong>{{ __('FOLLOW US :') }}</strong>
            <div class="socials"><a href="https://web.facebook.com/mediapolnep/mentions/?_rdc=1&amp;_rdr#" aria-label="POLNEP on Facebook" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a><a href="https://www.youtube.com/@mediapolnep" aria-label="POLNEP on YouTube" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a><a href="https://www.instagram.com/mediapolnep/?hl=en" aria-label="POLNEP on Instagram" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a></div>
        </section>
        <section class="footer-contact">
            <h3>{{ __('CONTACT & LOCATION :') }}</h3>
            <p><i class="bi bi-geo-alt-fill"></i> &nbsp; Jl. Jenderal Ahmad Yani, Banjar Laut, Pontianak Tenggara, Kota Pontianak, Kalimantan Barat 78124</p>
            <p><i class="bi bi-telephone-fill"></i> &nbsp; XXX-XXX-XXXX</p>
            <p><i class="bi bi-envelope-fill"></i> &nbsp; kampus@polnep.ac.id</p>
        </section>
    </div>
</body>
</html>
