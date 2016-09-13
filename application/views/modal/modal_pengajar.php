<form method="POST" action="<?php echo base_url(); ?>pegawai/edit_pengajar">
	 <div class="col-md-4">
	 <div class="row">
	    <div>
	    	<label>Nama Pengajar</label>
	    	<input type="hidden" name="id" value="<?php echo $pengajar['id']; ?>">
	    	<input type="text" class="form-control" value="<?php echo $pegawai; ?>" readonly>
	    </div>	 	
	 	<div class="form-group">
	 		<label>Kelas</label>
	 		<select class="form-control" name="kelas" required>
	 			<option value="">-- Pilih Kelas --</option>
	 			<?php
	 			foreach ($kelas as $key) {
	 			 ?>
	 			 <option value="<?php echo $key['id'].'-'.$key['nama_kelas']; ?>" <?php echo $pengajar['id_kelas']==$key['id']?'selected':''; ?>><?php echo $key['nama_kelas']." - ".$key['tingkat'] ?></option>
	 			 <?php
	 			}
	 			?>
	 		</select>
	 	</div>
	 	<div class="form-group">
	 		<label>Mata Pelajaran</label>
	 		<select class="form-control" name="mapel" required>
	 			<option value="">-- Pilih Mapel --</option>
	 			<?php
	 			foreach ($mapel as $key) {
	 			 ?>
	 			 <option value="<?php echo $key['id'].'-'.$key['nama_mapel']; ?>" <?php echo $pengajar['id_mapel']==$key['id']?'selected':''; ?>><?php echo $key['nama_mapel']; ?></option>
	 			 <?php
	 			}
	 			?>
	 		</select>
	 	</div>
	 	<div class="form-group">
	 		<label>Tahun Ajaran</label>
	 		<select class="form-control" name="ta" required>
	 			<option value="">-- Pilih Tahun Ajaran --</option>
	 			<?php
	 			foreach ($ta as $key) {
	 			 ?>
	 			 <option value="<?php echo $key['tajaran']; ?>" <?php echo $pengajar['id_ta']==$key['tajaran']?'selected':''; ?>><?php echo $key['ta']." - ".$key['keterangan'];echo $key['status']=='aktif'?' (Aktif)':''; ?></option>
	 			 <?php
	 			}
	 			?>
	 		</select>
	 	</div>
	 	<div class="form-group">
	 		<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
	 	</div>
	 </div>
	 </div>	
	 </form>