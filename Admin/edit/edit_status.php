<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);
if (isset($_POST['simpan'])) {
    $status = $_POST['status'];
    $id = $_POST['id_pembelian'];

    $query = "UPDATE pembelian SET status_pembayaran= '" . $status . "' WHERE id_pembelian = '" . $id . "'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('data berhasil diubah');</script>";
        echo "<script>location='../index.php?pembelian ';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
