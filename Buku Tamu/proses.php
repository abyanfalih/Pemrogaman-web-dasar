<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diterima</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
            border-top: 5px solid #5cb85c;
        }
        h2 {
            color: #333;
            margin-top: 0;
        }
        .result-item {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .result-item:last-child {
            border-bottom: none;
        }
        strong {
            color: #555;
            display: inline-block;
            width: 80px;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #5cb85c;
            font-weight: bold;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="card">
        <?php
        // 1. Memeriksa apakah data dikirim menggunakan metode POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // 2. Mengambil dan membersihkan data (Sanitasi)
            // htmlspecialchars() mengubah karakter khusus menjadi entitas HTML untuk mencegah XSS
            $nama = htmlspecialchars($_POST['nama']);
            $email = htmlspecialchars($_POST['email']);
            $pesan = htmlspecialchars($_POST['pesan']);

            // 3. Menampilkan Data Kembali
            echo "<h2>Terima Kasih!</h2>";
            echo "<p>Data Anda telah berhasil kami terima. Berikut adalah detailnya:</p>";
            
            echo "<div class='result-item'><strong>Nama:</strong> $nama</div>";
            echo "<div class='result-item'><strong>Email:</strong> $email</div>";
            echo "<div class='result-item'><strong>Pesan:</strong> $pesan</div>";

        } else {
            // Jika seseorang mencoba mengakses file ini secara langsung tanpa submit form
            echo "<h2 class='error'>Akses Ditolak</h2>";
            echo "<p class='error'>Silakan isi formulir terlebih dahulu.</p>";
        }
        ?>

        <br>
        <a href="index.php" class="btn-back">&larr; Kembali ke Form</a>
    </div>

</body>
</html>