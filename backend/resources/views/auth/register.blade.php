<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins";
        }

        body {
            background: linear-gradient(to bottom right, #76fdd2, #fdf1c2);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mainform {
            width: 900px;
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
            padding: 0 20px;
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

        .rightform h1 {
            margin-bottom: 30px;
        }

        .rightform {
            font-size: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 40px 30px;
        }

        .rightform input {
            width: 250px;
            padding: 10px 10px;
            margin-bottom: 10px;
            border: 1px solid #000000;
            border-radius: 8px;
            font-size: 10px;
            width: 220px;
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
            font-size: 8px;
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
            margin-left: 38px;
        }

        .googlelog a {
            text-decoration: none;
        }

        .googlelog img {
            margin-bottom: -1px;
            margin-right: 5px;
        }

        .error-text {
            color: red;
            font-size: 8px;
            margin-bottom: 5px;
            text-align: left;
            margin-left: 20px;
        }

          @media (max-width: 768px) {
            body {
                background: white;
                overflow-y: auto;
            }

            .mainform {
                flex-direction: column;
                width: 100%;
                max-width: 400px;
                height: auto;
                border-radius: 16px;
                margin: 20px auto;
            }

            .leftform,
            .rightform {
                width: 100%;
                padding: 20px;
                margin: 0;
                align-items: center;
                text-align: center;
            }

            .rightform {
                margin-top: -120px;
            }

            .people {

                margin-top: -80px;
            }

            .logo {
                width: 50px;
                margin-left: 0;
            }

            .rightform h1 {
                font-size: 18px;
                margin-bottom: 20px;
            }

           .rightform small {
                margin-top: 30px;

            }

            .rightform input,
            .rightform button,
            .googlelog {
                width: 100%;
                max-width: 260px;
            }

            .googlelog {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="mainform">
        <div class="leftform">
            <img src="{{ asset('assets/form/logo.png') }}" alt="Logo" class="logo">
            <img src="{{ asset('assets/form/people.png') }}" alt="People" class="people">
        </div>

        <div class="rightform">
            <h1>Daftar Akun Bukoo</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <input id="name" type="text" name="name" placeholder="Username" value="{{ old('name') }}" required />
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                {{-- Email --}}
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                {{-- Password --}}
                <input id="password" type="password" name="password" placeholder="Password" required />
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                {{-- Confirm Password --}}
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
                @error('password_confirmation')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                <button type="submit">Daftar</button>

                {{--  <p style="margin-top: 10px;">Atau</p>

                <div class="googlelog">
                    <a href="/auth/google">
                        <img src="{{ asset('assets/form/google.png') }}" alt="Google" width="10px">
                        Daftar dengan Google
                    </a>
                </div>  --}}
            </form>

            <small>
                <a href="{{ route('login') }}" style="text-decoration: none;">
                    Sudah punya akun? Masuk
                </a>
            </small>
        </div>
    </div>

</body>
</html>
