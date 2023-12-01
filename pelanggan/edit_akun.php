<form method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Lengkap : </label>
        <div class="col-sm-9">
            <input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['nama_pelanggan']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email : </label>
        <div class="col-sm-9">
            <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email_pelanggab']; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Telephone : </label>
        <div class="col-sm-9">
            <input type="number" name="telpon" class="form-control" value="<?php echo isset($_SESSION['tlpn']) ? $_SESSION['tlpn'] : ''; ?>">
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat : </label>
        <div class="col-sm-9">
            <textarea name="alamat" class="form-control"><?php echo $_SESSION['alamat_pelanggab']; ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Foto : </label>
        <div class="col-sm-9">
            <img src="/asset/img/<?php echo $_SESSION['foto_pelanggab']; ?>" class="img-responsive mb-3" width="150">
            <input type="file" name="foto" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-9">
            <button name="update" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

<?php
ob_start(); // Start output buffering
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('../config/koneksi.php');

if (isset($_POST["update"])) {
    if (perbarui($_POST) > 0) {
        echo "<script>location='profil.php';</script>";
    }
}



ob_end_flush(); // End output buffering and send output
?>