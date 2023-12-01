<div class="shadow p-3 mb-3 mt-3 bg-white" style="border-radius: 5px;">
    <h5><b>Laporan Penjualan</b></h5>
</div>

<?php

// $setTanggal = $koneksi-query("SELECT * FROM pembelian WHERE tanggal_pembelian");

if (isset($_POST["cari"])) {

    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];

    $ambil = $koneksi->query("SELECT * FROM pembelian 
        JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
        WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");


    while ($pecah = $ambil->fetch_assoc()) {
        $semuadata[] = $pecah;
        // var_dump($pecah);
    }



}
?>

<div class="card shadow bg-white">
    <div class="card-body">
        <form method="post" id="formTanggal">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="" class="col-form-label text-end">Mulai :</label>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input type="date" name="tglm" class="form-control" value="<?= $tgl_mulai; ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="" class="col-form-label text-end">Sampai :</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" name="tgls" class="form-control" value="<?= $tgl_selesai; ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <button name="cari" class="btn btn-primary" onclick="setDate()" id="buttonSubmit" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<div class="" id="pesan">
    <?php error_reporting(E_ERROR | E_PARSE);
    if (($semuadata)) { ?>
        <div class="alert alert-info shadow">
            <h5>
                <b>Laporan Pembelian dari
                    <?php echo date("d F Y", strtotime($tgl_mulai)); ?>
                    Sampai
                    <?php echo date("d F Y", strtotime($tgl_selesai)); ?>
                </b>
            </h5>
        </div>

    <?php } elseif (!$semuadata) { ?>
        <div id="pesan1" class="alert alert-danger shadow">
            <h5>
                Harap isi tanggal terlebih dahulu!
            </h5>
        </div>
    <?php } ?>
</div>



<div class="card shadow bg-white" id="tabelLaporan">

    <div class="card-body">
        <div class="table-responsive">

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($semuadata as $key => $value): ?>
                        <tr>
                            <td width="50">
                                <?php echo $key + 1; ?>
                            </td>
                            <td>
                                <?php echo $value['nama_pelanggan']; ?>
                            </td>
                            <td>
                                <?php echo $value['tanggal_pembelian']; ?>
                            </td>
                            <td>Rp.
                                <?php echo number_format($value['total_pembelian']); ?>
                            </td>
                        </tr>
                        <?php $total += $value['total_pembelian']; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp.
                            <?php echo number_format($total); ?>
                        </th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<?php if (!empty($semuadata)): ?>

    <?php if (!empty($semuadata)): ?>
        <form action="download.php">
            <button id="downloadBtn" class="btn btn-sm btn-success" style="float: right;">
                <i class="fa fa-download"></i> Download
            </button>
        </form>
    <?php endif; ?>


<?php endif; ?>

<script>
    function setDate() {
        const form = document.getElementById('formTanggal')
        const pesan = document.getElementById('pesan1');
        const tabelLaporan = document.getElementById('tabelLaporan');

        form.method = "post";
        form.submit();
        // pesan.style.display = "none"
        // tabelLaporan.style.display = "block"
    }
</script>


<script src="https://unpkg.com/html2pdf.js"></script>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function () {
        // Buat instance html2pdf
        var element = document.getElementById('tabelLaporan'); // Ganti dengan ID elemen yang ingin Anda cetak
        html2pdf(element);
    });

    // function hiddenPesan() {
    //     const pesan1 = documnet.getElementById('pesan1');

    //     pesan1.style.display = "none";
    // }
</script>