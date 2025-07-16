@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                    url('https://images.unsplash.com/photo-1559213237-9043e275b75a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
        background-size: cover;
        height: 80vh;
        display: flex;
        align-items: center;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
    }

    .hero-section p {
        font-size: 1.25rem;
        max-width: 600px;
    }

    .stats-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .stat-item {
        padding: 30px 15px;
        border-radius: 12px;
        background-color: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-item .number {
        font-size: 3rem;
        font-weight: 700;
        color: #138496;
        margin-bottom: 10px;
    }

    .stat-item .text {
        font-size: 1.1rem;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .stat-item .number {
            font-size: 2.5rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section animate__animated animate__fadeInDown">
    <div class="container">
        <h1 class="display-4">Mengenal Lebih <br>Tentang Kami</h1>
        <p class="lead">Portal Digital yang menyediakan Informasi tentang budaya dan tradisi suku Karo.</p>
    </div>
</div>

<!-- Tujuan Website -->
<main class="container my-5 py-5 animate__animated animate__fadeInDown">
    <section>
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <h2 class="section-title d-inline-block">Mengetahui Tujuan dari Website ini</h2>
                <p class="lead text-muted">
                    Website Info Karo dibuat sebagai platform digital untuk mendokumentasikan, melestarikan, dan
                    memperkenalkan warisan budaya Suku Karo kepada masyarakat luas. Situs ini menyajikan berbagai
                    informasi mengenai Manuskrip, Tradisi Lisan, Adat Istiadat, Ilmu Pengetahuan Tradisional,
                    Teknologi Tradisional, Seni, Permainan Rakyat, Olahraga Tradisional, dan Cagar Budaya yang
                    tersebar di seluruh Nusantara.
                </p>
            </div>
        </div>
    </section>
</main>

<!-- Statistik -->
<section class="stats-section animate__animated animate__fadeInDown">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="stat-item text-center">
                    <div class="number">6</div>
                    <div class="text">Happy Clients</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="stat-item text-center">
                    <div class="number">11</div>
                    <div class="text">Completed Projects</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="stat-item text-center">
                    <div class="number">7M</div>
                    <div class="text">Transactions</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item text-center">
                    <div class="number">6000+</div>
                    <div class="text">Customers</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kelebihan Website -->
<section class="container my-5 py-5 animate__animated animate__fadeInDown">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h2 class="section-title">Apa Kelebihan Website Ini?</h2>
            <p class="text-muted mb-5">
                Selain sebagai pusat informasi, kami juga membuka ruang interaksi bagi
                pengguna untuk berbagi pengalaman, berdiskusi, serta memberikan masukan dalam pengembangan platform
                ini.
            </p>
            <a href="#" class="btn btn-outline-dark btn-lg">Contact Us</a>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
            <div class="feature-item d-flex mb-4">
                <div class="icon me-3"><i class="fas fa-comments fa-2x text-info"></i></div>
                <div>
                    <h5>Forum Diskusi</h5>
                    <p>Berinteraksi dan berbagi pengetahuan dengan pengguna lain.</p>
                </div>
            </div>
            <div class="feature-item d-flex mb-4">
                <div class="icon me-3"><i class="fas fa-mobile-alt fa-2x text-info"></i></div>
                <div>
                    <h5>Dapat diakses dimana saja</h5>
                    <p>Desain responsif memastikan pengalaman terbaik di semua perangkat.</p>
                </div>
            </div>
            <div class="feature-item d-flex">
                <div class="icon me-3"><i class="fas fa-sync-alt fa-2x text-info"></i></div>
                <div>
                    <h5>Up to Date</h5>
                    <p>Informasi selalu diperbarui dengan konten dan berita terbaru.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection
