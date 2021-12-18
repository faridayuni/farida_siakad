<div id="layoutSidenav_content">
    <div class="container-fluid px-3">
        <main>
            <h3 class="text-center mt-4">PENGUMUMAN</h3>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <!-- <form action="<?php echo base_url('SiswaController/cari_pengumuman') ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="Masukan Judul Pengumuman">
                        </div>
                    </form> -->
                </div>
            </div>
            <table class="container table table-hover mt-5">
                <tr>
                    <th>NO</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                </tr>
                <?php foreach ($pengumuman as $p) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $p['judul'] ?></td>
                        <td><?php echo $p['deskripsi'] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </main>
    </div>