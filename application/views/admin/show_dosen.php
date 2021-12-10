<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">


                <div class="card-header">
                    <center>
                        <h3>Detail Data Dosen</h3>
                    </center>
                </div>
                <div class="card-body">

                    <div class="card" style="box-shadow: red;">
                        <div class="card-body">
                            <div class="row">
                                <div class="">
                                    <center>
                                        <div class="img-thumbnail"><img src="<?php echo base_url() ?>asset/image/<?php echo $dosen['foto'] ?>" height="250px"></div>
                                    </center>
                                </div>

                                <div class="col mt-3">
                                    <table class="table table-striped">
                                        <tr>
                                            <td style="padding-left:3cm">NIDN </td>
                                            <td>: <?php echo $dosen['id_nidn'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Nama </td>
                                            <td>: <?php echo $dosen['nama_dosen'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Tempat/Tanggal Lahir </td>
                                            <td>: <?php echo $dosen['ttl_dosen'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Nomor Telepon </td>
                                            <td>: <?php echo $dosen['no_telepon'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Alamat </td>
                                            <td>: <?php echo $dosen['alamat'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Email </td>
                                            <td>: <?php echo $dosen['email'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Username </td>
                                            <td>: <?php echo $dosen['username'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Password </td>
                                            <td>: <?php echo $dosen['password'] ?></td>
                                        </tr>
                                    </table>

                                    <a href="<?= base_url('StaffController/dosen') ?>" class="btn btn-info">BACK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>