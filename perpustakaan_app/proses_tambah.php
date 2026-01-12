<?php
include 'koneksi.php';

$type = $_POST['type'];

if ($type == 'anggota') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO anggota (nama, alamat) VALUES ('$nama', '$alamat')");
    header("location:index.php?page=anggota");

} elseif ($type == 'buku') {
    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    mysqli_query($koneksi, "INSERT INTO tabel_buku (kode_buku, judul_buku, penulis) VALUES ('$kode', '$judul', '$penulis')");
    header("location:index.php?page=buku");
}
?>