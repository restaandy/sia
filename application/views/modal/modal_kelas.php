<style>
.datepicker{z-index:1151 !important;}
.modal {overflow-y: scroll}
</style>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>kelas/edit_kelas">
			<div class="">
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type="text" class="hide" name="id" value="<?php echo $kelas['id']; ?>" readonly>
				<input class="form-control" type="text" name="nama_kelas" value="<?php echo $kelas['nama_kelas']; ?>" maxlength="50" required />
			</div>
			<div class="form-group">
			    <label>Tingkat Kelas</label>
				<select class="form-control" name="tingkat">
					<?php
						foreach ($tingkat as $key) {
						  ?>
						  <option value="<?php echo $key; ?>" <?php echo $kelas['tingkat']==$key?'selected':''; ?>><?php echo $key; ?></option>
						  <?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>	
			</div>
</form>
