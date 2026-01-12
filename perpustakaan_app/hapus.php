<?php
include 'koneksi.php';

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'anggota') {
    mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");
    header("location:index.php?page=anggota");
} elseif ($type == 'buku') {
    mysqli_query($koneksi, "DELETE FROM tabel_buku WHERE id_buku='$id'");
    header("location:index.php?page=buku");
}
?>