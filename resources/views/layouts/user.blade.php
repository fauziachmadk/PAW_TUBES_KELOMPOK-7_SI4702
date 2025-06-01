{{-- resources/views/layouts/user.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anggota - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('anggota.index') }}">Perpus Anggota</a>
            <div class="d-flex ms-auto">
                <span class="nav-link text-white">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="ms-3">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
