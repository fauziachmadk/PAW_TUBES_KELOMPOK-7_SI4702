<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <img src="{{ asset('storage/images/TelkomLogo.png') }}" alt="Logo" class="mx-auto d-block mb-3" style="width: 300px;">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Login Perpustakaan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <footer>
            &copy; {{ date('M-Y') }} Pengembangan Aplikasi Website - Tugas Besar Kelompok 7
        </footer>
    </div>
</div>
</body>
</html>
