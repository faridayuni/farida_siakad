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
								<form enctype="multipart/form-data" action="<?php echo base_url('StaffController/edit_admin') ?>" method="post">
									<div class="form-group">
										<label>Nama Staff</label>
										<input class="form-control" type="text" value="<?php echo $admin['nama_staff'] ?>" name="nama">
									</div><br>
									<div class="form-group">
										<label>Jabatan</label>
										<input class="form-control" type="text" value="<?php echo $admin['jabatan'] ?>" name="jabatan">
									</div><br>
									<div class="form-group">
										<label>Username</label>
										<input class="form-control" type="text" value="<?php echo $admin['username'] ?>" name="username">
									</div><br>
									<div class="form-group">
										<label>Foto</label>
										<img style="width: 50px" src="<?php echo base_url() ?>asset/image/<?php echo $admin['foto'] ?>"><br>
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