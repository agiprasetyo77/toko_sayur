<?php
ob_start(); // Start output buffering
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../config/koneksi.php');
// Assuming you have a function named 'query' for database queries

// Mengganti query untuk mengambil total pembayaran berdasarkan ID pelanggan
$idPelanggan = $_SESSION['id_pelanggan'];
$idPembelian = $_GET['id']; // Ganti dengan ID pembelian yang diinginkan
$tampil_pembelian = query("SELECT id_pembelian, total_pembelian FROM pembelian WHERE id_pembelian = '$idPembelian' AND id_pelanggan = '$idPelanggan';");

if (isset($_POST["kirim"])) {
    if (bayarakhir($_POST) > 0) {
        echo "<script>location='pesanan.php';</script>";
    }
}

ob_end_flush(); // End output buffering
?>

<div class="text-center">
    <h2>Mohon Konfirmasi Pembayaran Terlebih Dahulu</h2>
</div>
<hr>    
<div class="output-container">
    <?php if ($tampil_pembelian) : ?>
        <div class="card-header">
            <?php foreach ($tampil_pembelian as $row) : ?>
                <input type="text" value="<?= $row["id_pembelian"]; ?>">
                <h5 class="total-pembayaran">Total Pembayaran : <?= $row["total_pembelian"]; ?></h5>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="card-header">
            <h5>Total Pembayaran : Data tidak tersedia</h5>
        </div>
    <?php endif; ?>
</div>





<p>
    Bank BCA
    <br>No. Rek. 6155348643 A.N. Muhammad Heriyanto
</p>
<p>
    Shopeepay/Dana
    <br>Bisa Transfer ke nomor 085730655948
</p>
<hr>
<p>Petunjuk</p>
<li>Silahkan melakukan Pembayaran sesuai dengan ketentuan di atas</li>
<li>Setelah Berhasil melakukan Pembayaran beritahu kami dengan mengisi formulir di bawah ini</li>
<li>Kirimkan bukti Pembayaran</li>
<br>

<form action="" method="post" enctype="multipart/form-data">
    <!-- <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Lengkap : </label>
        <div class="col-sm-8">
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap anda">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Transfer ke : </label>
        <div class="col-sm-8">
            <input type="text" name="transfer" class="form-control" placeholder="Pilihan transfer anda">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Jumlah : </label>
        <div class="col-sm-8">
            <input type="number" name="jumlah" class="form-control" placeholder="Nominal Transfer">
        </div>
    </div> -->
    <div class="form-group row">
    <?php foreach ($tampil_pembelian as $row) : ?>
        <input type="text" value="<?= $row["id_pembelian"]; ?>" name="id_pembelian">
    <?php endforeach; ?>
    <label class="col-sm-3 col-form-label">Bukti Transfer : </label>
    <div class="col-sm-8">
        <input type="file" name="foto" class="form-control">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-8">
        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
    </div>
</div>

</form>

