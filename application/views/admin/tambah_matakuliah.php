<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-4">
            <h3 class="text-center">Tambah Matakuliah</h3>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <p><?php echo validation_errors() ?></p>
                </div>
            <?php endif ?>
            <br>
            <form enctype="multipart/form-data" action="<?php echo base_url('StaffController/post_matakuliah') ?>" method="post">
                <div class="form-group">
                    <label>Masukan ID</label>
                    <input type="text" name="id" class="form-control" value="<?php echo set_value('id_matkul') ?>">
                </div>

                <div class="form-group">
                    <label>Masukan Matakuliah</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>">
                </div>

                <div class="form-group">
                    <label>Masukan Semester</label>
                    <select name="smt" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                    <!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
                </div>
                <div class="form-group">
                    <label>Masukan Keterangan</label>
                    <select name="ket" class="form-control">
                        <option>ganjil</option>
                        <option>genap</option>
                    </select>
                    <!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
                </div>

                <div class="form-group">
                    <label>Masukan SKS</label>
                    <input type="number" name="sks" class="form-control" value="<?php echo set_value('sks') ?>">
                </div>

                <div class="form-group">
                    <label>Masukan Kelas</label>
                    <select name="kelas" class="form-control">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?php echo $k['id_kelas'] ?>"><?php echo $k['nama_kelas'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Masukan Dosen Pengajar</label>
                    <select name="dosen" class="form-control">
                        <?php foreach ($dosen as $d) : ?>
                            <option value="<?php echo $d['id_nidn'] ?>"><?php echo $d['nama_dosen'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Masukan Jurusan</label>
                    <select name="jurusan" class="form-control">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?php echo $j['id_jurusan'] ?>"><?php echo $j['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Masukan Hari</label>
                    <select name="hari" class="form-control">
                        <option>Senin</option>
                        <option>Selesa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                    </select>
                    <!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
                </div>
                <div class="form-group">
                    <label>Masukan Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" value="<?php echo set_value('jam_mulai') ?>">
                </div>
                <div class="form-group">
                    <label>Masukan Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" value="<?php echo set_value('jam_selesai') ?>">
                </div>
                <input type="submit" value="SIMPAN" class="btn btn-info"> | <a href="<?= base_url('StaffController/matakuliah') ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>


    </main>