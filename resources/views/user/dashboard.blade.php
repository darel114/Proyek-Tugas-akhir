@extends('layouts.app')

@section('content')
<div class="hero-section text-white text-center d-flex align-items-center justify-content-center">
    <div class="container bg-dark bg-opacity-50 p-5 rounded animate__animated animate__fadeInDown">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang<br>Di Info Karo</h1>
        <p class="lead mb-4">Portal Digital yang menyediakan Informasi tentang budaya dan tradisi suku Karo.</p>
        <a href="{{ route('user.home') }}" class="btn btn-lg btn-info text-white rounded-pill px-5 py-2 fw-semibold shadow animate__animated animate__zoomIn">Jelajahi</a>
    </div>
</div>

<div class="container py-5">
    <section class="py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 animate__animated animate__fadeInLeft">
                <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3" alt="Budaya Karo" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6 ps-lg-5 animate__animated animate__fadeInRight">
                <h2 class="mb-4 fw-bold border-bottom pb-2">Apa yang menarik dari budaya Karo?</h2>
                <div class="mb-3">
                    <h5 class="text-info">01. Buku Laklak</h5>
                    <p>Temukan kearifan kuno dalam Buku Laklak, manuskrip tradisional Karo yang berisi catatan pengobatan, mantra, dan penanggalan kuno.</p>
                </div>
                <div class="mb-3">
                    <h5 class="text-info">02. Turi-Turin</h5>
                    <p>Dengarkan kisah-kisah leluhur melalui Turi-Turin, tradisi lisan yang kaya akan cerita rakyat dan ajaran moral.</p>
                </div>
                <div class="mb-3">
                    <h5 class="text-info">03. Rakut Sitelu</h5>
                    <p>Pahami tatanan sosial melalui Rakut Sitelu dan Tutur Siwaluh, sistem kekerabatan yang menjadi pilar kehidupan masyarakat Karo.</p>
                </div>
                <div>
                    <h5 class="text-info">04. Kuliner Karo</h5>
                    <p>Cicipi masakan khas seperti Tasak Telu dan Pagit-pagit yang sarat akan makna dan tradisi.</p>
                </div>
                <a href="{{ route('user.home') }}" class="btn btn-outline-info rounded-pill mt-3 px-4 py-2 fw-semibold">Jelajahi</a>
            </div>
        </div>
    </section>

    <section class="pt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold border-bottom pb-2 d-inline-block animate__animated animate__fadeInUp">Konten Terbaru</h2>
            <p class="text-muted">Baca informasi terbaru yang telah diupdate.</p>
        </div>
        <div class="row" id="konten-list">
            @forelse ($latestContents as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 0.2 }}s;">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <small class="text-muted">{{ $item->subcategory->category->name }} / {{ $item->subcategory->name }}</small>
                            @if($item->slug)
                                <a href="{{ route('user.konten.detail', $item->slug) }}" class="btn btn-outline-info btn-sm mt-auto rounded-pill">Baca lebih lanjut</a>
                            @else
                                <span class="text-muted mt-auto">Slug tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Tidak ada konten terbaru untuk saat ini.</div>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
.hero-section {
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
    url('https://images.unsplash.com/photo-1559213237-9043e275b75a?q=80&w=2070&auto=format&fit=crop') center/cover no-repeat;
    height: 80vh;
    position: relative;
}
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__fadeInUp');
                    entry.target.classList.add('animate__animated');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endsection
