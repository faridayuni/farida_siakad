<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="text-center mt-4">INPUT NILAI MAHASISWA</h3>



            <div class="card mb-4 mt-5">
                <div class="card-header bg-info">

                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <p><?php echo $this->session->flashdata('success') ?></p>
                        </div>
                    <?php endif ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM / Nama Mahasiswa</th>
                                <th>Periode</th>
                                <th>Matakuliah</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Dosen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIM / Nama Mahasiswa</th>
                                <th>Periode</th>
                                <th>Mtakuliah</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Dosen</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>


                        <tbody>
                            <?php $nomor = 1;

                            foreach ($khs as $row) :  ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $row->id_nim; ?> | <?= $row->nama_mhs ?></td>
                                    <td><?= $row->periode; ?></td>
                                    <td><?= $row->nama_matkul ?></td>
                                    <td><?= $row->nilai; ?></td>
                                    <td><?= $row->bobot;  ?></td>
                                    <td><?= $row->nama_dosen ?></td>
                                    <td><a href="<?= base_url('DosenController/input_nilai_khs/' .  $row->id_krskhs) ?>" class="btn btn-outline-warning btn-sm"> <i class="fas fa-plus me-1"></i>nilai</td>
                                </tr><br>
                            <?php $nomor++;
                            endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </main>