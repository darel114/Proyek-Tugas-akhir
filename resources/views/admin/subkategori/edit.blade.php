@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert />
    <h3 class="mb-4">Edit Sub Kategori</h3>
    <div class="card shadow-sm p-4">
        <form method="POST" action="{{ route('admin.subkategori.update', $subkategori->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Sub Kategori</label>
                <input type="text" name="name" value="{{ $subkategori->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $subkategori->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.subkategori.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
