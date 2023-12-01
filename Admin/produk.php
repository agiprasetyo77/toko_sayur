<?php
$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk");
while ($pecah = $ambil->fetch_assoc()) {
    $produk[] = $pecah;
}
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Data Produk</strong>
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
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $key => $value): ?>
                                <tr>
                                    <td width="50">
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td width="200">
                                        <img src="assets/foto_produk/<?= $value['foto_produk']; ?>" alt="">
                                    </td>
                                    <td width="120">
                                        <?php echo $value['nama_produk']; ?>
                                    </td>
                                    <td width="100">Rp.
                                        <?php echo $value['harga_produk']; ?>
                                    </td>
                                    <td class="text-center" width="150">
                                        <!-- Tombol Edit -->
                                        <button type="button" name="edit" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editModal<?= $value['id_produk'] ?>"><i class="fa fa-edit"></i>
                                            Edit</button>

                                        <!-- Tombol Hapus -->
                                        <a href="index.php?hapus_produk=<?php echo $value['id_produk']; ?>"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
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

<?php

$kategori_produk = array();

$ambil = $koneksi->query("select * from kategori_produk");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori_produk[] = $pecah;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['simpan'])) {
        $id_kategori_produk = $_POST['id_kategori_produk'];
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga_produk'];
        $deskripsi = $_POST['deskripsi_produk'];
        $stok = $_POST['stok_produk'];
        $foto = $_FILES['foto_produk'];
        $fotoName = $foto['name'];

        $fotoFileName = '';

        if ($foto['size'] > 0) {
            $targetDirectory = 'C:\xampp\htdocs\Mlijo-main\Admin\assets\foto_produk\\';
            $fotoFileName = $targetDirectory . basename($foto['name']);

            if (move_uploaded_file($foto['tmp_name'], $fotoFileName)) {
            } else {
                echo "Error uploading file.";
                exit();
            }
        }
        $koneksi->query("insert into produk(id_kategori_produk,nama_produk, harga_produk, deskripsi_produk,stok, foto_produk)
        values('$id_kategori_produk','$nama','$harga','$deskripsi','$stok','$fotoName' )");

        // Kode PHP Anda yang sudah ada...

        echo "<script>
                console.log('Skrip dieksekusi');
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data produk berhasil disimpan.',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = 'index.php?produk';
                    }
                });
                </script>";

    }
}


?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header py-3">
                    <strong class="card-title">Tambah Data Produk</strong>
                </div>
            </div>
            <div class="modal-body">
                <form action="tambah/tambah_produk1.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label mt-0,5">Nama Kategori</label>
                        <div class="col-sm-10">
                            <select name="id_kategori_produk" class="form-control">
                                <option selected disabled>pilih kategori produk</option>
                                <?php foreach ($kategori_produk as $key => $value): ?>
                                    <option value="<?php echo $value['id_kategori_produk']; ?>">
                                        <?php echo $value['nama_kategori_produk']; ?>
                                    </option>
                                <?php endforeach; ?>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fa fa-chevron-left"></i>Kembali</button>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan <i
                        class="fa fa-chevron-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($produk as $key => $value1): ?>
    <div class="modal fade" id="editModal<?= $value1['id_produk'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-header py-3">
                        <strong class="card-title">Edit Data Produk</strong>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="edit/edit_produk1.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Nama Kategori</label>
                            <div class="col-sm-10">
                                <select name="id_kategori_produk" class="form-control">
                                    <option selected disabled>pilih kategori produk</option>
                                    <?php foreach ($kategori_produk as $key => $value): ?>
                                            <option value="<?php echo $value['id_kategori_produk']; ?>"
                                            <?php if($value['id_kategori_produk'] === $value1['id_kategori_produk']) : ?> selected <?php endif?>>
                                                <?php echo $value['nama_kategori_produk']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_produk" class="form-control"
                                    value="<?= $value1['nama_produk']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga_produk" class="form-control"
                                    value="<?= $value1['harga_produk']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi_produk"
                                    class="form-control"><?= $value1['deskripsi_produk']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" name="stok_produk" class="form-control"
                                    value='<?= $value1['stok']; ?>'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label mt-0,5">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="foto_produk" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" name="id_produk" value="<?= $value1['id_produk']; ?>">
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