<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-5">
            <div class="card mb-4 mt-5">


                <div class="card-header">
                    <center>
                        <h3>Setting Account
                        </h3>
                    </center>
                </div>
                <div class="card-body">

                    <div class="card" style="box-shadow: red;">
                        <div class="card-body">
                            <div class="row">
                                <form enctype="multipart/form-data" action="<?php echo base_url('DosenController/edit_akun_dosen') ?>" method="post">
                                    <!-- <div class="form-group">
										<label>NIM</label>
										<input class="form-control" type="text" value="<?php echo $dosen['id_nidn'] ?>" name="nim">
									</div><br> -->
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" value="<?php echo $dosen['nama_dosen'] ?>" name="nama">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Tempat / Tanggal Lahir</label>
                                        <input class="form-control" type="text" value="<?php echo $dosen['ttl_dosen'] ?>" name="ttl">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input class="form-control" type="text" value="<?php echo $dosen['no_telepon'] ?>" name="telepon">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" type="text" value="<?php echo $dosen['alamat'] ?>" name="alamat">
                                    </div><br>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" value="<?php echo $dosen['email'] ?>" name="email">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="text" value="<?php echo $dosen['username'] ?>" name="username">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <img style="width: 50px" src="<?php echo base_url() ?>asset/image/<?php echo $dosen['foto'] ?>"><br>
                                        <input class="form-control" type="file" name="foto">
                                    </div><br>
                                    <input type="submit" value="SIMPAN" class="btn btn-info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>