<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Sederhana</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f6f8f6ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Agar padding tidak melebarkan elemen */
        }
        button {
            width: 100%;
            background-color: #5cb85c;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Buku Tamu</h2>
        <form action="proses.php" method="post">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama Anda">
            </div>

            <div class="form-group">
                <label for="email">Alamat Email:</label>
                <input type="email" id="email" name="email" required placeholder="contoh@email.com">
            </div>

            <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" rows="4" required placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>

            <button type="submit">Kirim Pesan</button>
        </form>
    </div>

</body>
</html>