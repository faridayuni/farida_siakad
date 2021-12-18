<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="text-center">EDIT MATAKULIAH</h1>
			<form action="<?php echo base_url('StaffController/simpanedit_matakuliah') ?>" method="post">
				<div class="form-group">
					<label>Masukan ID </label>
					<input type="hidden" name="id" value="<?php echo $matakuliah['id_matkul'] ?>">
					<input type="text" name="ids" class="form-control" value="<?php echo $matakuliah['id_matkul'] ?>">
				</div>

				<div class="form-group">
					<label>Masukan Matakuliah</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $matakuliah['nama_matkul'] ?>">
				</div>

				<div class="form-group">
					<label>Masukan Semester</label>
					<select name="smt" class="form-control">
						<option><?= $matakuliah['semester'] ?></option>
						<option><b>---Pilih semester lain :---</b></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select>
					<!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
				</div>

				<div class="form-group">
					<label>Masukan Keterangan</label>
					<select name="ket" class="form-control">
						<option><?= $matakuliah['ket'] ?></option>
						<option><b>---Pilih keterangan lain :---</b></option>
						<option value="ganjil">ganjil</option>
						<option value="genap">genap</option>
					</select>
					<!-- <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama_matkul') ?>"> -->
				</div>


				<div class="form-group">
					<label>Masukan SKS</label>
					<input type="text" name="sks" class="form-control" value="<?php echo $matakuliah['sks'] ?>">
				</div>

				<div class="form-group">
					<label>Masukan Kelas</label>
					<select name="kelas" class="form-control">
						<option value="<?php echo $matakuliah['id_kelas'] ?>"><?php echo $matakuliah['nama_kelas'] ?></option>
						<?php foreach ($kelas as $k) : ?>
							<option value="<?php echo $k['id_kelas'] ?>"><?php echo $k['nama_kelas'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Masukan Dosen</label>
					<select name="dosen" class="form-control">
						<option value="<?php echo $matakuliah['id_dosen'] ?>"><?php echo $matakuliah['nama_dosen'] ?></option>
						<?php foreach ($dosen as $d) : ?>
							<option value="<?php echo $d['id_nidn'] ?>"><?php echo $d['nama_dosen'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Masukan Jurusan</label>
					<select name="jurusan" class="form-control">
						<option value="<?php echo $matakuliah['id_jurusan'] ?>"><?php echo $matakuliah['nama'] ?></option>
						<?php foreach ($jurusan as $j) : ?>
							<option value="<?php echo $j['id_jurusan'] ?>"><?php echo $j['nama'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Masukan Hari</label>
					<select name="hari" class="form-control">
						<option><?= $matakuliah['hari'] ?></option>
						<option><b>---Pilih hari lain :---</b></option>
						<option value="Senin">Senin</option>
						<option value="Selasa">Selasa</option>
						<option value="Rabu">Rabu</option>
						<option value="Kamis">Kamis</option>
						<option value="Jumat">Jumat</option>
					</select>
				</div>

				<div class="form-group">
					<label>Masukan Jam Mulai</label>
					<input type="time" name="jam_mulai" class="form-control" value="<?php echo $matakuliah['jam_mulai'] ?>">
				</div>

				<div class="form-group">
					<label>Masukan Jam Selesai</label>
					<input type="time" name="jam_selesai" class="form-control" value="<?php echo $matakuliah['jam_selesai'] ?>">
				</div>


				<input type="submit" value="SIMPAN" class="btn btn-info">
			</form>

		</div>
	</main>