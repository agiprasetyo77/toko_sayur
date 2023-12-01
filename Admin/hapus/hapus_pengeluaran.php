<?php
$id_pengeluaran = $_GET['hapus_pengeluaran'];
$koneksi->query("delete from pengeluaran where `id_pengeluaran`='$id_pengeluaran'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?laporan_pengeluaran';</script>";
?>