<style>
	.modal {overflow-y: scroll}
</style>
<div class="row">
<form method="POST" action="<?php echo base_url(); ?>user/save_nilai_sikap">
<div class="form-group">
		<input type="hidden" name="id_mengajar" value="<?php echo $id_mengajar; ?>">
				<input type="hidden" name="no_induk" value="<?php echo $noinduk; ?>">
	<?php
		if(isset($sikap)){
			?>
				<input type="hidden" name="id_nilai_sikap" value="<?php echo $sikap->id; ?>">
			<?php
		}
	?>
	
</div>
<div class="col-md-6">
<div class="form-group">
	<button class="btn btn-warning" type="button" onclick="tambahsikap()">Tambah Sikap</button>
</div>
<div id="area">
<?php 
	if(isset($sikap)){
		$skp=$sikap->sikap;
		$skp=explode(",",$skp);
		$x=1;
		foreach ($skp as $key) {
			?>
	  <div class="form-group">
	   <label>Sikap</label>
	   <textarea class="form-control" name="sikap[]"><?php echo $key; ?></textarea>
	  </div>
			<?php
		$x++;
		}
	}else{
	 ?>
	  <div class="form-group">
	   <label>Sikap</label>
	   <textarea class="form-control" name="sikap[]"></textarea>
	  </div>
	 <?php
	}
?>
</div>
<div class="form-group">
	<button type="submt" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
</div>
</div>

</form>
</div>
<script>
	function tambahsikap(){
		$("#area").append('<div class="form-group">'+
			'<label>Sikap</label>'+
			'<textarea class="form-control" name="sikap[]"></textarea>'+
			'</div>');
	}
</script>