<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="text-center mt-4">DATA MAHASISWA FAKULTAS HUKUM</h3>


			<div class="card mb-4 mt-5">
				<div class="card-header">
					<!-- <a href="<?= base_url('StaffController/tambah_siswa') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Mahasiswa</a> -->
					<button type="button" data-toggle="modal" data-target="#modal" class="btn btn-outline-info"><i class="fas fa-plus me-1"></i>Tambah Mahasiswa</button>
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
								<th>NO</th>
								<th>NIM</th>
								<th>NAMA</th>
								<th>JURUSAN</th>
								<th>ANGKATAN</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>NO</th>
								<th>NIM</th>
								<th>NAMA</th>
								<th>JURUSAN</th>
								<th>ANGKATAN</th>
								<th>AKSI</th>
							</tr>
						</tfoot>

						<tbody>
							<?php
							foreach ($siswa as $s) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $s['id_nim'] ?></td>
									<td><?php echo $s['nama_mhs'] ?></td>
									<td><?php echo $s['nama'] ?></td>
									<td><?php echo $s['angkatan'] ?></td>
									<td>
										<a href="<?php echo base_url() ?>StaffController/show_siswa/<?php echo $s['id_nim'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
										| | <a href="<?php echo base_url() ?>StaffController/edit_siswa/<?php echo $s['id_nim'] ?>" class="btn btn-info btn-sm"><i class="fas fa-pen"></i> Edit</a>
										| | <a onclick="return confirm('Hapus Data Mahasiswa ..?')" href="<?php echo base_url() ?>StaffController/hapus_siswa/<?php echo $s['id_nim'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>

									</td>
								</tr>
							<?php
							endforeach; ?>
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
					<b>TAMBAH MAHASISWA</b>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('StaffController/do_siswa') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Masukan Nim</label>
							<input type="text" name="nim" class="form-control" value="<?php echo set_value('id_nim') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_mhs') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Tempat Tanggal Lahir</label>
							<input type="text" name="ttl" class="form-control" value="<?php echo set_value('ttl_mhs') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Nomor Telepon</label>
							<input type="text" name="telepon" class="form-control" value="<?php echo set_value('no_telepon') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Jurusan</label>
							<select class="form-control" name="jurusan">
								<?php foreach ($jurusan as $k) : ?>
									<option value="<?php echo $k['id_jurusan'] ?>"><?php echo $k['nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Masukan Tahun Masuk</label>
							<input type="number" name="angkatan" class="form-control" value="<?php echo set_value('angkatan') ?>">
						</div>
						<div class="form-group">
							<label>Masukan Foto</label>
							<input type="file" name="foto" class="form-control">
						</div><br>
						<div>
							<button type="submit" class="btn btn-info">Simpan</button> | <a href="<?= base_url('StaffController/siswa') ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>