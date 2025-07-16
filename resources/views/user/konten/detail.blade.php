{{--
File ini berfungsi sebagai template untuk menampilkan halaman detail dari sebuah konten.
Lokasi: resources/views/user/konten/detail.blade.php
--}}

@extends('layouts.app')

@section('content')
<div class="container my-5 py-5">
    <div class="row align-items-center">
        {{-- Kolom untuk Gambar Konten --}}
        <div class="col-lg-6 mb-4 mb-lg-0 animate__animated animate__fadeInLeft">
            @if($content->image_path && Storage::disk('public')->exists($content->image_path))
                {{-- Menampilkan gambar jika ada --}}
                <img src="{{ asset('storage/' . $content->image_path) }}" class="img-fluid rounded shadow-lg" alt="{{ $content->title }}">
            @else
                {{-- Gambar placeholder jika tidak ada gambar --}}
                <img src="https://placehold.co/800x600/e2e8f0/666?text=Gambar+Tidak+Tersedia" class="img-fluid rounded shadow-lg" alt="Gambar tidak tersedia">
            @endif
        </div>

        {{-- Kolom untuk Teks Deskripsi --}}
        <div class="col-lg-6 ps-lg-5 animate__animated animate__fadeInRight">
            {{-- Menampilkan Kategori dan Subkategori --}}
            <p class="text-muted mb-2">
                <a href="{{ route('user.kategori.show', $content->subcategory->category->slug) }}" class="text-info text-decoration-none">{{ $content->subcategory->category->name }}</a>
                / {{ $content->subcategory->name }}
            </p>
            
            {{-- Menampilkan Judul Konten --}}
            <h1 class="fw-bold mb-4 border-bottom pb-3">{{ $content->title }}</h1>

            {{-- Menampilkan Deskripsi Lengkap --}}
            {{-- nl2br() digunakan untuk mengubah baris baru (enter) menjadi tag <br> agar paragraf tampil dengan benar --}}
            <div class="lh-lg content-description">
                {!! nl2br(e($content->description)) !!}
            </div>

            {{-- Tombol untuk kembali ke halaman sebelumnya --}}
            <a href="{{ url()->previous() }}" class="btn btn-outline-info rounded-pill mt-5 px-4">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

{{-- Sedikit style tambahan untuk deskripsi agar lebih rapi --}}
<style>
    .content-description {
        text-align: justify;
    }
</style>
@endsection
