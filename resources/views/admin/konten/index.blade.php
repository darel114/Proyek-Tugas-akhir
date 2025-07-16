@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert />
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Konten</h3>
        <a href="{{ route('admin.konten.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Konten
        </a>
    </div>

    <div class="row">
        @forelse ($contents as $item)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="text-muted small mb-2">
                                {{ $item->subcategory->category->name }} / {{ $item->subcategory->name }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.konten.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.konten.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus konten ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada konten yang ditambahkan.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection