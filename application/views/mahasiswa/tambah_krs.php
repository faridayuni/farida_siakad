<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="text-center mt-4">DATA MATAKULIAH FAKULTAS HUKUM</h3>
			<!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


			<div class="card mb-4 mt-5">
				<!-- <div class="card-header">
					<a href="<?= base_url('StaffController/tambah_matakuliah') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Matakuliah</a>

				</div> -->
				<div class="card-body">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success">
							<p><?php echo $this->session->flashdata('success') ?></p>
						</div>
					<?php endif ?>
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>No</th>
								<th>ID MK</th>
								<th>Matakuliah</th>
								<th>Semester</th>
								<th>SKS</th>
								<th>Kelas</th>
								<th>Dosen Pengajar</th>
								<th>Jurusan</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>No</th>
								<th>ID MK</th>
								<th>Matakuliah</th>
								<th>Semester</th>
								<th>SKS</th>
								<th>Kelas</th>
								<th>Dosen Pengajar</th>
								<th>Jurusan</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>AKSI</th>
							</tr>
						</tfoot>

						<tbody>
							<?php foreach ($matkul as $s) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $s['id_matkul'] ?></td>
									<td><?php echo $s['nama_matkul'] ?></td>
									<td><?php echo $s['semester'] ?></td>
									<td><?php echo $s['sks'] ?></td>
									<td><?php echo $s['nama_kelas'] ?></td>
									<td><?php echo $s['nama_dosen'] ?></td>
									<td><?php echo $s['nama'] ?></td>
									<td><?php echo $s['hari'] ?></td>
									<td><?php echo $s['jam_mulai'] ?></td>
									<td><?php echo $s['jam_selesai'] ?></td>
									<td>
										<a href="<?php echo base_url() ?>MahasiswaController/krs_penawaran/<?php echo $s['id_matkul']  ?>" class="btn btn-info btn-sm">Tawar</a>

									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>