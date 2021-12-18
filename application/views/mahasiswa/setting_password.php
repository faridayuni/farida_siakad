<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-5">
            <h3 class="text-center mt-3">GANTI PASSWORD</h3>
            <br>
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-info">
                    <p><?php echo $this->session->flashdata('success') ?></p>
                </div>
            <?php endif ?>
            <form enctype="multipart/form-data" action="<?php echo base_url('MahasiswaController/edit_password') ?>" method="post">
                <div class="form-group">
                    <label>Masukan Password</label>
                    <input class="form-control" type="password" name="pswd1">
                </div>
                <div class="form-group">
                    <label>Ulangi Password</label>
                    <input class="form-control" type="password" name="pswd2">
                </div>
                <input type="submit" value="SIMPAN" class="btn btn-info">
            </form>
        </div>
    </main>