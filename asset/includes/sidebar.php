<div class="card kategori">
    <div class="card-header">
        <h4>Kategori Produk</h4>
    </div>
    <nav class="kecil">
        <?php foreach ($tampil_kategori1 as $row) : ?>
            <form action="" method="post"> <!-- Tambahkan method="post" -->
                <input type="hidden" name="id_kategori" value="<?= $row["id_kategori_produk"]; ?>"> <!-- Tambahkan input hidden untuk id_kategori -->
                <button type="submit" name="nama_kategori" class="nav-link"><?= $row["nama_kategori_produk"]; ?></button>
            </form>
        <?php endforeach; ?>
    </nav>
</div>
