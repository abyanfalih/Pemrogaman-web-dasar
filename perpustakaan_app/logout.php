<?php
session_start();

// Menghapus semua session
session_destroy();

// Mengarahkan kembali ke halaman login
header("location:login.php");
?>