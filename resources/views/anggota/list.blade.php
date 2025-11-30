<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>

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

    table { color:#fff; font-size:15px; }
    thead { background:#3b0e63; color:#f1d9ff; font-weight:700; }
    tbody tr:hover { background:#4a1a7d; transition:.2s; }
    tbody td { border-color: #4e2b7d; color:#f5eaff; }

    .btn-edgy { padding:8px 16px; font-weight:700; border:none; border-radius:10px; margin:4px 6px; }
    .btn-add { background: linear-gradient(135deg, #7b2fff, #c737ff); color:#fff; box-shadow:0 0 12px #a455ff; }
    .btn-add:hover { transform:scale(1.07); box-shadow:0 0 22px #c16bff; }

    .btn-edit { background: linear-gradient(135deg, #ffb13d, #ff8400); color:#2b0f00; box-shadow:0 0 12px #ff9a2a; }
    .btn-edit:hover { transform: scale(1.07); box-shadow: 0 0 20px #ffb457; }

    .btn-delete { background: linear-gradient(135deg, #ff3b3b, #c10000); color:#fff; box-shadow:0 0 12px #ff4d4d; }
    .btn-delete:hover { transform: scale(1.07); box-shadow:0 0 20px #ff6b6b; }

    .table-action { display:inline-flex; gap:12px; justify-content:center; }

    .btn-back { background:#5e3faf; color:#fff; font-weight:700; border-radius:8px; }
    .btn-back:hover { background:#7c52e5; }

    .pagination li a, .pagination span { background:#3d165f !important; color:white !important; border:none !important; }
    .pagination .active span { background:#7c3aed !important; }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center text-white">
            <h2 class="mb-0">👥 Daftar Anggota</h2>
            <a href="{{ url('anggota/add') }}" class="btn-edgy btn-add btn-sm">+ Tambah Anggota</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th style="width:60px;">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Progdi</th>
                            <th style="width:160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($query as $row)
                        <tr>
                            <td class="text-center">
                                {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                            </td>
                            <td>{{ $row->nim }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $optprogdi[$row->progdi] ?? $row->progdi }}</td>
                            <td class="text-center">
                                <div class="table-action">
                                    <a href="{{ url('anggota/edit/'.$row->ID_Anggota) }}" class="btn-edgy btn-edit btn-sm">Edit</a>

                                    <a href="{{ url('anggota/delete/'.$row->ID_Anggota) }}"
                                       class="btn-edgy btn-delete btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data anggota.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="{{ url('/perpus') }}" class="btn btn-back btn-sm">← Kembali ke Home</a>
                <div>{{ $query->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
