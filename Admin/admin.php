<?php

$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {

    die("Error in preparing statement: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {

    die("Error in getting result: " . mysqli_error($koneksi));
}

$userData = mysqli_fetch_assoc($result);


mysqli_stmt_close($stmt);


?>

<div class="container" mt-2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">MY PROFILE</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    $result = $koneksi->query("SELECT foto_admin FROM admin WHERE username = '" . $_SESSION['username'] . "'");
                                    // $query = "SELECT foto_admin FROM admin WHERE username = '" . $_SESSION['username'] . "'";
                                    // $result = mysqli_query($koneksi, $query);
                                    // var_dump($result);
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $urlFoto = $row['foto_admin'];


                                        // var_dump($urlFoto);
                                    
                                        if (!is_null($urlFoto)) {
                                            $urlFoto = str_replace($_SERVER['DOCUMENT_ROOT'], '', $urlFoto);
                                            echo '<img alt="" src="images/foto_admin/' . $urlFoto . '" class="img-thumbnail img-fluid" >';
                                            // echo '<img alt="" src="images/foto_admin/3.png" class="img-thumbnail img-fluid" >';
                                        } else {
                                            echo '<img alt="" src="assets/images/polije.png" class="img-thumbnail img-fluid" >';
                                        }
                                    } else {
                                        echo '<img alt="" src="assets/images/polije.png" class="img-thumbnail img-fluid" >';
                                    }
                                    ?>

                                </div>


                            </div>

                        </div>
                        <div class="col-sm-9 mt-2 text-center"> <!-- Use text-center class for centering content -->
                            <table class="table table-striped">
                                <tr>
                                    <th class="col-4">Username</th>
                                    <th>:</th>
                                    <td>
                                        <?php echo isset($userData['username']) ? $userData['username'] : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-4">Nama Lengkap</th>
                                    <th>:</th>
                                    <td>
                                        <?php echo isset($userData['nama_lengkap']) ? $userData['nama_lengkap'] : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-4">Password</th>
                                    <th>:</th>
                                    <td>********</td> <!-- Passwords should not be displayed in plain text -->
                                </tr>
                                <tr>
                                    <th class="col-4">Email</th>
                                    <th>:</th>
                                    <td>
                                        <?php echo isset($userData['email']) ? $userData['email'] : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <!-- Button to trigger the modal -->
                                        <a type="button" name="edit" data-toggle="modal"
                                            data-target="#editModal<?php echo $userData['username']; ?>"
                                            title="Edit Data" class="btn btn-sm"
                                            style="background: darkslateblue;color:white;">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal<?php echo $userData['username']; ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data Admin</h4>
                        </div>
                        <div class="modal-body">
                            <form action="edit/edit_admin.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="id" value="<?php echo $userData['id_admin']; ?>" hidden />
                                <label>Full Name</label>
                                <input type="text" name="name" value="<?php echo $userData['nama_lengkap']; ?>"
                                    class="form-control" />
                                <br />
                                <label>Username</label>
                                <input type="text" name="usera" value="<?php echo $userData['username']; ?>"
                                    class="form-control" />
                                <br />
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $userData['email']; ?>"
                                    class="form-control" />
                                <br />
                                <label>Password</label>
                                <input type="password" name="pass" required placeholder="*********"
                                    class="form-control" />
                                <br />
                                <label for="foto">Foto Profil</label><br>
                                <input type="file" name="foto" id="foto"><br />
                                <br>
                                <input type="submit" name="update" value="Save" class="btn btn-success" />
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                    onMouseOver="this.style.backgroundColor='#ff6666'"
                                    onMouseOut="this.style.backgroundColor='white'" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>