<div id="layoutSidenav_content">
    <main>
        <div class="col-6 container-fluid px-4">
            <!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Inforamasi Akademik Universitas Halu Oleo</p> -->


            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Input KRS
                </div>

                <div class="card-body">
                    <?= form_open('MahasiswaController/simpan_krs'); ?>
                    <div class="form-group">

                        <select name="periode" class="form-control">
                            <option>Pilih Periode :</option>
                            <?php foreach ($periode as $p) : ?>
                                <option value="<?= $p['id_periode'] ?>"><?= $p['periode'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="nim" value="<?= $sess[0]['id_nim'] ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="nama_mk" value="<?= $this->uri->segment(3) ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </main>