<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukoo Login</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


        {{--  aos  --}}

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #76fdd2, #fdf1c2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: gradientMove 15s infinite ease infinite;
        }

        .mainform {
            width: 900px;
            height: 500px;
            background: white;
            border-radius: 20px;
            display: flex;
            overflow: hidden;
        }

        .leftform {
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 50px 50px;
            margin-bottom: -70px;
        }

        .people {
            width: 400px;
            margin-bottom: -50px;
        }

        .logo {
            width: 60px;
            margin-left: 40px;
        }

        .leftform img {
            margin-bottom: 40px;
        }

        .rightform {
            font-size: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 40px 30px;
        }

        .rightform h1 {
            margin-bottom: 80px;
        }

        .rightform input {
            width: 250px;
            padding: 10px 10px;
            margin-bottom: 15px;
            border: 1px solid #000000;
            border-radius: 8px;
            font-size: 10px;
        }

        .rightform button {
            color: white;
            padding: 10px 10px;
            background-color: #2b2b2b;
            border: none;
            width: 220px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 10px;
            transition: 0.2s ease-in-out;
        }

        .rightform button:hover {
            background-color: #9e9e9e;
        }

        .rightform a {
            color: rgb(0, 0, 0);
        }

        .rightform p {
            font-size: 8px
        }

        .rightform small {
            margin-top: 8px;
        }

        .googlelog {
            justify-content: center;
            display: flex;
            text-align: center;
            margin-top: 10px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 8px;
            width: 215px;
            margin-left: 38px
        }

        .googlelog a {
            text-decoration: none;
        }

        .googlelog img {
            margin-bottom: -1px;
            margin-right: 5px;
        }


        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>

    <div class="mainform">
        <div class="leftform" >
            <img src="{{ asset('assets/form/logo.png') }}" alt="Logo" class="logo" data-aos="fade-right" data-aos-duration="1500">
            <img src="{{ asset('assets/form/people.png') }}" alt="People" class="people" data-aos="fade-right" data-aos-duration="1400">
        </div>

        <div class="rightform">
            <h1 data-aos="fade-left" data-aos-duration="1500">Masuk Akun Bukoo</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required data-aos="fade-left" data-aos-duration="1500" />
                <input type="password" name="password" placeholder="Password" required data-aos="fade-left" data-aos-duration="1600"/>
                <button type="submit" data-aos="fade-left" data-aos-duration="1500">Masuk</button >
{{--
                <p style="margin-top: 10px;" data-aos="fade-left" data-aos-duration="1500">Atau</p>

                <div class="googlelog" data-aos="fade-left" data-aos-duration="1500">
                    <a href="/auth/google" class="google-login-btn">
                        <img src="{{ asset('assets/form/google.png') }}" alt="Google" width="10px">
                        Masuk dengan Google
                    </a>
                </div>  --}}
            </form>

            <small>
                <a href="{{ route('register') }}" style="text-decoration: none;" data-aos="fade " data-aos-duration="1500">
                    Belum Punya Akun? Daftar
                </a>
            </small>
        </div>
    </div>



 {{--  aos   --}}
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
