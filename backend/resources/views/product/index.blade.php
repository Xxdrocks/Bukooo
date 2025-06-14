<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Bukoo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
            box-sizing: border-box;
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
            max-width: 1000px;
            margin: 0 auto;
        }

        .product-section {
            padding: 30px 20px;
        }

        .productcontent {
            padding: 20px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 30px;
            padding: 0 30px;
            max-width: 1100px;
            margin: 0 auto;
            justify-content: center;
        }

        .product-card {
            width: 100%;
            max-width: 220px;
            height: 400px;
            background: #fff;
            border-radius: 10px;
            box-shadow: -2px 7px 25px 0px rgba(0, 0, 0, 0.33);
            position: relative;
            cursor: pointer;
            transition: 0.3s ease;
            padding-bottom: 10px;
            margin: 0 auto;
        }

        .products {
            padding: 30px;
        }

        .book-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            padding-top: 50px;
            transition: 0.2s ease-in-out;
            border-radius: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .book-image:hover {
            transform: scale(1.1);
        }

        .new-label {
            width: 40px;
            height: auto;
        }

        .book-title {
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0;
            text-align: center;
        }

        .book-price {
            color: #28a745;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
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

        @media (max-width: 1024px) {
            .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .atasan {
                display: none;
            }



            .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 20px;
                padding: 0 15px;
            }

            .product-card {
                height: 380px;
            }

            .book-image {
                max-height: 180px;
                margin-top: 40px;
            }
        }

        @media (max-width: 480px) {
            .atasan {
                padding: 30px 15px;
                margin-bottom: 30px;
            }

            .atasan h2 {
                font-size: 1.3rem;
                line-height: 1.4;
            }

            .product-section {
                padding: 20px 10px;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
                gap: 15px;
                padding: 0 10px;
            }

            .product-card {
                height: 350px;
            }

            .book-image {
                max-height: 160px;
                margin-top: 30px;
            }

            .productcontent {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    @include('components.nav')
    @include('components.cursor')

    <!-- Header Section -->
    <div class="atasan">
        <h2>
            "Untuk bisa membaca banyak buku diperlukan dua hal dimana uang dan waktu tidak termasuk diantaranya. Dua
            hal tersebut adalah gairah dan kerendahan hati bahwa kita banyak tak tahu."
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
                            console.log("Response dari server:", data);
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
