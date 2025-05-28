<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


</head>



<nav>
    <style>

        * {
            scroll-behavior: smooth;
        }


        nav {
            margin: 0;
            padding: ;
            font-family: "Poppins", sans-serif;
            top: 0;
            right: 0;
            left: 0;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 30px;
            background-color: white;
            z-index: 15;
            overflow-x: hidden;
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
            background: rgb(53, 53, 53);
            color: white;
            border-radius: 5px;
        }

        .sidebar p:hover {
            background: rgb(53, 53, 53);
            color: white;
            border-radius: 5px;
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

        .addproduct a {
            margin-top: 20px;
        }
    </style>

    <div class="nav-left">
        <img src="{{ asset('assets/navbar/logo.png') }}" alt="Logo">
    </div>

    <div class="nav-center">
        <a href="{{ route('home') }}" class="active">Home</a>
        <a href="{{ route('product') }}">Shop</a>
        <a href="{{ route('mybooks') }}">My Books</a>
        @auth
        @endauth
        <a href="#contact">Contact</a>
    </div>

    <div class="nav-right">
        <a href="{{ route('favorites.index') }}"><img src="{{ asset('assets/navbar/heart.png') }}" alt="Wishlist"></a>
        <button id="accountBtn">
            <img src="{{ asset('assets/navbar/user.png') }}" alt="User">
        </button>
    </div>

    <div id="sidebar" class="sidebar">
        @auth
            <h3>Curently in</h3>
            <a href="{{ route('profile') }}">
                <p>{{ Auth::user()->name }} </p>
                <p style="font-size: 10px">{{ Auth::user()->email }}</p>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <h3>Silakan Login atau Register</h3>
            <a href="{{ route('login') }}" class="text-blue-500">Login</a> |
            <a href="{{ route('register') }}" class="text-blue-500">Register</a>
        @endauth


        <div class="addproduct">
            @auth
                @php
                    $user = auth()->user();
                @endphp

                @if ($user->getAttribute('role') === 'user')
                    <a href="{{ route('become-seller') }}">Jadi Seller</a>
                @elseif (in_array($user->getAttribute('role'), ['seller']))
                    <a href="{{ route('products.create') }}">Add Product</a>
                @elseif (in_array($user->getAttribute('role'), ['superadmin']))
                    <a href="{{ route('admin.dashboard') }}">Dashboard Superadmin</a>
                @endif
            @endauth
        </div>
    </div>

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
    </script>


</nav>
