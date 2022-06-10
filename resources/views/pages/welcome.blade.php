<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> -->

    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="page/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
    href="page/assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet"
    />
    <link
    href="page/assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet"
    />
    <link
    href="page/assets/vendor/boxicons/css/boxicons.min.css"
    rel="stylesheet"
    />
    <link
    href="page/assets/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet"
    />
    <link
    href="page/assets/vendor/swiper/swiper-bundle.min.css"
    rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="page/assets/css/style.css" rel="stylesheet" />

</head>
<body>
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li>
                    <a href="/" class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}"
                    ><i class="bx bx-home"></i> <span>Home</span></a
                    >
                </li>
                <li>
                    <a href="{{ route('about') }}" class="nav-link scrollto {{ Request::is('tentangAplikasi') ? 'active' : '' }}"
                    ><i class="bx bx-book-content"></i>
                    <span>Tentang Aplikasi</span></a
                    >
                </li>
                <li>
                    <a href="{{ route('ukmPolindra') }}" class="nav-link scrollto {{ Request::is('unitkegiatanmahasiswa') ? 'active' : '' }}"
                    ><i class="bx bx-stats"></i> 
                    <span>UKM</span></a
                    >
                </li>
                @if (Route::has('login'))
                @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-link scrollto"
                    ><i class="bx bx-user-check"></i> <span>Dashboard
                    </span></a>
                </li>
                @else
                @if (Route::has('login'))
                <li>
                    <a href="{{ route('login') }}" class="nav-link scrollto"
                    ><i class="bx bx-user"></i> <span>Masuk</span></a
                    >
                </li>
                @endif
                @endauth
                @endif
                <li>
                    <a href="{{ route('lisensiPolindra') }}" class="nav-link scrollto {{ Request::is('Lisensi') ? 'active' : '' }}"
                    ><i class="bx bx-book-reader"></i>
                    <span>Lisensi</span></a
                    >
                </li>
            </ul>
        </nav>
        <!-- .nav-menu -->
    </header>
    <!-- End Header -->
@if(Request::is('/'))
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <h1>
                MANAJEMEN UNIT KEGIATAN MAHASISWA POLITEKNIK NEGERI
                INDRAMAYU
            </h1>
            <p>
                Manajemen
                <span
                class="typed"
                data-typed-items="UKM, Kegiatan, Proposal, Logbook, Laporan"
                ></span>
            </p>
            <div class="social-links">
                <a href="#" class="facebook"
                ><i class="bx bxl-facebook"></i
                    ></a>
                    <a href="#" class="instagram"
                    ><i class="bx bxl-instagram"></i
                        ></a>
                        <a href="#" class="google-plus"
                        ><i class="bx bxl-youtube"></i
                            ></a>
                            <a href="#" class="linkedin"
                            ><i class="bx bxl-tiktok"></i
                                ></a>
                            </div>
                        </div>
    </section>
@else

    <main id="main">
        @yield('content')
    </main>
@endif
                    <!-- End Hero -->
                    <div id="preloader"></div>
                    <a
                    href="#"
                    class="back-to-top d-flex align-items-center justify-content-center"
                    ><i class="bi bi-arrow-up-short"></i
                        ></a>

                        <!-- Vendor JS Files -->
                        <script src="page/assets/vendor/purecounter/purecounter.js"></script>
                        <script src="page/assets/vendor/aos/aos.js"></script>
                        <script src="page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="page/assets/vendor/glightbox/js/glightbox.min.js"></script>
                        <script src="page/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
                        <script src="page/assets/vendor/swiper/swiper-bundle.min.js"></script>
                        <script src="page/assets/vendor/typed.js/typed.min.js"></script>
                        <script src="page/assets/vendor/waypoints/noframework.waypoints.js"></script>
                        <script src="page/assets/vendor/php-email-form/validate.js"></script>

                        <!-- Template Main JS File -->
                        <script src="page/assets/js/main.js"></script>

                    </body>
                    </html>
