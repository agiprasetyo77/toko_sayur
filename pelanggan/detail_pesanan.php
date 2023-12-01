<?php
ob_start(); // Start output buffering
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../config/koneksi.php');

// Mengambil id_pembelian dari parameter URL
$id_pembelian = $_GET['id'];

// Query untuk mendapatkan data pembelian sesuai dengan id_pembelian
$query_detail_pembelian = "SELECT
                                pembelian.id_pembelian,
                                pembelian.tanggal_pembelian,
                                pembelian.total_pembelian,
                                pembelian.status_pembayaran,
                                pelanggan.id_pelanggan,
                                pelanggan.nama_pelanggan,
                                pelanggan.alamat,
                                pelanggan.telepon_pelanggan,
                                ongkir.nama_jalan,
                                ongkir.tarif
                           FROM pembelian
                           JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
                           JOIN ongkir ON pembelian.id_ongkir = ongkir.id_ongkir
                           WHERE pembelian.id_pembelian = $id_pembelian;";
$result_detail_pembelian = mysqli_query($koneksi, $query_detail_pembelian);

// Query untuk mendapatkan data tampil pembelian produk
$query_tampil_pembelian_produk = "SELECT
                                        produk.foto_produk,
                                        produk.nama_produk,
                                        produk.harga_produk,
                                        pembelian_produk.jumlah,
                                        pembelian_produk.sub_total,
                                        pembelian_produk.id_pembelian,
                                        produk.id_produk
                                   FROM pembelian_produk
                                   JOIN produk ON pembelian_produk.id_produk = produk.id_produk
                                   WHERE pembelian_produk.id_pembelian = '$id_pembelian';";
$result_tampil_pembelian_produk = mysqli_query($koneksi, $query_tampil_pembelian_produk);

// Memeriksa apakah query berhasil dijalankan
if (!$result_detail_pembelian) {
    echo "Error: " . mysqli_error($koneksi);
}

ob_end_flush(); // End output buffering
?>

<!-- Tambahkan kode untuk menampilkan data pembelian -->
<center>
    <h2>Detail Pesanan</h2>
</center>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Total Pembelian</th>
                <th>Status Pembayaran</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat Pelanggan</th>
                <th>Telepon Pelanggan</th>
                <th>Nama Jalan</th>
                <th>Tarif Ongkir</th>
                <!-- Tambahkan kolom sesuai dengan kebutuhan -->
            </tr>
        </thead>
        <tbody>
            <?php
            $data_detail_pembelian = mysqli_fetch_assoc($result_detail_pembelian);
            ?>
            <tr>
                <td><?= $data_detail_pembelian['id_pembelian']; ?></td>
                <td><?= $data_detail_pembelian['tanggal_pembelian']; ?></td>
                <td>Rp. <?= number_format($data_detail_pembelian['total_pembelian']); ?></td>
                <td><?= $data_detail_pembelian['status_pembayaran']; ?></td>
                <td><?= $data_detail_pembelian['id_pelanggan']; ?></td>
                <td><?= $data_detail_pembelian['nama_pelanggan']; ?></td>
                <td><?= $data_detail_pembelian['alamat']; ?></td>
                <td><?= $data_detail_pembelian['telepon_pelanggan']; ?></td>
                <td><?= $data_detail_pembelian['nama_jalan']; ?></td>
                <td>Rp. <?= number_format($data_detail_pembelian['tarif']); ?></td>
                <!-- Tambahkan baris sesuai dengan kebutuhan -->
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Foto Produk</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </thead>
        <tbody>
        <?php
            $no = 1;
            while ($data_tampil_pembelian_produk = mysqli_fetch_assoc($result_tampil_pembelian_produk)) :
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><img src="/asset/img/<?=$data_tampil_pembelian_produk['foto_produk']; ?>" alt="Foto Produk" height="70px" width="70px"></td>
                <td><?= $data_tampil_pembelian_produk['nama_produk']; ?></td>
                <td>Rp. <?= number_format($data_tampil_pembelian_produk['harga_produk']); ?></td>
                <td><?= $data_tampil_pembelian_produk['jumlah']; ?></td>
                <td>Rp. <?= number_format($data_tampil_pembelian_produk['sub_total']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
