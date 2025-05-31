{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 60px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 70px;
        }
                footer {
            margin-top: 60px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
        }

        div.footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>

    {{-- Navbar Atas --}}
    <nav class="navbar navbar-expand-lg navbar-primary bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard.admin') }}">Perpus Admin</a>
            <div class="d-flex">
                <span class="nav-link">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="ms-3">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    <div class="sidebar">
        <ul class="nav flex-column px-3">
            <li class="nav-item"><a href="{{ route('dashboard.admin') }}" class="nav-link">📊 Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link">Kelola Manajemen Buku</a></li>
            <li class="nav-item"><a href="{{ route('anggotas.index') }}" class="nav-link">Manajemen Anggota</a></li>
            <li class="nav-item"><a href="{{ route('peminjaman.index') }}" class="nav-link">Kelola Peminjaman Buku</a></li>
        </ul>
    </div>

    {{-- Konten Halaman --}}
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
