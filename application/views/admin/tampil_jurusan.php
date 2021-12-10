<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">DATA JURUSAN FAKULTAS HUKUM</h1>
            <!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <a href="<?= base_url('StaffController/tambah_jurusan') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Jurusan</a>

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
                                <th>ID JURUSAN</th>
                                <th>NAMA JURUSAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>ID JURUSAN</th>
                                <th>NAMA JURUSAN</th>
                                <th>AKSI</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php foreach ($jurusan as $j) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $j['id_jurusan'] ?></td>
                                    <td><?php echo $j['nama'] ?></td>
                                    <td>
                                        <a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/delete_jurusan/<?php echo $j['id_jurusan'] ?>" class="btn btn-warning btn-sm">HAPUS</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>