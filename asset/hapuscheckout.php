<?php
include('../config/koneksi.php');
$id_pos = $_GET["hapus"];

if (hapusco($id_pos) > 0) {
  echo "
  <script>
    document.location.href = 'keranjang.php'; 
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'checkout.php'; 
  </script>
  ";
}


?>