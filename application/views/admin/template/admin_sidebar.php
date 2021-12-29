<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav bg-light">
                    <a class="nav-link bg-light mt-3" href="<?= base_url('StaffController/index') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading bg-light">Academic </div>
                    <a class="nav-link bg-light collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Akademik
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/siswa') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                Mahasiswa
                            </a>
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/dosen') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></i></div>
                                Dosen
                            </a>
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/matakuliah') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Matakuliah
                            </a>
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/jurusan') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Jurusan
                            </a>
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/kelas') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Kelas
                            </a>

                            <a class="nav-link bg-light" href="<?= base_url('StaffController/periode') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                Periode
                            </a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading bg-light">Information </div>
                    <a class="nav-link bg-light" href="<?= base_url('StaffController/pengumuman') ?>">
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
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/setting_profil') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                Akun
                            </a>
                            <a class="nav-link bg-light" href="<?= base_url('StaffController/setting_password') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Password
                            </a>
                        </nav>
                    </div>

                </div>
            </div>
            <div class="sb-sidenav-footer bg-info">
                <div class="small text-light">Logged in as:</div>
                <div class="large text-light"><?php echo $sess[0]['nama_staff'] ?></div>
            </div>
        </nav>
    </div>