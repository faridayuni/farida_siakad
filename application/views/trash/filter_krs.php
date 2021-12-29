<div id="layoutSidenav_content">
    <h3 class="mt-4 text-center">Kartu Rencana Studi --- <?= $sess[0]['nama_mhs'] ?></h3>
    <div class="row mt-3 ml-5">
        <div class="col-xl-5">
            <div class="container-fluid px-5">

                <!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        KRS --- Lihat Semua Krs
                    </div>

                    <?= form_open('MahasiswaController/tampil') ?>
                    <div class="card-body ml-3">
                        <div class="form-group">
                            <input type="hidden" name="npm" value="<?= $sess[0]['id_nim'] ?>" class="form-control">
                            <button class="btn btn-primary mt-3">Lihat</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>

        </div>

        <div class="col-xl-5">
            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    KRS --- Lihat Berdasarkan Periode
                </div>

                <?= form_open('MahasiswaController/tampil2') ?>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="npm" value="<?= $sess[0]['id_nim'] ?>" class="form-control">

                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <select name="smt" class="form-control">
                                <option>Pilih Periode :</option>
                                <?php foreach ($periode as $p) : ?>
                                    <option value="<?= $p['id_periode'] ?>"><?= $p['periode'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-3">Lihat</button>
                    </div>

                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>