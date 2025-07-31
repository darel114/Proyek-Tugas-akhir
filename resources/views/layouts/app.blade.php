<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Karo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.1rem;
            color: #ffffff !important;
        }
        .navbar {
            background-color: rgba(68, 76, 94, 0.8);
            backdrop-filter: blur(10px);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            transition: top 0.4s ease-in-out;
        }
        .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        .nav-link:hover,
        .nav-link.active {
            color: #17a2b8 !important;
        }
        .footer {
            background-color: #212529;
            color: white;
            padding: 60px 0;
            margin-top: auto;
        }
        .footer h5 {
            color: #17a2b8;
            font-weight: 600;
        }
        .footer p,
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        .footer a:hover {
            color: white;
        }
        .footer .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: color 0.3s;
        }
        .footer .social-icons a:hover {
            color: #17a2b8;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="fa-solid fa-earth-asia"></i> Info Karo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                {{-- Public links --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.home') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.about') }}">Tentang Kami</a>
                </li>

                @auth
                    @if (auth()->user()->role === 'user')
                        {{-- User-specific authenticated links --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.message') }}">Pesan</a>
                        </li>
                    @endif
                    {{-- Logout button for all authenticated users --}}
                    <li class="nav-item ms-3">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    {{-- Login button for guests --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="flex-grow-1 container" style="margin-top: 100px; padding-bottom: 60px;">
    @yield('content')
</main>

@yield('scripts')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="mb-3">Info Karo</h5>
                <p>Portal digital untuk mendokumentasikan, melestarikan, dan memperkenalkan warisan budaya Suku Karo kepada masyarakat luas.</p>
                <div class="social-icons mt-4">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li><a href="{{ route('user.home') }}">Kategori</a></li>
                    <li><a href="{{ route('user.about') }}">About Us</a></li>
                    <li><a href="{{ route('user.message') }}">Pesan</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3">Kategori Populer</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Kuliner</a></li>
                    <li><a href="#">Adat Istiadat</a></li>
                    <li><a href="#">Seni Rupa</a></li>
                    <li><a href="#">Cagar Budaya</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="mb-3">Kontak</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Kabanjahe, Kab. Karo, Sumatera Utara</li>
                    <li><i class="fas fa-envelope me-2"></i> dewakaro@gmail.com</li>
                    <li><i class="fas fa-phone me-2"></i> +6288888813</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">© {{ date('Y') }} Info Karo. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const bsToast = new bootstrap.Toast(toastEl);
            bsToast.show();
        }

        // Script untuk mengubah class 'active' pada navbar
        const navLinks = document.querySelectorAll('.nav-link');
        const currentPath = window.location.pathname;

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
        // Jika di halaman dashboard, set Home sebagai aktif
        if (currentPath === '/user/dashboard') {
            document.querySelector('.nav-link[href="/user/dashboard"]').classList.add('active');
        }
    });
</script>
</body>
</html>