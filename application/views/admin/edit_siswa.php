<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">



			<div class="card mb-4 mt-3">
				<div class="card-header">
					<center>
						<h3>Form Edit Data Mahasiswa</h3>
					</center>
				</div>

				<form enctype="multipart/form-data" action="<?php echo base_url('StaffController/do_edit_siswa') ?>" method="post">

					<div class="card-body">

						<div class="form-group">
							<label>Masukan Nim</label>
							<input type="text" name="nim" class="form-control" value="<?php echo $siswa['id_nim'] ?>">
							<input type="hidden" name="id" class="form-control" value="<?php echo $siswa['id_nim'] ?>">
						</div>
					</div>

					<div class="card-body">
						<label>Masukan Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $siswa['nama_mhs'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Tempat Tanggal Lahir</label>
						<input type="text" name="ttl" class="form-control" value="<?php echo $siswa['ttl_mhs'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo $siswa['alamat'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Nomor Telepon</label>
						<input type="text" name="telepon" class="form-control" value="<?php echo $siswa['no_telepon'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Email</label>
						<input type="text" name="email" class="form-control" value="<?php echo $siswa['email_mhs'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Jurusan</label>
						<select class="form-control" name="jurusan">
							<option value="<?php echo $siswa['id_jurusan'] ?>"><?php echo $siswa['nama'] ?></option>
							<?php foreach ($jurusan as $j) : ?>
								<option value="<?php echo $j['id_jurusan'] ?>"><?php echo $j['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="card-body">
						<label>Masukan Tahun Masuk</label>
						<input type="number" name="angkatan" class="form-control" value="<?php echo $siswa['angkatan'] ?>">
					</div>

					<div class="card-body">
						<div class="form-group">
							<img style="width: 50px" src="<?php echo base_url() ?>asset/image/<?php echo $siswa['foto'] ?>"><br>
							<label>Masukan Foto</label>
							<input type="file" name="foto" class="form-control">
						</div>


					</div>
					<div class="card-body">
						<input type="submit" value="SIMPAN" class="btn btn-info">
					</div>
				</form>
				<a href="<?= base_url('StaffController/siswa') ?>" class="btn btn-primary">BACK</a>

			</div>
		</div>
	</main>