<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-4">
            <h3 class="text-center">Tambah Jurusan</h3>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <p><?php echo validation_errors() ?></p>
                </div>
            <?php endif ?>
            <br>
            <form enctype="multipart/form-data" action="<?php echo base_url('StaffController/post_jurusan') ?>" method="post">
                <div class="form-group">
                    <label>Masukan ID Jurusan</label>
                    <input type="text" name="id" class="form-control" value="<?php echo set_value('id_jurusan') ?>">
                </div>

                <div class="form-group">
                    <label>Masukan Jurusan</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
                </div>

                <input type="submit" value="SIMPAN" class="btn btn-info">
                | <a href="<?= base_url('StaffController/jurusan') ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>


    </main>