<?php
$id_kategori = $_GET['edit_kategori_produk']
    ?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Edit Kategori Produk</strong>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="from-group row">
                            <label class="col-sm-2 col-form-label">Nama Kategori:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kategori" class="form-control"
                                    placeholder="nama kategori">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col">
                            <a href="index.php?kategori_produk" class="btn btn-sm btn-danger">
                                <i class="fa fa-chevron-left"></i>Kembali
                            </a>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-sm btn-danger">
                                Simpan<i class="fa fa-chevron-left"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>