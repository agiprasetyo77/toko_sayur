<?php
session_start();
include('../config/koneksi.php');
$tampil_keranjang = query("SELECT keranjang.id_keranjang, produk.id_produk, produk.nama_produk, produk.harga_produk, produk.foto_produk, keranjang.jumlah, produk.harga_produk * keranjang.jumlah AS total_harga FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "';");


if (isset($_POST["checkout"])) {
    if (tambahtransaksi($_POST) > 0) {
        $_SESSION['tanggal_pembelian'] = $_POST["tanggal"];
        echo "<script>location='checkout.php';</script>";
    }
}
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

    <!-- content keranjang start -->
    <div id="content">
        <div class="container">
            <div class="row">
                <!-- breadcumb start -->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Keranjang</li>
                    </ul>
                </div>
                <!-- breadcumb end -->
                <!-- start card box -->

                <div class="col-md-12 keranjang">
                    <div class="card-box">
                        <h2>Keranjang Belanja</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tampil_keranjang as $row) : ?>
                                        <tr>
                                            <td>
                                                <a href="detail_produk.php?id=<?= $row["id_produk"]; ?>">
                                                    <img src="/asset/img/<?= $row["foto_produk"]; ?>" class="img-responsive" width="100">
                                                </a>
                                            </td>
                                            <td><?= $row["nama_produk"]; ?></td>
                                            <td>
                                                <input type="number" name="jumlah" min="1" value="<?= $row["jumlah"]; ?>" class="form-control form-control-sm" style="width: 200px;" oninput="updateSubtotal(this); totaluang();" data-id="<?= $row["id_keranjang"]; ?>">
                                            </td>
                                            <td class="harga"><?= $row["harga_produk"]; ?></td>
                                            <td class="subtotal"><?= $row["total_harga"]; ?></td>

                                            <td>
                                                <a href="update_keranjang.php" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-redo-alt"></i>
                                                </a>
                                                <a href="hapus_keranjang.php?id=<?= $row["id_keranjang"]; ?>" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th></th>
                                        <th class="totalAmount"></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <!-- end card-box -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="produk.php" class="btn btn-light">
                                    <i class="fas fa-chevron-left"></i> Lanjut Belanja
                                </a>
                            </div>
                            <div class="col-text-right">
                                <form action="" method="post">
                                    <input type="text" value="<?= $_SESSION['id_pelanggan']  ?>" name="kirim_id_pelanggan">
                                    <input type="datetime-local" value="<?= date('Y-m-d\TH:i:s'); ?>" name="tanggal">

                                <button  class="btn btn-primary" name="checkout">
                                    checkout <i class="fas fa-chevron-right"></i>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- content keranjang end -->

    <!-- footer start -->
    <?php include 'includes/footer.php' ?>
    <!-- footer End -->

    <script>
        function updateSubtotal(input) {
            var jumlah = input.value;
            var row = input.closest('tr'); // Dapatkan baris terkait dengan elemen input
            var harga = parseFloat(row.querySelector('.harga').innerText);
            var subtotalElement = row.querySelector('.subtotal');
            var subtotal = jumlah * harga;

            // Tampilkan subtotal pada elemen dengan class subtotal
            subtotalElement.innerText = subtotal;

            // Ambil ID dari data
            var id = input.getAttribute('data-id');

            // Kirim permintaan Ajax untuk mengupdate data di database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_keranjang.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Tanggapan dari server (jika diperlukan)
                    console.log(xhr.responseText);
                }
            };
            xhr.send("id=" + id + "&jumlah=" + jumlah + "&subtotal=" + subtotal);

        }

        window.onload = function() {
            var subtotalElements = document.querySelectorAll('.subtotal');
            var totalAmountElement = document.querySelector('.totalAmount');

            var total = 0;

            // Loop melalui setiap elemen subtotal dan tambahkan nilainya ke total
            for (var i = 0; i < subtotalElements.length; i++) {
                total += parseFloat(subtotalElements[i].innerText.replace('Rp.', '').replace(',', ''));
            }

            // Tampilkan total pada elemen totalAmount
            totalAmountElement.innerHTML = 'Rp.' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        };

        function totaluang() {
            var subtotalElements = document.querySelectorAll('.subtotal');
            var totalAmountElement = document.querySelector('.totalAmount');

            var total = 0;

            // Loop melalui setiap elemen subtotal dan tambahkan nilainya ke total
            for (var i = 0; i < subtotalElements.length; i++) {
                total += parseFloat(subtotalElements[i].innerText.replace('Rp.', '').replace(',', ''));
            }

            // Tampilkan total pada elemen totalAmount
            totalAmountElement.innerHTML = 'Rp.' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    </script>


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