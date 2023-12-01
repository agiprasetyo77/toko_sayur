<div class="animated fadeIn">

    <?php
    $peembelian = array();
    $ambil = $koneksi->query("SELECT pembelian.*, pelanggan.nama_pelanggan
    FROM pembelian
    LEFT JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");


    // $ambil = $koneksi->query("select * from pembelian");
    
    while ($pecah = $ambil->fetch_assoc()) {
        $peembelian[] = $pecah;
    }


    $id_pembelian = $_GET['pembayaran'];
    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
    $pecah = $ambil->fetch_assoc();
    ?>

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

                            <?php foreach ($peembelian as $key => $value): ?>

                                <tr>
                                    <td width="50">
                                        <?php echo $key + 1 ?>
                                    </td>
                                    <td width="170">
                                        <?php echo $value['nama_pelanggan']; ?>
                                    </td>
                                    <td width="150">
                                        <?php echo date("d F Y", strtotime($value['tanggal_pembelian'])); ?>
                                    </td>
                                    <td width="150">
                                        Rp
                                        <?php echo number_format($value['total_pembelian']); ?>
                                    </td>

                                    <td width="150">
                                        <?php echo $value['status_pembayaran']; ?>
                                    </td>

                                    <td class="text center" width="200">
                                        <a href="index.php?detail_pembelian=<?php echo $value['id_pembelian']; ?>"
                                            class="btn btn-sm btn-info">
                                            <i class=""></i>Detail
                                        </a>
                                        <!-- jika status tidak pending maka akan muncul lihat pembayaran -->

                                        <?php if ($value['status_pembayaran'] !== 'pending'): ?>
                                            <button type="button" name="detail" class="btn btn-sm btn-success"
                                                data-toggle="modal" data-target="#detailModal">
                                                Lihat Bukti</button>





                                            <!-- <a href="index.php?pembayaran=<?php echo $value['id_pembelian']; ?>"
                                                class="btn btn-sm btn-success">
                                                <i class=""></i> Lihat Bukti
                                            </a> -->
                                        <?php endif; ?>

                                    </td>
                                </tr>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>




<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
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
                                            <?php echo $value1['nama_pelanggan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>
                                            <?php echo $value1['jumlah'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>
                                            <?php echo $value1['tanggal'] ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="../assets/foto_bukti/<?php echo $pecah['bukti_pembayaran'] ?>" width="250"
                                class="img-thumbnail img-responsive">
                        </div>
                    </div>
                    <div class="card-footer">
                        <form method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="barang dikirim">Barang dikirim</option>
                                        <option value="pengiriman dibatalkan">Pengiriman dibatalkan</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="simpan" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>