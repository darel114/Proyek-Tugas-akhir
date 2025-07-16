@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5 animate__animated animate__fadeInDown">
        <h2 class="fw-bold section-title">Kategori</h2>
        <p class="text-muted">Pilih kategori untuk melihat konten yang tersedia</p>
    </div>

    <div class="row">
        @foreach($categories as $cat)
            @php
                $imagePath = null;
                foreach ($cat->subCategories as $subCat) {
                    if ($subCat->contents->isNotEmpty()) {
                        $imagePath = $subCat->contents->first()->image_path;
                        break;
                    }
                }
            @endphp

            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('user.kategori', ['slug' => $cat->slug]) }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm overflow-hidden hover-zoom rounded animate__animated animate-on-scroll">
                        @if($imagePath)
                            <img src="{{ asset('storage/' . $imagePath) }}" class="card-img-top img-fluid" alt="{{ $cat->name }}">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Kategori+{{ $cat->name }}" class="card-img-top img-fluid" alt="{{ $cat->name }}">
                        @endif
                        <div class="card-img-overlay d-flex align-items-end p-3" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                            <h5 class="text-white fw-bold mb-0">{{ $cat->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<style>
    .hover-zoom img {
        transition: transform 0.5s ease;
    }

    .hover-zoom:hover img {
        transform: scale(1.05);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 0;
        width: 70px;
        height: 4px;
        background-color: #17a2b8;
    }

    .animate-on-scroll {
        opacity: 0;
    }

    .animate-on-scroll.animate__fadeInDown {
        opacity: 1;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInDown');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
});
</script>
@endsection
