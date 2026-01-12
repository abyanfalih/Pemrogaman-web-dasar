<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar p-0">
                <div class="sidebar-brand">
                    <i class="fas fa-book-reader me-2"></i> E-Perpus
                </div>
                <ul class="nav flex-column px-2">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo !isset($_GET['page']) ? 'active' : ''; ?>">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=anggota" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page']=='anggota') ? 'active' : ''; ?>">
                            <i class="fas fa-users me-2"></i> Data Anggota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=buku" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page']=='buku') ? 'active' : ''; ?>">
                            <i class="fas fa-book me-2"></i> Data Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=transaksi" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page']=='transaksi') ? 'active' : ''; ?>">
                            <i class="fas fa-exchange-alt me-2"></i> Transaksi
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a href="logout.php" class="nav-link text-danger bg-light bg-opacity-10">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 content-wrapper">
                <div class="d-md-none mb-3 p-3 bg-white rounded shadow-sm d-flex justify-content-between">
                    <span class="fw-bold text-primary">E-Perpus Mobile</span>
                    <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i></a>
                </div>

                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if ($page == 'anggota') {
                        include 'anggota.php';
                    } elseif ($page == 'buku') {
                        include 'buku.php';
                    } elseif ($page == 'transaksi') {
                        include 'transaksi.php';
                    }
                } else {
                    // Dashboard Home Content
                ?>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5>Total Buku</h5>
                                    <h2>
                                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tabel_buku")); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5>Total Anggota</h5>
                                    <h2>
                                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM anggota")); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5>Sedang Dipinjam</h5>
                                    <h2>
                                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status_peminjaman='dipinjam'")); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info mt-4">
                        <h4 class="alert-heading">Selamat Datang, Admin!</h4>
                        <p>Silakan gunakan menu di samping (atau di atas jika versi mobile) untuk mengelola data perpustakaan.</p>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>