<?php
session_start();
session_unset();   // hapus semua data session
session_destroy(); // matiin session

header("Location: login.php"); // balik ke halaman login
exit();
?>