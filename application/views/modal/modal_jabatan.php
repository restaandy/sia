<style>
.datepicker{z-index:1151 !important;}
.modal {overflow-y: scroll}
</style>
<form method="POST" action="<?php echo base_url(); ?>pegawai/edit_jabatan">
			<div class="form-group">
				<label>Pegawai</label>
				<input type="hidden" name="id" value="<?php echo $datajabatan['id']; ?>">
				<input type="text" name="id_pegawai" value="<?php echo $datajabatan['nama_pegawai']; ?>" readonly class="form-control">
			</div>
			<div class="form-group">
				<label>Jabatan</label>
				<select name="jabatan" class="form-control" onchange="jabatanchangee(event)" required>
					<option value="">-- Pilih Jabatan --</option>
					<option value="guru" <?php echo $datajabatan['jabatan']=='guru'?'selected':''; ?>>Guru</option>
					<option value="wali" <?php echo $datajabatan['jabatan']=='wali'?'selected':''; ?>>Wali</option>
					<option value="kepsek" <?php echo $datajabatan['jabatan']=='kepsek'?'selected':''; ?>>Kepala Sekolah</option>
				</select>
			</div>
			<div class="form-group hide" id="id_kelass">
				<label>Kelas</label>
				<select name="id_kelas" class="form-control">
					<option value="">-- Pilih Kelas --</option>
					<?php
					foreach ($kelas as $key) {
					 ?>
					 <option value="<?php echo $key['id'] ?>" <?php echo $datajabatan['id_kelas']==$key['id']?'selected':''; ?>><?php echo $key['nama_kelas']." (".$key['tingkat'].")"; ?></option>
					 <?php
					}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
			</div>
		</form>

