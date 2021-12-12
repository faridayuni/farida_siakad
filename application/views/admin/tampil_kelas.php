<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="text-center mt-4">DATA KELAS FAKULTAS HUKUM</h3>
            <!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <a href="<?= base_url('StaffController/tambah_kelas') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Kelas</a>

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
                                <th>NO</th>
                                <th>ID KELAS</th>
                                <th>NAMA KELAS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>ID KELAS</th>
                                <th>NAMA KELAS</th>
                                <th>AKSI</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php foreach ($kelas as $k) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $k['id_kelas'] ?></td>
                                    <td><?php echo $k['nama_kelas'] ?></td>
                                    <td>
                                        <a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/delete_kelas/<?php echo $k['id_kelas'] ?>" class="btn btn-warning btn-sm">HAPUS</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>