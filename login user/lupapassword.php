<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Mlijo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h3>Lupa Password</h3>
                <hr>
                
                <label for="">Email</label>
                <input type="text" placeholder="example@gmail.com" name="email_pelanggan">
                <label for="">Password</label>
                <input type="password" placeholder="Password" name="password_pelanggan">
                <button name="pelanggan">update</button>
                <p>
                    <a href="index.php">kembali</a>
                </p>
            </form>
        </div>
        <div class="right">
            <img src="assets/login.png" alt="">
        </div>
    </div>
</body>

</html>

<?php
session_start();
require('../config/koneksi.php');

// Cek apakah formulir telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pelanggan"])) {
    // Ambil data dari formulir
    $email_pelanggan = $_POST["email_pelanggan"];
    $password_pelanggan = $_POST["password_pelanggan"];

    // Validasi data jika diperlukan

    // Hash password sebelum menyimpan ke database (Anda dapat menggunakan metode hashing yang lebih aman)
    $hashed_password = password_hash($password_pelanggan, PASSWORD_DEFAULT);

    try {
        // Membuat koneksi ke database menggunakan PDO
        $dsn = "mysql:host=localhost;dbname=mlijo";
        $username = "root";
        $password = "";
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $pdo = new PDO($dsn, $username, $password, $options);

        // Persiapkan dan jalankan statement SQL untuk melakukan pembaruan
        $stmt = $pdo->prepare("UPDATE `pelanggan` SET `password_pelanggan` = :password_pelanggan WHERE `email_pelanggan` = :email_pelanggan");

        // Bind parameter ke statement
        $stmt->bindParam(":password_pelanggan", $password_pelanggan);
        $stmt->bindParam(":email_pelanggan", $email_pelanggan);

        // Eksekusi statement
        $stmt->execute();

        // Tampilkan pesan sukses atau redirect ke halaman lain jika diperlukan
        echo "Data berhasil diperbarui.";

    } catch (PDOException $e) {
        // Tangani kesalahan jika terjadi
        echo "Error: " . $e->getMessage();
    }

    session_destroy();

echo "<script>alert('Passwowrd telah di ubah');</script>";
echo "<script>window.location.href = 'index.php';</script>";
}
?>

