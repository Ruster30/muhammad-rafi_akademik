<?php
require 'koneksi.php';

$nim = $_GET['nim'];  // <-- ambil id dari URL

// ambil data berdasarkan id
$tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_assoc($tampil);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div>
    <h2>Edit Data Mahasiswa</h2>

    <form action="proses.php" method="post">

         <!-- simpan NIM lama buat WHERE -->
        <input type="hidden" name="nim_lama" value="<?= $data['nim'] ?>">

        <div class="mb-3">
            <label for="nim" class="form-label">NIM Baru</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
        </div>

        <div class="mb-3">
            <label for="nama_mhs" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $data['nama_mhs'] ?>">
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

</body>
</html>
