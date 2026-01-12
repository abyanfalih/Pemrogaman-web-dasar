<?php
include 'koneksi.php';

$id_anggota = $_POST['id_anggota'];
$id_buku    = $_POST['id_buku'];
$tgl_pinjam = $_POST['tanggal_pinjam'];
// Tanggal kembali dikosongkan dulu, status otomatis 'dipinjam'

$query = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, status_peminjaman) 
          VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', 'dipinjam')";

if (mysqli_query($koneksi, $query)) {
    header("location:index.php?page=transaksi");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>