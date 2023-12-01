<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["simpan"])) {
        $nama = $_POST['nama_kategori_produk'];

        $S = $koneksi->query("INSERT INTO kategori_produk (nama_kategori_produk) VALUES ('$nama') ");
        var_dump($S);

        echo "<script>alert('data berhasil disimpan');</script>";
        echo "<script>location='index.php?kategori_produk';</script>";

    }
}
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Tambah Kategori Produk</strong>
                </div>
                <div class="card-body">
                    <form action="<?= $_SERVER['PHP_SELF']; ?>?tambah_kategori_produk" method="POST">
                        <div class="from-group row">
                            <label class="col-sm-2 col-form-label">Nama Kategori:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kategori_produk" class="form-control"
                                    placeholder="nama kategori">
                            </div>
                        </div>
                </div>

                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col">
                            <a href="index.php?kategori_produk" class="btn btn-sm btn-danger">
                                <i class="fa fa-chevron-left"></i>Kembali
                            </a>
                        </div>
                        <div class="col text-right">
                            <button type="submit" name="simpan" class="btn btn-sm btn-danger">
                                Simpan<i class="fa fa-chevron-left"></i>
                            </button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>