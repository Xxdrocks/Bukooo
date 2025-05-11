@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>Tambah Produk</h1>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Nama Produk" required>
        </div>
        <div class="form-group">
            <textarea name="desc" placeholder="Deskripsi Produk" required></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="image" required>
        </div>
        <button type="submit" class="submit-button">Kirim</button>
    </form>
</div>
@endsection
