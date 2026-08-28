<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Documents - POLNEP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --blue: #069ed3;
            --navy: #11176d;
            --silver: #d1d1d1;
            --green: #18c54e;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            color: #111;
            font-family: Arial, Helvetica, sans-serif;
            background: #fff;
        }

        .dashboard-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-strip {
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px;
            color: #003b69;
            background: var(--blue);
            font-size: 12px;
        }

        .top-strip a { color: #003b69; margin-right: 8px; }
        .language-switcher { display: flex; height: 18px; gap: 3px; }
        .language-switcher img { width: 26px; height: 17px; object-fit: cover; }

        .main-nav {
            min-height: 55px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4px 18px;
            background: #b9b9b9;
        }

        .brand img { width: 145px; display: block; }
        .nav-links { display: flex; align-items: center; gap: 11px; }
        .nav-links a, .logout-button {
            border: 0;
            padding: 3px 0;
            color: #050505;
            background: transparent;
            font-size: 9px;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
        }

        .document-content {
            flex: 1;
            width: min(900px, calc(100% - 32px));
            margin: 16px auto 54px;
        }

        .search-box {
            display: flex;
            width: 148px;
            height: 23px;
            margin: 0 auto 8px;
        }

        .search-box input {
            width: 100%;
            border: 1px solid #777;
            border-radius: 2px;
            padding: 4px 7px;
            font-size: 8px;
        }

        .search-box button {
            width: 28px;
            border: 0;
            color: white;
            background: var(--blue);
            cursor: pointer;
        }

        .page-title {
            margin: 0 0 20px;
            color: var(--navy);
            text-align: center;
            font-size: 19px;
            font-weight: 700;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 28px 54px;
            max-width: 720px;
            margin: 0 auto;
        }

        .document-item { min-width: 0; }

        .document-card {
            height: 165px;
            display: flex;
            align-items: center;
            gap: 28px;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 8px;
            background: #d7d7d9;
            box-shadow: 0 2px 3px rgba(0, 0, 0, .25);
        }

        .document-card img {
            width: 145px;
            height: 124px;
            flex: 0 0 auto;
            border-radius: 7px;
            object-fit: cover;
        }

        .document-type {
            min-width: 42px;
            border: 0;
            border-radius: 12px;
            padding: 4px 9px;
            color: white;
            background: var(--blue);
            font-size: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .download-button {
            display: inline-block;
            margin-top: 8px;
            padding: 5px 8px;
            border-radius: 3px;
            color: #000;
            background: var(--green);
            font-size: 8px;
            font-weight: 700;
            text-decoration: none;
        }

        .dashboard-footer {
            display: flex;
            justify-content: space-between;
            padding: 14px 30px 10px;
            border: 2px solid var(--blue);
            background: #c9c9c9;
            font-size: 8px;
        }

        .dashboard-footer h2 {
            margin: 0 0 8px;
            font-size: 8px;
            text-transform: uppercase;
        }

        .contact-line { display: flex; align-items: center; gap: 7px; margin: 5px 0; }
        .contact-line i { color: #ef4d86; font-size: 14px; }
        .footer-social { text-align: right; }
        .social-links { display: flex; gap: 9px; justify-content: flex-end; }
        .social-links a {
            width: 23px;
            height: 23px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: #111;
            text-decoration: none;
        }
        .social-links a:nth-child(1) { background: #242bd0; }
        .social-links a:nth-child(2) { background: #e22d4d; }
        .social-links a:nth-child(3) { background: #dc18dc; }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        @media (max-width: 700px) {
            .main-nav { align-items: flex-start; flex-direction: column; gap: 8px; }
            .nav-links { flex-wrap: wrap; gap: 8px; }
            .document-grid { grid-template-columns: 1fr; max-width: 360px; }
            .document-card { height: 145px; gap: 18px; }
            .document-card img { width: 125px; height: 110px; }
            .dashboard-footer { gap: 20px; padding: 14px; }
        }
    </style>
</head>
<body>
    <div class="dashboard-page">
        <header>
            <div class="top-strip">
                <div>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
                <div class="language-switcher">
                    <img src="{{ asset('images/id.png') }}" alt="Indonesian">
                    <img src="{{ asset('images/us.png') }}" alt="English">
                </div>
            </div>
            <nav class="main-nav" aria-label="Main navigation">
                <a class="brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="POLNEP">
                </a>
                <div class="nav-links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="#">Profile</a>
                    <a href="#">Jurusan</a>
                    <a href="#">Prestasi</a>
                    <a href="#">Informasi</a>
                    <a href="#">Akreditasi</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="logout-button" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
        </header>

        <main class="document-content">
            <form class="search-box" role="search">
                <input type="search" placeholder="Search Archives..." aria-label="Search archives">
                <button type="submit" aria-label="Search"><i class="bi bi-search"></i></button>
            </form>

            <h1 class="page-title">Academic Document</h1>

            <section class="document-grid" aria-label="Academic documents">
                @foreach (['Academic Calendar', 'Academic Guide', 'Student Handbook', 'Course Catalogue'] as $document)
                    <article class="document-item">
                        <div class="document-card">
                            <img src="{{ asset('images/hero.jpg') }}" alt="POLNEP campus">
                            <button class="document-type" type="button">PDF</button>
                        </div>
                        <a class="download-button" href="#" download>Download</a>
                        <span class="visually-hidden">{{ $document }}</span>
                    </article>
                @endforeach
            </section>
        </main>

        <footer class="dashboard-footer">
            <div>
                <h2>Contact Information</h2>
                <div class="contact-line"><i class="bi bi-whatsapp"></i><span>+62 896 8000 0000</span></div>
                <div class="contact-line"><i class="bi bi-geo-alt"></i><span>Jl. Ahmad Yani, Pontianak, Kalimantan Barat<br>Indonesia, Kode Pos 78124</span></div>
            </div>
            <div class="footer-social">
                <h2>Follow Us</h2>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - POLNEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">POLNEP</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </nav>

    <main class="container py-5">
        <div class="bg-white rounded shadow-sm p-4">
            <h1 class="h3">Welcome, {{ auth()->user()->name }}</h1>
            <p class="text-muted mb-0">You are successfully logged in.</p>
        </div>
    </main>
</body>
</html>
