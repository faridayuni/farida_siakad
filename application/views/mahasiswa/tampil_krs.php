<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

</head>

<body>


    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4 mt-3" id="printableArea">
                    <div class="card-header">
                        <!-- <a href="<?= base_url('MahasiswaController/tambah_krs') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-plus me-1"></i> Tambah KRS</a> -->
                        <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-outline-secondary btn-sm"><i class="fas fa-plus me-1"></i> Tambah KRS</button>
                        | <button onclick="printDiv('printableArea')" value="print a div!" class="btn btn-outline-success btn-sm">Print</button>
                        | <button type="button" data-toggle="modal" data-target="#modal1" class="btn btn-outline-warning btn-sm">Filter</button>
                    </div>

                    <div class="col-md-8">
                        <!-- <a href="<?php echo base_url('MahasiswaController/cetak_krs') ?>" class="btn btn-success" target="_BLANK">CETAK</a> -->

                    </div>


                    <div class="card-body">

                        <h3>
                            <center>Kartu Rencana Studi</center>
                        </h3>

                        <div class="card-header mt-5">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-control">Nama : <?= $sess[0]['nama_mhs'] ?></div>
                                    <div class="form-control">NIM : <?= $sess[0]['id_nim'] ?></div>
                                    <div class="form-control">Angkatan : <?= $sess[0]['angkatan'] ?> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-control">Jurusan : <?= $mahasiswa['nama'] ?></div>
                                    <div class="form-control">Batas SKS : 24 </div>
                                </div>
                            </div>
                        </div>


                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Nama Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Semester</th>
                                    <th>Periode</th>
                                    <th>Jadwal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Nama Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Semester</th>
                                    <th>Jadwal</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php $nomor = 1;
                                $total = 0;
                                foreach ($krs as $row) : $sks[] = $row->sks;
                                    $total = array_sum($sks); ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $row->id_matkul; ?></td>
                                        <td><?= $row->nama_matkul; ?></td>
                                        <td><?= $row->sks; ?></td>
                                        <td><?= $row->semester;  ?></td>
                                        <td><?= $row->periode;  ?></td>
                                        <td><?= $row->hari ?> | <?= $row->jam_mulai ?> - <?= $row->jam_selesai ?></td>

                                        <td><a onclick="return confirm('Hapus data ..?')" href="<?= base_url('MahasiswaController/hapus_krs/' .  $row->id_krskhs) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr><br>
                                <?php $nomor++;
                                endforeach; ?>

                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Total SKS </strong> </td>
                                    <td colspan="5"><strong><?= $total ?></strong></td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </main>

        <div id="modal1" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <b> KRS --- Lihat Berdasarkan Periode</b>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('MahasiswaController/tampil2') ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="npm" value="<?= $sess[0]['id_nim'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="smt" class="form-control">
                                    <option>Pilih Periode :</option>
                                    <?php foreach ($periode as $p) : ?>
                                        <option value="<?= $p['id_periode'] ?>"><?= $p['periode'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <input type="submit" value="Cari" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <b> Pilih Periode</b>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('MahasiswaController/tambah_krs') ?>" method="post">
                            <!-- <div class="form-group">
                                <input type="text" name="npm" value="<?= $sess[0]['id_nim'] ?>" class="form-control">
                            </div> -->
                            <div class="form-group">
                                <select name="smt" class="form-control">
                                    <option>Pilih Periode :</option>
                                    <?php foreach ($periodex as $p) : ?>
                                        <option value="<?= $p['ket'] ?>"><?= $p['periode'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <input type="submit" value="Cari" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



</body>

</html>