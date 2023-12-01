<?php
$id_produk = $_GET['hapus_produk'];
$koneksi->query("delete from produk where `id_produk`='$id_produk'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?produk';</script>";
?>