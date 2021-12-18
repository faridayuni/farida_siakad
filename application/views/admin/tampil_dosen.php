<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="text-center mt-4">DATA DOSEN FAKULTAS HUKUM</h3>
			<!-- <p style="line-height: 5px">Sistem Informasi Akademik Universitas Halu Oleo</p> -->


			<div class="card mb-4 mt-5">
				<div class="card-header">
					<a href="<?= base_url('StaffController/tambah_dosen') ?>" class="btn btn-outline-secondary"><i class="fas fa-plus me-1"></i>Tambah Dosen</a>

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
								<th>NIDN</th>
								<th>NAMA</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>NO</th>
								<th>NIDN</th>
								<th>NAMA</th>
								<th>AKSI</th>
							</tr>
						</tfoot>

						<tbody>
							<?php foreach ($dosen as $s) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $s['id_nidn'] ?></td>
									<td><?php echo $s['nama_dosen'] ?></td>
									<td>
										<a href="<?php echo base_url() ?>StaffController/show_dosen/<?php echo $s['id_nidn'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
										| |<a href="<?php echo base_url() ?>StaffController/edit_dosen/<?php echo $s['id_nidn'] ?>" class="btn btn-info btn-sm"><i class="fas fa-pen"></i> Edit</a>
										| |<a onclick="return confirm('Hapus Data Dosen ..?')" href="<?php echo base_url() ?>StaffController/delete_dosen/<?php echo $s['id_nidn'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>