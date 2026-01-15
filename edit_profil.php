<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'koneksi.php';

$email = $_SESSION['email'] ?? '';

$data = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
$user = $data->fetch_assoc();

if(!$user){
    echo "<div class='alert alert-danger'>Data pengguna tidak ditemukan.</div>";
    exit;
}

if(isset($_POST['update'])){

    $nama = htmlspecialchars($_POST['nama_lengkap']);
    $password = $_POST['password'];

    if(!empty($password)){
        $pass = md5($password);
        $query = "UPDATE pengguna SET nama_lengkap='$nama', password='$pass' WHERE email='$email'";
    } else {
        $query = "UPDATE pengguna SET nama_lengkap='$nama' WHERE email='$email'";
    }

    $koneksi->query($query);

    echo "<script>
            alert('Profil berhasil diperbarui');
            window.location='index.php?page=home';
          </script>";
}
?>

<h4 class="mb-4">Edit Profil</h4>

<form method="POST">

    <div class="mb-3">
        <label>Email (tidak dapat diubah)</label>
        <input type="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required
               value="<?= htmlspecialchars($user['nama_lengkap']); ?>">
    </div>

    <div class="mb-3">
        <label>Password Baru (kosongkan jika tidak ingin ganti)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button name="update" class="btn btn-primary">Simpan Perubahan</button>

</form>