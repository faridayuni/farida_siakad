<div id="layoutSidenav_content">
	<div class="container">
		<div class="row mt-3">
			<div class="col-xl-5">
				<div class="card bg-light text-black mb-4">
					<div class="card-body">
						<center>Jumlah Mahasiswa : <?= $jumlah ?></center>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between bg-dark">
						<a class="small text-white stretched-link" href="<?= base_url('StaffController/siswa') ?>">View Details</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xl-5">
				<div class="card bg-light text-black mb-4">
					<div class="card-body">
						<center>Jumlah Dosen : <?= $jumlah_dosen ?></center>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between bg-dark">
						<a class="small text-white stretched-link" href="<?= base_url('StaffController/dosen') ?>">View Details</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>
			</div>
			<!-- <div class="col-xl-3 col-md-6">
				<div class="card bg-success text-white mb-4">
					<div class="card-body">Success Card</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="#">View Details</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
	<main>
		<div class="container-fluid px-3">
			<!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->

			<div class="">
				<div class="card mb-4 mt-5">
					<div class="card-header">
						<center>
							<h3>Profil Admin</h3>
						</center>
					</div>
					<div class="card-body">

						<div class="card" style="box-shadow: red;">
							<div class="card-body">
								<center>
									<img src="<?php echo base_url() ?>asset/image/<?php echo $admin['foto'] ?>" height="200px">
								</center>

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
									</table>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>