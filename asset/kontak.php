<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mlijo</title>
    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- owl carousel -->
    <link href="../asset/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../asset/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="../asset/css/style.css" rel="stylesheet">
</head>

<body>


<?php include 'includes/navbar.php'?>

        <!-- content produk start -->
        <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breadcrumb start -->
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Kontak</li>
                    </ul>
                    <!-- breadcrumb end -->
                    <!-- side bar start -->
                    <div class="row d-flex ">
                        <div class="col-md-3">
                            <?php include 'includes/sidebar.php'; ?>
                        </div>
                        <!-- side bar end -->
                        <!-- row page produk start -->
                        <div class="col-md-9">
                            <div class="">
                                <div class="card-box">
                                   <center>
                                   <h2>Hubungi Kami</h2>
                                   <p>Jika anda memiliki pertanyaan , jangan ragu untuk menghubungi kami .Layanan kami bekerja selama <strong>24 Jam</strong>
                                   </p>
                                   </center>
                                   <form method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Lengkap : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anda">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" class="form-control" placeholder="Masukkan email anda">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Subjek : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="subjek" class="form-control" placeholder="Masukkan subjek">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pesan : </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="pesan" class="form-control" placeholder="Masukkan pesan anda"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button name="kirim" class="btn btn-primary">
                                                    <i class="fas fa-user-md"></i>Kirim</button>
                                            </div>
                                        </div>

                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row page produk end -->

                </div>
            </div>
        </div>
    </div>
    <!-- content produk finish -->


    <!-- footer start -->
    <?php include 'includes/footer.php'?>
    <!-- footer End -->


    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>
    <!-- owl carousel js -->
    <script src="../asset/js/owl.carousel.min.js"></script>
    <!-- main js -->
    <script src="../asset/js/main.js"></script>
</body>

</html>