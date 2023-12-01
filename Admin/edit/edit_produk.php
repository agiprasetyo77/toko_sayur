<?php
$id_produk = $_GET['edit_produk'];
$ambil = $koneksi->query("select * from kategori_produk");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori_produk[] = $pecah;
}

$query_produk = $koneksi->query("SELECT `id_produk`, produk.id_kategori_produk as id_kategori, kategori_produk.nama_kategori_produk, `nama_produk`, `harga_produk`, `deskripsi_produk`, `stok`, `foto_produk` 
FROM `produk` JOIN kategori_produk ON produk.id_kategori_produk = kategori_produk.id_kategori_produk where `id_produk` = $id_produk");

while ($produk = $query_produk->fetch_assoc()) {
    $produks[] = $produk;
}
if (isset($_POST['edit_produk1'])) {

    // var_dump($_POST);
    $id = $_POST['id'];
    $id_kategori = $_POST['id_kategori_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $stok = $_POST['stok_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $foto = $_FILES['foto_produk'];
    $foto_produk = $foto['name'];

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

    $query = "UPDATE `produk` SET `id_kategori_produk`='
    $id_kategori',`nama_produk`='$nama_produk',`harga_produk`='$harga_produk',
    `deskripsi_produk`='$deskripsi_produk',`stok`='$stok',`foto_produk`='$foto_produk' WHERE  `id_produk`= $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>location='index.php?produk ';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>