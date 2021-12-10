<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">



			<div class="card mb-4 mt-3">
				<div class="card-header">
					<center>
						<h3>Form Edit Data Dosen</h3>
					</center>
				</div>

				<form enctype="multipart/form-data" action="<?php echo base_url('StaffController/simpan_dosen') ?>" method="post">

					<div class="card-body">

						<div class="form-group">
							<label>Masukan NIDN</label>
							<input type="hidden" name="id" value="<?php echo $dosen['id_nidn'] ?>">
							<input type="number" name="nidn" class="form-control" value="<?php echo $dosen['id_nidn'] ?>">
						</div>
					</div>

					<div class="card-body">
						<label>Masukan Nama Dosen</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $dosen['nama_dosen'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Tempat Tanggal Lahir</label>
						<input type="text" name="ttl" class="form-control" value="<?php echo $dosen['ttl_dosen'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Nomor Telepon</label>
						<input type="text" name="telepon" class="form-control" value="<?php echo $dosen['no_telepon'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo $dosen['alamat'] ?>">
					</div>

					<div class="card-body">
						<label>Masukan Email</label>
						<input type="text" name="email" class="form-control" value="<?php echo $dosen['email'] ?>">
					</div>

					<div class="card-body">
						<div class="form-group">
							<img style="width: 50px" src="<?php echo base_url() ?>asset/image/<?php echo $dosen['foto'] ?>"><br>
							<label>Masukan Foto</label>
							<input type="file" name="foto" class="form-control">
						</div>


					</div>
					<div class="card-body">
						<input type="submit" value="SIMPAN" class="btn btn-info">
					</div>
				</form>
				<a href="<?= base_url('StaffController/dosen') ?>" class="btn btn-primary">BACK</a>

			</div>
		</div>
	</main>