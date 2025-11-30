<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Gen-Z: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a052d, #2b0947, #3e0a63);
            background-size: 300% 300%;
            animation: bgMove 12s ease infinite;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: #eae0ff;
        }

        @keyframes bgMove {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .container {
            margin-top: 80px;
        }

        .card {
            border-radius: 18px;
            background: rgba(90, 25, 140, 0.22);
            backdrop-filter: blur(15px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.1) !important;
            color: #e8d4ff !important;
            border-top-left-radius: 18px !important;
            border-top-right-radius: 18px !important;
            text-align: center;
            font-weight: 700;
            font-size: 1.6rem;
            padding: 20px;
            letter-spacing: 0.5px;
            text-shadow: 0 0 8px rgba(162, 93, 255, 0.9);
        }

        .list-group-item {
            background: transparent !important;
            border: 0 !important;
            padding: 15px 20px;
            color: #eae0ff;
            font-size: 1.14rem;
            transition: 0.2s;
            border-radius: 12px;
            font-weight: 500;
        }

        .list-group-item:hover {
            background: rgba(188, 111, 255, 0.22) !important;
            transform: translateX(6px) scale(1.02);
            box-shadow: 0 0 12px rgba(170, 85, 255, 0.55);
        }

        .list-group-item a {
            color: #f5e8ff !important;
            text-decoration: none;
        }

        .logout-btn {
            border-radius: 12px;
            padding: 10px 28px;
            font-size: 1rem;
            font-weight: 600;
            background: #b124ff;
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(178, 46, 255, 0.6);
            transition: 0.3s ease;
            letter-spacing: 0.3px;
        }

        .logout-btn:hover {
            background: #9b1ce6;
            transform: scale(1.07) translateY(-2px);
            box-shadow: 0 6px 22px rgba(178, 46, 255, 0.9);
        }

        .footer-text {
            color: #d8c4ff;
            margin-top: 20px;
            font-size: 0.88rem;
            font-weight: 400;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            📚 Aplikasi Perpustakaan FTIK USM
        </div>

        <div class="card-body">
            <p class="text-center font-weight-bold mb-3">Pilih menu berikut:</p>

            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ url('buku') }}">📖 Kelola Data Buku</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('anggota') }}">👥 Kelola Data Anggota</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('pinjam') }}">📦 Kelola Transaksi Peminjaman</a>
                </li>
            </ul>

            <div class="text-center mt-4">
                <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn logout-btn">
                        🚪 Logout
                    </button>
                </form>
            </div>

            <p class="text-center footer-text">© 2025 Perpustakaan FTIK USM</p>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
