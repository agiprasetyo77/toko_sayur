<div class="shadow p-3 mb-3 bg-white rounded mt-2">
    <h5><b>Halaman Pembayaran</b></h5>
</div>

<?php
$id_pembelian = $_GET['pembayaran'];
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();
?>

<div class="card shadow bg-white">
    <div class="card-body row">

        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <?php echo $pecah['nama_pelanggan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>
                            <?php echo $pecah['jumlah'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>
                            <?php echo $pecah['tanggal'] ?>
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

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <button name="proses" class="btn btn-primary">Proses</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

if (isset($_POST['proses'])) {
    $status = $_POST['status'];

    $koneksi->query("update pembelian set
    status='$status' where id_pembelian='$id_pembelian'");

    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>location='../index.php?pembelian ';</script>";
}

?>