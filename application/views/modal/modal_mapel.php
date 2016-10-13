<style>
.datepicker{z-index:1151 !important;}
.modal {overflow-y: scroll}
</style>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>mapel/edit_mapel">
			<div class="">
			<div class="form-group">
				<label>Mapel</label>
				<input type="text" class="hide" name="id" value="<?php echo $mapel['id']; ?>" readonly>
				<input class="form-control" type="text" name="nama_mapel" value="<?php echo $mapel['nama_mapel']; ?>" maxlength="50" required />
			</div>
			<div class="form-group">
			    <label>Nilai Ketuntasan Pengetahuan</label>
				<input type="number" class="form-control" value="<?php echo $mapel['kb']; ?>" name="kb">
			</div>
			<div class="form-group">
			    <label>Nilai Ketuntasan Keterampilan</label>
				<input type="number" class="form-control" value="<?php echo $mapel['kb_p']; ?>" name="kb_p">
			</div>
			<div class="form-group">
			    <label>Kompetensi Dasar</label>
				<textarea class="form-control" name="komp_dasar"><?php echo $mapel['komp_dasar']; ?></textarea>
			</div>
			<div class="form-group">
			    <label>Kompetensi Inti</label>
				<textarea class="form-control" name="komp_inti"><?php echo $mapel['komp_inti']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Status Mapel</label>
				<select class="form-control" name="status_mapel" required>
					<option value=''>-- Status --</option>
					<option value='wajib' <?php echo $mapel['status_mapel']=='wajib'?'selected':''; ?>>Mapel Wajib</option>
					<option value='minat' <?php echo $mapel['status_mapel']=='minat'?'selected':''; ?>>Mapel Pilihan</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>	
			</div>
</form>
