<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">


                <div class="card-header">
                    <center>
                        <h3>Detail Data Mahasiswa</h3>
                    </center>
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    <div class="card" style="box-shadow: red;">
                        <div class="card-body">
                            <div class="row">
                                <div class="">
                                    <center>
                                        <div class="img-thumbnail"><img src="<?php echo base_url() ?>asset/image/<?php echo $siswa['foto'] ?>" height="250px"></div>
                                    </center>
                                </div>

                                <div class="col mt-3">
                                    <table class="table table-striped">
                                        <tr>
                                            <td style="padding-left:3cm">NIM </td>
                                            <td>: <?php echo $siswa['id_nim'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Nama </td>
                                            <td>: <?php echo $siswa['nama_mhs'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Tempat/Tanggal Lahir </td>
                                            <td>: <?php echo $siswa['ttl_mhs'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Nomor Telepon </td>
                                            <td>: <?php echo $siswa['no_telepon'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Alamat </td>
                                            <td>: <?php echo $siswa['alamat'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Email </td>
                                            <td>: <?php echo $siswa['email_mhs'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Username </td>
                                            <td>: <?php echo $siswa['username'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Password </td>
                                            <td>: <?php echo $siswa['password'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Jurusan </td>
                                            <td>: <?php echo $siswa['nama'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Angkatan </td>
                                            <td>: <?php echo $siswa['angkatan'] ?></td>
                                        </tr>
                                        <!-- <tr>
                                <td>
                                    <a href="staff_dosen.php" class="btn btn-outline-danger"><i class="fas fa-hand-point-left" style="font-size: large;"></i> Back to Dosen</a>
                                </td>
                            </tr> -->
                                    </table>

                                    <a href="<?= base_url('StaffController/siswa') ?>" class="btn btn-info">BACK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>