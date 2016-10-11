<style>
	.modal {overflow-y: scroll}
</style>
<div class="row">
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Semester 1</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Semester 2</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<form method="POST" action="<?php echo base_url(); ?>user/save_nilai_sikap">
<div class="form-group">
				<input type="hidden" name="is_bk" value="<?php echo $bk; ?>">
				<input type="hidden" name="id_mengajar" value="<?php echo $id_mengajar; ?>">
				<input type="hidden" name="no_induk" value="<?php echo $noinduk; ?>">
				<input type="hidden" name="semester" value="1">
	<?php
		foreach ($sikap as $key) {
		if($key->semester==1){
			?>
				<input type="hidden" name="id_nilai_sikap" value="<?php echo $key->id; ?>">
			<?php
		}
		}
	?>
</div>
<div class="col-md-6">
<div class="form-group">
	<button class="btn btn-warning" type="button" onclick="tambahsikap()">Tambah Sikap</button>
</div>
<div id="area">
<?php
if(sizeof($sikap)==0){
?>
	  <div class="form-group">
	   <label>Sikap</label>
	   <textarea class="form-control" name="sikap[]"></textarea>
	  </div>
	 <?php
} 
foreach ($sikap as $key) {
	if($key->semester==1){
		$skp=$key->sikap;
		$skp=explode(",",$skp);
		$x=1;
		foreach ($skp as $keys) {
			?>
	  <div class="form-group">
	   <label>Sikap</label>
	   <textarea class="form-control" name="sikap[]"><?php echo $keys; ?></textarea>
	  </div>
			<?php
		$x++;
		}
	}
}	
?>
</div>
<div class="form-group">
	<button type="submt" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
</div>
</div>

</form>
</div>
<div role="tabpanel" class="tab-pane" id="profile">

<form method="POST" action="<?php echo base_url(); ?>user/save_nilai_sikap">
<div class="form-group">
				<input type="hidden" name="is_bk" value="<?php echo $bk; ?>">
				<input type="hidden" name="id_mengajar" value="<?php echo $id_mengajar; ?>">
				<input type="hidden" name="no_induk" value="<?php echo $noinduk; ?>">
				<input type="hidden" name="semester" value="2">
	<?php
		foreach ($sikap as $key) {
		if($key->semester==2){
			?>
				<input type="hidden" name="id_nilai_sikap" value="<?php echo $key->id; ?>">
			<?php
		}
		}
		
	?>
</div>
<div class="col-md-6">
<div class="form-group">
	<button class="btn btn-warning" type="button" onclick="tambahsikapp()">Tambah Sikap</button>
</div>
<div id="area1">
<?php
if(sizeof($sikap)==0){
?>
	  <div class="form-group">
	   <label>Sikap</label>
	   <textarea class="form-control" name="sikap[]"></textarea>
	  </div>
	 <?php
}  
foreach ($sikap as $key) {
	if($key->semester==2){
		$skp=$key->sikap;
		$skp=explode(",",$skp);
		$x=1;
		foreach ($skp as $keys) {
			?>
	  <div class="form-group">
	   <label>Sikap</label>
	   <textarea class="form-control" name="sikap[]"><?php echo $keys; ?></textarea>
	  </div>
			<?php
		$x++;
		}
	}
}	
?>
</div>
<div class="form-group">
	<button type="submt" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
</div>
</div>

</form>
</div>
</div>
<script>
	function tambahsikap(){
		$("#area").append('<div class="form-group">'+
			'<label>Sikap</label>'+
			'<textarea class="form-control" name="sikap[]"></textarea>'+
			'</div>');
	}
	function tambahsikapp(){
		$("#area1").append('<div class="form-group">'+
			'<label>Sikap</label>'+
			'<textarea class="form-control" name="sikap[]"></textarea>'+
			'</div>');
	}
</script>