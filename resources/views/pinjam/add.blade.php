<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pinjam Buku</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { background:#110421; font-family:"Plus Jakarta Sans",sans-serif; color:#f5eaff; }
        .card { border-radius:22px; background:#22093d; box-shadow:0 10px 40px rgba(0,0,0,0.45); overflow:hidden; }
        .card-header { background: linear-gradient(135deg,#7b2cbf,#a855f7); padding:22px; font-weight:700; font-size:26px; border-bottom:3px solid #d8b4fe; }
        .card-body { padding:22px; }

        label { color:#f0e6ff; font-weight:600; }
        .form-control { background:#351449; color:#fff; border:1px solid #6a4ea7; border-radius:10px; }
        .form-control:focus { background:#3e165f; border-color:#caa7ff; box-shadow:0 0 10px rgba(170,108,255,0.25); color:#fff; }

        .btn-edgy { padding:8px 16px; font-weight:700; border:none; border-radius:10px; margin:4px 6px; }
        .btn-save { background: linear-gradient(135deg,#7b2fff,#c737ff); color:#fff; box-shadow:0 0 12px #a455ff; }
        .btn-save:hover { transform:scale(1.03); box-shadow:0 0 20px #c16bff; }

        .btn-reset { background:#5e3faf; color:#fff; }
        .btn-reset:hover { background:#7c52e5; }

        .btn-back { background:#5e3faf; color:#fff; font-weight:700; border-radius:8px; }
        .btn-back:hover { background:#7c52e5; }

        .alert { border-radius:8px; }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header text-white">
            📘 Form Peminjaman Buku
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <form action="{{ url('pinjam/save') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="ID_Anggota">👤 Anggota</label>
                    <select name="ID_Anggota" id="ID_Anggota" class="form-control" required>
                        <option value="">- Pilih Anggota -</option>
                        @foreach ($optanggota as $key => $value)
                            <option value="{{ $key }}" {{ old('ID_Anggota') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ID_Buku">📖 Buku</label>
                    <select name="ID_Buku" id="ID_Buku" class="form-control" required>
                        <option value="">- Pilih Buku -</option>
                        @foreach ($optbuku as $key => $value)
                            <option value="{{ $key }}" {{ old('ID_Buku') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tgl_pinjam">📅 Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="{{ old('tgl_pinjam') }}" required>
                </div>

                <div class="form-group">
                    <label for="tgl_kembali">📆 Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" value="{{ old('tgl_kembali') }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn-edgy btn-save">💾 Simpan</button>
                    <button type="reset" class="btn-edgy btn-reset">🔄 Batal</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="{{ url('perpus') }}" class="btn btn-back">🏠 Kembali ke Menu</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
