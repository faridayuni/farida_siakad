<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


			<div class="card mb-4 mt-5">


				<div class="card-header">
					<center>
						<h3>Profil Admin</h3>
					</center>
				</div>
				<div class="card-body">

					<div class="card" style="box-shadow: red;">
						<div class="card-body">
							<div class="row">
								<div class="">
									<center>
										<div class="img-thumbnail"><img src="<?php echo base_url() ?>asset/image/<?php echo $admin['foto'] ?>" height="250px"></div>
									</center>
								</div>

								<div class="col mt-3">
									<table class="table table-striped">
										<tr>
											<td style="padding-left:3cm">Nama </td>
											<td>: <?php echo $admin['nama_staff'] ?></td>
										</tr>

										<tr>
											<td style="padding-left:3cm">Jabatan </td>
											<td>: <?php echo $admin['jabatan'] ?></td>
										</tr>

										<tr>
											<td style="padding-left:3cm">Username </td>
											<td>: <?php echo $admin['username'] ?></td>
										</tr>

										<!-- <a href="<?= base_url('StaffController/dosen') ?>" class="btn btn-info">BACK</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</main>