<?php
include 'koneksi.php';
$id   = $_GET['id'];
$type = $_GET['type'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="card col-md-6 mx-auto">
        <div class="card-header bg-warning">
            <h5>Edit Data <?php echo ucfirst($type); ?></h5>
        </div>
        <div class="card-body">
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="type" value="<?php echo $type; ?>">

                <?php if ($type == 'anggota') {
                    $data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $d['id_anggota']; ?>">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required><?php echo $d['alamat']; ?></textarea>
                    </div>
                <?php } } ?>

                <?php if ($type == 'buku') {
                    $data = mysqli_query($koneksi, "SELECT * FROM tabel_buku WHERE id_buku='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $d['id_buku']; ?>">
                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" value="<?php echo $d['kode_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?php echo $d['judul_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="<?php echo $d['penulis']; ?>" required>
                    </div>
                <?php } } ?>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>