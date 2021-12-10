<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">DATA MAHASISWA FAKULTAS HUKUM</h1>
			<!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


			<div class="card mb-4 mt-5">
				<div class="card-header">
					<a href="<?= base_url('StaffController/tambah_siswa') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Mahasiswa</a>

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
										<a href="<?php echo base_url() ?>StaffController/edit_siswa/<?php echo $s['id_nim'] ?>" class="btn btn-info btn-sm">EDIT</a>
										<a onclick="return confirm('Hapus data ..?')" href="<?php echo base_url() ?>StaffController/hapus_siswa/<?php echo $s['id_nim'] ?>" class="btn btn-warning btn-sm">HAPUS</a>
										<a href="<?php echo base_url() ?>StaffController/show_siswa/<?php echo $s['id_nim'] ?>" class="btn btn-success btn-sm">SHOW</a>
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