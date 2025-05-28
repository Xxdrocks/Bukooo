@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Daftar Favorit Kamu</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse($favorites as $fav)
            <div class="product-card">
                <img src="{{ asset('storage/' . $fav->product->image) }}" class="book-image" alt="{{ $fav->product->name }}">
                <div class="productcontent">
                    <p class="book-title">{{ $fav->product->name }}</p>
                    <p class="book-price">{{ $fav->product->price }}</p>
                </div>
            </div>
        @empty
            <p>Kamu belum menambahkan produk ke favorit.</p>
        @endforelse
    </div>
@endsection
