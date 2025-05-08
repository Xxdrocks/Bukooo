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


    {{--  aos   --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: "Poppins", sans-serif;
            height: ;
        }



        .main-home {
            min-height: 100vh;
            background: url('assets/background/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            background-color: #f5f5f5;
            color: white;
            position: relative;
            overflow: hidden;

        }

        .main-home h1 {
            color: white;
            display: flex;
            justify-content: center;
            font-weight: 700;
            font-size: 100px;
            z-index: -10;
            margin-top: -50px;
        }

        .home-h1 {
            text-shadow: rgba(255,255,255,1) 0px 0px 45px;
            padding-top: 70px;
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
        }

        .iklan a {
            flex: 0 0 100%;
            scroll-snap-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            overflow: hidden;
        }

        .iklan img {
            z-index: 10;
            width: 500px;
            height: auto;
            object-fit: contain;
            transition: 0.5s ease-in-out;
        }




        .bookcontent {
            margin-top: 100px;
            text-align: center;
        }

        .bookcontent h1 {
            font-size: 24px;
            margin-bottom: 50px;
        }

        .book-grid {
            margin-left: 200px;
            width: 900px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            justify-items: center;
        }

        .product {
            height: 400px;
            border: 0.5px solid #000000;
            border-radius: 10px;
            width: 180px;
            position: relative;
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
            max-height: 200px;
            object-fit: cover;
            margin-top: 20px;
            padding: 20px;
            transition: 0.2s ease-in-out;
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

    <div class="main-home">
        <div class="home-h1" id="scrollText">
            <h1 style=" animation:scrollText 15s linear infinite;">
                TRENDING BOOKS
            </h1>
            <h1 style=" animation:scrollText 14.8s linear infinite;">
                TRENDING BOOKS
            </h1>
            <h1 style="animation: scrollText 14.5s linear infinite">
                TRENDING BOOKS
            </h1>
            <h1 style="animation: scrollText 14.1s linear infinite">
                TRENDING BOOKS
            </h1>
            <h1 style="animation: scrollText 13.8s linear infinite">
                TRENDING BOOKS
            </h1>
        </div>


        <div class="iklan" id="iklan">
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan2.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan3.png') }}" alt="">
            </a>
            <a href="">
                <img src="{{ asset('assets/iklan/iklan1.png') }}" alt="">
            </a>
        </div>


    </div>


    <div class="bookcontent" id="shop">
        <h1>New Books</h1>
        <div class="book-grid">

            <!-- 1 -->
            <div class="product">
                <img class="book-image" src="assets/product/loving.png" alt="Loving The Wounded Soul">
                <a href="/beli/1">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">Loving The Wounded Soul</p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 2 -->
            <div class="product">
                <img class="book-image" src="assets/product/sianak.png" alt="Aku Anak Pintar">
                <a href="/beli/2">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">
                            Si Anak Pintar</p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 3 -->
            <div class="product">
                <img class="book-image" src="assets/product/caraberpikir.png" alt="99 Cara Bersyukur Ala Khadijah">
                <a href="/beli/3">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">99 Cara Bersyukur Ala Sherelock Holmes</p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 4 -->
            <div class="product">
                <img class="book-image" src="assets/product/andaisel.png" alt="Anda Selalu Dalam Tuhanmu">
                <a href="/beli/4">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">Andai Sel-Sel Dalam Tubuhmu Berbicara</p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 5 -->
            <div class="product">
                <img class="book-image" src="assets/product/seperti.png" alt="Serpihan Dendam">
                <a href="/beli/5">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">Seperti Dendam, Rindu Harus Dibayar Tuntas</p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 6 -->
            <div class="product">
                <img class="book-image" src="assets/product/malam.png" alt="Makem Terakhir">
                <a href="/beli/6">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">
                            Malam Terakhir</p>

                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 7 -->
            <div class="product">
                <img class="book-image" src="assets/product/ego.png" alt="Ego Is The Enemy">
                <a href="/beli/7">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">
                            EGO IS THE ENEMY</p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

            <!-- 8 -->
            <div class="product">
                <img class="book-image" src="assets/product/daun.png"
                <a href="/beli/8">
                        alt="Daun Yang Jatuh Tak Pernah Membenci Angin">
                    <div class="productcontent">
                        <img class="new-label" src="assets/product/new.png" alt="New">
                        <p class="book-title">
                            Daun Yang Jatuh

                        </p>
                        <p class="book-price">Rp 99.000,00</p>
                        <img class="heart-icon" src="assets/product/heart.png" alt="Favorite">
                    </div>
                </a>
                <img class="heart-icon like-btn" src="assets/product/heart.png" alt="Favorite">
            </div>

        </div>
    </div>




    <center data-aos="fade-down" data-aos-duration="1000">
        <h1 style="margin: 50px 0px">
            Did You Know
        </h1>
    </center>

    <div class="article">


        <img src=" {{ asset('assets/article/article.png') }}" alt="" data-aos="fade-right"
            data-aos-duration="1000">

        <div class="articlecontent">
            <p data-aos="fade-left" data-aos-duration="1000">
                Membaca buku adalah kegiatan yang sangat bermanfaat, baik untuk menambah pengetahuan, meningkatkan
                kemampuan berpikir, maupun untuk menenangkan pikiran. Buku merupakan jendela dunia yang dapat membawa
                kita ke berbagai tempat dan pengalaman baru.

            </p>
            <button data-aos="fade-up" data-aos-duration="1000">
                Lets Read a Book
            </button>

        </div>



    </div>



    @include('layouts.footer')





    <script>
        const accountBtn = document.getElementById('accountBtn');
        const sidebar = document.getElementById('sidebar');

        accountBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('show');
        });

        window.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !accountBtn.contains(e.target)) {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('show');
            }
        });


        {{--  parallax  --}}

        const iklan = document.getElementById('iklan');
        const scrollText = documen.getElementById('scrollText');


        window.addEventListener('scroll', () => {
            let value = window.scrollY;
            console.log(value);

            iklan.style.transform = 'translate(0, -' + (value * 0.4) + 'px)';
            scrollText.style.transform = 'translate(0, -' + (value * 0.4) + 'px)';

        });


        {{--  heart icon animation  --}}
        document.querySelectorAll('.like-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation(); // mencegah bubbling ke <a>
                e.preventDefault(); // mencegah redirect

                const isLiked = btn.classList.toggle('liked');
                btn.src = isLiked ?
                    'assets/product/redheart.png' :
                    'assets/product/heart.png';
            });
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
