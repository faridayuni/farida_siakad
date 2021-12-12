<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p>


            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?= base_url('krs') ?>"><i class="fas fa-plus me-1"></i></a>
                    Tambah KRS
                </div>
                <div class="col">
                    <!-- <table class="table table-stripped">
                        <tr>
                            <td>Nama : <?= $sess[0]['nama_mhs'] ?></td>
                            <td>Nim : <?= $sess[0]['id_nim'] ?></td>
                            <td>Angkatan : <?= $sess[0]['angkatan'] ?></td>
                        </tr>
                    </table> -->
                    <div class="text-center mt-2"><b>Nama : <?= $sess[0]['nama_mhs'] ?></b><br>
                        <b>Nim : <?= $sess[0]['id_nim'] ?></b><br>
                        <b>Angkatan : <?= $sess[0]['angkatan'] ?></b>
                    </div>
                </div>
                <div class="card-body">

                    <table id="datatablesSimple" class="mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php $nomor = 1;
                            foreach ($krs as $row) : ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $row->id_matkul; ?></td>
                                    <td><?= $row->nama_matkul; ?></td>
                                    <td><?= $row->sks; ?></td>
                                    <td><?= $row->periode; ?></td>
                                    <!-- <td><a href="<?= base_url('User/Krs/hapus/' . $row->kd_krs) ?>"><i class="fas fa-trash-alt"></i></a></td> -->
                                </tr>
                            <?php $nomor++;
                            endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </main>