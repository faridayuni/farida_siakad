<!DOCTYPE html>
<html>

<head>
    <title>CETAK</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
</head>

<body onload="window.print()">
    <div class="container-fluid px-4">
        <div class="card-header mt-3">
            <!-- <div class="row g-2">
                <div class="col-md-6">
                    <div class="form-control">Nama : <?= $sess[0]['nama_mhs'] ?></div>
                    <div class="form-control">NIM : <?= $sess[0]['id_nim'] ?></div>
                    <div class="form-control">Angkatan : <?= $sess[0]['angkatan'] ?> </div>
                </div>
                <div class="col-md-6">
                    <div class="form-control">Jurusan : <?= $mahasiswa['nama'] ?></div>
                    <div class="form-control">Batas SKS : 24 </div>
                </div>
            </div> -->
        </div>


        <div class="card mb-4 mt-3">
            <div class="card-header">
                <a href="<?= base_url('MahasiswaController/tambah_krs') ?>"><i class="fas fa-plus me-1"></i></a>
                Tambah KRS
            </div>

            <div class="col-md-8">
                <a href="<?php echo base_url('MahasiswaController/cetak_krs') ?>" class="btn btn-success" target="_BLANK">CETAK</a>
            </div>


            <div class="card-body">

                <table id="datatablesSimple" class="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Matakuliah</th>
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Periode</th>
                            <th>Dosen Pengampuh</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Matakuliah</th>
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Periode</th>
                            <th>Dosen Pengampuh</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $nomor = 1;

                        foreach ($khs as $row) : $sks[] = $row['bobot'];
                            $total = array_sum($sks); ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $row['id_matkul'] ?></td>
                                <td><?= $row['nama_matkul']; ?></td>
                                <td><?= $row['sks']; ?></td>
                                <td><?= $row['semester'];  ?></td>
                                <td><?= $row['periode'];  ?></td>
                                <td><?= $row['nama_dosen'];  ?></td>
                                <td><?= $row['nilai'];  ?></td>
                                <td><?= $row['bobot'];  ?></td>


                            </tr><br>
                        <?php $nomor++;
                        endforeach; ?>

                        <tr>
                            <td colspan="9"></td>
                        </tr>
                        <tr>
                            <td colspan="8"><strong>Total Nilai </strong> </td>
                            <td colspan=""><strong><?= $total ?></strong></td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>