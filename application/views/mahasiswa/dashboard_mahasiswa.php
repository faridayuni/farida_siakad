<div id="layoutSidenav_content">
    <div class="container-fluid px-3">
        <main>
            <!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->

            <div class="">
                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <center>
                            <h3>Profil Mahasiswa</h3>
                        </center>
                    </div>
                    <div class="card-body">

                        <div class="card" style="box-shadow: red;">
                            <div class="card-body">
                                <center>
                                    <img src="<?php echo base_url() ?>asset/image/<?php echo $mahasiswa['foto'] ?>" height="200px">
                                </center>

                                <div class="col mt-3">
                                    <table class="table table-striped">
                                        <tr>
                                            <td style="padding-left:3cm">NIM </td>
                                            <td>: <?php echo $mahasiswa['id_nim'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Nama </td>
                                            <td>: <?php echo $mahasiswa['nama_mhs'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Tempat/ Tanggal Lahir </td>
                                            <td>: <?php echo $mahasiswa['ttl_mhs'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Nomor Telepon </td>
                                            <td>: <?php echo $mahasiswa['no_telepon'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Alamat </td>
                                            <td>: <?php echo $mahasiswa['alamat'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Email </td>
                                            <td>: <?php echo $mahasiswa['email_mhs'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Username </td>
                                            <td>: <?php echo $mahasiswa['username'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Jurusan </td>
                                            <td>: <?php echo $mahasiswa['nama'] ?></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left:3cm">Angkatan </td>
                                            <td>: <?php echo $mahasiswa['angkatan'] ?></td>
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