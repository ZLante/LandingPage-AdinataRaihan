<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f5f8fb; color: #1b2a3a; }
        .topbar { background: #0b7ea5; color: white; padding: 10px 0; }
        .navbar { background: white; box-shadow: 0 3px 12px rgba(0,0,0,.06); }
        .brand img { max-width: 180px; }
        .page-hero { background: linear-gradient(135deg, #0d4e72, #0a7ba4); color: #fff; padding: 90px 0 70px; }
        .section-title { color: #0d4e72; font-weight: 800; }
        .info-card { background: #fff; border-radius: 20px; box-shadow: 0 12px 30px rgba(16,44,60,.08); }
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
                <div class="col-lg-6">
                    <p class="text-uppercase fw-bold text-light opacity-75 mb-2">Contact us</p>
                    <h1 class="display-5 fw-bold mb-3">Let’s build stronger collaborations together</h1>
                    <p class="lead mb-0 text-light opacity-75">Whether you are a student, partner, employer, or institution, we are ready to respond and support your inquiry.</p>
                </div>
                <div class="col-lg-6">
                    <div class="info-card p-4">
                        <h4 class="section-title mb-3">Get in touch</h4>
                        <p class="mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Jl. Ahmad Yani, Pontianak, Kalimantan Barat</p>
                        <p class="mb-2"><i class="bi bi-envelope-fill text-primary me-2"></i>info@polnep.ac.id</p>
                        <p class="mb-2"><i class="bi bi-telephone-fill text-primary me-2"></i>+62 0561 736180</p>
                        <p class="mb-0"><i class="bi bi-clock-fill text-primary me-2"></i>Monday – Friday, 08:00 – 16:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-card p-4 p-lg-5">
                    <h2 class="section-title mb-3">Send an inquiry</h2>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Full name</label>
                            <input type="text" class="form-control" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="5" placeholder="Tell us how we can help"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card p-4 p-lg-5">
                    <h2 class="section-title mb-3">Campus information</h2>
                    <div class="d-flex flex-column gap-3">
                        <div><i class="bi bi-building text-primary me-2"></i>Vocational higher education institution</div>
                        <div><i class="bi bi-people text-primary me-2"></i>Community, student, and industry engagement</div>
                        <div><i class="bi bi-shield-check text-primary me-2"></i>Trusted services and institutional support</div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="Campus contact" class="img-fluid rounded-4 mt-4 w-100" style="height: 260px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">POLNEP</h5>
                    <p class="mb-3 text-light opacity-75">We welcome collaboration and communication from partners, students, and the wider community.</p>
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
                        <li class="mb-2"><a href="{{ route('programs') }}" class="text-decoration-none text-light opacity-75">Programs</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Contact</h5>
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
