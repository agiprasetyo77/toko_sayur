<!-- <?php

if (isset($_POST['simpan'])) {
    $id = $_POST['id_pengeluaran'];
    $jenis = $_POST['jenis_pengeluaran'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];

    $query = "UPDATE produk SET  
            id_pengeluaran = '" . $id . "', 
            jenis_pengeluaran= '" . $jenis . "', 
            tanggal = '" . $tanggal . "', 
            total = '" . $total . "', 
            WHERE id_pengeluaran = '" . $id . "'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('data berhasil disimpan');</script>";
        echo "<script>location='../index.php?laporan_pengeluaran ';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

}
?> -->