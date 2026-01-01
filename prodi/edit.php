<?php
require 'koneksi.php';

$id = $_GET['id'];  // <-- ambil id dari URL

// ambil data berdasarkan id
$tampil = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id='$id'");
$data = mysqli_fetch_assoc($tampil);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div>
    <h2>Edit Data Prodi</h2>

    <form action="proses.php" method="post">

        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="mb-3">
            <label for="nama_prodi" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= $data['nama_prodi'] ?>">
        </div>

         <div class="mb-3">
            <label class="form-label">Jenjang</label>
            <select class="form-control" name="jenjang" id="jenjang" required>
                <option value="">-- Pilih Jenjang --</option>
                <option value="D2" <?= ($data['jenjang']=='D2')?'selected':''; ?>>D2</option>
                <option value="D3" <?= ($data['jenjang']=='D3')?'selected':''; ?>>D3</option>
                <option value="D4" <?= ($data['jenjang']=='D4')?'selected':''; ?>>D4</option>
                <option value="S2   " <?= ($data['jenjang']=='S2')?'selected':''; ?>>S2</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?>">
        </div>
        <button type="submit" name="updatep" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

</body>
</html>
