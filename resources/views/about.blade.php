<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About POLNEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f5f8fb; color: #1b2a3a; }
        .topbar { background: #0b7ea5; color: white; padding: 10px 0; }
        .language-toggle { display: inline-flex; align-items: center; gap: 5px; margin: 0; }
        .language-toggle-button { display: inline-flex; align-items: center; justify-content: center; padding: 4px; border: 1px solid transparent; border-radius: 5px; background: transparent; opacity: .62; cursor: pointer; }
        .language-toggle-button:hover, .language-toggle-button:focus-visible, .language-toggle-button.active { border-color: rgba(255,255,255,.65); opacity: 1; }
        .language-toggle-button img { display: block; object-fit: cover; }
        .navbar { background: white; box-shadow: 0 3px 12px rgba(0,0,0,.06); }
        .brand img { max-width: 180px; }
        .page-hero { background: linear-gradient(135deg, #0b7ea5, #0e4a73); color: #fff; padding: 90px 0 70px; }
        .page-card { background: #fff; border: 0; border-radius: 20px; box-shadow: 0 18px 36px rgba(15,40,60,.08); }
        .section-title { color: #0e4a73; font-weight: 800; }
        .feature-box { background: #edf6fb; border-radius: 18px; padding: 28px; height: 100%; }
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
                    <p class="text-uppercase fw-bold mb-2 text-light opacity-75">{{ __('About us') }}</p>
                    <h1 class="display-5 fw-bold mb-3">{{ __('Developing skills, technology, and character') }}</h1>
                    <p class="lead mb-0 text-light opacity-75">{{ __('POLNEP is committed to producing professional graduates ready to contribute to society, industry, and the nation through practical learning and innovation.') }}</p>
                </div>
                <div class="col-lg-5">
                    <div class="page-card p-4">
                        <h4 class="section-title mb-3">{{ __('Our commitment') }}</h4>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('Applied learning approach') }}</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('Industry-ready graduates') }}</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('Innovation and community impact') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="feature-box">
                    <i class="bi bi-bullseye fs-2 text-primary"></i>
                    <h4 class="mt-3 section-title">{{ __('Vision') }}</h4>
                    <p class="mb-0">{{ __('To become a leading vocational higher education institution that produces highly competent graduates and contributes to sustainable regional development.') }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-box">
                    <i class="bi bi-diagram-3 fs-2 text-primary"></i>
                    <h4 class="mt-3 section-title">{{ __('Mission') }}</h4>
                    <p class="mb-0">{{ __('Delivering excellent teaching, applied research, community engagement, and international collaboration with strong integrity.') }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-box">
                    <i class="bi bi-people-fill fs-2 text-primary"></i>
                    <h4 class="mt-3 section-title">{{ __('Values') }}</h4>
                    <p class="mb-0">{{ __('Academic excellence, professionalism, innovation, teamwork, and social responsibility guide every student and staff activity.') }}</p>
                </div>
            </div>
        </div>

        <div class="page-card p-4 p-lg-5 mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title mb-3">{{ __('Why students choose POLNEP') }}</h2>
                    <p>{{ __('We combine classroom learning with project-based activities, internships, and industry partnerships so every student gains practical experience and professional confidence.') }}</p>
                    <div class="d-flex flex-column gap-2">
                        <div><i class="bi bi-check2-circle text-success me-2"></i>{{ __('Experienced lecturers and practitioners') }}</div>
                        <div><i class="bi bi-check2-circle text-success me-2"></i>{{ __('Modern learning facilities and labs') }}</div>
                        <div><i class="bi bi-check2-circle text-success me-2"></i>{{ __('Strong alumni and employer network') }}</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80" alt="Campus learning" class="img-fluid rounded-4 w-100" style="height: 360px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">POLNEP</h5>
                    <p class="mb-3 text-light opacity-75">A leading vocational institution focused on practical learning, collaboration, and institutional excellence.</p>
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
                        <li class="mb-2"><a href="{{ route('visi-misi') }}" class="text-decoration-none text-light opacity-75">{{ __('Vision & Mission') }}</a></li>
                        <li class="mb-2"><a href="{{ route('organization.index') }}" class="text-decoration-none text-light opacity-75">{{ __('Organization Structure') }}</a></li>
                        <li class="mb-2"><a href="{{ route('partnership') }}" class="text-decoration-none text-light opacity-75">{{ __('Partnership') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">{{ __('Contact') }}</h5>
                    <p class="mb-2 text-light opacity-75"><i class="bi bi-geo-alt-fill me-2"></i>Jl. Ahmad Yani, Pontianak</p>
                    <p class="mb-2 text-light opacity-75"><i class="bi bi-envelope-fill me-2"></i>info@polnep.ac.id</p>
                    <p class="mb-0 text-light opacity-75"><i class="bi bi-telephone-fill me-2"></i>+62 0561 736180</p>
                </div>
            </div>
            <hr class="border-light opacity-25 my-4">
            <div class="text-center text-light opacity-75">© 2026 POLNEP. All rights reserved.</div>
        </div>
    </footer>
</body>
</html>
