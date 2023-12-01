<?php

$pengeluaran = array();
$ambil = $koneksi->query("select * from pengeluaran");
while ($pecah = $ambil->fetch_assoc()) {
    $pengeluaran[] = $pecah;
}

if (isset($_POST['simpan'])) {
    $jenis = $_POST['jenis_pengeluaran'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];

    $koneksi->query("insert into pengeluaran(jenis_pengeluaran, tanggal, total)values('$jenis','$tanggal','$total')");

    echo "<script>alert('data berhasil disimpan');</script>";
    echo "<script>location='index.php?laporan_pengeluaran';</script>";


}

?>




<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Laporan Pengeluaran</strong>
                </div>
                <div class="card-body">
                    <a type="button" name="tambah" class="btn btn-sm btn-primary mb-3 ml-3" data-toggle="modal"
                        data-target="#tambahModal" style="color: white;">
                        <i class="fa fa-plus"></i>Tambah Data
                    </a>
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengeluaran as $key => $value): ?>
                                <tr>
                                    <td width="50">
                                        <?php echo $key + 1 ?>
                                    </td>
                                    <td width="200">
                                        <?= $value['jenis_pengeluaran']; ?>
                                    </td>
                                    <td width="120">
                                        <?php echo date("d F Y", strtotime($value['tanggal'])); ?>
                                    </td>
                                    <td width="100">Rp.
                                        <?php echo number_format($value['total']); ?>
                                    </td>
                                    <td class="text-center" width="150">
                                        <!-- Tombol Edit -->
                                        <button type="button" name="edit" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editModal<?= $value['id_pengeluaran'] ?>"><i
                                                class="fa fa-edit"></i>
                                            Edit</button>
                                        <!-- Tombol Hapus -->
                                        <a href="index.php?hapus_pengeluaran=<?php echo $value['id_pengeluaran']; ?>"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="margin-left: 30%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header py-3">
                    <strong class="card-title">Tambah Pengeluaran</strong>
                </div>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Pengeluaran</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenis_pengeluaran" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label">Total</label>
                            <div class="col-sm-9">
                                <input type="number" name="total" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($pengeluaran as $key => $value1): ?>
    <div class="modal fade" id="editModal<?= $value1['id_pengeluaran'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-header py-3">
                        <strong class="card-title">Edit Pengeluaran</strong>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="edit/edit_pengeluaran1" method="POST">

                        <input type="hidden" name="id" value="<?= $value1['id_pengeluaran']; ?>">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Pengeluaran</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenis" class="form-control"
                                    value="<?= $value1['jenis_pengeluaran']; ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal" class="form-control" value='<?= $value1['tanggal']; ?>'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total</label>
                            <div class="col-sm-9">
                                <input type="number" name="total" class="form-control" value='<?= $value1['total']; ?>'>
                            </div>
                        </div>


                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-chevron-left"></i>Kembali</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan <i
                            class="fa fa-chevron-right"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>



<!--tombol download-->
<form action="download1.php">
    <button id="downloadBtn" class="btn btn-sm btn-success" style="float: right;">
        <i class="fa fa-download"></i> Download
    </button>
</form>