<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu mt-4">
                <div class="nav">

                    <a class="nav-link" href="<?= base_url('DosenController/index') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Akademik</div>
                    <a class="nav-link" href="<?= base_url('DosenController/show_khs') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        KHS
                    </a>

                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        KHS
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <?= form_open('DosenController/show_khs') ?>

                            <div class="form-group">
                                <input type="hidden" name="nidn" value="<?= $sess[0]['id_nidn'] ?>" class="form-control">
                                <button class="btn btn-primary mt-3">Lihat</button>
                            </div>

                            <?= form_close(); ?>
                        </nav>
                    </div> -->




                    <!-- <a class="nav-link" href="<?= base_url('StaffController/matakuliah') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Matakuliah
                    </a> -->
                    <!-- <a class="nav-link" href="<?= base_url('StaffController/jurusan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Jurusan
                    </a> -->
                    <!-- <a class="nav-link" href="<?= base_url('StaffController/kelas') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Kelas
                    </a> -->

                    <div class="sb-sidenav-menu-heading">Information</div>
                    <a class="nav-link" href="<?= base_url('DosenController/tampil_pengumuman') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                        Pengumuman
                    </a>

                    <div class="sb-sidenav-menu-heading">Pengaturan</div>
                    <a class="nav-link" href="<?= base_url('DosenController/setting_profil') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        Akun
                    </a>
                    <a class="nav-link" href="<?= base_url('DosenController/setting_password') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        Password
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $sess[0]['nama_dosen'] ?>
            </div>
        </nav>
    </div>