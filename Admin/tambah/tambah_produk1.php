<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['simpan'])) {
        $id_kategori_produk = $_POST['id_kategori_produk'];
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga_produk'];
        $deskripsi = $_POST['deskripsi_produk'];
        $stok = $_POST['stok_produk'];
        $foto = $_FILES['foto_produk'];
        $fotoName = $foto['name'];

        $fotoFileName = '';

        if ($foto['size'] > 0) {
            $targetDirectory = 'C:\xampp\htdocs\Mlijo-main\Admin\assets\foto_produk\\';
            $fotoFileName = $targetDirectory . basename($foto['name']);

            if (move_uploaded_file($foto['tmp_name'], $fotoFileName)) {
                // File berhasil diupload
            } else {
                echo "Error uploading file.";
                exit();
            }
        }


        // var_dump($id_kategori_produk, $nama, $harga, $deskripsi, $stok, $fotoFileName);

        // $nama_foto = $_FILES['foto_produk']['nama'];
        // $lokasi_foto = $_FILES['foto_produk']['tmp_name'];

        // move_uploaded_file($lokasi_foto, "..assets/foto_produk/" . $nama_foto);


        $koneksi->query("insert into produk(id_kategori_produk,nama_produk, harga_produk, deskripsi_produk,stok, foto_produk)
        values('$id_kategori_produk','$nama','$harga','$deskripsi','$stok','$fotoName' )");

        // $query = "insert into produk(id_kategori_produk,nama_produk, harga_produk, deskripsi_produk,stok, foto_produk values('$id_kategori_produk','$nama','$harga','$deskripsi','$stok','$fotoName' )";
        // $result = mysqli_query($koneksi, $query);

        echo "<script>alert('data berhasil disimpan');</script>";
        echo "<script>location='../index.php?produk ';</script>";
    }
}
?>