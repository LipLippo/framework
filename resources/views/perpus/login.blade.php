<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Perpustakaan - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Gen-Z: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a052d, #2d0a46, #421261);
            background-size: 300% 300%;
            animation: bgMove 14s ease infinite;
            font-family: "Plus Jakarta Sans", sans-serif;
            height: 100vh;
        }

        @keyframes bgMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.13);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.35);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.15);
        }

        h3 {
            font-weight: 700;
            color: #f2e5ff;
            text-shadow: 0px 0px 8px rgba(175, 95, 255, 0.6);
        }

        label {
            color: #e7d6ff;
            font-weight: 500;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff;
            border-radius: 10px;
            transition: 0.2s;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.22);
            border-color: #c084fc;
            box-shadow: 0 0 8px rgba(194, 84, 255, 0.9);
            color: #fff;
        }

        .btn-login {
            background: #b124ff;
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px;
            border-radius: 12px;
            transition: 0.3s ease;
            box-shadow: 0 4px 15px rgba(178, 46, 255, 0.6);
        }

        .btn-login:hover {
            background: #9b1be5;
            transform: scale(1.06);
            box-shadow: 0 6px 20px rgba(178, 46, 255, 0.8);
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-4">

                <div class="login-card">

                    <h3 class="text-center mb-4">🔐 Silahkan Login</h3>

                    <!-- Pesan error -->
                    @if(session('loginError'))
                        <div class="alert alert-danger text-center">
                            {{ session('loginError') }}
                        </div>
                    @endif

                    <!-- Pesan sukses logout -->
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                class="form-control" 
                                placeholder="Masukkan username"
                                required 
                                autofocus
                            >
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control" 
                                placeholder="Masukkan password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-login btn-block">
                            Login
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
