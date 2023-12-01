<?php

$id_ongkir = $_GET['hapus_ongkir'];
$koneksi->query("delete from ongkir where id_ongkir='$id_ongkir'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?ongkir';</script>";
?>