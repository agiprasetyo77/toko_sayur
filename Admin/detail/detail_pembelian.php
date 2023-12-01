<div class="animated fadeIn">

    <?php

    $id_pembelian = $_GET['detail_pembelian'];

    $ambil = $koneksi->query("select * from pembelian join pelanggan
    on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian='$id_pembelian'");

    $detail = $ambil->fetch_assoc();

    $result = $koneksi->query("select * from ongkir");

    $detail1 = $result->fetch_assoc();
    ?>


    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Halaman Detail Pembelian</strong>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="card-header">
                            <strong>Data Pelanggan</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <td>
                                            <?php echo $detail["nama_pelanggan"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <?php echo $detail["email_pelanggan"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>
                                            <?php echo $detail["telepon_pelanggan"]; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="card-header">
                            <strong>Data Pembelian</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>No. Pembelian</th>
                                        <td>
                                            <?php echo $detail["id_pelanggan"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>
                                            <?php echo $detail["tanggal_pembelian"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>
                                            <?php echo $detail["total_pembelian"]; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="card-header">
                            <strong>Data Pengiriman</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Alamat</th>
                                        <td>
                                            <?php echo $detail['alamat']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ongkir</th>
                                        <td>
                                            <?php echo $detail1['tarif']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>

    </div>
</div>

<?php

$pp = array();
$ambil = $koneksi->query("select * from pembelian_produk join produk
on pembelian_produk.id_produk=produk.id_produk
where pembelian_produk.id_pembelian='$id_pembelian'");

while ($pecah = $ambil->fetch_assoc()) {
    $pp[] = $pecah;
}
?>

<div class="card shadow bg-white">
    <div class="card-body">
        <table id="bootstrap-data-table" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pp as $key => $value): ?>
                    <?php $subtotal = $value['harga_produk'] * $value['jumlah']; ?>
                    <tr>
                        <td width="50">
                            <?php echo $key + 1; ?>
                        </td>
                        <td>
                            <?php echo ($value['nama_produk']); ?>
                        </td>
                        <td>Rp
                            <?php echo number_format($value['harga_produk']); ?>
                        </td>
                        <td>
                            <?php echo ($value['jumlah']); ?>
                        </td>
                        <td>Rp
                            <?php echo number_format($subtotal); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>