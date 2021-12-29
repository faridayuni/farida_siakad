<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<!-- <h1 class="mt-4">Siakad</h1>
			<p style="line-height: 5px">Sistem Inforamasi Akademik Fakultas Hukum</p> -->

			<?php if (validation_errors()) : ?>
				<div class="alert alert-warning">
					<p><?php echo validation_errors() ?></p>
				</div>
			<?php endif ?>

			<div class="card mb-4 mt-3">
				<div class="card-header">
					<center>
						<h3>Tambah Data Dosen</h3>
					</center>

				</div>
				<div class="card-body">
					<?= form_open_multipart('StaffController/post_dosen'); ?>
					<div class="form-group">
						<label>Masukan NIDN</label>
						<input type="text" name="nidn" class="form-control" value="<?php echo set_value('id_nidn') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Nama Dosen</label>
						<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_dosen') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Tempat/Tanggal Lahir</label>
						<input type="text" name="ttl" class="form-control" value="<?php echo set_value('ttl_dosen') ?>">
					</div>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Masukan Nomor Telepon</label>
						<input type="number" name="telepon" class="form-control" value="<?php echo set_value('no_telepon') ?>">
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
						<label>Masukan Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>


					<button type="submit" class="btn btn-success mt-3">Simpan</button>
				</div>



				<?= form_close(); ?>
				<div class="card-body">
					<center><a href="<?= base_url('StaffController/dosen') ?>" class="btn btn-secondary">Back</a></center>
				</div>
			</div>
		</div>
	</main>