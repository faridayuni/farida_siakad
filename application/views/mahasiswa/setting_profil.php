<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-5">
			<div class="card mb-4 mt-5">


				<div class="card-header">
					<center>
						<h3>Setting Account
						</h3>
					</center>
				</div>
				<div class="card-body">

					<div class="card" style="box-shadow: red;">
						<div class="card-body">
							<div class="row">
								<form enctype="multipart/form-data" action="<?php echo base_url('MahasiswaController/edit_akun_mahasiswa') ?>" method="post">
									<!-- <div class="form-group">
										<label>NIM</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['id_nim'] ?>" name="nim">
									</div><br> -->
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['nama_mhs'] ?>" name="nama">
									</div><br>
									<div class="form-group">
										<label>Tempat / Tanggal Lahir</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['ttl_mhs'] ?>" name="ttl">
									</div><br>
									<div class="form-group">
										<label>Telepon</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['no_telepon'] ?>" name="telepon">
									</div><br>
									<div class="form-group">
										<label>Alamat</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['alamat'] ?>" name="alamat">
									</div><br>
									<div class="form-group">
										<label>E-mail</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['email_mhs'] ?>" name="email">
									</div><br>
									<div class="form-group">
										<label>Username</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['username'] ?>" name="username">
									</div><br>
									<!-- <div class="form-group">
										<label>ID Jurusan</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['id_jurusan'] ?>" name="jurusan">
									</div><br>
									<div class="form-group">
										<label>Angkatan</label>
										<input class="form-control" type="text" value="<?php echo $mahasiswa['angkatan'] ?>" name="angkatan">
									</div><br> -->
									<div class="form-group">
										<label>Foto</label>
										<img style="width: 50px" src="<?php echo base_url() ?>asset/image/<?php echo $mahasiswa['foto'] ?>"><br>
										<input class="form-control" type="file" name="foto">
									</div><br>
									<input type="submit" value="SIMPAN" class="btn btn-info">
								</form>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</main>