@extends('layouts.app')

@section('content')
<div class="container py-5 animate__animated animate__fadeInDown">
    <div class="text-center mb-5">
        <h2 class="fw-bold">{{ $category->name }}</h2>
        <p class="text-muted">Subkategori dan konten dalam kategori ini</p>
    </div>

    @forelse ($category->subcategories as $subCat)
        <h4 class="mb-3 animate__animated animate__fadeInDown">{{ $subCat->name }}</h4>
        <div class="row mb-5">
            @forelse ($subCat->contents as $content)
                <div class="col-md-4 mb-4 animate__animated animate__fadeInDown">
                    <div class="card h-100 shadow-sm">
                        @if($content->image_path)
                            <img src="{{ asset('storage/' . $content->image_path) }}" class="card-img-top" alt="{{ $content->title }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($content->description), 100) }}</p>
                            @if($content->slug)
                                <a href="{{ route('user.konten.detail', ['slug' => $content->slug]) }}" class="btn btn-outline-info mt-auto">Lihat Detail</a>
                            @else
                                <button class="btn btn-outline-secondary mt-auto" disabled>Detail Tidak Tersedia</button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 animate__animated animate__fadeInDown">
                    <p class="text-muted">Tidak ada konten di subkategori ini.</p>
                </div>
            @endforelse
        </div>
    @empty
        <div class="alert alert-info text-center animate__animated animate__fadeInDown">
            Tidak ada subkategori yang tersedia untuk kategori ini.
        </div>
    @endforelse
</div>
@endsection
