<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi - POLNEP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cyan: #1aa8d0; --blue: #139fe6; --yellow: #e4be25; --ink: #111; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; color: var(--ink); font-family: Arial, sans-serif; background: #fff; }
        .visi-page { min-height: 100vh; display: grid; grid-template-columns: 238px 1fr; grid-template-rows: 31px 120px 1fr 190px; }
        .topbar { grid-column: 1 / -1; display: flex; justify-content: flex-end; align-items: center; padding: 0 11px; background: var(--blue); }
        .flags { display: flex; gap: 3px; }
        .flags img { width: 23px; height: 15px; object-fit: cover; }
        .hero { grid-column: 1 / -1; position: relative; display: grid; place-items: center; overflow: hidden; color: white; background: #354b42; }
        .hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .5)), url('{{ asset('images/hero.jpg') }}') center 43% / cover; }
        .hero-content { position: relative; text-align: center; }
        .hero h1 { margin: 0 0 12px; color: var(--yellow); font-size: 36px; letter-spacing: 1px; }
        .breadcrumb { display: flex; justify-content: center; gap: 12px; margin: 0; font-size: 10px; text-transform: uppercase; }
        .breadcrumb a { color: white; text-decoration: none; }
        .breadcrumb .current { color: var(--yellow); }
        .content { grid-column: 1 / -1; position: relative; padding: 40px 42px 50px; background: #fff; }
        .content::before { content: ''; position: absolute; inset: 0; opacity: .22; background: radial-gradient(ellipse at 18% 15%, transparent 0 14%, #d2d2d2 15% 17%, transparent 18%), radial-gradient(ellipse at 76% 48%, transparent 0 20%, #d8d8d8 21% 24%, transparent 25%), linear-gradient(122deg, transparent 0 35%, #d8d8d8 36% 43%, transparent 44%); }
        .content-inner { position: relative; max-width: 900px; }
        .edit-link { display: inline-block; margin-bottom: 18px; padding: 7px 12px; border-radius: 4px; color: white; background: #139fe6; font-size: 12px; text-decoration: none; }
        .content h2 { margin: 0 0 8px; font-size: 22px; text-decoration: underline; text-decoration-color: var(--blue); text-decoration-thickness: 3px; text-underline-offset: 3px; }
        .content p, .content li { max-width: 850px; font-size: 21px; font-weight: 700; line-height: 1.55; }
        .content p { margin: 0 0 5px; }
        .content ol { margin: 0 0 0 34px; padding-left: 0; }
        .content li { padding-left: 5px; }
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
            .visi-page { grid-template-columns: 1fr; grid-template-rows: 31px 150px auto auto auto; }
            .hero h1 { font-size: 29px; }
            .content { padding: 30px 20px 40px; }
            .content p, .content li { font-size: 17px; }
            .footer-about, .footer-contact { grid-column: 1; }
        }
    </style>
</head>
<body>
    <div class="visi-page">
        <header class="topbar">
            <div class="flags"><img src="{{ asset('images/us.png') }}" alt="English"><img src="{{ asset('images/id.png') }}" alt="Indonesian"></div>
        </header>
        <section class="hero">
            <div class="hero-content">
                <h1>VISI MISI</h1>
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a><span>&gt;</span><a href="{{ url('/') }}#profile">Profile</a><span>&gt;</span><span class="current">Visi Misi</span>
                </nav>
            </div>
        </section>
        <main class="content">
            <div class="content-inner">
                @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a class="edit-link" href="{{ route('admin.visi-misi.edit') }}"><i class="bi bi-pencil"></i> Edit Visi &amp; Misi</a>
                    @endif
                @endauth
                <h2>VISI</h2>
                <p>{{ $content->visi }}</p>
                <h2>MISI</h2>
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
            <strong>FOLLOW US :</strong>
            <div class="socials"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-youtube"></i></a><a href="#"><i class="bi bi-instagram"></i></a></div>
        </section>
        <section class="footer-contact">
            <h3>CONTACT &amp; LOCATION :</h3>
            <p><i class="bi bi-geo-alt-fill"></i> &nbsp; Jl. Jenderal Ahmad Yani, Banjar Laut, Pontianak Tenggara, Kota Pontianak, Kalimantan Barat 78124</p>
            <p><i class="bi bi-telephone-fill"></i> &nbsp; XXX-XXX-XXXX</p>
            <p><i class="bi bi-envelope-fill"></i> &nbsp; kampus@polnep.ac.id</p>
        </section>
    </div>
</body>
</html>
