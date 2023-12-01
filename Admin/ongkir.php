<div class="animated fadeIn">

    <?php

    $ongkir = array();

    $ambil = $koneksi->query("SELECT * FROM ongkir");

    while ($pecah = $ambil->fetch_assoc()) {
        $ongkir[] = $pecah;
    }

    if (isset($_POST["simpan"])) {
        $nama_jalan = $_POST['jalan'];
        $tarif = $_POST['tariff'];

        $koneksi->query("INSERT INTO ongkir (nama_jalan,tarif) VALUES ('$nama_jalan','$tarif') ");


        echo "<script>alert('data berhasil disimpan');</script>";
        echo "<script>location='index.php?ongkir';</script>";

    }

    ?>

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Data Ongkir</strong>
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
                                <th>Nama Jalan</th>
                                <th>Tarif</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($ongkir as $key => $value): ?>

                                <tr>
                                    <td width="50">
                                        <?= $key + 1; ?>
                                    </td>
                                    <td width="270">
                                        <?= $value['nama_jalan']; ?>
                                    </td>
                                    <td white="200">
                                        <?= $value['tarif']; ?>
                                    </td>
                                    <td class="text-center" width="150">
                                        <button type="button" name="edit" class="btn btn-primary btn-sm edit-btn"
                                            data-toggle="modal" data-target="#editModal">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>


                                        <a href="index.php?hapus_ongkir=<?php echo $value['id_ongkir']; ?>"
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

<!-- tambah ongkir -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="margin-left: 30%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header py-3">
                    <strong class="card-title">Tambah Data Ongkir</strong>
                </div>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" action="index.php?ongkir">
                        <div class="from-group row">
                            <label class="col-sm-3 col-form-label">Nama Jalan</label>
                            <div class="col-sm-9">
                                <input type="text" name="jalan" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label">Tarif</label>
                            <div class="col-sm-9">
                                <input type="number" name="tariff" class="form-control">
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

<!-- edit ongkir -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Ongkir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk mengedit detail ongkir -->
                <form id="editForm">
                    <input type="hidden" id="editId" name="id_ongkir" value="">
                    <label for="editNama">Nama Ongkir:</label>
                    <input type="text" class="form-control" id="editNama" name="nama_ongkir" value="">
                    <label for="editTarif">Tarif:</label>
                    <input type="text" class="form-control" id="editTarif" name="tarif" value="">
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.edit-btn').on('click', function () {
            var idOngkir = $(this).data('id');
            var namaOngkir = $(this).data('nama');
            var tarifOngkir = $(this).data('tarif');

            // Mengisi modal dengan detail ongkir
            $('#editId').val(idOngkir);
            $('#editNama').val(namaOngkir);
            $('#editTarif').val(tarifOngkir);
            // Mengisi input lain sesuai kebutuhan
        });

        // Handle form submission
        $('#editForm').on('submit', function (e) {
            e.preventDefault();

            // Mengirim data formulir menggunakan Ajax
            $.ajax({
                url: 'update_ongkir.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Menangani respons setelah ongkir diperbarui
                    console.log(response);
                    // Menutup modal
                    $('#editModal').modal('hide');
                }
            });
        });
    });
</script>