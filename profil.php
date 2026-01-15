<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'] ?? '';

$data = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
$user = $data->fetch_assoc();

if(!$user){
    echo "<div class='alert alert-danger'>Data profil tidak ditemukan.</div>";
    exit;
}
?>

<h4 class="mb-4">Profil Saya</h4>

<table class="table table-bordered w-50">
    <tr>
        <th width="40%">Email</th>
        <td><?= htmlspecialchars($user['email']); ?></td>
    </tr>
    <tr>
        <th>Nama Lengkap</th>
        <td><?= htmlspecialchars($user['nama_lengkap']); ?></td>
    </tr>
</table>

<a href="index.php?page=editprofil" class="btn btn-primary btn-sm">
    Edit Profil
</a>