<?php
session_start();

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
                        <a class="nav-link" aria-current="page" href="/asset/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/asset/produk.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pelanggan/profil.php">Akun Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/asset/keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/asset/Kontak.php">Kontak</a>
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
                    <a href="/asset/keranjang.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <!-- btn keranjang end -->
            </div>
            <!-- navbar end -->
        </div>
    </nav>
    <!-- Navbar End -->

    <div id="content">
        <div class="container">
            <div class="row">
                <!-- breadcrumb start -->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Profil</li>
                    </ul>
                </div>
                <!-- breadcrumb end -->
                <!-- col-md-3 start -->
                <div class="col-md-3">
                    <div class="card kategori">
                        <div class="card-header text-center">
                            <img src="/asset/img/<?php echo $_SESSION['foto_pelanggab']; ?>" class="img-responsive rounded-circle rounded mx-auto 
                            d-block mb-3" width="150px" height="150px">
                            <h4><?php echo $_SESSION['nama_pelanggan']; ?></h4>
                        </div>
                        <nav class="nav flex-column nav-menu">
                           <li class="<?php if(isset($_GET['pesanan'])){echo"active";} ?>">
                                <a href="profil.php?pesanan" class="nav-link">
                                    <i class="fas fa-list"></i> Pesanan
                                </a>
                           </li>
                           <li class="<?php if(isset($_GET['edit_akun'])){echo"active";} ?>">
                                <a href="profil.php?edit_akun" class="nav-link">
                                    <i class="fas fa-edit"></i> Edit Akun
                                </a>
                           </li>
            
                           <li class="<?php if(isset($_GET['hapus_akun'])){echo"active";} ?>">
                                <a href="profil.php?hapus_akun" class="nav-link">
                                    <i class="fas fa-trash"></i> Hapus Akun
                                </a>
                           </li>
                           <li class="<?php if(isset($_GET['logout'])){echo"active";} ?>">
                                <a href="profil.php?logout" class="nav-link">
                                    <i class="fas fa-sign-out-alt"></i> Log Out
                                </a>
                           </li>
                        </nav>
                    </div>
                </div>
                <!-- col-md-3 end -->
                <!-- col-md-9 start -->
                <div class="col-md-9">
                    <div class="card-box">
                        <?php

                        // Halaman Pesanan
                        if(isset($_GET['pesanan']))
                        {
                            include 'pesanan.php';
                        }
                        // Halaman detail_pesanan
                        elseif(isset($_GET['detail_pesanan']))
                        {
                            include 'detail_pesanan.php';
                        }
                        // Halaman bayar
                        elseif(isset($_GET['bayar']))
                        {
                            include 'bayar.php';
                        }
                        // Halaman Edit Akun
                        elseif(isset($_GET['edit_akun']))
                        {
                            include 'edit_akun.php';
                        }
                        // Halaman Ubah Password
                        elseif(isset($_GET['ubah_password']))
                        {
                            include 'ubah_password.php';
                        }
                        // Halaman Hapus Akun
                        elseif(isset($_GET['hapus_akun']))
                        {
                            include 'hapus_akun.php';
                        }
                        // Halaman logout
                        elseif(isset($_GET['logout']))
                        {
                            include 'logout.php';
                        }

                        ?>
                    </div>
                </div>
                <!-- col-md-9 end -->
            </div>
        </div>
    </div>

    <!-- footer start -->
    <?php include '/laragon/www/ProjectMlijo/Mlijo/asset/includes/footer.php' ?>
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
    <script src="/asset/js/detail_produk.js"></script>
</body>

</html>