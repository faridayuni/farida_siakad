<div id="layoutSidenav_content">
    <h3 class="mt-4 text-center">KHS</h3>
    <div class="row mt-3 ml-5">
        <!-- <div class="col-xl-5">
            <div class="container-fluid px-5">
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

        </div> -->

        <div class="col-xl-5">
            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    KRS --- Lihat Berdasarkan Periode
                </div>

                <?= form_open('DosenController/show_khs') ?>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="nidn" value="<?= $sess[0]['id_nidn'] ?>" class="form-control">
                        <button class="btn btn-primary mt-3">Lihat</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>