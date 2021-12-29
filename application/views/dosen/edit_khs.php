<div id="layoutSidenav_content">
    <main>
        <div class="col-6 container-fluid px-4">


            <div class="card mb-4 mt-3">
                <div class="card-header bg-info">
                    <center>
                        <h3>Input Nilai</h3>
                    </center>
                </div>

                <form action="<?php echo base_url('DosenController/simpan_nilai_khs') ?>" method="post">


                    <div class="card-body">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $nilai['id_krskhs'] ?>">
                            <input type="text" name="nim" value="<?= $nilai['id_nim'] ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <input type="hidden" name="id_matkul" value="<?= $nilai['id_matkul'] ?>" class="form-control">
                    <input type="hidden" name="periode" value="<?= $nilai['periode'] ?>" class="form-control">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="text" name="nilai" value="<?= $nilai['nilai'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Bobot</label>
                            <input type="text" name="bobot" value="<?= $nilai['bobot'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="submit" value="simpan" class="btn btn-info">
                    </div>


                </form>

            </div>

        </div>

</div>
</div>
</main>