<?php
ob_start(); // Start output buffering
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../config/koneksi.php');

// Query untuk mendapatkan data pembelian berdasarkan id_pelanggan
$query_pembelian = "SELECT id_pembelian, tanggal_pembelian, total_pembelian, status_pembayaran
                   FROM pembelian
                   WHERE id_pelanggan = {$_SESSION['id_pelanggan']};";
$result_pembelian = mysqli_query($koneksi, $query_pembelian);

// Memeriksa apakah query berhasil dijalankan
if (!$result_pembelian) {
    echo "Error: " . mysqli_error($koneksi);
}

ob_end_flush(); // End output buffering
?>

<!-- Tambahkan kode untuk menampilkan data pembelian -->
<center>
    <h2>Pesanan Saya</h2>
</center>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($result_pembelian as $data_pembelian) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data_pembelian['tanggal_pembelian']; ?></td>
                    <td>Rp. <?= number_format($data_pembelian['total_pembelian']); ?></td>
                    <td><?= $data_pembelian['status_pembayaran']; ?></td>
                    <td style="width: 200px;">
                        <!-- Menambahkan data-id pada atribut detail-button untuk menyimpan ID pembelian -->
                        <a href="javascript:void(0);" class="btn btn-sm btn-info detail-button" data-id="<?= $data_pembelian['id_pembelian']; ?>">Detail</a>
                        <?php if ($data_pembelian['status_pembayaran'] != 'Lunas') : ?>
                            <!-- Tombol Bayar Sekarang -->
                            <a href="profil.php?bayar&id=<?= $data_pembelian['id_pembelian']; ?>" class="btn btn-sm btn-primary bayar-button" data-id="<?= $data_pembelian['id_pembelian']; ?>" data-idpelanggan="<?= $_SESSION['id_pelanggan']; ?>" data-total="<?= $data_pembelian['total_pembelian']; ?>">
                                Bayar Sekarang
                            </a>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Menambahkan script jQuery untuk menangani klik pada tombol detail -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Menangani klik pada tombol detail
        $('.detail-button').click(function() {
            // Mengambil data-id dari atribut detail-button
            var id_pembelian = $(this).data('id');

            // Mengarahkan pengguna ke halaman detail_pesanan dengan menyertakan id_pembelian sebagai parameter
            window.location.href = `profil.php?detail_pesanan&id=${id_pembelian}`;
        });
    });
</script>

