<div class="animated fadeIn">

    <?php

    $pelanggan = array();
    $ambil = $koneksi->query("select * from pelanggan");
    while ($pecah = $ambil->fetch_assoc()) {
        $pelanggan[] = $pecah;
    }

    ?>

    <div class="row">

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header py-3">
                    <strong class="card-title">Data Pelanggan</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pelanggan as $key => $value): ?>

                                <tr>
                                    <td width="50">
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td width="150">
                                        <?php echo $value['nama_pelanggan']; ?>
                                    </td>
                                    <td width="200">
                                        <?php echo $value['email_pelanggan']; ?>
                                    </td>
                                    <td width="130">
                                        <?php echo $value['telepon_pelanggan']; ?>
                                    </td>
                                    <td width="200">
                                        <?php echo $value['foto_pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['alamat'] ?>
                                    </td>
                                </tr>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>