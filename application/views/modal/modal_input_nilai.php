
<form method="POST" action="<?php echo base_url(); ?>user/save_nilai">
<div class="col-md-4">
<input type="hidden" name="noinduk" value="<?php echo $noinduk; ?>">
<legend>Teori</legend>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Teori'){
			?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="number" class="form-control" name="<?php echo $key['id'] ?>">
			</div>
			<?php
		}
	}
	?>
</div>
<div class="col-md-4">
<legend>Praktek</legend>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Praktek'){
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="number" class="form-control" name="<?php echo $key['id'] ?>">
			</div>
			<?php
		}
	}
	?>
</div>
<div class="col-md-4">
<legend>UTS / UAS</legend>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Uts'){
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="number" class="form-control" name="<?php echo $key['id'] ?>">
			</div>
			<?php
		}
	}
	?>
	<div class="form-group">
				<label>UAS</label>
				<input type="number" class="form-control" name="uas">
			</div>
</div>
<div class="col-md-12">
<div class="form-group">
	<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</div>
</form>