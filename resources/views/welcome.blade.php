<!DOCTYPE html>
<html lang="en">
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

</head>

<body>

<!-- ========================= -->
<!-- TOPBAR -->
<!-- ========================= -->

<div class="topbar">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <a href="#">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="#">
                    <i class="bi bi-instagram"></i>
                </a>

                <a href="#">
                    <i class="bi bi-youtube"></i>
                </a>

            </div>

            <div class="col-md-6 text-end">

                <img src="images/id.png" width="22">

                <img src="images/us.png" width="22">

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
                        HOME
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                    href="#"
                    data-bs-toggle="dropdown">

                        PROFILE

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="#">
                                Sejarah
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                Visi Misi
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                    href="#"
                    data-bs-toggle="dropdown">

                        JURUSAN

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="#">
                                Teknik Sipil
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                Teknik Mesin
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                Teknik Elektro
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">
                        PRESTASI
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">
                        INFORMASI
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">
                        AKREDITASI
                    </a>

                </li>

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
                    placeholder="Search Here...">

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

<!-- ========================= -->
<!-- MENU CARD -->
<!-- ========================= -->

<section class="menu-card">

<div class="container">

<div class="row g-4">

<div class="col-lg-3">

<div class="card h-100 shadow">

<div class="card-body">

<i class="bi bi-file-earmark-text display-5"></i>

<h5 class="mt-3">

SIAKAD Cloud

</h5>

<p>

Academic Information System

</p>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="card h-100 shadow">

<div class="card-body">

<i class="bi bi-globe display-5"></i>

<h5>

Online Application

</h5>

<p>

Online Registration

</p>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="card h-100 shadow">

<div class="card-body">

<i class="bi bi-person-plus display-5"></i>

<h5>

PMB

</h5>

<p>

New Student Admission

</p>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="card h-100 shadow">

<div class="card-body">

<i class="bi bi-database display-5"></i>

<h5>

Repository

</h5>

<p>

Digital Repository

</p>

</div>

</div>

</div>

</div>

</div>

</section>
<!-- ========================= -->
<!-- LATEST NEWS -->
<!-- ========================= -->

<section class="latest-news py-5">

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

<!-- ========================= -->
<!-- FOOTER -->
<!-- ========================= -->

<footer class="bg-primary text-white pt-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-4">
<div class="footer-social">

    <h4>FOLLOW US :</h4>

    <div class="social-icons">

        <a href="#" class="social-btn facebook">
            <i class="bi bi-facebook"></i>
        </a>

        <a href="#" class="social-btn youtube">
            <i class="bi bi-youtube"></i>
        </a>

        <a href="#" class="social-btn instagram">
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

                    Quick Links

                </h5>

                <ul class="list-unstyled">

                    <li><a href="#" class="text-white text-decoration-none">Home</a></li>

                    <li><a href="#" class="text-white text-decoration-none">Profile</a></li>

                    <li><a href="#" class="text-white text-decoration-none">Jurusan</a></li>

                    <li><a href="#" class="text-white text-decoration-none">Prestasi</a></li>

                    <li><a href="#" class="text-white text-decoration-none">Informasi</a></li>

                </ul>
            </div>

            <div class="col-lg-4">

                <h5 class="fw-bold mb-3">

                    Contact Us

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

                <div class="fs-4">

                    <i class="bi bi-facebook me-3"></i>

                    <i class="bi bi-instagram me-3"></i>

                    <i class="bi bi-youtube"></i>

                </div>
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
</body>
</html> 