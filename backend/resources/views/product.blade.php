<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Bukoo</title>
</head>

<body>

    @include('components.nav')


    <style>
        .produk-section {
            padding: 60px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .produk-title {
            font-size: 32px;
            color: #007bff;
            margin-bottom: 40px;
            font-family: 'Poppins', sans-serif;
        }

        .produk-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
        }

        .produk-card {
            display: flex;
            flex-direction: column;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .produk-image {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            margin: 0 auto 20px;
        }

        .produk-detail {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .produk-name {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .produk-category,
        .produk-price,
        .produk-date,
        .produk-creator {
            font-size: 14px;
            color: #666;
        }
    </style>
    <section class="produk-section" id="produk">
        <a href="{{ route('products.create') }}">add product</a>
        <h1 class="produk-title">Produk</h1>
        <div class="produk-container">
            @foreach ($products as $product)
                <div class="produk-card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Produk" class="produk-image">
                    <div class="produk-detail">
                        <p class="produk-date">Dibuat: {{ $product->created_at->format('d M Y') }}</p>
                        <h2 class="produk-name">{{ $product->name }}</h2>
                        <p class="produk-category">Kategori: {{ $product->category }}</p>
                        <p class="produk-price">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="produk-creator">Dibuat oleh: {{ $product->created_by }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


</body>

</html>
