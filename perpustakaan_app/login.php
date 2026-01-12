<?php
session_start();
include 'koneksi.php';

// (Logika PHP Login Tetap Sama seperti sebelumnya...)
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }
        .card-login {
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .login-header {
            background: #fff;
            padding: 30px 20px 10px;
            text-align: center;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    
    <div class="col-md-4 col-sm-10">
        <div class="card card-login">
            <div class="login-header">
                <h3 class="text-primary fw-bold">E-PERPUS</h3>
                <p class="text-muted">Silakan login untuk masuk</p>
            </div>
            <div class="card-body p-4 bg-white">
                
                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger text-center">Email/Password Salah!</div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label text-secondary small">EMAIL ADDRESS</label>
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="admin@admin.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-secondary small">PASSWORD</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="******" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100 btn-lg shadow">MASUK SISTEM</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>