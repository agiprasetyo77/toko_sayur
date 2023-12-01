<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);
if (isset($_POST["simpann"])) {
    $id_ongkir = $_POST["id_ongkir"];
    // var_dump($id_ongkir);
    $nama_jalan = $_POST['nama_jalan'];
    $tarif = $_POST['tarif'];

    $query = "UPDATE ongkir SET 
            nama_jalan = '" . $nama_jalan . "', 
            tarif = '" . $tarif . "' 
            WHERE id_ongkir = '" . $id_ongkir . "'";


    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('data berhasil diubah');</script>";
        echo "<script>location='../index.php?ongkir ';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}


?>