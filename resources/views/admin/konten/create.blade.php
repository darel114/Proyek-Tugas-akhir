@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Konten</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Info admin yang sedang login --}}
    <div class="alert alert-info mb-4">
        <strong>Admin:</strong> {{ Auth::user()->name }}
    </div>

    <div class="card shadow">
        <div class="card-body">
            {{-- Tambahkan enctype="multipart/form-data" di sini --}}
            <form action="{{ route('admin.konten.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" placeholder="Judul" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="sub_category_id">Kategori</label>
                    <select name="sub_category_id" required class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">
                                {{ $subcategory->category->name }} &raquo; {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Gambar (Opsional)</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection