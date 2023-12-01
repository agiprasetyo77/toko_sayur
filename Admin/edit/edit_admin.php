<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['name'];
    $username = $_POST['usera'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $foto = $_FILES['foto'];
    $fotoName = $foto['name'];

    $fotoFileName = '';

    if ($foto['size'] > 0) {
        $targetDirectory = 'C:\xampp\htdocs\Mlijo-main\Admin\images\foto_admin\\';
        $fotoFileName = $targetDirectory . basename($foto['name']);

        if (move_uploaded_file($foto['tmp_name'], $fotoFileName)) {
            // File berhasil diupload
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    // $query = "UPDATE admin SET nama_lengkap='$fullname', username='$username', password='$password', email='$email', foto_admin='$fotoFileName' WHERE id_admin='$id'";

    $query = ("UPDATE admin SET nama_lengkap='$fullname', username='$username', password='$password', email='$email', foto_admin='$fotoName' WHERE id_admin='$id'");
    $result = mysqli_query($koneksi, $query);


    if ($result) {

        header('Location: ../admin.php');
    } else {

        echo "Error: " . mysqli_error($koneksi);
    }
}