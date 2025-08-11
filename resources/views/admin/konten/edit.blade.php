@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Konten</h1>
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

    @if($konten->admin)
        <div class="alert alert-info my-3">
            Terakhir diedit oleh: <strong>{{ $konten->admin->name }}</strong>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            {{-- Tambahkan enctype="multipart/form-data" di sini --}}
            <form action="{{ route('admin.konten.update', $konten->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" placeholder="Judul" value="{{ old('title', $konten->title) }}">
                </div>
                <div class="form-group">
                    <label for="sub_category_id">Kategori</label>
                    <select name="sub_category_id" required class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $konten->sub_category_id == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->category->name }} &raquo; {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" rows="10" class="form-control">{{ old('description', $konten->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Gambar ((< 2MB))</label>
                    <br>
                    @if($konten->image_path)
                        <img src="{{ asset('storage/' . $konten->image_path) }}" alt="Gambar saat ini" class="img-thumbnail mb-2" width="200">
                    @endif
                    <input type="file" name="image" class="form-control-file">
                    <small class="form-text text-muted">Unggah gambar baru untuk mengganti yang lama.</small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection