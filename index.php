<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="index.php?page=home">
            <i class="bi bi-mortarboard-fill me-1"></i> Akademik
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($page=='home')?'active':'' ?>" href="index.php?page=home">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page=='datamahasiswa' || $page=='create' || $page=='edit')?'active':'' ?>"
                       href="index.php?page=datamahasiswa">
                        Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page=='dataprodi' || $page=='createp' || $page=='editp')?'active':'' ?>"
                       href="index.php?page=dataprodi">
                        Program Studi
                    </a>
                </li>
            </ul>

            <!-- User -->
            <div class="d-flex align-items-center">
                <a href="index.php?page=profil" class="btn btn-outline-light btn-sm me-2">
                    <i class="bi bi-person-fill"></i> <?= $_SESSION['username'] ?? 'Admin'; ?>
                </a>
                <a href="logout.php" class="btn btn-outline-light btn-sm">
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container my-4">
<?php
    if ($page == 'home') include 'home.php';
    if ($page == 'datamahasiswa') include 'mahasiswa/list.php';
    if ($page == 'create') include 'mahasiswa/create.php';
    if ($page == 'edit') include 'mahasiswa/edit.php';
    if ($page == 'dataprodi') include 'prodi/listp.php';
    if ($page == 'createp') include 'prodi/createp.php';
    if ($page == 'editp') include 'prodi/editp.php';
    if ($page == 'profil') include 'profil.php';
    if ($page == 'editprofil') include 'edit_profil.php';
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
