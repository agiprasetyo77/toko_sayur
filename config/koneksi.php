<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "Mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
  echo "koneksi gagal : " . mysqli_connect_error();
}

//SELECT DATABASE
function query($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row; 
  }
  return $rows;
}


// function tampilkategori($da){
//   $tampil_produk_filter = query("SELECT * FROM produk WHERE produk.id_kategori_produk = '$da';");
// }

$tampil_produk = query("SELECT * FROM produk;");

//INSERT DATABASE
function insertpembelian($data){
    global $koneksi;


    $id_pembelian = $_POST["kirim_id_pelanggan"];
    $id_produk =  $_POST["kirim_id_produk"];
    

    $data = "INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `id_produk`, `jumlah`, `sub_total`) VALUES (NULL, '$id_pembelian', '$id_produk', '1', '0');";

    mysqli_query($koneksi, $data);

    return mysqli_affected_rows($koneksi);
    
}

//DELETE PRODUK KERANJANG
function hapusproduk($id_pos)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM keranjang WHERE keranjang.id_keranjang = '$id_pos';");

  return mysqli_affected_rows($koneksi);
}

//DELETE PRODUK CHECKOUT
function hapusco($id_pos)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM pembelian WHERE `pembelian`.`id_pembelian` = '$id_pos';");

  return mysqli_affected_rows($koneksi);
}


//UPDATE PRODUK KERANJANG
function updatekrnjng($id_pos)
{
  global $koneksi;

  $jumlah = $_POST["jumlah"];
  mysqli_query($koneksi, "UPDATE `keranjang` SET `jumlah` = '3' WHERE `keranjang`.`id_keranjang` = 2;");

  return mysqli_affected_rows($koneksi);
}

//pengecekan kondisi button keranjang
function pengecekan($data) {
  global $koneksi;

  $id_pembelian = $_POST["kirim_id_pelanggan"];
  $id_produk = $_POST["kirim_id_produk"];
  $jumlah = $_POST["jumlah"] ;

  // Deklarasikan $id_keranjang di luar blok if
  $id_keranjang = 0;

  // Lakukan pengecekan apakah data sudah ada
  $check_query = "SELECT * FROM keranjang WHERE id_pelanggan = '$id_pembelian' AND id_produk = '$id_produk'";
  $check_result = mysqli_query($koneksi, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
      // Jika data sudah ada, dapatkan id_keranjang dari hasil kueri
      $row = mysqli_fetch_assoc($check_result);
      $id_keranjang = $row['id_keranjang'];

      // Lakukan UPDATE
      $update_query = "UPDATE keranjang SET jumlah = jumlah + $jumlah, sub_total = sub_total + 0 WHERE id_pelanggan = '$id_pembelian' AND id_produk = '$id_produk'";
      mysqli_query($koneksi, $update_query);
  } else {
      // Jika data belum ada, lakukan INSERT
      $insert_query = "INSERT INTO keranjang (id_pelanggan, id_produk, jumlah, sub_total) VALUES ('$id_pembelian', '$id_produk', '$jumlah', '0')";
      mysqli_query($koneksi, $insert_query);

      // Dapatkan id_keranjang dari data yang baru saja dimasukkan
      $id_keranjang = mysqli_insert_id($koneksi);
  }

  // Gunakan $id_keranjang di luar blok if sesuai kebutuhan
  // misalnya, untuk memasukkannya ke dalam tabel lain

  return mysqli_affected_rows($koneksi);
}

// keranjang selct
$konekkeranjang=query("SELECT * FROM `keranjang`");


//registrasi
function register($data){
  global $koneksi;


    $nama = $data["nama"];
    $email = $data["email"];
    $telepon = $data["telepon"];
    $password = $data["password"];
    $addres = $data["alamat"];
    
  
$upload = upload();
  if (!$upload) {
    return false;
  }
  $query = "INSERT INTO `pelanggan` ( `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `nama_pelanggan`, `foto_pelanggan`, `alamat`)  VALUES ( '$email', '$password', '$telepon', '$nama', '$upload', '$addres');";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
  
}

//upload foto 
function upload()
{
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // Cek apakah tidak ada gambar yang di upload
  if ($error === 4) {
    echo "<script>
    alert('Pilih gambar terlebih dahulu');
    </script>";
    return false;
  }

  // Cek apakah gambar
  $extensiValid = ['jpg', 'png', 'jpeg'];
  $extensiGambar = explode('.', $namaFile);
  $extensiGambar = strtolower(end($extensiGambar));

  if (!in_array($extensiGambar, $extensiValid)) {
    echo "<script>
    alert('Yang anda upload bukan gambar!');
    </script>";
    return false;
  }

  if ($ukuranFile > 1000000) {
    echo "<script>
    alert('Ukuran Gambar Terlalu Besar!');
    </script>";
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensiGambar;
  // Move File
  move_uploaded_file($tmpName, '../asset/img/' . $namaFileBaru);
  return $namaFileBaru;
}

//tampil pelanggan
$tampil_pelanggan = query("SELECT * FROM pelanggan;");
//tampil ongkir
$tampil_ongkir = query("SELECT * FROM ongkir;");
//tampil pembelian
$tampil_pembelian = query("SELECT * FROM pembelian;");
//tampil kategori
$tampil_kategori1 = query("SELECT * FROM kategori_produk;");

//update akun 
function perbarui($data){
  global $koneksi;


    $nama = $data["nama"];
    $email = $data["email"];
    $telepon = $data["telepon"];
    $password = $data["password"];
    $addres = $data["alamat"];
    
  
$tambah = tambah();
  if (!$tambah) {
    return false;
  }
  $query = "UPDATE `pelanggan` SET `email_pelanggan` = '$email', `password_pelanggan` = '$password', `telepon_pelanggan` = '$telepon', `nama_pelanggan` = '$nama', `foto_pelanggan` = '$tambah', `alamat` = '$addres' WHERE `pelanggan`.`id_pelanggan` = 2;";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
  
}

//upload foto 
function tambah()
{
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // Cek apakah tidak ada gambar yang di upload
  if ($error === 4) {
    echo "<script>
    alert('Pilih gambar terlebih dahulu');
    </script>";
    return false;
  }

  // Cek apakah gambar
  $extensiValid = ['jpg', 'png', 'jpeg'];
  $extensiGambar = explode('.', $namaFile);
  $extensiGambar = strtolower(end($extensiGambar));

  if (!in_array($extensiGambar, $extensiValid)) {
    echo "<script>
    alert('Yang anda upload bukan gambar!');
    </script>";
    return false;
  }

  if ($ukuranFile > 1000000) {
    echo "<script>
    alert('Ukuran Gambar Terlalu Besar!');
    </script>";
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensiGambar;
  // Move File
  move_uploaded_file($tmpName, '../asset/img/' . $namaFileBaru);
  return $namaFileBaru;
}

//kirim data pelanggan ke halaman checkout
function tambahtransaksi($data){
  global $koneksi;


$id_pembelian = $_POST["kirim_id_pelanggan"];
$tgl = $_POST["tanggal"];

// Konversi format tanggal
$tanggal_pembelian = date('Y-m-d H:i:s', strtotime($tgl));

$data = "INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `id_ongkir`,status_pembayaran) VALUES (NULL, '$id_pembelian', '$tanggal_pembelian', NULL, NULL,'Belum Dibayar');";

mysqli_query($koneksi, $data);

return mysqli_affected_rows($koneksi);

  

}
function tambahsemuatransaksi($data){
  global $koneksi;

  $id = $_POST["id"];
  $ongkos = $_POST["ongkir"];
  $totalfinal = $_POST["totalakhir"];
  $id_produk = $_POST["idproduk"];
  $jumlah = $_POST["jumlah"];
  $subtotal = $_POST["subtotal"];
  $id_keranjang = $_POST["idkeranjang"];

  // Perbarui query UPDATE
  $queryUpdate = "UPDATE `pembelian` SET `total_pembelian` = '$totalfinal', `id_ongkir` = '$ongkos' WHERE `pembelian`.`id_pembelian` = '$id';";
  mysqli_query($koneksi, $queryUpdate);


  foreach ($id_keranjang as $index => $value) {
    // Lakukan sesuatu dengan nilai pada setiap indeks
    $idKeranjang = $value;
    $idProduk = $id_produk[$index];
    $jumlahProduk = $jumlah[$index];
    $subtotalProduk = $subtotal[$index];

    // Lakukan operasi database atau aksi lainnya sesuai kebutuhan
    // ...

    // Contoh penyimpanan data ke dalam database (gunakan metode yang sesuai untuk Anda)
    $queryInsert = "INSERT INTO `pembelian_produk` (`id_pembelian`, `id_produk`, `jumlah`, `sub_total`) VALUES ('$id', '$idProduk', '$jumlahProduk', '$subtotalProduk');";
    mysqli_query($koneksi, $queryInsert);

    $queryDelete = "DELETE FROM `keranjang` WHERE `id_keranjang` = '$idKeranjang';";
  mysqli_query($koneksi, $queryDelete);
    // Eksekusi query sesuai dengan cara Anda menjalankan query di aplikasi Anda
}
  // Query INSERT
  // $queryInsert = "INSERT INTO `pembelian_produk` (`id_pembelian`, `id_produk`, `jumlah`, `sub_total`) VALUES ('$id', '$id_produk', '$jumlah', '$subtotal');";
  // mysqli_query($koneksi, $queryInsert);

  // Query DELETE
  // $queryDelete = "DELETE FROM `keranjang` WHERE `id_keranjang` = '$id_keranjang';";
  // mysqli_query($koneksi, $queryDelete);

  return mysqli_affected_rows($koneksi);
}

//menyesuaikan kategori
function kategori($data){
  global $koneksi;

  $idkategori = $_POST["id_kategori"];
  $tampilkategori4 = '';
  
  $tampilkategori4 = query("SELECT * FROM produk WHERE produk.id_kategori_produk = '$idkategori';");
  return $tampilkategori4;
}

//Pembayaran akhir
function bayarakhir($data){
  global $koneksi;

  $idpembeli = $_POST["id_pembelian"];
  $upload = upload();
  if (!$upload) {
    return false;
  }
  
  $queryInsert = "UPDATE `pembelian` SET `status_pembayaran` = 'Sedang Proses', `Bukti_pembayaran` = '$upload' WHERE `id_pembelian` = '$idpembeli';";
    mysqli_query($koneksi, $queryInsert);
    
}
  ?>