<?php
include 'koneksi.php';

$id_peminjaman = $_GET['id'];
$tgl_kembali   = date('Y-m-d'); // Mengambil tanggal hari ini

// Update status menjadi dikembalikan dan isi tanggal_kembali
$query = "UPDATE peminjaman SET 
          status_peminjaman='dikembalikan', 
          tanggal_kembali='$tgl_kembali' 
          WHERE id_peminjaman='$id_peminjaman'";

mysqli_query($koneksi, $query);

header("location:index.php?page=transaksi");
?>