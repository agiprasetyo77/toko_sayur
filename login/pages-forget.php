<?php
require('../config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);

    // Cek apakah email terdaftar di database
    $query = "SELECT * FROM mlijo WHERE email='$email'";
    $ambil = $koneksi->query("select * from admin");

    if (mysqli_num_rows($result) > 0) {
        // Generate token untuk verifikasi
        $token = bin2hex(random_bytes(32));

        // Update token ke dalam database
        $updateQuery = "UPDATE users SET reset_token='$token' WHERE email='$email'";
        mysqli_query($koneksi, $updateQuery);

        // Kirim email verifikasi
        $to = $email;
        $subject = "Reset Password";
        $message = "Silakan klik link berikut untuk mereset password Anda: \n";
        $message .= "http://localhost/reset-password.php?email=$email&token=$token";
        $headers = "From: webmaster@example.com";

        email($to, $subject, $message, $headers);

        echo "Email verifikasi telah dikirim. Silakan cek email Anda.";
    } else {
        echo "Email tidak terdaftar di database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
        <title>Forgot Password</title>
    </head>

<body>
    <h2>Lupa Password</h2>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Kirim Verifikasi</button>
    </form>
</body>

</html>
