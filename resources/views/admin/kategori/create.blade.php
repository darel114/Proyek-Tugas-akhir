@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert />
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Kategori</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.kategori.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama kategori" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
