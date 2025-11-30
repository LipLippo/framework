<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #110421;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: #f5eaff;
        }

        .card {
            border-radius: 22px;
            background: #22093d;
            box-shadow: 0 10px 40px rgba(0,0,0,0.45);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #7b2cbf, #a855f7);
            padding: 22px;
            font-weight: 700;
            font-size: 26px;
            border-bottom: 3px solid #d8b4fe;
        }

        .card-body { padding: 22px; }

        label { color: #f0e6ff; font-weight: 600; }

        .form-control {
            background: #351449;
            color: #fff;
            border: 1px solid #6a4ea7;
            border-radius: 10px;
        }
        .form-control:focus {
            background: #3e165f;
            border-color: #caa7ff;
            box-shadow: 0 0 10px rgba(170,108,255,0.25);
            color: #fff;
        }

        .btn-edgy { padding: 8px 16px; font-weight:700; border-radius:10px; border:none; margin:4px 6px; }
        .btn-primary-edgy { background: linear-gradient(135deg, #7b2fff, #c737ff); color:#fff; box-shadow:0 0 12px #a455ff; }
        .btn-primary-edgy:hover { transform: scale(1.03); box-shadow:0 0 20px #c16bff;}
        .btn-secondary-edgy { background:#5e3faf; color:#fff; }
        .btn-secondary-edgy:hover { background:#7c52e5; }

        .alert { border-radius: 10px; }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header text-white">
            ✏️ Form Edit Anggota
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

            <form action="{{ url('anggota/save') }}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $query->ID_Anggota }}">
                <input type="hidden" name="is_update" value="{{ $is_update ?? 1 }}">

                <div class="form-group">
                    <label for="nim">🆔 NIM</label>
                    <input type="text"
                           name="nim"
                           id="nim"
                           class="form-control"
                           value="{{ $query->NIM }}"
                           maxlength="20"
                           required>
                </div>

                <div class="form-group">
                    <label for="nama">👤 Nama</label>
                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="{{ $query->Nama }}"
                           maxlength="100"
                           required>
                </div>

                <div class="form-group">
                    <label for="progdi">🎓 Program Studi</label>
                    <select name="progdi" id="progdi" class="form-control" required>
                        @foreach ($optprogdi as $key => $value)
                            <option value="{{ $key }}" {{ $query->Progdi == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn-edgy btn-primary-edgy">
                        💾 Update
                    </button>
                    <a href="{{ url('anggota') }}" class="btn-edgy btn-secondary-edgy">⬅️ Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
