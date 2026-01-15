<?php
    require 'koneksi.php';
    $prodi = mysqli_query($koneksi,"SELECT * FROM prodi");
?>
<form method="POST" action="proses.php">
    <div class="container">
        <h3 class="mt-3">Tambah Data Mahasiswa</h3>

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_mhs" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select name="id_prodi" class="form-control" required>
                <option value="">-- Pilih Program Studi --</option>
                <?php while ($row = mysqli_fetch_assoc($prodi)) { ?>
                    <option value="<?= $row['id']; ?>">
                        <?= $row['nama_prodi']; ?> (<?= $row['jenjang']; ?>)
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <button type="submit" name="submit_mahasiswa" class="btn btn-primary">Submit</button>
        <a href="index.php?page=mahasiswa" class="btn btn-outline-secondary">Kembali</a>
    </div>
</form>