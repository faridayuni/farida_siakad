<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    KRS <?=$sess[0]['nama_mhs']?>
                </div>

                <?= form_open('MahasiswaController/tampil') ?>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="npm" value="<?= $sess[0]['id_nim'] ?>" class="form-control">
                        <button class="btn btn-primary mt-3">Lihat Semua KRS</button>
                    </div>

                </div>

                <!-- <div class="card-body">
                    <div class="form-group">
                        <select name="smt" class="form-control">
                            <option>Pilih  Periode</option>
                            <option value="20161">20161</option>
                            <option value="20162">20162</option>
                            <option value="20171">20171</option>
                        </select>
                    </div>
                </div> -->

                <?= form_close(); ?>

                <!-- </form> -->




            </div>
        </div>
    </main>