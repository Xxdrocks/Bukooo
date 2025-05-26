<!-- Tambahkan ini di <head> -->
<script src="https://unpkg.com/lucide@latest"></script>

<style>
    * {
        scrollbar-width: none;

    }

    .sidebar {
        width: 250px;
        height: 100vh;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        border-right: 1px solid #e5e5e5;
        box-shadow: 2px 0 6px rgba(0, 0, 0, 0.05);
    }

    .sidebar-header {
        padding: 20px;
        font-size: 22px;
        font-weight: 600;
        color: #4e73df;
        border-bottom: 1px solid #ddd;
        text-align: center;
        background-color: #f8f9fc;
    }

    .sidebar-header img {
        width: 40px;
        height: auto;
    }

    .sidebar nav {
        flex: 1;
        padding: 20px;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        margin-bottom: 10px;
        color: #444;
        background-color: transparent;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .sidebar a:hover {
        background-color: #f0f4ff;
        color: #4e73df;
    }

    .sidebar a.active {
        background-color: #4e73df;
        color: white;
    }

    .sidebar a svg {
        width: 18px;
        height: 18px;
    }
</style>

<!-- Sidebar HTML -->
<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('assets/navbar/logo.png') }}" alt="">
    </div>
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i data-lucide="layout-dashboard"></i> Dashboard
        </a>
        <a href="{{ route('user.index') }}" class="{{ request()->routeIs('user.*') ? 'active' : '' }}">
            <i data-lucide="users"></i> Users
        </a>
        <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.*') ? 'active' : '' }}">
            <i data-lucide="package"></i> Products
        </a>
        <a href="{{ route('payments.index') }}" class="{{ request()->routeIs('payments.*') ? 'active' : '' }}">
            <i data-lucide="credit-card"></i> Orders
        </a>
    </nav>
</div>

<!-- Tambahkan ini sebelum </body> -->
<script>
    lucide.createIcons();
</script>
