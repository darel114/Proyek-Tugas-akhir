@extends('layouts.app')

@section('content')
<style>
    .custom-breadcrumb {
        background-color: #f8f9fa;
        padding: 12px 20px;
        border-radius: 8px;
        display: inline-block;
    }

    .custom-breadcrumb .breadcrumb-item a {
        text-decoration: none;
        color: #0d6efd;
        font-weight: 500;
    }

    .custom-breadcrumb .breadcrumb-item a:hover {
        color: #0a58ca;
    }

    .custom-breadcrumb .breadcrumb-item.active {
        color: #6c757d;
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: none;
        }
    }
</style>

<div class="container py-5 fade-in">
    <div class="text-center mb-4">
        <h1 class="fw-bold">{{ $konten->title }}</h1>
        <nav aria-label="breadcrumb" class="custom-breadcrumb mt-3">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.kategori', $konten->subcategory->category->slug ?? '#') }}">
                        {{ $konten->subcategory->category->name ?? 'Kategori' }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $konten->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm p-4 fade-in" style="animation-delay: 0.2s;">
        <div class="text-center">
            @if($konten->image_path)
                <img src="{{ asset('storage/' . $konten->image_path) }}" class="img-fluid mb-4"
                     style="max-width: 600px; border-radius: 12px;" alt="Gambar">
            @endif
        </div>

        <div class="text-center mb-2">
            <span class="text-muted">
                Kategori: {{ $konten->subcategory->category->name ?? '-' }} /
                {{ $konten->subcategory->name ?? '-' }}
            </span>
        </div>

        <div class="content-body mx-auto mt-3" style="max-width: 800px; text-align: justify;">
            {!! nl2br(e($konten->description)) !!}
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user.home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <section class="pt-5 mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold border-bottom pb-2 d-inline-block">Konten Terbaru</h2>
            <p class="text-muted">Baca informasi terbaru yang telah diupdate.</p>
        </div>
        <div class="row">
            @forelse ($latestContents as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <small class="text-muted">{{ $item->subcategory->category->name }} / {{ $item->subcategory->name }}</small>
                            <a href="{{ route('user.konten.detail', $item->slug) }}" class="btn btn-outline-info btn-sm mt-auto rounded-pill">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Tidak ada konten lain untuk ditampilkan.</div>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection