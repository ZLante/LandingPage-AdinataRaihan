<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f5f8fb; color: #1b2a3a; }
        .topbar { background: #0b7ea5; color: white; padding: 10px 0; }
        .navbar { background: white; box-shadow: 0 3px 12px rgba(0,0,0,.06); }
        .brand img { max-width: 180px; }
        .page-hero { background: linear-gradient(135deg, #0f6d88, #1d8f9d); color: #fff; padding: 90px 0 70px; }
        .highlight-card { background: #fff; border-radius: 22px; box-shadow: 0 12px 30px rgba(16,44,60,.08); }
        .section-title { color: #0b4d6d; font-weight: 800; }
        .program-box { background: linear-gradient(180deg, #f8fcff 0%, #edf8ff 100%); border-radius: 18px; padding: 28px; height: 100%; }
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
                <img src="{{ asset('images/id.png') }}" width="22" class="me-2" alt="ID">
                <img src="{{ asset('images/us.png') }}" width="22" alt="US">
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="brand" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="POLNEP"></a>
            <div class="ms-auto d-flex gap-3 align-items-center">
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('home') }}">Home</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('about') }}">About</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('partnership') }}">Partnership</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('programs') }}">Programs</a>
                <a class="text-decoration-none text-dark fw-semibold" href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
    </nav>

    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <p class="text-uppercase fw-bold text-light opacity-75 mb-2">Academic programs</p>
                    <h1 class="display-5 fw-bold mb-3">Practical, focused, and career-oriented study tracks</h1>
                    <p class="lead mb-0 text-light opacity-75">Our academic strategy blends technical mastery, applied projects, and industry exposure so students graduate with confidence and relevance.</p>
                </div>
                <div class="col-lg-5">
                    <div class="highlight-card p-4">
                        <h4 class="section-title mb-3">Program highlights</h4>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Competence-based curriculum</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Project and internship experience</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Professional mentoring support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="program-box">
                    <i class="bi bi-tools fs-2 text-primary"></i>
                    <h4 class="mt-3 section-title">Engineering</h4>
                    <p class="mb-0">Hands-on learning in civil, mechanical, and electrical technology with applied laboratory work.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="program-box">
                    <i class="bi bi-laptop fs-2 text-primary"></i>
                    <h4 class="mt-3 section-title">Information Technology</h4>
                    <p class="mb-0">Front-end, back-end, network, and digital system skills built around modern project-based tasks.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="program-box">
                    <i class="bi bi-lightning-charge fs-2 text-primary"></i>
                    <h4 class="mt-3 section-title">Innovation</h4>
                    <p class="mb-0">Technology application and startup-oriented initiatives that connect ideas to real-world impact.</p>
                </div>
            </div>
        </div>

        <div class="highlight-card p-4 p-lg-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title mb-3">Program learning experience</h2>
                    <p>Students gain more than classroom theory through industry visits, practical labs, and collaborative projects that mirror workplace expectations.</p>
                    <div class="d-flex flex-column gap-2">
                        <div><i class="bi bi-check2-circle text-success me-2"></i>Industry standard equipment and labs</div>
                        <div><i class="bi bi-check2-circle text-success me-2"></i>Career coaching and mentoring</div>
                        <div><i class="bi bi-check2-circle text-success me-2"></i>Project-based and team-based learning</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="Program learning" class="img-fluid rounded-4 w-100" style="height: 340px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">POLNEP</h5>
                    <p class="mb-3 text-light opacity-75">Empowering students with skills, confidence, and practical readiness.</p>
                    <div>
                        <a class="social-btn" href="https://web.facebook.com/mediapolnep/mentions/?_rdc=1&_rdr#" aria-label="POLNEP on Facebook" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        <a class="social-btn" href="https://www.instagram.com/mediapolnep/?hl=en" aria-label="POLNEP on Instagram" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        <a class="social-btn" href="https://www.youtube.com/@mediapolnep" aria-label="POLNEP on YouTube" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Quick links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none text-light opacity-75">Home</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-decoration-none text-light opacity-75">About</a></li>
                        <li class="mb-2"><a href="{{ route('partnership') }}" class="text-decoration-none text-light opacity-75">Partnership</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-decoration-none text-light opacity-75">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <p class="mb-2 text-light opacity-75"><i class="bi bi-geo-alt-fill me-2"></i>Jl. Ahmad Yani, Pontianak</p>
                    <p class="mb-2 text-light opacity-75"><i class="bi bi-envelope-fill me-2"></i>programs@polnep.ac.id</p>
                    <p class="mb-0 text-light opacity-75"><i class="bi bi-telephone-fill me-2"></i>+62 0561 736180</p>
                </div>
            </div>
            <hr class="border-light opacity-25 my-4">
            <div class="text-center text-light opacity-75">© 2026 POLNEP. All rights reserved.</div>
        </div>
    </footer>
</body>
</html>
