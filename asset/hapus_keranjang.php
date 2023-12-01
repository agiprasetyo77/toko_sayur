<?php
include('../config/koneksi.php');
$id_pos = $_GET["id"];

if (hapusproduk($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'keranjang.php'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'keranjang.php'; 
  </script>
  ";
}


?>