<?php 
    require 'koneksi.php';

    //insert Mahasiswa
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir= $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $prodi_id  = $_POST['id_prodi']; // dari form

        $query = "INSERT INTO mahasiswa (nim,  nama_mhs, tgl_lahir, alamat,prodi_is) VALUES ('$nim', '$nama_mhs','$tgl_lahir', '$alamat', '$id_prodi')";
        $sql = $koneksi->query($query);

        if ($sql){
        header('Location: index.php');
        } else {
            echo "Gagal simpan data";
        }
    }

    
    //delete
    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $sql = $koneksi->query($query);
        if ($sql) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menghapus data: ";
        }
    }
    
    if (isset($_POST['update'])) {

        $nim_lama = $_POST['nim_lama'];  // dipakai di WHERE
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE mahasiswa SET 
            nim='$nim',
            nama_mhs='$nama_mhs',
            tgl_lahir='$tgl_lahir',
            alamat='$alamat'
            WHERE nim='$nim_lama'";

        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal update: " . mysqli_error($koneksi);
        }
    }

    //insert Prodi
    if (isset($_POST['submitp'])) {
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang= $_POST['jenjang'];
        $keterangan = $_POST['keterangan'];

        $query = "INSERT INTO prodi (nama_prodi, jenjang, keterangan) VALUES ('$nama_prodi','$jenjang', '$keterangan')";
        $sql = $koneksi->query($query);

        if ($sql){
        header('Location: index.php');
        } else {
            echo "Gagal simpan data";
        }
    }

        //update prodi
      if (isset($_POST['updatep'])) {
        $id = $_POST['id'];
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang = $_POST['jenjang'];
        $keterangan = $_POST['keterangan'];

        $query = "UPDATE prodi SET 
            nama_prodi='$nama_prodi',
            jenjang='$jenjang',
            keterangan='$keterangan'
            WHERE id='$id'";

        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal update: " . mysqli_error($koneksi);
        }
    }

        //delete prodi
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM prodi WHERE id = '$id'";
        $sql = $koneksi->query($query);
        if ($sql) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menghapus data: ";
        }
    }

?>