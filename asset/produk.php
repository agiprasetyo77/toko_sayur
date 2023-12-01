<?php
session_start();
include('../config/koneksi.php');

if (isset($_POST["kirimproduk"])) {
    if (pengecekan($_POST) > 0) {
        echo "<script>location='keranjang.php';</script>";
    }
}


if (isset($_POST["nama_kategori"])) {
    $tampilkategori = kategori($_POST);
} else {
    $tampilkategori = $tampil_produk;
}






// // data produk
// $data_produk = array();
// $ambil = $koneksi->query("SELECT * FROM produk");
// while ($pecah = $ambil->fetch_assoc()) {
//     $data_produk[] = $pecah;
// }


// //jika ada id_kategori di url
// if (isset($_GET['$id_kategori'])) {
//     $id_kategori = $_GET['id_kategori'];

//     $data_kategori =  array();
//     $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori_produk ON produk.id_kategori_produk = kategori_produk.id_kategori_produk WHERE produk.id_kategori_produk='$id_kategori';");
//     while ($pecah = $ambil->fetch_assoc()) {
//         $data_kategori[] = $pecah;
//     }
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mlijo</title>
    <!-- Custom fonts for this template-->
    <link href="/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="/asset/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- owl carousel -->
    <link href="/asset/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/asset/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="/asset/css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <!-- navbar brand start -->
            <div class="navbar-brand">
                <a class="d-none d-lg-block mt-1" href="index.php">MLIJO</a>
                <a class="d-sm-none mt-1" href="index.php">MLIJO</a>
            </div>
            <!-- navbar brand end -->
            <!-- btn navbar start -->
            <div class="btn-navbar">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#search" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler"></span>
                    <i class="fas fa-search"></i>
                </button>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler"></span>
                    <i class="fas fa-list"></i>
                </button>
                <!-- btn navbar end -->
                <!-- navbar start -->
            </div>
            <div class="collapse navbar-collapse mt-1" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pelanggan/profil.php">Akun Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Kontak.php">Kontak</a>
                    </li>
                </ul>
                <!-- search start -->
                <div class="collapse clearfix" id="search">
                    <form action="produk.php" method="get" class="navbar-form">
                        <div class="input-group">
                            <input type="search" name="keyword" class="form-control" placeholder="search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="keyword" value="search" type="submit"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- seacrh end -->
                <!-- btn search start -->
                <div class="btn-search">
                    <div class="collapse navbar-collapse">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#search">
                            <span class="toggler"></span>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- btn search end -->
                <!-- btn keranjang start -->
                <div class="btn-keranjang">
                    <a href="keranjang.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <!-- btn keranjang end -->
            </div>
            <!-- navbar end -->
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- content produk start -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breadcrumb start -->
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>produk</li>
                    </ul>
                    <!-- breadcrumb end -->
                    <!-- side bar start -->
                    <div class="row d-flex ">
                        <div class="col-md-3">
                            <?php include 'includes/sidebar.php'; ?>
                        </div>
                        <!-- side bar end -->
                        <!-- row page produk start -->
                        <div class="row col-md-9 d-flex">
                            <?php foreach ($tampilkategori  as $row) : ?>
                                <div class="col-md-4" id="produk-container">
                                    <div class="card-produk">
                                        <a href="detail_produk.php?idproduk=<?= $row["id_produk"]; ?>">
                                            <img src="../asset/img/<?= $row["foto_produk"]; ?>" class="img-responsive" width="240px" height="300px">
                                        </a>
                                        <div class="text">
                                            <a href="detail_produk.php">
                                                <h3><?= $row["nama_produk"]; ?></h3>
                                            </a>
                                            <p class="harga"><?= $row["harga_produk"]; ?></p>
                                            <form action="" method="post">
                                                <input type="text" name="kirim_id_pelanggan" value="<?= $_SESSION['id_pelanggan']  ?>" hidden>
                                                <input type="text" name="kirim_id_produk" value="<?= $row["id_produk"]; ?>" hidden>
                                                <input type="text" name="jumlah" value="1" hidden>
                                                <p class="button">
                                                    <a href="detail_produk.php?idproduk=<?= $row["id_produk"]; ?>" class="btn btn-light">Detail Sayuran</a>
                                                    <button type="submit" name="kirimproduk" id="insertkeranjang" class="btn btn-primary">
                                                        <i class="fas fa-shopping-cart"></i>Keranjang
                                                    </button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- row page produk end -->

                    <!-- pagination start -->
                    <div class=" row justify-content-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link text-success" href="#">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link text-secondary" href="#">1</a></li>
                                <li class="page-item " aria-current="page">
                                    <a class="page-link text-secondary" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link text-success" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- pagination end -->

                    <!-- page produk start -->
                    <div class="col-md-9 page-produk">
                        <div class="">
                            <p>Produk Kami dijamin 100% fresh setiap hari . Jika kalian punya pertanyaan atau mungkin masukan bisa <a href="kontak.php">Hubungi Kami</a>.<strong>Mlijo</strong> Kami melayani pelanggan sepenuh hati</p>
                        </div>
                    </div>
                    <!-- page produk end -->
                </div>
            </div>
        </div>
    </div>
    <!-- content produk finish -->






    <!-- footer start -->
    <?php include 'includes/footer.php' ?>
    <!-- footer End -->


    <!-- Bootstrap core JavaScript-->
    <script src="/asset/vendor/jquery/jquery.min.js"></script>
    <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="/asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/asset/js/sb-admin-2.min.js"></script>
    <!-- owl carousel js -->
    <script src="/asset/js/owl.carousel.min.js"></script>
    <!-- main js -->
    <script src="/asset/js/main.js"></script>

    
</body>

</html>