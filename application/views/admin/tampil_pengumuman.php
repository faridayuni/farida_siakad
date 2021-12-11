<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center">DATA PENGUMUMAN</h1>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-info">TAMBAH</button>
                </div>
                <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('StaffController/cari_pengumuman') ?>">
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="masukan nama siswa">
                        </div>
                    </form>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <p><?php echo $this->session->flashdata('success') ?></p>
                </div>
            <?php endif ?>
            <table class="table table-hover" id="table_id">
                <tr>
                    <th>NO</th>
                    <!-- <th>ID Pengumuman</th> -->
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($pengumuman as $p) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <!-- <td><?php echo $p['id_pengumuman'] ?></td> -->
                        <td><?php echo $p['judul'] ?></td>
                        <td><?php echo $p['deskripsi'] ?></td>
                        <td><?php echo $p['tujuan'] ?></td>
                        <td><?php echo $p['tanggal'] ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>StaffController/edit_pengumuman/<?php echo $p['id_pengumuman'] ?>" class="btn btn-info btn-sm">EDIT</a>
                            <a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/delete_pengumuman/<?php echo $p['id_pengumuman'] ?>" class="btn btn-warning btn-sm">HAPUS</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>

        </div>
    </main>

    <div id="modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <b>TAMBAH PENGUMUMAN</b>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('StaffController/tambah_pengumuman') ?>" method="post">
                        <!-- <div class="form-group">
                            <label>Masukan ID Pengumuman</label>
                            <input type="text" name="id" class="form-control" required="">
                        </div> -->
                        <div class="form-group">
                            <label>Masukan Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Masukan Deskripsi Pengumuman</label>
                            <textarea class="form-control" name="deskripsi" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>Pengumuman Ditujukan Kepada :</label>
                            <select name="tujuan" class="form-control">
                                <option>Mahasiswa</option>
                                <option>Dosen</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Masukan Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required="">
                        </div><br>
                        <div>
                            <input type="submit" value="SIMPAN" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>