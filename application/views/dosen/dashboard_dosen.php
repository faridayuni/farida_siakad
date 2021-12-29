<div id="layoutSidenav_content">
    <div class="container-fluid px-3">
        <main>
            <div class="row">
                <div class="col-xl-2 mt-3 ml-5">
                    <div class="card bg-light text-black mb-4">
                        <div class="card-body">
                            <center>Pengumuman : <?= $jumlah ?></center>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-info">
                            <a class="small text-white stretched-link" href="<?= base_url('DosenController/tampil_pengumuman') ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 mt-4 ml-4">
                    <div class="card bg-light text-black mb-4">
                        <div class="card-body">
                            <center style="font-size: x-large;"><strong>Selamat Datang Di Website Siakad Fakultas Hukum</strong> </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-5 mr-4">
                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <center>
                            <h3>Profil Dosen</h3>
                        </center>
                    </div>
                    <div class="card-body">

                        <div class="card" style="box-shadow: red;">
                            <div class="card-body">
                                <center>
                                    <img src="<?php echo base_url() ?>asset/image/<?php echo $dosen['foto'] ?>" height="200px">
                                </center>

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
                                            <td style="padding-left:3cm">Tempat/ Tanggal Lahir </td>
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
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>