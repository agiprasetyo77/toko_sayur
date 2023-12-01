<?php
session_start();
require('../config/koneksi.php');

if (isset($_POST["kirimdaftar"])) {
    if (register($_POST) > 0) {
        echo "<script>location='index.php';</script>";
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
    <title>Register</title>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Registrasi</h2>
            <div class="content">
                <div class="input-box">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Enter nama" name="nama" required>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter your valid email address" name="email" required>
                </div>
                <div class="input-box">
                    <label for="telepon">Telepon</label>
                    <input type="tel" placeholder="Enter telepon" name="telepon" required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter new password" name="password" required>
                </div>
                <div class="input-box">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" placeholder="Confirm alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputPassword1" required>
                </div>
            </div>
            <div class="alert">
                <p>By clicking Sign Up, you agree to our <a href="#">Terms,</a><a href="#">Privacy Policy,</a> and<a href="#">Cookies Policy.</a>
                    You may receive SMS notifications from us and can opt out at any time</p>
            </div>
            <div class="button-container">
                <button type="submit" name="kirimdaftar">Register</button>
            </div>
        </form>
    </div>
</body>

</html>



<?php
// if (isset($_POST["pelanggan"])) {
//     // Pastikan session sudah dimulai di file lain

//     $nama = $_POST["nama_pelanggan"];
//     $email = $_POST["email_pelanggan"];
//     $telepon = $_POST["telepon_pelanggan"];
//     $password = password_hash($_POST["password_pelanggan"], PASSWORD_DEFAULT);
//     $addres = $_POST["alamat"];
//     $photo = $_POST["foto"]; // Jangan lupa untuk menangkap foto dengan $_FILES, bukan $_POST

//     // Pastikan variabel $caripelanggan sudah didefinisikan sebelumnya
//     // Saya asumsikan $caripelanggan adalah hasil dari query yang belum didefinisikan dalam potongan kode ini

//     // Lakukan query untuk menyisipkan data ke database
//     $daftar = query("INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `nama_pelanggan`, `foto_pelanggan`, `alamat`) 
//                      VALUES (NULL, '$email', '$password', '$telepon', '$nama', '$photo', '$addres');");
//         $upload = upload();
//         if (!$upload) {
//           return false;
//         }
//     if ($daftar) {
//         // set session
//         $_SESSION['nama_pelanggan'] = $nama;
//         $_SESSION['email_pelanggan'] = $email; // Menggunakan $daftar->insert_id untuk mendapatkan ID yang baru disisipkan
//         $_SESSION['foto'] = $foto;
//         $_SESSION['telepon_pelanggan'] = $telepon;
//         $_SESSION['password_pelanggan'] = $password;
//         $_SESSION['alamat'] = $addres;
//         $_SESSION['foto'] = $upload;
//         header("Location: /login user/index.php");
//     } else {
//         echo "<div class='alert alert-warning'>error</div>";
//     }
// }

// //upload foto 
// function upload()
// {
//   $namaFile = $_FILES['foto']['name'];
//   $ukuranFile = $_FILES['foto']['size'];
//   $error = $_FILES['foto']['error'];
//   $tmpName = $_FILES['foto']['tmp_name'];

//   // Cek apakah tidak ada gambar yang di upload
//   if ($error === 4) {
//     echo "<script>
//     alert('Pilih gambar terlebih dahulu');
//     </script>";
//     return false;
//   }

//   // Cek apakah gambar
//   $extensiValid = ['jpg', 'png', 'jpeg'];
//   $extensiGambar = explode('.', $namaFile);
//   $extensiGambar = strtolower(end($extensiGambar));

//   if (!in_array($extensiGambar, $extensiValid)) {
//     echo "<script>
//     alert('Yang anda upload bukan gambar!');
//     </script>";
//     return false;
//   }

//   if ($ukuranFile > 1000000) {
//     echo "<script>
//     alert('Ukuran Gambar Terlalu Besar!');
//     </script>";
//     return false;
//   }

//   $namaFileBaru = uniqid();
//   $namaFileBaru .= '.';
//   $namaFileBaru .= $extensiGambar;
//   // Move File
//   move_uploaded_file($tmpName, './img/' . $namaFileBaru);
//   return $namaFileBaru;
// }
?>