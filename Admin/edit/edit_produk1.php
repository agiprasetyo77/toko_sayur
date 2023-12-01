<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["simpan"])) {
        $id_kategori_produk = $_POST["id_kategori_produk"];
        $nama_produk = $_POST['nama_produk'];
        $harga_produk = $_POST['harga_produk'];
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $stok_produk = $_POST['stok_produk'];
        $foto = $_FILES['foto_produk'];
        $foto_produk = $foto['name'];
        $id_produk = $_POST['id_produk'];

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

        // var_dump($id_kategori_produk, $nama_produk, $harga_produk, $deskripsi_produk, $stok_produk, $foto_produk);

        $query = "UPDATE produk SET 
            id_kategori_produk = '" . $id_kategori_produk . "', 
            nama_produk = '" . $nama_produk . "', 
            harga_produk = '" . $harga_produk . "', 
            deskripsi_produk = '" . $deskripsi_produk . "', 
            stok = '" . $stok_produk . "', 
            foto_produk = '" . $foto_produk . "'
          WHERE id_produk = '" . $id_produk . "'";

        // var_dump($query);

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('data berhasil disimpan');</script>";
            echo "<script>location='../index.php?produk ';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>