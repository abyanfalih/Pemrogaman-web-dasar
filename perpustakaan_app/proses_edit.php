<?php
include 'koneksi.php';

$type = $_POST['type'];
$id   = $_POST['id'];

if ($type == 'anggota') {
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Update data anggota
    mysqli_query($koneksi, "UPDATE anggota SET nama='$nama', alamat='$alamat' WHERE id_anggota='$id'");

    // Kembali ke halaman anggota
    header("location:index.php?page=anggota");

} elseif ($type == 'buku') {
    $kode    = $_POST['kode_buku'];
    $judul   = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];

    // Update data buku
    mysqli_query($koneksi, "UPDATE tabel_buku SET kode_buku='$kode', judul_buku='$judul', penulis='$penulis' WHERE id_buku='$id'");

    // Kembali ke halaman buku
    header("location:index.php?page=buku");
}
?>