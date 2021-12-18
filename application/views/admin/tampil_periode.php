<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="text-center mt-4">DATA PERIODE PERKULIAHAN</h3>
            <!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-info">TAMBAH PERIODE</button>
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
                                <th>PERIODE</th>
                                <th>KETERANGAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>PERIODE</th>
                                <th>KETERANGAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php foreach ($periode as $p) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $p['periode'] ?></td>
                                    <td><?php echo $p['ket'] ?></td>
                                    <td><?php echo $p['status'] ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modal-edit<?= $p['id_periode']; ?>" class="btn btn-warning btn-sm btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-pencil"></i></a>
                                        <a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/delete_periode/<?php echo $p['id_periode'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                <div class="modal-header">
                    <b>TAMBAH PERIODE</b>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('StaffController/tambah_periode') ?>" method="post">
                        <div class="form-group">
                            <label>Masukan Periode</label>
                            <input type="text" name="periode" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Masukan Keterangan</label>
                            <select name="keterangan" class="form-control">
                                <option>ganjil</option>
                                <option>genap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Masukan Status</label>
                            <select name="status" class="form-control">
                                <option value="Y">aktif</option>
                                <option value="N">tidak aktif</option>
                            </select>
                        </div><br>
                        <div>
                            <input type="submit" value="SIMPAN" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $no = 0;
    foreach ($periode as $p) : $no++; ?>
        <div class="row">
            <div id="modal-edit<?= $p['id_periode']; ?>" class="modal fade">
                <div class="modal-dialog">
                    <form action="<?php echo site_url('StaffController/edit_periode'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>&nbsp;
                                <h4 class="modal-title">Edit Data</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" readonly value="<?= $p['id_periode']; ?>" name="mod_id" class="form-control">
                                <div class="form-group">
                                    <label class='col-md-3'>Periode</label>
                                    <div class='col-md-9'><input type="text" name="mod_name" autocomplete="off" value="<?= $p['periode']; ?>" required placeholder="Masukkan Modal" class="form-control"></div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class='col-md-3'>Keterangan</label>
                                    <div class='col-md-9'><input type="text" name="mod_ket" autocomplete="off" value="<?= $p['ket']; ?>" required placeholder="Masukkan Modal" class="form-control"></div>
                                </div><br>
                                <div class="form-group">
                                    <label class='col-md-3'>Status</label>
                                    <div class='col-md-9'><input type="text" name="mod_status" autocomplete="off" value="<?= $p['status']; ?>" required placeholder="Masukkan Modal" class="form-control"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>