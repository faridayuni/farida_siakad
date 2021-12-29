<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="text-center mt-4">DATA MATAKULIAH FAKULTAS HUKUM</h3>
			<!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


			<div class="card mb-4 mt-5">
				<div class="card-header">
					<!-- <a href="<?= base_url('StaffController/tambah_matakuliah') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Matakuliah</a> -->
					<button type="button" data-toggle="modal" data-target="#modal" class="btn btn-outline-info"><i class="fas fa-plus me-1"></i>Tambah Matakuliah</button>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success">
							<p><?php echo $this->session->flashdata('success') ?></p>
						</div>
					<?php endif ?>
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>No</th>
								<th>ID MK</th>
								<th>Matakuliah</th>
								<th>Semester</th>
								<th>SKS</th>
								<th>Kelas</th>
								<th>Dosen Pengajar</th>
								<th>Jurusan</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>No</th>
								<th>ID MK</th>
								<th>Matakuliah</th>
								<th>Semester</th>
								<th>SKS</th>
								<th>Kelas</th>
								<th>Dosen Pengajar</th>
								<th>Jurusan</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>AKSI</th>
							</tr>
						</tfoot>

						<tbody>
							<?php foreach ($matkul as $s) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $s['id_matkul'] ?></td>
									<td><?php echo $s['nama_matkul'] ?></td>
									<td><?php echo $s['semester'] ?></td>
									<td><?php echo $s['sks'] ?></td>
									<td><?php echo $s['nama_kelas'] ?></td>
									<td><?php echo $s['nama_dosen'] ?></td>
									<td><?php echo $s['nama'] ?></td>
									<td><?php echo $s['hari'] ?></td>
									<td><?php echo $s['jam_mulai'] ?></td>
									<td><?php echo $s['jam_selesai'] ?></td>
									<td>
										<a href="<?php echo base_url() ?>StaffController/edit_matakuliah/<?php echo $s['id_matkul']  ?>" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
										| | <a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/delete_matakuliah/<?php echo $s['id_matkul']  ?>" class="btn btn-warning btn-sm"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>

	<div id="modal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<b>TAMBAH MATAKULIAH</b>
				</div>
				<div class="modal-body">
					<form enctype="multipart/form-data" action="<?php echo base_url('StaffController/post_matakuliah') ?>" method="post">
						<div class="form-group">
							<label>Masukan ID</label>
							<input type="text" name="id" class="form-control" value="<?php echo set_value('id_matkul') ?>">
						</div>

						<div class="form-group">
							<label>Masukan Matakuliah</label>
							<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>">
						</div>

						<div class="form-group">
							<label>Masukan Semester</label>
							<select name="smt" class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
							</select>
							<!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
						</div>

						<div class="form-group">
							<label>Masukan Keterangan</label>
							<select name="ket" class="form-control">
								<option>ganjil</option>
								<option>genap</option>
							</select>
							<!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
						</div>

						<div class="form-group">
							<label>Masukan SKS</label>
							<input type="number" name="sks" class="form-control" value="<?php echo set_value('sks') ?>">
						</div>

						<div class="form-group">
							<label>Masukan Kelas</label>
							<select name="kelas" class="form-control">
								<?php foreach ($kelas as $k) : ?>
									<option value="<?php echo $k['id_kelas'] ?>"><?php echo $k['nama_kelas'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Masukan Dosen Pengajar</label>
							<select name="dosen" class="form-control">
								<?php foreach ($dosen as $d) : ?>
									<option value="<?php echo $d['id_nidn'] ?>"><?php echo $d['nama_dosen'] ?></option>
								<?php endforeach ?>
							</select>
							<!-- <select name="dosen" class="form-control">
                        <?php foreach ($dosen as $d) : ?>
                            <option value="<?php echo $d['id_nidn'] ?>"><?php echo $d['nama_dosen'] ?></option>
                        <?php endforeach ?>
                    </select> -->
						</div>
						<div class="form-group">
							<label>Masukan Jurusan</label>
							<select name="jurusan" class="form-control">
								<?php foreach ($jurusan as $j) : ?>
									<option value="<?php echo $j['id_jurusan'] ?>"><?php echo $j['nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<label>Masukan Hari</label>
							<select name="hari" class="form-control">
								<option>Senin</option>
								<option>Selesa</option>
								<option>Rabu</option>
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
							</select>
							<!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
						</div>
						<div class="form-group">
							<label>Masukan Jam Mulai</label>
							<input type="time" name="jam_mulai" class="form-control" value="<?php echo set_value('jam_mulai') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Jam Selesai</label>
							<input type="time" name="jam_selesai" class="form-control" value="<?php echo set_value('jam_selesai') ?>">
						</div>
						<button type="submit" class="btn btn-info">Simpan</button> | <a href="<?= base_url('StaffController/matakuliah') ?>" class="btn btn-secondary">Cancel</a>
					</form>
				</div>
			</div>
		</div>
	</div>