<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { background: #1a0b2e; color: #e9e9e9; font-family: "Plus Jakarta Sans"; }
        .card { border-radius: 18px; background: #2b0f47; color: white; box-shadow: 0 8px 25px rgba(0,0,0,0.3); }
        .card-header { background: #6a0dad; border-radius: 18px 18px 0 0; text-align: center; font-weight: 700; }
        .form-control { background: #3d165f; border: 1px solid #663399; color: white; }
        .form-control:focus { background: #46206a; border-color: #aa6cff; box-shadow: 0 0 10px rgba(170,108,255,0.6); }
        .btn-custom { border-radius: 12px; padding: 10px 18px; font-weight: 600; }
        .btn-primary { background: #8a2be2; border: none; }
        .btn-primary:hover { background: #a855f7; }
        .btn-secondary { background: #3a245c; border: none; }
        .btn-secondary:hover { background: #51337d; }
    </style>
</head>

<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header">✏️ Edit Data Buku</div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger"><ul>
                    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul></div>
            @endif

            <form action="{{ url('buku/save') }}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $query->ID_Buku }}">
                <input type="hidden" name="is_update" value="{{ $is_update ?? 1 }}">

                <div class="form-group">
                    <label>📖 Judul Buku</label>
                    <input type="text" name="Judul" class="form-control"
                           value="{{ $query->Judul }}" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label>✍️ Pengarang</label>
                    <input type="text" name="Pengarang" class="form-control"
                           value="{{ $query->Pengarang }}" maxlength="150" required>
                </div>

                <div class="form-group">
                    <label>🏷️ Kategori</label>
                    <select name="Kategori" class="form-control">
                        @foreach ($optkategori as $key => $value)
                            <option value="{{ $key }}" {{ $query->Kategori == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary btn-custom">💾 Simpan Perubahan</button>
                    <a href="{{ url('buku') }}" class="btn btn-secondary btn-custom">⬅️ Kembali</a>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>
