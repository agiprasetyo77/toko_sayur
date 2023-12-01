<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Halaman Detail Produk</strong>
                </div>
                <div class="card-body">
                    <form action="">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Nama Kategori</label>
                            <div class="col-sm-10">
                                <select name="id_kategori_produk" class="form-control">
                                    <option selected disabled>pilih kategori produk</option>
                                    <option value="Sayuran">Sayuran</option>
                                    <option value="Bumbu Dapur">Bumbu Dapur</option>
                                    <option value="Buah-buahan  ">Buah-buahan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_produk" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga_produk" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi_produk" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" name="stok_produk" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="foto_produk" class="form-control">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col">
                            <a href="index.php?produk" class="btn btn-sm btn-danger">
                                <i class="fa fa-chevron-left"></i>Kembali
                            </a>
                        </div>
                        <div class="col text-right">
                            <a href="" class="btn btn-sm btn-primary">
                                Simpan<i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>