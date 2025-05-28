<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Bukoo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    {{-- aos animation --}}

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        body {
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        .atasan {
            background-image: url('/assets/product/gradientBg.png');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            margin-bottom: 40px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            text-align: center;
        }

        .atasan h2 {
            font-size: 1.8rem;
            font-weight: 600;
            line-height: 1.5;
        }

        .product-section {
            padding: 30px 20px;
        }

        .productcontent {
            padding: 20px;
        }


        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 50px;
            padding: 0 30px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .product-card {
            width: 180px;
            height: 400px;
            background: #fff;
            border-radius: 10px;
            box-shadow: -2px 7px 25px 0px rgba(0, 0, 0, 0.33);
            position: relative;
            cursor: pointer;
            transition: 0.3s ease;
            padding-bottom: 10px;

        }

        .products {
            padding: 30px
        }


        .book-image {
            width: 100%;
            max-height: 200px;
            object-fit: contain;
            margin-top: 50px;
            /* padding: 20px; */
            transition: 0.2s ease-in-out;
            border-radius: 5px;
        }

        .book-image:hover {
            scale: 1.1;
        }


        .new-label {
            width: 40px;
            height: auto;
        }

        .book-title {
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0;
        }

        .book-price {
            color: #28a745;
            font-size: 14px;
            font-weight: 600;
        }

        .heart-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 20px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .heart-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    @include('components.nav')
    @include('components.cursor')

    <!-- Header Section -->
    <div class="atasan">
        <h2>
            “Untuk bisa membaca banyak buku diperlukan dua hal dimana uang dan waktu tidak termasuk diantaranya. Dua
            hal tersebut adalah gairah dan kerendahan hati bahwa kita banyak tak tahu.”
            <br>~ Helvy Tiana Rosa
        </h2>
    </div>



    <section class="product-section">
        <div class="product-grid">
            @foreach ($products as $product)
                <form action="{{ route('payment.create') }}" method="GET" onclick="this.submit()">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="product-card">

                        <img src="{{ asset('storage/' . $product->image) }}" class="book-image"
                            alt="{{ $product->name }}">
                        <div class="productcontent">
                            <img class="new-label" src="assets/product/new.png" alt="New">
                            <p class="book-title">{{ $product->name }}</p>
                            <p class="book-price">{{ $product->price }}</p>
                        </div>
                        <input type="hidden" class="product-id" value="{{ $product->id }}">
                        <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </form>
            @endforeach
        </div>
    </section>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.like-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();

                    const productId = btn.closest('.product-card').querySelector('.product-id')
                        .value;

                    fetch("{{ route('favorite.toggle') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                product_id: productId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            const isLiked = data.status === 'added';
                            btn.src = isLiked ?
                                "{{ asset('assets/product/redheart.png') }}" :
                                "{{ asset('assets/product/heart.png') }}";

                            Swal.fire({
                                title: isLiked ? 'Ditambahkan ke Favorit ❤️' :
                                    'Dihapus dari Favorit 💔',
                                text: isLiked ?
                                    'Produk ini masuk daftar kesukaanmu!' :
                                    'Produk ini dihapus dari favoritmu!',
                                icon: isLiked ? 'success' : 'warning',
                                showConfirmButton: false,
                                timer: 1500,
                                toast: true,
                                position: 'top-end'
                            });
                        });
                });
            });
        });
    </script>



</body>



</html>
