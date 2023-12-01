<?php
// update_data.php
include('../config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari permintaan
    global $koneksi;
    $id = $_POST["id"];
    $jumlah = $_POST["jumlah"];
    $subtotal = $_POST["subtotal"];

    // Lakukan pengolahan update data di database sesuai kebutuhan Anda
    

    $data = "UPDATE `keranjang` SET `jumlah` = '$jumlah', `sub_total` = '$subtotal' WHERE `keranjang`.`id_keranjang` = '$id';";

    mysqli_query($koneksi, $data);
    return mysqli_affected_rows($koneksi);

    echo "Data berhasil diupdate";
} else {
    echo "Metode permintaan tidak valid";
}
?>
