<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Akademik</div>
                    <a class="nav-link" href="<?= base_url('StaffController/index') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Home
                    </a>
                    <a class="nav-link" href="<?= base_url('StaffController/siswa') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Mahasiswa
                    </a>
                    <a class="nav-link" href="<?= base_url('StaffController/dosen') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dosen
                    </a>
                    <a class="nav-link" href="<?= base_url('StaffController/matakuliah') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Matakuliah
                    </a>
                    <a class="nav-link" href="<?= base_url('StaffController/jurusan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Jurusan
                    </a>
                    <a class="nav-link" href="<?= base_url('StaffController/kelas') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Kelas
                    </a>

                    <div class="sb-sidenav-menu-heading">Information</div>
                    <a class="nav-link" href="<?= base_url('StaffController/pengumuman') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Pengumuman
                    </a>

                    <div class="sb-sidenav-menu-heading">Pengaturan</div>
                    <a class="nav-link" href="<?= base_url('StaffController/setting_profil') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Profil
                    </a>
                    <a class="nav-link" href="<?= base_url('StaffController/setting_password') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Ubah Password
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $sess[0]['nama_staff'] ?>
            </div>
        </nav>
    </div>