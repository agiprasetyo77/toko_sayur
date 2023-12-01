<?php
session_start();
include('../config/koneksi.php');
$tampil_keranjang = query("SELECT keranjang.id_keranjang, produk.id_produk, produk.nama_produk, produk.harga_produk, produk.foto_produk, keranjang.jumlah, produk.harga_produk * keranjang.jumlah AS total_harga FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "';");

$tampiltransaksi = query("SELECT * FROM pembelian WHERE pembelian.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'AND pembelian.tanggal_pembelian = '" . $_SESSION['tanggal_pembelian'] . "';");

if (isset($_POST["lunas"])) {
    if (tambahsemuatransaksi($_POST) > 0) {
        echo "<script>location='/pelanggan/profil.php';</script>";
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


    <?php include 'includes/navbar.php' ?>

    <!-- content keranjang start -->
    <div id="content">
        <div class="container">
            <div class="row">
                <!-- breadcumb start -->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
                <!-- breadcumb end -->
                <!-- start card box -->
                <form action="" method="post">
                    <div class="col-md-12 keranjang">
                        <div class="card-box">
                            <h2>Checkout Belanja Mu</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                            <!-- <th>Option</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tampil_keranjang as $row) : ?>
                                            <tr>
                                                <td>
                                                    <input type="text" value="<?= $row["id_keranjang"]; ?>" name="idkeranjang[]">
                                                    <a href="detail_produk.php?id=<?= $row["id_produk"]; ?>">
                                                    <input type="text" value="<?= $row["id_produk"]; ?>" name="idproduk[]">
                                                        <img src="/asset/img/<?= $row["foto_produk"]; ?>" class="img-responsive" width="100">
                                                    </a>
                                                </td>
                                                <td><?= $row["nama_produk"]; ?></td>
                                                <td>
                                                    <input type="number" name="jumlah[]" min="1" value="<?= $row["jumlah"]; ?>" class="form-control form-control-sm" style="width: 200px;" oninput="updateSubtotal(this); totaluang();" data-id="<?= $row["id_keranjang"]; ?>">
                                                </td>
                                                <td class="harga"><?= $row["harga_produk"]; ?></td>
                                                <td class="subtotal">
                                                    <?= $row["total_harga"]; ?>
                                                    <input type="text" value="<?= $row["total_harga"]; ?>" name="subtotal[]" hidden>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th></th>
                                            <th class="totalAmount" name="total"></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                      
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php foreach ($tampiltransaksi as $row) : ?>
                                                    <input type="text" value="<?= $row["id_pembelian"]; ?>" name="id">
                                                <?php endforeach; ?>
                                                <?php foreach ($tampil_pelanggan as $row) : ?>
                                                    <label for="">Nama :</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['nama_pelanggan']; ?>" name="nama_plg">
                                                    <label for="">Alamat :</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['alamat_pelanggab']; ?>" name="alamat_plg">
                                                    <label for="">telepon :</label>
                                                    <input type="text" class="form-control" value="<?php echo isset($_SESSION['tlpn']) ? $_SESSION['tlpn'] : ''; ?>" name="tlpn_plg">
                                                    <?php break; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pelanggan">Pilih Pengiriman:</label>
                                        <select id="id_ongkir" name="ongkir" class="form-control">
                                            <?php foreach ($tampil_ongkir as $row) : ?>
                                                <option value="<?= $row["id_ongkir"]; ?>"> <?= $row["id_ongkir"]; ?>-<?= $row["nama_jalan"]; ?>-<?= $row["tarif"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="totalakhir col-md-4">
                                        <label for="">Total Akhir : </label>
                                        <input type="text" name="totalakhir" value="" class="form-control" onchange="total_pembelian()">
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="submit" value="Submit" class="btn btn-primary"> -->
                       


                        <!-- end card-box -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                <?php foreach ($tampiltransaksi as $row) : ?>
                                    <a href="hapuscheckout.php?hapus=<?= $row['id_pembelian']; ?>" class="btn btn-light">
                                        <i class="fas fa-chevron-left"></i> Kembali
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-text-right">
                                    <button href="/pelanggan/profil.php" class="btn btn-primary" name="lunas">
                                        bayar <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content keranjang end -->

    <!-- footer start -->
    <?php include 'includes/footer.php' ?>
    <!-- footer End -->

    <?php

    ?>

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

        //penjumlahan
        window.onload = function() {
            // Memanggil fungsi totaluang saat halaman dimuat
            totaluang();

            // Menambahkan event listener untuk elemen dropdown (select)
            document.getElementById('id_ongkir').addEventListener('change', function() {
                totaluang();
            });
        };

        function totaluang() {
            var subtotalElements = document.querySelectorAll('.subtotal');
            var totalAmountElement = document.querySelector('.totalAmount');
            var ongkirElement = document.getElementById('id_ongkir');

            var total = 0;

            // Loop melalui setiap elemen subtotal dan tambahkan nilainya ke total
            for (var i = 0; i < subtotalElements.length; i++) {
                total += parseFloat(subtotalElements[i].innerText.replace('Rp.', '').replace(',', ''));
            }

            // Tambahkan nilai terpilih dari elemen select (dropdown) ke total
            total += parseFloat(ongkirElement.options[ongkirElement.selectedIndex].text.split('-')[2].replace('Rp.', '').replace(',', '', ));

            // Tampilkan total pada elemen totalAmount
            totalAmountElement.innerHTML = 'Rp.' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            // Set nilai total pada elemen totalakhir
            document.querySelector('input[name="totalakhir"]').value = total.toFixed(2);
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