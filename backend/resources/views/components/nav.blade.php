

<nav>
    <style>
        nav {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 30px;
            background-color: white;
        }



        .nav-left img {
            width: 70px;
        }

        .nav-center {
            display: flex;
            gap: 70px;


        }

        .nav-center a {
            text-decoration: none;
            color: black;
            font-weight: 700;
            padding-bottom: 5px;
            position: relative;

        }



        .nav-right {
            display: flex;
            gap: 20px;

        }

        .nav-right button {
            background: none;
            border: none;
            padding: none;
        }

        .nav-right img {
            width: 20px;
            cursor: pointer;

        }

        .nav-center a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #C8E6C9;
            left: 0;
            bottom: 0;
            transition: width 0.3s ease;
        }

        .nav-center a:hover::after {
            width: 100%;
        }

        .sidebar {
            border-radius: 10px;
            position: fixed;
            top: 70px;
            right: -100%;
            width: 250px;
            background-color: white;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            z-index: 999;
            transition: right 0.4s ease-in-out;
        }


        .sidebar a {
            color: black;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: 0.3s ease-in-out;
        }

        .sidebar a:hover {
            text-shadow: rgba(0,238,255,0.9) 0px 0px 39px;
        }

        .sidebar h3 {
            font-size: 15px;
            margin-bottom: 10px
        }

        .sidebar button {
            font-size: 15px;
            margin-top: 15px;
            font-weight: 500;
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            width: 200px;
            padding: 5px;
            border-radius: 5px;
        }

        .sidebar button:hover {
            background: rgb(53, 53, 53);
            color: white;
        }

        .sidebar.show {
            right: 0;
        }

    </style>

    <div class="nav-left">
        <img src="{{ asset('assets/navbar/logo.png') }}" alt="Logo">
    </div>

    <div class="nav-center">
        <a href="{{ route ('home') }}" class="active">Home</a>
        <a href="#shop">Shop</a>
        <a href="{{ route ('mybooks') }}">My Books</a>

        @auth



        @endauth


        <a href="#contact">Contact</a>
    </div>

    <div class="nav-right">
        <a href=""><img src="{{ asset('assets/navbar/heart.png') }}" alt="Wishlist"></a>
        <button id="accountBtn">
            <img src="{{ asset('assets/navbar/user.png') }}" alt="User">
        </button>
    </div>

    <div id="sidebar" class="sidebar">
        @auth
            <h3>Curently in</h3>
            <p>{{ Auth::user()->name }}</p>
            <p style="font-size: 10px">{{ Auth::user()->email }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <h3>Silakan Login atau Register</h3>
            <a href="{{ route('login') }}" class="text-blue-500">Login</a> |
            <a href="{{ route('register') }}" class="text-blue-500">Register</a>
        @endauth
    </div>


</nav>


