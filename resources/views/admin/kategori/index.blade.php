@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert />
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Kategori</h3>
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="row">
        @forelse ($categories as $cat)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $cat->name }}</h5>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.kategori.edit', $cat->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.kategori.destroy', $cat->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada kategori yang ditambahkan.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
