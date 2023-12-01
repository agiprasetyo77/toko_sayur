<div class="animated fadeIn">

    <?php

    $data_kategori_produk = array();

    $ambil = $koneksi->query("SELECT * FROM kategori_produk");

    while ($pecah = $ambil->fetch_assoc()) {
        $data_kategori_produk[] = $pecah;
    }
    ?>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Data Kategori Produk</strong>
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
                                <th>Nama Kategori</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data_kategori_produk as $key => $value): ?>

                                <tr>
                                    <td width="50">
                                        <?= $key + 1; ?>
                                    </td>
                                    <td>
                                        <?= $value['nama_kategori_produk']; ?>
                                    </td>
                                    <td class="text-center" width="100">
                                        <a href="index.php?hapus_kategori_produk=<?php echo $value['id_kategori_produk']; ?>"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>Hapus
                                        </a>
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


<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="margin-left: 30%;">
        <!-- Tambahkan style="margin-left: 10%;" untuk menggeser ke kanan -->
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header py-3">
                    <strong class="card-title">Tambah Kategori Produk</strong>
                </div>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="<?= $_SERVER['PHP_SELF']; ?>?tambah_kategori_produk" method="POST">
                        <div class="from-group row">
                            <label class="col-sm-3 col-form-label">Nama Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_kategori_produk" class="form-control"
                                    placeholder="nama kategori">
                            </div>
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


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["simpan"])) {
        $nama = $_POST['nama_kategori_produk'];

        $S = $koneksi->query("INSERT INTO kategori_produk (nama_kategori_produk) VALUES ('$nama') ");
        // var_dump($S);

        echo "<script>alert('data berhasil disimpan');</script>";
        echo "<script>location='index.php?kategori_produk';</script>";

    }
}
?>