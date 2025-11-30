<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Google Font Gen-Z -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #1a0b2e;
            color: #e9e9e9;
            font-family: "Plus Jakarta Sans", sans-serif;
        }
        .card {
            border-radius: 18px;
            background: #2b0f47;
            color: #fff;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .card-header {
            background: #6a0dad;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
            font-weight: 700;
            text-align: center;
        }
        label {
            font-weight: 500;
        }
        .form-control {
            background: #3d165f;
            color: #fff;
            border: 1px solid #663399;
        }
        .form-control:focus {
            background: #46206a;
            color: #fff;
            border-color: #aa6cff;
            box-shadow: 0 0 10px rgba(170,108,255,0.6);
        }
        .btn-custom {
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 600;
        }
        .btn-success {
            background: #8a2be2;
            border: none;
        }
        .btn-success:hover {
            background: #a855f7;
        }
        .btn-secondary {
            background: #3a245c;
            border: none;
        }
        .btn-secondary:hover {
            background: #51337d;
        }
    </style>
</head>

<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            📚 Form Tambah Buku
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('buku/save') }}" method="POST">
                @csrf

                <input type="hidden" name="id">
                <input type="hidden" name="is_update" value="{{ $is_update }}">

                <div class="form-group">
                    <label for="Judul">📖 Judul Buku</label>
                    <input type="text" name="Judul" id="Judul" class="form-control"
                           placeholder="Masukkan judul buku"
                           value="{{ old('Judul') }}" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="Pengarang">✍️ Pengarang</label>
                    <input type="text" name="Pengarang" id="Pengarang" class="form-control"
                           placeholder="Masukkan nama pengarang"
                           value="{{ old('Pengarang') }}" maxlength="150" required>
                </div>

                <div class="form-group">
                    <label for="Kategori">🏷️ Kategori</label>
                    <select name="Kategori" id="Kategori" class="form-control" required>
                        @foreach ($optkategori as $key => $value)
                            <option value="{{ $key }}" {{ old('Kategori') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-custom">💾 Simpan</button>
                    <a href="{{ url('buku') }}" class="btn btn-secondary btn-custom">⬅️ Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
