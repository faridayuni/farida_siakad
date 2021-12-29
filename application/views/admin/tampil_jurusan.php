<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="text-center mt-4">DATA JURUSAN FAKULTAS HUKUM</h3>
            <!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <!-- <a href="<?= base_url('StaffController/tambah_jurusan') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Jurusan</a> -->
                    <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-outline-info"><i class="fas fa-plus me-1"></i>Tambah Jurusan</button>
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
                                        <a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/delete_jurusan/<?php echo $j['id_jurusan'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div id="modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <b>TAMBAH JURUSAN</b>
                </div>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger">
                        <p><?php echo validation_errors() ?></p>
                    </div>
                <?php endif ?>
                <br>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('StaffController/post_jurusan') ?>" method="post">
                        <div class="form-group">
                            <label>Masukan ID Jurusan</label>
                            <input type="text" name="id" class="form-control" value="<?php echo set_value('id_jurusan') ?>">
                        </div>

                        <div class="form-group">
                            <label>Masukan Jurusan</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
                        </div>

                        <button type="submit" class="btn btn-info">Simpan</button> | <a href="<?= base_url('StaffController/jurusan') ?>" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>