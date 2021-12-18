<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu mt-4">
                <div class="nav">

                    <a class="nav-link" href="<?= base_url('MahasiswaController/index') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Akademik</div>
                    <a class="nav-link" href="<?= base_url('MahasiswaController/tampil') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        KRS
                    </a>
                    <a class="nav-link" href="<?= base_url('MahasiswaController/tampil_khs') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        KHS
                    </a>

                    <div class="sb-sidenav-menu-heading">Information</div>
                    <a class="nav-link" href="<?= base_url('MahasiswaController/tampil_pengumuman') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                        Pengumuman
                    </a>

                    <div class="sb-sidenav-menu-heading">Pengaturan</div>
                    <a class="nav-link" href="<?= base_url('MahasiswaController/setting_profil') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        Akun
                    </a>
                    <a class="nav-link" href="<?= base_url('MahasiswaController/setting_password') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        Password
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $sess[0]['nama_mhs'] ?>
            </div>
        </nav>
    </div>