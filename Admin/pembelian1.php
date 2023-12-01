<?php
$data = array();
$ambil = $koneksi->query("SELECT pembelian.*, pelanggan.nama_pelanggan FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");

while ($pecah = $ambil->fetch_assoc()) {
    $data[] = $pecah;
    // var_dump($pecah);
}

?>

<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Data Pembelian</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value['nama_pelanggan']; ?></td>
                                    <td><?= $value['tanggal_pembelian']; ?></td>
                                    <td><?= $value['total_pembelian']; ?></td>
                                    <td><?= $value['status_pembayaran']; ?></td>
                                    <td class="text center">
                                        <a href="index.php?detail_pembelian=<?php echo $value['id_pembelian']; ?>" class="btn btn-sm btn-info">
                                            <i class=""></i>Detail
                                        </a>
                                        <?php if ($value['status_pembayaran'] == 'Sedang diproses') : ?>
                                            <button type="button" name="detail" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?= $value['id_pembelian']; ?>">
                                                Lihat Bukti</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data as $key => $value) : ?>
    <div class="modal fade" id="detailModal<?= $value['id_pembelian']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="margin-left: 30%;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-header py-3">
                        <strong class="card-title">Halaman Pembayaran</strong>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card shadow bg-white">
                        <div class="card-body row">
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Nama</th>
                                            <td>
                                                <?= $value['nama_pelanggan']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah</th>
                                            <td>
                                                <?= $value['total_pembelian']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td>
                                                <?= $value['tanggal_pembelian']; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="../assets/foto_bukti/" width="250" class="img-thumbnail img-responsive">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <form action="edit/edit_status.php" method="POST">
                                        <select name="status" class="form-control">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="Barang dikirim">Barang dikirim</option>
                                            <option value="Pengiriman dibatalkan">Pengiriman dibatalkan</option>
                                        </select>
                                </div>
                                <input type="hidden" name="id_pembelian" value="<?= $value['id_pembelian']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>