<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partnerships</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f8fc; color: #1e2d3d; }
        .topbar { background: #0b7ea5; color: white; padding: 10px 0; }
        .language-toggle { display: inline-flex; align-items: center; gap: 5px; margin: 0; }
        .language-toggle-button { display: inline-flex; align-items: center; justify-content: center; padding: 4px; border: 1px solid transparent; border-radius: 5px; background: transparent; opacity: .62; cursor: pointer; }
        .language-toggle-button:hover, .language-toggle-button:focus-visible, .language-toggle-button.active { border-color: rgba(255,255,255,.65); opacity: 1; }
        .language-toggle-button img { display: block; object-fit: cover; }
        .navbar { background: white; box-shadow: 0 3px 12px rgba(0,0,0,.06); }
        .brand img { max-width: 180px; }
        .page-hero { background: linear-gradient(135deg, #0c4e7a, #0f90b5); color: #fff; padding: 90px 0 70px; }
        .page-card { background: #fff; border-radius: 22px; box-shadow: 0 12px 30px rgba(16,44,60,.08); }
        .section-title { color: #0c4e7a; font-weight: 800; }
        .pill { background: rgba(12,78,122, .08); color: #0c4e7a; border-radius: 999px; display: inline-block; padding: 8px 16px; font-size: .8rem; font-weight: 700; }
        .partner-logo { width: 58px; height: 58px; display: grid; place-items: center; border-radius: 16px; color: #0b76a5; background: #e7f4fb; font-size: 1.7rem; }
        .partner-logo img { width: 100%; height: 100%; object-fit: contain; border-radius: inherit; }
        .partner-card { height: 100%; border: 0; border-radius: 18px; box-shadow: 0 10px 26px rgba(16,44,60,.07); }
        footer { background: #0b213f; color: #e9f2ff; padding: 48px 0 20px; }
        .social-btn { width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; margin-right: 10px; background: rgba(255,255,255,.12); color: #fff; }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <span class="me-3"><i class="bi bi-facebook"></i></span>
                <span class="me-3"><i class="bi bi-instagram"></i></span>
                <span><i class="bi bi-youtube"></i></span>
            </div>
            <div>
                @include('components.language-toggle')
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="brand" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="POLNEP"></a>
            <div class="ms-auto d-flex gap-3 align-items-center">
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('home') }}">{{ __('Home') }}</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('about') }}">{{ __('About') }}</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('partnership') }}">{{ __('Partnership') }}</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('programs') }}">{{ __('Programs') }}</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('contact') }}">{{ __('Contact') }}</a>
            </div>
        </div>
    </nav>

    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="pill">{{ __('Strategic collaboration') }}</span>
                    <h1 class="display-5 fw-bold mt-3 mb-3">{{ __('Partnerships that connect campus to industry and society') }}</h1>
                    <p class="lead mb-0 text-light opacity-75">{{ __('We welcome cooperation with government agencies, employers, communities, and educational institutions to strengthen innovation and graduate employability.') }}</p>
                </div>
                <div class="col-lg-5">
                    <div class="page-card p-4">
                        <h4 class="section-title mb-3">{{ __('Collaboration focus') }}</h4>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('Internship and field practice') }}</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('Research and community projects') }}</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('Training and capacity building') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row g-4 mb-5">
            @forelse($partners as $partner)
                <div class="col-lg-4 col-md-6">
                    <article class="card partner-card">
                        <div class="card-body p-4">
                            <span class="partner-logo">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }} logo">
                                @else
                                    <i class="{{ $partner->icon }}" aria-hidden="true"></i>
                                @endif
                            </span>
                            <h2 class="h5 section-title mt-3">{{ $partner->name }}</h2>
                            <p>{{ $partner->description ? __($partner->description) : __('POLNEP collaboration partner') }}</p>
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer">{{ __('Visit collaboration page') }} <i class="bi bi-arrow-up-right"></i></a>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12"><p class="text-center text-muted">{{ __('Collaboration information will be available soon.') }}</p></div>
            @endforelse
        </div>

        <div class="page-card p-4 p-lg-5 mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title mb-3">{{ __('Partnership advantages') }}</h2>
                    <p>{{ __('Our collaboration model is designed to deliver measurable value for both the institution and our partners.') }}</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-arrow-right-circle-fill text-primary me-2"></i>{{ __('Access to skilled student talent and faculty expertise') }}</li>
                        <li class="mb-2"><i class="bi bi-arrow-right-circle-fill text-primary me-2"></i>{{ __('Joint learning and applied research opportunities') }}</li>
                        <li class="mb-2"><i class="bi bi-arrow-right-circle-fill text-primary me-2"></i>{{ __('Stronger community impact and innovation ecosystem') }}</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80" alt="Partnership meeting" class="img-fluid rounded-4 w-100" style="height: 340px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">POLNEP</h5>
                    <p class="mb-3 text-light opacity-75">{{ __('Building synergies for innovation, skills development, and sustainable growth.') }}</p>
                    <div>
                        <a class="social-btn" href="https://web.facebook.com/mediapolnep/mentions/?_rdc=1&_rdr#" aria-label="POLNEP on Facebook" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        <a class="social-btn" href="https://www.instagram.com/mediapolnep/?hl=en" aria-label="POLNEP on Instagram" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        <a class="social-btn" href="https://www.youtube.com/@mediapolnep" aria-label="POLNEP on YouTube" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">{{ __('Quick Links') }}</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none text-light opacity-75">{{ __('Home') }}</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-decoration-none text-light opacity-75">{{ __('About') }}</a></li>
                        <li class="mb-2"><a href="{{ route('programs') }}" class="text-decoration-none text-light opacity-75">{{ __('Programs') }}</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-decoration-none text-light opacity-75">{{ __('Contact') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">{{ __('Contact') }}</h5>
                    <p class="mb-2 text-light opacity-75"><i class="bi bi-geo-alt-fill me-2"></i>Jl. Ahmad Yani, Pontianak</p>
                    <p class="mb-2 text-light opacity-75"><i class="bi bi-envelope-fill me-2"></i>partnership@polnep.ac.id</p>
                    <p class="mb-0 text-light opacity-75"><i class="bi bi-telephone-fill me-2"></i>+62 0561 736180</p>
                </div>
            </div>
            <hr class="border-light opacity-25 my-4">
            <div class="text-center text-light opacity-75">© 2026 POLNEP. All rights reserved.</div>
        </div>
    </footer>
</body>
</html>
