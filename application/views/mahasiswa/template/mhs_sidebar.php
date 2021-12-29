<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu mt-4">
                <div class="nav bg-light">

                    <a class="nav-link bg-light" href="<?= base_url('MahasiswaController/index') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading bg-light">Akademik</div>
                    <a class="nav-link bg-light" href="<?= base_url('MahasiswaController/tampil') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        KRS
                    </a>
                    <a class="nav-link bg-light" href="<?= base_url('MahasiswaController/tampil_khs') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        KHS
                    </a>

                    <div class="sb-sidenav-menu-heading bg-light">Information</div>
                    <a class="nav-link bg-light" href="<?= base_url('MahasiswaController/tampil_pengumuman') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                        Pengumuman
                    </a>

                    <div class="sb-sidenav-menu-heading bg-light">Setting </div>
                    <a class="nav-link bg-light collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        Pengaturan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link bg-light" href="<?= base_url('MahasiswaController/setting_profil') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                Akun
                            </a>
                            <a class="nav-link bg-light" href="<?= base_url('MahasiswaController/setting_password') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Password
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer bg-info">
                <div class="small">Logged in as:</div>
                <?php echo $sess[0]['nama_mhs'] ?>
            </div>
        </nav>
    </div>