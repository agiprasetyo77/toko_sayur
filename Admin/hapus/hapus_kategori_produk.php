<?php

$id_kategori_produk = $_GET['hapus_kategori_produk'];
$koneksi->query("delete from kategori_produk where id_kategori_produk='$id_kategori_produk'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?kategori_produk';</script>";
?>