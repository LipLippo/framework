<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Google Font -->
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

    /* ===== TABLE ===== */

    table {
        width: 100%;
        color: #ffffff !important;
        font-size: 15px;
    }

    thead {
        background: #3b0e63;
        color: #f1d9ff;
        font-weight: 700;
    }

    thead th {
        border-color: #6a4ea7 !important;
    }

    tbody td {
        color: #f5eaff;
        border-color: #4e2b7d !important;
    }

    tbody tr:hover {
        background: #4a1a7d;
        transition: 0.2s ease;
    }

    /* ===== EDGY GEN-Z BUTTONS ===== */

    .btn-edgy {
        padding: 8px 16px;
        font-weight: 700;
        border: none;
        color: white;
        border-radius: 10px;
        transition: 0.25s ease;
        letter-spacing: 0.4px;
        text-shadow: 0 0 4px rgba(0,0,0,0.6);
        margin: 4px 5px; /* Jarak antar tombol */
    }

    /* Add Buku */
    .btn-add {
        background: linear-gradient(135deg, #7b2fff, #c737ff);
        box-shadow: 0 0 12px #a455ff;
    }
    .btn-add:hover {
        transform: scale(1.07);
        box-shadow: 0 0 22px #c16bff;
    }

    /* Edit */
    .btn-edit {
        background: linear-gradient(135deg, #ffb13d, #ff8400);
        box-shadow: 0 0 12px #ff9a2a;
    }
    .btn-edit:hover {
        transform: scale(1.07);
        box-shadow: 0 0 20px #ffb457;
    }

    /* Hapus */
    .btn-delete {
        background: linear-gradient(135deg, #ff3b3b, #c10000);
        box-shadow: 0 0 12px #ff4d4d;
    }
    .btn-delete:hover {
        transform: scale(1.07);
        box-shadow: 0 0 20px #ff6b6b;
    }

    /* Kolom aksi rapi */
    .table-action {
        display: inline-flex;
        gap: 12px;       /* Jarak antar tombol */
        justify-content: center;
    }

    /* Back button */
    .btn-back {
        background: #5e3faf;
        color: white;
        font-weight: 700;
        border-radius: 8px;
    }
    .btn-back:hover {
        background: #7c52e5;
    }

    /* Pagination */
    .pagination li a,
    .pagination span {
        background: #3d165f !important;
        color: white !important;
        border: none !important;
    }

    .pagination .active span {
        background: #7c3aed !important;
    }
</style>
</head>


<body>

<div class="container my-5">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center text-white">
            <h2 class="mb-0">📖 Daftar Buku</h2>

            <!-- Tambah Buku -->
            <a href="{{ url('buku/add') }}" class="btn-edgy btn-add btn-sm">
                + Tambah Buku
            </a>
        </div>


        <div class="card-body">

            <!-- TABEL -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($query as $row)
                        <tr>
                            <td class="text-center">
                                {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                            </td>
                            <td>{{ $row['Judul'] }}</td>
                            <td>{{ $row['Pengarang'] }}</td>
                            <td>{{ $optkategori[$row['Kategori']] ?? '-' }}</td>

                            <td class="text-center">

                                <div class="table-action">

                                    <!-- EDIT -->
                                    <a href="{{ url('buku/edit/'.$row['ID_Buku']) }}"
                                       class="btn-edgy btn-edit btn-sm">
                                       Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <a href="{{ url('buku/delete/'.$row['ID_Buku']) }}"
                                       class="btn-edgy btn-delete btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                       Hapus
                                    </a>

                                </div>

                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Tidak ada data buku.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>


            <!-- FOOTER -->
            <div class="d-flex justify-content-between align-items-center mt-3">

                <a href="{{ url('/perpus') }}" class="btn btn-back btn-sm">
                    ← Kembali ke Home
                </a>

                <div>
                    {{ $query->links('pagination::bootstrap-4') }}
                </div>

            </div>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
    