<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukoo Profile</title>

    {{-- font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        .container {
            margin-top: -30px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 100px;
        }


        .profile-card {
            background-color: #fff4b1;
            font-size: 7px;
            text-align: center;
            align-items: center;
            padding: 10px;
            width: 280px;
            height: 250px;
            ;
            border-radius: 20px;
        }


        .profile-card a {
            font-size: 10px;
            font-weight: 300;
            text-decoration: none;
            color: rgba(0, 0, 0, 0.701);
        }

        .card {

            font-weight: 600;
            font-size: 12px;
            text-align: left;
            margin-bottom: 50px;
        }



        .card p {
            color: rgba(0, 0, 0, 0.733);
            display: flex;
            justify-content: space-between;
        }


        .right-container {
            font-size: 14px;
            font-weight: 500;

        }

        .favorite-book {
            width: auto;
            height: auto;
            background: #ffbfae;
            border-radius: 40px 10px 10px 10px;
            padding: 20px 15px;
        }

        .favorite-book p {
            background-color: white;
            border-radius: 0 0 20px 0;
            width: 40%;
            margin-top: -20px;
            margin-bottom: 10px;
            padding-right: 10px;
            margin-left: -10px;
        }

        .favorite-image {
            display: flex;
            flex-direction: row;
            background-color: white;
            border-radius: 10px 40px 10px 10px;
            gap: 10px;
            height: 90px;
            padding: 10px;
        }


        .favorite-image img {
            width: auto;
            height: 100%;
        }



        .wishlist {
            margin-top: 30px;
            width: 350px;
            background: #c8e6c9;
            border-radius: 10px 40px 10px 10px;
            padding: 20px 15px;

        }

        .wishlist p {
            left: 300px;
            position: relative;
            background-color: white;
            border-radius: 0px 0px 0px 20px;
            width: 30%;
            margin-top: -20px;
            padding-left: 15px;
            margin-left: -45px;
            margin-bottom: 10px;
        }

        .wishlist-image {
            background-color: white;
            border-radius: 20px 10px 10px 10px;
            height: 90px;

        }

        .wave {
            width: 100%;
            margin-top: -100px;
            margin-left: -50px;
        }

        @media (max-width: 768px) {
    .container {
        flex-direction: column;
        gap: 20px;
        height: auto;
        margin-top: 30px;
        padding: 20px;
    }

    .profile-card {
        width: 90%;
        height: auto;
        font-size: 10px;
    }

    .profile-card a {
        font-size: 12px;
    }

    .card {
        font-size: 14px;
        margin-bottom: 30px;
    }

   .right-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .favorite-book,
    .wishlist {
        width: 300px;
        padding: 15px 10px;
        box-sizing: border-box;
    }

    .favorite-image,
    .wishlist-image {
        flex-direction: row;
        overflow-x: auto;
        gap: 10px;
        height: 90px;
    }

    .favorite-image img,
    .wishlist-image img {
        height: 80px;
        width: auto;
        flex-shrink: 0;
    }

    .wishlist p{
        margin-left: -80px;
    }



    .wave {
        margin-top: 10px;
        margin-left: 0;
        width: 100%;
    }
}

    </style>
</head>

<body>

    @include('components.nav')



    <div class="container">

        <div class="profile-card">

            <img src="" alt="">
            <h1 style="border-bottom: 1px solid black; margin: 30px; padding: 10px;; ">Profile Card</h1>
            <div class="card">
                <p> <span>Username :</span>{{ $user->name ?? 'anak ilang lu gaada nama?' }}</p>
                <p> <span>Number : </span>{{ $user->sellerProfile->phone_number ?? '081234567890' }}</p>
                <p> <span>Email:</span>{{ $user->email }}</p>
            </div>
            <a href="{{ route('profile.edit') }}">Change</a>
        </div>

        <div class="right-container">

            <div class="favorite-book">
                <p>Favorite Books</p>
                <div class="favorite-image"> <!-- Taruh di luar loop -->
                    @foreach ($favorites as $fav)
                        <img src="{{ asset('storage/' . $fav->product->image) }}" alt="{{ $fav->product->name }}">
                    @endforeach
                </div>
            </div>


            <div class="wishlist">
                <p>Wishlist</p>
                <div class="wishlist-image">
                    <img src="" alt="">
                </div>
            </div>
        </div>

    </div>

    <img src="{{ asset('assets/background/Vectorwave.png') }}" class="wave" alt="">
</body>

</html>
