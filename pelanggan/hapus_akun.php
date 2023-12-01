<center>
    <h2>Hapus Akun</h2>
    <p class="text-muted">Apakah anda yakin akan menghapus akun ini ?</p>
    <div class="row">
        <div class="col">
            <button name="hapus" class="btn btn-danger" >Ya , saya yakin menghapus akun ini </button>
        </div>
        <div class="col">
            <a href="/asset/index.php" class="btn btn-primary">Tidak , saya tidak jadi menghapus akun ini </a>
        </div>
    </div>
</center>

<?php
session_start();
require('../config/koneksi.php');

function hapusAkun($idPelanggan) {
    global $koneksi;

    // Query untuk menghapus akun
    $query = "DELETE FROM `pelanggan` WHERE `id_pelanggan` = $idPelanggan";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Hapus sesi pelanggan atau lakukan tindakan sesuai kebutuhan
        unset($_SESSION['pelanggan']);
        echo "<script>alert('Akun berhasil dihapus.'); window.location.href = '/loginuser/index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Gagal menghapus akun. Silakan coba lagi.'); window.location.href = 'profil.php';</script>";
        exit();
    }
}

// Contoh penggunaan fungsi dengan nilai id_pelanggan sebagai parameter
$idPelanggan = 4; // Ganti nilai ini sesuai kebutuhan
hapusAkun($idPelanggan);
?>

