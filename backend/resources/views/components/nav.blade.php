<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            scroll-behavior: smooth;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding-top: 80px;
        }

        nav {
            font-family: "Poppins", sans-serif;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 30px;
            background-color: white;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-left img {
            width: 70px;
            height: auto;
        }


        .nav-center {
            display: flex;
            gap: 40px;
            transition: all 0.3s ease;
        }

        .nav-center a {
            text-decoration: none;
            color: black;
            font-weight: 600;
            padding-bottom: 5px;
            position: relative;
            font-size: 16px;
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

        .nav-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-right button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .nav-right img {
            width: 20px;
            height: auto;
        }


        .hamburger {
            display: none;
            cursor: pointer;
            width: 24px;
            height: 24px;
            position: relative;
            z-index: 1001;
        }

        .hamburger span {
            display: block;
            width: 100%;
            height: 2px;
            background-color: black;
            position: absolute;
            left: 0;
            transition: all 0.3s ease;
        }

        .hamburger span:nth-child(1) {
            top: 6px;
        }

        .hamburger span:nth-child(2) {
            top: 12px;
        }

        .hamburger span:nth-child(3) {
            top: 18px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg);
            top: 12px;
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg);
            top: 12px;
        }


        .profile-sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 300px;
            height: 250px;
            background-color: white;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
            padding: 50px 20px;
            z-index: 1000;
            transition: right 0.4s ease-in-out;
            overflow-y: auto;
            border-radius: 20px;
        }

        .profile-sidebar.show {
            right: 0;
        }

        .profile-sidebar a {
            display: block;
            color: black;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            padding: 10px 15px;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .profile-sidebar a:hover {
            background-color: #f0f0f0;
        }

        .profile-sidebar h3 {

            font-size: 16px;
            padding: 0 15px;
        }

        .profile-sidebar button {
            display: block;
            width: 100%;
            padding: 10px 15px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
            text-align: left;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .profile-sidebar button:hover {
            background-color: #f0f0f0;
        }

        .addproduct a {
            margin-top: 10px;
        }


        .mobile-center-nav {
            position: fixed;
            top: 80px;
            left: 0;
            right: 0;
            background-color: white;
            padding: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
            transform: translateY(-150%);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .mobile-center-nav.show {
            transform: translateY(0);
        }

        .mobile-center-nav a {
            display: block;
            padding: 10px 0;
            text-decoration: none;
            color: black;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }

        .mobile-center-nav a:last-child {
            border-bottom: none;
        }


        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 998;
            display: none;
        }

        .overlay.show {
            display: block;
        }


        @media (max-width: 992px) {
            .nav-center {
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .nav-center {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .profile-sidebar {
                width: 80%;
                max-width: 300px;

                z-index: 9999;
            }


        }

        @media (max-width: 480px) {
            nav {
                padding: 10px 15px;
            }

            .nav-left img {
                width: 60px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="{{ asset('assets/navbar/logo.png') }}" alt="Logo">
        </div>

        <!-- Desktop Navigation -->
        <div class="nav-center">
            <a href="{{ route('home') }}" class="active">Home</a>
            <a href="{{ route('product') }}">Shop</a>
            <a href="{{ route('mybooks') }}">My Books</a>
            @auth
            @endauth
            <a href="#contact">Contact</a>
        </div>

        <!-- Mobile Hamburger Menu -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-right">
            <a href="{{ route('favorites.index') }}"><img src="{{ asset('assets/navbar/heart.png') }}" alt="Wishlist"></a>
            <button id="profileBtn">
                <img src="{{ asset('assets/navbar/user.png') }}" alt="User">
            </button>
        </div>

        <!-- Mobile Center Navigation (Sliding Menu) -->
        <div class="mobile-center-nav" id="mobileCenterNav">
            <a href="{{ route('home') }}" class="active">Home</a>
            <a href="{{ route('product') }}">Shop</a>
            <a href="{{ route('mybooks') }}">My Books</a>
            <a href="#contact">Contact</a>
        </div>

        <!-- Profile Sidebar -->
        <div id="profileSidebar" class="profile-sidebar">
            @auth
                <h3>Currently in</h3>
                <a href="{{ route('profile') }}">
                    <p>{{ Auth::user()->name }}</p>
                    <p style="font-size: 12px; color: #666;">{{ Auth::user()->email }}</p>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <h3>Please Login or Register</h3>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth

            <div class="addproduct">
                @auth
                    @php
                        $user = auth()->user();
                    @endphp

                    @if ($user->getAttribute('role') === 'user')
                        <a href="{{ route('become-seller') }}">Become Seller</a>
                    @elseif (in_array($user->getAttribute('role'), ['seller']))
                        <a href="{{ route('products.create') }}">Add Product</a>
                    @elseif (in_array($user->getAttribute('role'), ['superadmin']))
                        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    @endif
                @endauth
            </div>
        </div>


        <div class="overlay" id="overlay"></div>
    </nav>

    <script>

        const hamburger = document.getElementById('hamburger');
        const mobileCenterNav = document.getElementById('mobileCenterNav');
        const profileBtn = document.getElementById('profileBtn');
        const profileSidebar = document.getElementById('profileSidebar');
        const overlay = document.getElementById('overlay');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            mobileCenterNav.classList.toggle('show');
            overlay.classList.toggle('show');

            profileSidebar.classList.remove('show');
        });

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileSidebar.classList.toggle('show');
            overlay.classList.toggle('show');

            hamburger.classList.remove('active');
            mobileCenterNav.classList.remove('show');
        });

        overlay.addEventListener('click', () => {
            hamburger.classList.remove('active');
            mobileCenterNav.classList.remove('show');
            profileSidebar.classList.remove('show');
            overlay.classList.remove('show');
        });

        document.querySelectorAll('.mobile-center-nav a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                mobileCenterNav.classList.remove('show');
                overlay.classList.remove('show');
            });
        });

        document.querySelectorAll('.profile-sidebar a, .profile-sidebar button').forEach(item => {
            item.addEventListener('click', () => {
                profileSidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        });
    </script>
</body>
