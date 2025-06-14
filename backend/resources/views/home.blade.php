<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukoo Home!</title>


    {{--  root  --}}

    {{--  font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    {{-- gsap  --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>


    {{--  aos   --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        body {

            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
        }

        .atasan {
            width: 100vh;
            height: 400px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        .main-home {

            min-height: 140vh;
            background: url('assets/background/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            background-color: #e0e0e0;
            color: white;
            position: relative;
            overflow: hidden;
            padding-top: 20px;


        }

        .main-home h1 {
            color: white;
            display: flex;
            justify-content: center;
            font-weight: 700;
            font-size: 100px;
            margin-top: -50px;
        }

        .home-h1 {
            text-shadow: rgba(255, 255, 255, 1) 0px 0px 45px;
            padding-top: 90px;
        }

        .bigText {
            z-index: 5;
            font-size: 60px;
            font-weight: bold;
            display: inline-block;
            white-space: nowrap;
            user-select: none;
        }

        .bigText span {
            display: inline-block;
            transition: transform 0.2s ease, opacity 0.2s ease;
            opacity: 1;
            --x: 10px;
            --y: -10px;
        }


        .bigText span:hover {
            transform: translate(var(--x), var(--y)) scale(1.2);
            opacity: 0.6;
        }



        .iklan {
            margin-top: -450px;
            display: flex;
            justify-content: start;
            gap: 100px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            scrollbar-width: none;
            pointer-events: none;
        }

        .iklan a {
            pointer-events: none;
            flex: 0 0 100%;
            scroll-snap-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            overflow: hidden;
        }

        .iklan img {
            pointer-events: none;
            z-index: 10;
            width: 500px;
            height: auto;
            object-fit: contain;
            transition: 0.5s ease-in-out;
        }

        .wave {
            margin-top: -20px;
            margin-left: 70px;
            pointer-events: none;
            position: absolute;
            animation: waveParallax 9s cubic-bezier(0.65, 0, 0.35, 1) infinite;
        }

        .waves {
            z-index: 0;
            margin-left: -150px;
            pointer-events: none;
            position: absolute;
            animation: waveParallax 12s cubic-bezier(0.65, 0, 0.35, 1) infinite;
        }





        .bookcontent {

            margin-top: 200px;
            text-align: center;
        }

        .bookcontent h1 {
            font-size: 24px;
            margin-bottom: 50px;
        }

        .book-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-left: 0;
            max-width: 1400px;

        }

        .product {}

        .product-card {
            width: 180px;
            position: relative;
            box-shadow: -2px 7px 25px 0px rgba(0, 0, 0, 0.33);
            -webkit-box-shadow: -2px 7px 25px 0px rgba(0, 0, 0, 0.33);
            -moz-box-shadow: -2px 7px 25px 0px rgba(0, 0, 0, 0.33);
            height: 400px;
            border-radius: 10px;
            padding-bottom: 10px;
            margin-bottom: 50px;
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


        .product a {
            text-decoration: none;
            color: inherit;
            display: block;
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
            scale: 1.1;
        }

        .productcontent {
            text-align: left;
            margin-top: 10px;
            border-radius: 0px 0px 10px 10px;
            height: auto;
        }

        .productcontent p {
            padding: 10px;
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



        .article {
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
        }




        .article img {
            width: 400px;
            height: auto;
            margin-right: 50px;

        }

        .glow {
            position: relative;
            display: inline-block;
        }

        .glow::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 180%;
            height: 180%;
            background: radial-gradient(circle, rgba(255, 200, 0, 0.7) 0%, rgba(255, 140, 0, 0.4) 40%, rgba(255, 100, 0, 0) 80%);
            transform: translate(-50%, -50%);
            z-index: -1;
            border-radius: 50%;
            filter: blur(50px);
            animation: emberGlow 1s infinite ease-in-out;
            opacity: 0.9;
            pointer-events: none;
        }

        .articlecontent button {
            background: #FFBFAE;
            padding: 15px;
            border-radius: 10px;
            margin-top: 30px;
            width: 100%;
        }

        .articlecontent p {
            width: 400px;
            font-size: 20px;
        }


        @media only screen and (max-width: 992px) {
            .main-home h1 {
                font-size: 5rem;
                margin-top: -50px;
            }

            .bigText {
                font-size: 4rem;
            }

            .iklan {
                margin-top: -450px;
                gap: 100px;
            }

            .product-card {
                width: 180px;
                height: 400px;
            }

            .article img {
                width: 400px;
            }

            .articlecontent p {
                width: 400px;
                font-size: 1.25rem;
            }
        }

        @media only screen and (max-width: 768px) {
            .main-home {

                min-height: 50vh;
            }

            .main-home h1 {
                font-size: 3rem;
                margin-top: -30px;
            }

            .home-h1 {
                padding-top: 60px;
            }

            .bigText {
                font-size: 2.5rem;
            }

            .iklan {
                margin-top: -150px;
                padding: 0 20px;
            }

            .iklan img {
                width: 50%;
                max-width: 500px;
            }

            .wave-wrapper {
                margin-top: -100px;
            }


            .bookcontent {
                margin-top: 100px;

            }

            .bookcontent h1 {
                font-size: 1.5rem;
                margin-bottom: 30px;
            }

            .product-card {
                width: 150px;
                height: 350px;
                margin-bottom: 30px;
            }

            .book-image {
                max-height: 180px;
                margin-top: 15px;
                padding: 15px;
            }

            .productcontent p {
                padding: 8px;
                font-size: 0.8rem;
            }

            .new-label {
                width: 30px;
            }

            .article {
                flex-direction: column;
                align-items: center;
                padding: 0 20px;
                margin-bottom: 50px;
            }

            .article img {
                width: 100%;
                max-width: 400px;
                margin-right: 0;
                margin-bottom: 30px;
            }

            .articlecontent {
                width: 100%;
                max-width: 400px;
                text-align: center;
            }

            .articlecontent button {
                padding: 12px;
                margin-top: 20px;
            }

            .articlecontent p {
                width: 100%;
                font-size: 1rem;
                margin-bottom: 20px;
            }



        }

        @media only screen and (max-width: 480px) {
            .main-home h1 {
                font-size: 2.5rem;
            }

            .bigText {
                font-size: 2rem;
            }

            .product-card {
                width: 140px;
                height: 320px;
            }
        }



        @keyframes upAppear {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        @keyframes wave1 {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes wave2 {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-25%);
            }
        }

        @keyframes waveParallax {
            0% {
                transform: translateY(30%);
            }

            20% {
                transform: translateY(0%);
            }

            40% {
                transform: translateY(-50px);
            }

            60% {
                transform: translateY(0);
            }

            80% {
                transform: translateY(5px);
            }

            100% {
                transform: translateY(30%);
            }
        }

        @keyframes wave {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }


        @keyframes emberGlow {
            0% {
                transform: translate(-50%, -50%) scale(1) rotate(0deg);
                opacity: 0.85;
                filter: blur(40px);
            }

            25% {
                transform: translate(-50%, -50%) scale(1.05) rotate(1deg);
                opacity: 1;
                filter: blur(55px);
            }

            50% {
                transform: translate(-50%, -50%) scale(0.98) rotate(-1deg);
                opacity: 0.75;
                filter: blur(45px);
            }

            75% {
                transform: translate(-50%, -50%) scale(1.03) rotate(0.5deg);
                opacity: 0.95;
                filter: blur(60px);
            }

            100% {
                transform: translate(-50%, -50%) scale(1) rotate(0deg);
                opacity: 0.85;
                filter: blur(40px);
            }
        }





        @keyframes glowPulse {
            0% {
                opacity: 0.6;
                transform: translate(-50%, -50%) scale(0.95);
            }

            50% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1.1);
            }

            100% {
                opacity: 0.6;
                transform: translate(-50%, -50%) scale(0.95);
            }
        }




        @keyframes scrollText {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%)
            }

        }



        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }



        @keyframes floatUpDown {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>



    @include('components.nav')
    @include('components.cursor')

    <div class="main-home">
        <div class="home-h1" id="scrollText">
            <h1 class="bigText" id="bigtext">
                TRENDING BOOKS
            </h1>
            <h1 class="bigText" id="bigtext">
                TRENDING BOOKS
            </h1>
            <h1 class="bigText" id="bigtext">
                TRENDING BOOKS
            </h1>
            <h1 class="bigText" id="bigtext">
                TRENDING BOOKS
            </h1>
            <h1 class="bigText" id="bigtext">
                TRENDING BOOKS
            </h1>


        </div>


        <div class="iklan" id="iklan">
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>

        </div>
        <div class="wave-wrapper" >
            <img class="wave" src="{{ asset('assets/background/purplewave.png') }}" alt="">
            <img class="waves" src="{{ asset('assets/background/bigwave.png') }}" alt="">
        </div>
    </div>



    <div class="bookcontent" id="shop">
        <div class="book-grid">
            @foreach ($products as $product)
                <!-- Product 1 -->
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



        <center data-aos="slide-down" data-aos-duration="1000" data-aos-offset="50">
            <h1 style="margin: 50px 0px">
                Did You Know
            </h1>
        </center>

        <div class="article">


            <div class="glow">
                <img src=" {{ asset('assets/article/article.png') }}" alt="" data-aos="slide-right"
                    data-aos-offset="50" data-aos-duration="1000" id="glow
                ">
            </div>
            <div class="articlecontent">
                <p data-aos="slide-left" data-aos-duration="1000" data-aos-offset="50">
                    Membaca buku adalah kegiatan yang sangat bermanfaat, baik untuk menambah pengetahuan, meningkatkan
                    kemampuan berpikir, maupun untuk menenangkan pikiran. Buku merupakan jendela dunia yang dapat
                    membawa
                    kita ke berbagai tempat dan pengalaman baru.

                </p>
                <button data-aos="slide-up" data-aos-duration="1000" data-aos-offset="50"
                    onclick="window.location.href='{{ route('product') }}'">
                    Lets Read a Book
                </button>

            </div>



        </div>



        @include('layouts.footer')





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

            document.addEventListener('mousemove', function(e) {
                const img = document.getElementById('iklan');
                const glow = document.getElementById('glow');
                const speed = 2;
                const x = (window.innerWidth - e.pageX * speed) / 100;
                const y = (window.innerHeight - e.pageY * speed) / 100;
                img.style.transform = `translate(${x}px, ${y}px)`;
                glow.style.transform = `translate(${x}px, ${y}px)`;
            });


            const wave = document.getElementById('wave');
            window.addEventListener('scroll', () => {
                let value = window.scrollY;
                console.log(value);

                wave.style.transform = 'translateY(' + (value * 0.4) + 'px)';
            })

            const text = document.getElementById('bigtext');
            if (text) {
                const speedText = 2;
                const xText = (window.innerWidth - e.pageX * speedText) / 150;
                const yText = (window.innerHeight - e.pageY * speedText) / 150;
                text.style.transform = `translate(${xText}px, ${yText}px)`;
            }


            //   parallax

            // const scrollText = documen.getElementById('scrollText');


            // window.addEventListener('scroll', () => {
            //     let value = window.scrollY;
            //     console.log(value);

            //     iklan.style.transform = 'translate(0, -' + (value * 0.4) + 'px)';
            //     scrollText.style.transform = 'translate(0, -' + (value * 0.4) + 'px)';

            // });
        </script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.querySelectorAll('.bigText').forEach(el => {
                const letters = el.textContent.split('');
                el.innerHTML = ''; // kosongin dulu

                letters.forEach(char => {
                    const span = document.createElement('span');
                    span.textContent = char;


                    const randX = Math.floor(Math.random() * 60 - 30) + 'px';
                    const randY = Math.floor(Math.random() * 60 - 30) + 'px';
                    span.style.setProperty('--x', randX);
                    span.style.setProperty('--y', randY);

                    el.appendChild(span);
                });
            });
        </script>




</body>

</html>
