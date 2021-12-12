<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-5">
			<h1 class="mt-4">Siakad</h1>
			<p style="line-height: 5px">Sistem Inforamasi Akademik Fakultas Hukum</p>

			<?php if (validation_errors()) : ?>
				<div class="alert alert-warning">
					<p><?php echo validation_errors() ?></p>
				</div>
			<?php endif ?>
			
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Tambah Data Mahasiswa
				</div>
				<div class="card-body">
					<?= form_open_multipart('StaffController/do_siswa'); ?>
					<div class="form-group">
						<label>Masukan Nim</label>
						<input type="text" name="nim" class="form-control" value="<?php echo set_value('id_nim') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_mhs') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Tempat Tanggal Lahir</label>
						<input type="text" name="ttl" class="form-control" value="<?php echo set_value('ttl_mhs') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Nomor Telepon</label>
						<input type="text" name="telepon" class="form-control" value="<?php echo set_value('no_telepon') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Email</label>
						<input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Jurusan</label>
						<select class="form-control" name="jurusan">
							<?php foreach ($jurusan as $k) : ?>
								<option value="<?php echo $k['id_jurusan'] ?>"><?php echo $k['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Tahun Masuk</label>
						<input type="number" name="angkatan" class="form-control" value="<?php echo set_value('angkatan') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>


					<button type="submit" class="btn btn-success mt-3">Simpan</button>
				</div>



				<?= form_close(); ?>
			</div>
		</div>
	</main>