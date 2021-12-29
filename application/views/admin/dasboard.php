<div id="layoutSidenav_content">
	<!-- <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<center><img src="https://www.uho.ac.id/fakultas/fhukum/wp-content/uploads/sites/7/2020/09/15-1.jpg" width="1100px"></center>
				<div class="carousel-caption mb-5 mr-5" style="padding-right: 4cm;">
					<h1 style="color: black;"><strong>Selamat Datang Admin Siakad</strong></h1>
				</div>
			</div>
		

		</div>
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div> -->

	<div class="card bg-light text-black">
		<div class="card-body">
			<center style="font-size: x-large;"><strong>Selamat Datang Di Website Siakad Fakultas Hukum</strong> </center>
		</div>
	</div>

	<div class="container-fluid px-5 ml-3">
		<div class="row mt-3">
			<div class="col-xl-6">
				<div class="card mb-4 mt-5">
					<div class="card-header">
						<center>
							<h3>Profil Admin</h3>
						</center>
					</div>
					<div class="card-body">

						<div class="card">
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

			<div class="col-xl-5 ml-5 mt-5">
				<div class="card bg-light text-black mb-4">
					<div class="card-body">
						<center>Jumlah Mahasiswa : <?= $jumlah ?></center>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between bg-info">
						<a class="small text-white stretched-link" href="<?= base_url('StaffController/siswa') ?>">View Details</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>

				<div class="card bg-light text-black mb-4 mt-5">
					<div class="card-body">
						<center>Jumlah Dosen : <?= $jumlah_dosen ?></center>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between bg-info">
						<a class="small text-white stretched-link" href="<?= base_url('StaffController/dosen') ?>">View Details</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>

				<div class="mb-0 mt-5 ml-5">
					<center><img src="<?= base_url("asset/image/siakadlogo.png") ?>" width="400px" class="mt-4 ml-4"></center>

				</div>

			</div>
		</div>
	</div>
	<main>
		<div class="container-fluid px-5">
			<!-- <h1 class="mt-4">Siakad</h1>
            <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


		</div>
	</main>