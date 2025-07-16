@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert />
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Sub Kategori</h3>
        <a href="{{ route('admin.subkategori.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Sub Kategori
        </a>
    </div>

    @forelse ($subcategories as $sub)
        <div class="card shadow-sm p-3 mb-3 animate__animated animate__fadeInUp">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $sub->name }}</strong>
                    <small class="text-muted">[{{ $sub->category->name }}]</small>
                </div>
                <div>
                    <a href="{{ route('admin.subkategori.edit', $sub->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.subkategori.destroy', $sub->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Belum ada subkategori yang ditambahkan.</div>
    @endforelse
</div>
@endsection