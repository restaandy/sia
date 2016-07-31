<style>
.datepicker{z-index:1151 !important;}
.modal {overflow-y: scroll}
</style>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>jurusan/edit_program">
			<div class="">
			<div class="form-group">
				<label>Program Jurusan</label>
				<input type="text" class="hide" name="id" value="<?php echo $program['id']; ?>" readonly>
				<input class="form-control" type="text" name="program" value="<?php echo $program['program']; ?>" maxlength="50" required />
			</div>
			<div class="form-group">
			    <label>Keterangan</label>
				<textarea class="form-control" name="keterangan"><?php echo $program['keterangan']; ?></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>	
			</div>
</form>
