<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POLNEP</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body { transition: background .25s ease, color .25s ease; }
        body.landing-dark { --landing-bg: #202a38; --landing-surface: #2c3949; --landing-panel: #344458; --landing-text: #f4f7fb; --landing-muted: #c7d0dc; background: var(--landing-bg); color: var(--landing-text); }
        body.landing-dark .topbar { background: #1596b8; }
        body.landing-dark .navbar, body.landing-dark .card, body.landing-dark .logo-polnep { background: var(--landing-surface) !important; color: var(--landing-text); }
        body.landing-dark .search-section { background: #182331; }
        body.landing-dark footer { background: #182331 !important; }
        body.landing-dark .latest-news h2, body.landing-dark .card h4, body.landing-dark .card h6, body.landing-dark .card p { color: var(--landing-text) !important; }
        body.landing-dark .card-body p { color: var(--landing-muted) !important; }
        body.landing-dark .navbar .nav-link, body.landing-dark .navbar-brand { color: var(--landing-text) !important; }
        body.landing-dark .navbar-brand img, body.landing-dark .logo-polnep img { filter: brightness(1.55) contrast(.9); }
        body.landing-dark .form-control { background: #f3f5f7; color: #1d2733; }
        body.landing-dark .latest-news { background: var(--landing-bg); }
        .legacy-news { display: none; }
        .live-news .card-img-top { height: 190px; object-fit: cover; }
        .live-news .news-empty { min-height: 180px; display: grid; place-items: center; }
        .language-toggle { display: inline-flex; align-items: center; gap: 5px; margin: 0; }
        .language-toggle-button { display: inline-flex; align-items: center; justify-content: center; padding: 4px; border: 1px solid transparent; border-radius: 5px; background: transparent; opacity: .62; cursor: pointer; }
        .language-toggle-button:hover, .language-toggle-button:focus-visible, .language-toggle-button.active { border-color: rgba(255,255,255,.65); opacity: 1; }
        .language-toggle-button img { display: block; object-fit: cover; }
        .landing-account { display: flex; align-items: center; gap: 7px; margin-left: 12px; white-space: nowrap; }
        .landing-avatar { width: 28px; height: 28px; display: grid; place-items: center; border-radius: 50%; color: white; background: #ef7b32; font-size: 13px; font-weight: 700; object-fit: cover; }
        .landing-account-menu { position: relative; }
        .landing-account-toggle { display: flex; align-items: center; gap: 7px; border: 0; padding: 4px 0; color: inherit; background: transparent; }
        .landing-account-menu .dropdown-menu { right: 0; left: auto; min-width: 190px; margin-top: 8px; padding: 7px; border: 0; box-shadow: 0 8px 22px rgba(0, 0, 0, .18); }
        .landing-account-menu .dropdown-item { display: flex; align-items: center; gap: 9px; border-radius: 5px; padding: 9px 10px; color: #1d2733; font-size: 14px; }
        .landing-account-menu .dropdown-item:hover, .landing-account-menu .dropdown-item:focus { color: #075373; background: #eaf6fb; }
        .landing-account-menu .dropdown-divider { margin: 5px 0; }
        .landing-theme { border: 0; padding: 5px 9px; color: inherit; background: transparent; font-size: 18px; cursor: pointer; }
        .landing-logout { width: 100%; border: 0; padding: 9px 10px; text-align: left; background: transparent; }
        .landing-explore { padding: 4.5rem 0; background: #f2f7fb; }
        .landing-faq { padding: 4rem 0; background: #fff; }
        .landing-faq .accordion-item { border-radius: 8px; margin-bottom: 10px; overflow: hidden; }
        .landing-spotlight { padding: 4rem 0; background: linear-gradient(135deg, #eaf8ff 0%, #f7fafd 50%, #eef9f7 100%); }
        .landing-spotlight .section-tag { color: #0d6efd; font-size: .75rem; letter-spacing: .12em; text-transform: uppercase; font-weight: 700; }
        .landing-spotlight-card { border: 0; border-radius: 1.25rem; overflow: hidden; box-shadow: 0 20px 40px rgba(15, 42, 73, .08); }
        .landing-spotlight-card img { height: 100%; min-height: 360px; object-fit: cover; }
        .landing-spotlight-actions { display: flex; align-items: center; gap: .75rem; flex-wrap: wrap; }
        .landing-spotlight-actions .btn { min-height: 48px; display: inline-flex; align-items: center; justify-content: center; gap: .5rem; padding: .7rem 1.15rem; border-radius: .65rem; font-size: .95rem; line-height: 1.25; }
        .landing-spotlight-actions .btn-primary:hover { transform: translateY(-2px); }
        .landing-spotlight-actions .btn-outline-primary:hover { transform: translateY(-2px); }
        .landing-stat { border: 0; border-radius: 1rem; background: #fff; box-shadow: 0 12px 25px rgba(15, 42, 73, .06); }
        .landing-stat .stat-number { font-size: clamp(1.8rem, 3vw, 2.6rem); font-weight: 800; color: #0c5c8d; }
        .landing-feature-card { height: 100%; border: 0; border-radius: 1rem; box-shadow: 0 10px 25px rgba(15, 42, 73, .06); }
        .landing-feature-icon { display: inline-flex; align-items: center; justify-content: center; width: 52px; height: 52px; border-radius: 14px; background: rgba(13,110,253,.09); color: #0d6efd; font-size: 1.5rem; }
        .landing-partners { padding: 4rem 0; background: #f7f9fc; }
        .landing-partner-item { display: flex; align-items: center; gap: 1rem; min-height: 130px; height: 100%; padding: 1.25rem; border-radius: 1rem; background: #fff; border: 1px solid rgba(13,110,253,.08); box-shadow: 0 10px 24px rgba(15,42,73,.05); }
        .landing-partner-mark { width: 58px; height: 58px; flex: 0 0 58px; display: grid; place-items: center; border-radius: 17px; font-size: 1.55rem; }
        .landing-partner-mark img { width: 100%; height: 100%; border-radius: inherit; object-fit: contain; }
        .landing-partner-item h3 { margin: 0; color: #1b3b5a; font-size: 1rem; font-weight: 750; }
        .landing-partner-item p { margin: .3rem 0 0; color: #68798b; font-size: .82rem; }
        .landing-partner-link { display: inline-block; margin-top: .5rem; color: #0d6efd; font-size: .82rem; font-weight: 650; text-decoration: none; }
        .landing-partner-blue .landing-partner-mark { color: #1764a0; background: #e5f1ff; }
        .landing-partner-teal .landing-partner-mark { color: #087c83; background: #e2f6f3; }
        .landing-partner-orange .landing-partner-mark { color: #b66a13; background: #fff1db; }
        .landing-partner-purple .landing-partner-mark { color: #5a3b8c; background: #f0eafb; }
        .landing-partner-red .landing-partner-mark { color: #aa3341; background: #ffebed; }
        .landing-partner-green .landing-partner-mark { color: #267344; background: #e4f5e9; }
        body.landing-dark .landing-explore, body.landing-dark .landing-faq, body.landing-dark .landing-spotlight { background: var(--landing-bg); }
        body.landing-dark .landing-stat, body.landing-dark .landing-feature-card, body.landing-dark .landing-partner-item { background: var(--landing-surface) !important; color: var(--landing-text); }
        body.landing-dark .landing-partner-item h3 { color: var(--landing-text); }
        body.landing-dark .landing-partner-item p { color: var(--landing-muted); }
        body.landing-dark .landing-faq p, body.landing-dark .landing-feature-card p, body.landing-dark .landing-stat p { color: var(--landing-muted) !important; }
        body.landing-dark .landing-partners { background: var(--landing-bg); }
        body.landing-dark .landing-faq .accordion-item { color: var(--landing-text); background: var(--landing-surface); }
        body.landing-dark .landing-faq .accordion-button { color: var(--landing-text); background: var(--landing-surface); }
        body.landing-dark .landing-faq .accordion-button::after { filter: invert(1); }
        @media (max-width: 991px) { .landing-account { margin: 8px 0 0; } }
    </style>

</head>

<body>
@auth
    @php
        $landingFirstName = explode(' ', trim(auth()->user()->name))[0];
        $landingInitial = strtoupper(substr($landingFirstName, 0, 1));
    @endphp
@endauth

<!-- ========================= -->
<!-- TOPBAR -->
<!-- ========================= -->

<div class="topbar">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <a href="https://web.facebook.com/mediapolnep/mentions/?_rdc=1&_rdr#" target="_blank" rel="noopener noreferrer" aria-label="POLNEP on Facebook">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="https://www.instagram.com/mediapolnep/?hl=en" target="_blank" rel="noopener noreferrer" aria-label="POLNEP on Instagram">
                    <i class="bi bi-instagram"></i>
                </a>

                <a href="https://www.youtube.com/@mediapolnep" target="_blank" rel="noopener noreferrer" aria-label="POLNEP on YouTube">
                    <i class="bi bi-youtube"></i>
                </a>

            </div>

            <div class="col-md-6 text-end">

                @include('components.language-toggle')

            </div>

        </div>

    </div>

</div>

<!-- ========================= -->
<!-- NAVBAR -->
<!-- ========================= -->

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

    <div class="container">

        <a class="navbar-brand" href="#">

            <img src="images/logo.png"
            width="180">

        </a>

        <button class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
        id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        {{ __('Home') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                    href="#"
                    data-bs-toggle="dropdown">

                        {{ __('Profile') }}

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="{{ route('about') }}">
                                {{ __('History') }}
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('visi-misi') }}">
                                {{ __('Vision & Mission') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('organization.index') }}">
                                {{ __('Organization Structure') }}
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('partnership') }}">{{ __('Partnership') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('programs') }}">{{ __('Programs') }}</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                    href="#"
                    data-bs-toggle="dropdown">

                        {{ __('Departments') }}

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="#">
                                {{ __('Civil Engineering') }}
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                {{ __('Mechanical Engineering') }}
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                {{ __('Electrical Engineering') }}
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">
                        {{ __('Achievements') }}
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">
                        {{ __('Information') }}
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">
                        {{ __('Accreditation') }}
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#faq">{{ __('Frequently Asked Questions') }}</a>
                </li>

                <li class="nav-item">
                    <button class="landing-theme" id="landing-theme-toggle" type="button" aria-label="Switch to dark mode" title="Switch theme">
                        <i class="bi bi-moon"></i>
                    </button>
                </li>

                @auth
                    <li class="nav-item landing-account">
                        <div class="landing-account-menu dropdown">
                            <button class="landing-account-toggle dropdown-toggle" id="landing-account-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Open account menu">
                                @if(auth()->user()->profile_photo)
                                    <img class="landing-avatar" src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}">
                                @else
                                    <span class="landing-avatar" aria-hidden="true">{{ $landingInitial }}</span>
                                @endif
                                <span>{{ auth()->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="landing-account-toggle">
                                <li><a class="dropdown-item" href="{{ route('account.settings') }}"><i class="bi bi-person-gear"></i> My Account</a></li>
                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Admin Dashboard</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item landing-logout" type="submit"><i class="bi bi-box-arrow-right"></i> Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                    </li>
                @endauth

            </ul>

        </div>

    </div>

</nav>

<!-- ========================= -->
<!-- HERO -->
<!-- ========================= -->

<section class="hero">

    <img
    src="images/hero.jpg"
    class="img-fluid w-100"
    alt="Hero">

</section>

<!-- ========================= -->
<!-- SEARCH -->
<!-- ========================= -->

<section class="search-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="input-group">

                    <input
                    type="text"
                    class="form-control"
                    placeholder="{{ __('Search Here...') }}">

                    <button class="btn btn-primary">

                        <i class="bi bi-search"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- LOGO POLNEP -->
<!-- ========================= -->

<section class="logo-polnep py-5">

    <div class="container text-center">

        <img
        src="images/logo-big.png"
        class="img-fluid"
        width="330">

    </div>

</section>

<section class="landing-spotlight">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <div class="section-tag mb-3">{{ __('Campus Collaboration') }}</div>
                <h2 class="fw-bold display-6 mb-3">{{ __('A stronger future through trusted partnerships') }}</h2>
                <p class="lead text-muted mb-4">{{ __('POLNEP continues to build alliances with industry, public institutions, and professional networks to improve teaching, innovation, and real-world learning outcomes.') }}</p>
                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="card landing-stat h-100">
                            <div class="card-body text-center">
                                <div class="stat-number">{{ $partners->count() }}</div>
                                <p class="mb-0">{{ __('Collaboration areas') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card landing-stat h-100">
                            <div class="card-body text-center">
                                <div class="stat-number">POLNEP</div>
                                <p class="mb-0">{{ __('Official source') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card landing-stat h-100">
                            <div class="card-body text-center">
                                <div class="stat-number">{{ __('Live') }}</div>
                                <p class="mb-0">{{ __('Admin-managed list') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="landing-spotlight-actions">
                    <a href="{{ route('partnership') }}" class="btn btn-primary">{{ __('Explore Partnerships') }} <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                    <a href="{{ route('programs') }}" class="btn btn-outline-primary">{{ __('View Programs') }}</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card landing-spotlight-card">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="Students and collaboration leaders" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-explore">
    <div class="container">
        <div class="text-center mb-4">
            <p class="text-uppercase text-primary fw-semibold mb-2">{{ __('Discover POLNEP') }}</p>
            <h2 class="fw-bold">{{ __('Learn more about our campus') }}</h2>
            <p class="text-muted mb-0">{{ __('Explore our goals, organization, and helpful information.') }}</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <article class="card landing-feature-card shadow-sm">
                    <div class="card-body">
                        <span class="landing-feature-icon"><i class="bi bi-bullseye" aria-hidden="true"></i></span>
                        <h3 class="h5 fw-bold mt-3">{{ __('Vision & Mission') }}</h3>
                        <p class="text-muted">{{ __('Read the campus vision and the mission that guides our work.') }}</p>
                        <a class="btn btn-outline-primary" href="{{ route('visi-misi') }}">{{ __('View Vision & Mission') }}</a>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article class="card landing-feature-card shadow-sm">
                    <div class="card-body">
                        <span class="landing-feature-icon"><i class="bi bi-diagram-3" aria-hidden="true"></i></span>
                        <h3 class="h5 fw-bold mt-3">{{ __('Organization Structure') }}</h3>
                        <p class="text-muted">{{ __('See the organizational chart and the people serving our campus.') }}</p>
                        <a class="btn btn-outline-primary" href="{{ route('organization.index') }}">{{ __('View Structure') }}</a>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article class="card landing-feature-card shadow-sm">
                    <div class="card-body">
                        <span class="landing-feature-icon"><i class="bi bi-patch-question" aria-hidden="true"></i></span>
                        <h3 class="h5 fw-bold mt-3">{{ __('Frequently Asked Questions') }}</h3>
                        <p class="text-muted">{{ __('Find quick answers to common questions about POLNEP.') }}</p>
                        <a class="btn btn-outline-primary" href="#faq">{{ __('Browse FAQs') }}</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="landing-partners">
    <div class="container">
        <div class="text-center mb-4">
            <p class="text-uppercase text-primary fw-semibold mb-2">{{ __('Institutional network') }}</p>
            <h2 class="fw-bold">{{ __('Our academic and industry network') }}</h2>
            <p class="text-muted mb-0">{{ __('Collaboration across government, education, business, industry, and professional networks.') }}</p>
        </div>
        <div class="row g-3">
            @forelse($partners as $partner)
                <div class="col-lg-4 col-md-6">
                    <article class="landing-partner-item landing-partner-{{ $partner->theme }}">
                        <span class="landing-partner-mark">
                            @if($partner->logo)
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }} logo">
                            @else
                                <i class="{{ $partner->icon }}" aria-hidden="true"></i>
                            @endif
                        </span>
                        <div>
                            <h3>{{ __($partner->name) }}</h3>
                            <p>{{ $partner->description ? __($partner->description) : __('POLNEP collaboration partner') }}</p>
                            @if($partner->website)
                                <a class="landing-partner-link" href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer">{{ __('Learn more') }} <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12"><p class="text-center text-muted mb-0">{{ __('Partnership information will be available soon.') }}</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- ========================= -->
<!-- LATEST NEWS -->
<!-- ========================= -->

<section class="latest-news live-news py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">{{ __('Latest News') }}</h2>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('news.index') }}" class="btn btn-outline-primary">{{ __('Manage News') }} <i class="bi bi-arrow-right"></i></a>
                @endif
            @endauth
        </div>
        @if($latestNews->isEmpty())
            <div class="card border-0 shadow-sm news-empty"><p class="text-muted mb-0">{{ __('No published news yet.') }}</p></div>
        @else
            <div class="row g-4">
                @foreach($latestNews as $news)
                    <div class="col-md-6 col-lg-4">
                        <article class="card h-100 border-0 shadow">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}">
                            @else
                                <img src="{{ asset('images/news1.jpg') }}" class="card-img-top" alt="{{ $news->title }}">
                            @endif
                            <div class="card-body">
                                <small class="text-primary">{{ $news->tag ?: 'News' }} · {{ $news->published_at?->format('M d, Y') }}</small>
                                <h5 class="fw-bold mt-2">{{ $news->title }}</h5>
                                <p class="text-muted">{{ Str::limit($news->description, 120) }}</p>
                                @if($news->link)
                                    <a href="{{ $news->link }}" class="btn btn-primary" target="_blank" rel="noopener">Read More</a>
                                @endif
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section class="latest-news legacy-news py-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                Latest News
            </h2>

            <a href="#" class="btn btn-outline-primary">
                View All News
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

        <div class="row g-4">

            <!-- BERITA BESAR -->

            <div class="col-lg-6">

                <div class="card border-0 shadow-lg h-100">

                    <img src="images/news1.jpg"
                    class="card-img-top"
                    alt="">

                    <div class="card-body">

                        <small class="text-primary">
                            July 30, 2026
                        </small>

                        <h4 class="fw-bold mt-2">

                            POLNEP Successfully Holds National Innovation Seminar

                        </h4>

                        <p class="text-muted">

                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.
                            Quisquam, voluptatibus.

                        </p>

                        <a href="#" class="btn btn-primary">

                            Read More

                        </a>

                    </div>

                </div>

            </div>

            <!-- BERITA KECIL -->

            <div class="col-lg-6">

                <div class="row g-4">

                    <div class="col-md-6">

                        <div class="card shadow border-0">

                            <img src="images/news2.jpg"
                            class="card-img-top">

                            <div class="card-body">

                                <small class="text-primary">

                                    July 28, 2026

                                </small>

                                <h6 class="fw-bold">

                                    New Laboratory Building Opens

                                </h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card shadow border-0">

                            <img src="images/news3.jpg"
                            class="card-img-top">

                            <div class="card-body">

                                <small class="text-primary">

                                    July 27, 2026

                                </small>

                                <h6 class="fw-bold">

                                    Students Win Robotics Competition

                                </h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card shadow border-0">

                            <img src="images/news4.jpg"
                            class="card-img-top">

                            <div class="card-body">

                                <small class="text-primary">

                                    July 25, 2026

                                </small>

                                <h6 class="fw-bold">

                                    Scholarship Registration Open

                                </h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card shadow border-0">

                            <img src="images/news5.jpg"
                            class="card-img-top">

                            <div class="card-body">

                                <small class="text-primary">

                                    July 24, 2026

                                </small>

                                <h6 class="fw-bold">

                                    Industrial Visit Program 2026

                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-faq" id="faq">
    <div class="container">
        <div class="text-center mb-4">
            <p class="text-uppercase text-primary fw-semibold mb-2">{{ __('Need help?') }}</p>
            <h2 class="fw-bold">{{ __('Frequently Asked Questions') }}</h2>
            <p class="text-muted mb-0">{{ __('A few quick answers for students and visitors.') }}</p>
        </div>
        <div class="accordion" id="landingFaq">
            @forelse($faqs as $faq)
                <div class="accordion-item border shadow-sm">
                    <h3 class="accordion-header" id="faq-heading-{{ $faq->id }}">
                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="faq-answer-{{ $faq->id }}">
                            {{ __($faq->question) }}
                        </button>
                    </h3>
                    <div id="faq-answer-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="faq-heading-{{ $faq->id }}" data-bs-parent="#landingFaq">
                        <div class="accordion-body">{{ __($faq->answer) }}</div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">{{ __('There are no frequently asked questions yet.') }}</p>
            @endforelse
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- FOOTER -->
<!-- ========================= -->

<footer class="bg-primary text-white pt-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-4">
<div class="footer-social">

    <h4>{{ __('FOLLOW US :') }}</h4>

    <div class="social-icons">

        <a href="https://web.facebook.com/mediapolnep/mentions/?_rdc=1&_rdr#" class="social-btn facebook" aria-label="POLNEP on Facebook" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-facebook"></i>
        </a>

        <a href="https://www.youtube.com/@mediapolnep" class="social-btn youtube" aria-label="POLNEP on YouTube" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-youtube"></i>
        </a>

        <a href="https://www.instagram.com/mediapolnep/?hl=en" class="social-btn instagram" aria-label="POLNEP on Instagram" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-instagram"></i>
        </a>

    </div>

</div>
                <p>

                    Politeknik Negeri Pontianak merupakan
                    perguruan tinggi vokasi yang menghasilkan
                    lulusan profesional dan kompeten.

                </p>

            </div>

            <div class="col-lg-4">

                <h5 class="fw-bold mb-3">

                    {{ __('Quick Links') }}

                </h5>

                <ul class="list-unstyled">

                    <li><a href="{{ route('home') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>

                    <li><a href="{{ route('about') }}" class="text-white text-decoration-none">{{ __('Profile') }}</a></li>

                    <li><a href="{{ route('programs') }}" class="text-white text-decoration-none">{{ __('Programs') }}</a></li>

                    <li><a href="{{ route('partnership') }}" class="text-white text-decoration-none">{{ __('Partnership') }}</a></li>

                    <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">{{ __('Contact') }}</a></li>

                </ul>
            </div>

            <div class="col-lg-4">

                <h5 class="fw-bold mb-3">

                    {{ __('Contact Us') }}

                </h5>

                <p>

                    <i class="bi bi-geo-alt-fill"></i>

                    Jl. Ahmad Yani,
                    Pontianak,
                    Kalimantan Barat

                </p>

                <p>

                    <i class="bi bi-envelope-fill"></i>

                    info@polnep.ac.id

                </p>

                <p>

                    <i class="bi bi-telephone-fill"></i>

                    62+ 056 173 6180

                </p>

                <a href="https://web.facebook.com/mediapolnep/mentions/?_rdc=1&_rdr#" class="text-white me-3" aria-label="POLNEP on Facebook" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook fs-4"></i></a>
                <a href="https://www.instagram.com/mediapolnep/?hl=en" class="text-white me-3" aria-label="POLNEP on Instagram" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram fs-4"></i></a>
                <a href="https://www.youtube.com/@mediapolnep" class="text-white" aria-label="POLNEP on YouTube" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube fs-4"></i></a>
            </div>
        </div>

        <hr>

        <div class="text-center pb-3">

            © 2026 Politeknik Negeri Pontianak.
            All Rights Reserved.

        </div>
    </div>

</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const landingThemeToggle = document.getElementById('landing-theme-toggle');
    const landingThemeIcon = landingThemeToggle.querySelector('i');

    function applyLandingTheme(theme) {
        const darkMode = theme === 'dark';
        document.body.classList.toggle('landing-dark', darkMode);
        landingThemeIcon.className = darkMode ? 'bi bi-sun' : 'bi bi-moon';
        landingThemeToggle.setAttribute('aria-label', darkMode ? 'Switch to light mode' : 'Switch to dark mode');
    }

    applyLandingTheme(localStorage.getItem('polnep-theme') || 'light');
    landingThemeToggle.addEventListener('click', function () {
        const nextTheme = document.body.classList.contains('landing-dark') ? 'light' : 'dark';
        localStorage.setItem('polnep-theme', nextTheme);
        applyLandingTheme(nextTheme);
    });
</script>
</body>
</html> 