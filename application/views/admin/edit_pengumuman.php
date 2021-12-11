<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-5">



            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <center>
                        <h3>Form Edit Pengumuman</h3>
                    </center>
                </div>

                <form action="<?php echo base_url('StaffController/update_pengumuman') ?>" method="post">

                    <div class="card-body">

                        <div class="form-group">
                            <label>Masukan Judul Pengumuman</label>
                            <input type="hidden" name="id" value="<?php echo $pengumuman['id_pengumuman'] ?>">
                            <input type="text" name="judul" class="form-control" value="<?php echo $pengumuman['judul'] ?>">
                        </div>
                    </div>

                    <div class="card-body">
                        <label>Masukan Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $pengumuman['deskripsi'] ?>">
                    </div>

                    <div class="card-body">
                        <label>Pengumuman Ditujukan Kepada :</label>
                        <select name="tujuan" class="form-control">
                            <option><?php echo $pengumuman['tujuan'] ?></option>
                            <option><b>---Pilih Tujuan Lain :---</b></option>
                            <option>Mahasiswa</option>
                            <option>Dosen</option>
                        </select>
                    </div>

                    <div class="card-body">
                        <label>Masukan Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="<?php echo $pengumuman['tanggal'] ?>">
                    </div>

                    <div class="card-body">
                        <input type="submit" value="SIMPAN" class="btn btn-info">
                    </div>
                </form>
                <a href="<?= base_url('StaffController/pengumuman') ?>" class="btn btn-primary">BACK</a>

            </div>
        </div>
    </main>