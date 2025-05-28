<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit Kamu</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 40px;
            color: #333;
        }
        h1 {
            margin-top: 100px;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 24px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: box-shadow 0.3s ease;
        }
        .product-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .productcontent {
            padding: 12px;
        }
        .book-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 6px;
        }
        .book-price {
            color: #777;
            font-size: 14px;
        }
        .empty-message {
            color: #777;
        }
    </style>
</head>
<body>

    @include('components.nav')
    <h1>Daftar Favorit Kamu</h1>

    @if ($favorites->isEmpty())
        <p class="empty-message">Kamu belum menambahkan produk ke favorit.</p>
    @else
        <div class="grid">
            @foreach($favorites as $fav)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $fav->product->image) }}" alt="{{ $fav->product->name }}">
                    <div class="productcontent">
                        <p class="book-title">{{ $fav->product->name }}</p>
                        <p class="book-price">Rp {{ number_format($fav->product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</body>
</html>
