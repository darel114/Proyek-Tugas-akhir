<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA Project - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f1f4f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            min-height: 100vh;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding-top: 60px;
        }
        .sidebar a {
            color: #ddd;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #495057;
            color: #fff;
        }
        .logout-wrapper {
            margin-top: auto;
            padding: 20px;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
            flex-grow: 1;
        }
        footer {
            background: #e9ecef;
            padding: 15px;
            margin-top: auto;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h5 class="text-center">Admin Panel</h5>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </a>
    <a href="{{ route('admin.kategori.index') }}" class="{{ request()->is('admin/kategori*') ? 'active' : '' }}">
        <i class="fas fa-folder me-2"></i> Kategori
    </a>
    <a href="{{ route('admin.subkategori.index') }}" class="{{ request()->is('admin/subkategori*') ? 'active' : '' }}">
        <i class="fas fa-list me-2"></i> Subkategori
    </a>
    <a href="{{ route('admin.konten.index') }}" class="{{ request()->is('admin/konten*') ? 'active' : '' }}">
        <i class="fas fa-file-alt me-2"></i> Konten
    </a>
    <a href="{{ route('user.dashboard') }}" target="_blank">
        <i class="fas fa-user me-2"></i> Lihat Dasbor Pengguna
    </a>

    <div class="logout-wrapper">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger w-100">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </button>
        </form>
    </div>
</div>

<div class="content">
    @yield('content')
</div>

<footer class="text-center">
    <div class="container">
        <span class="text-muted">&copy; {{ date('Y') }} TA Project - Admin Panel</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>