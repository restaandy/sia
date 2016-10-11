<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Semester 1</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Semester 2</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="home">
    	<div class="col-md-4">
<legend>Teori</legend>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Teori' && $key['semester']==1){
			?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?> &nbsp <button type="button" id-fill="fill<?php echo $key['id'] ?>" no-induk="<?php echo $noinduk; ?>" nm-sk="<?php echo $key['standar_kompetensi']; ?>" id-sk="<?php echo $key['id'] ?>" onclick="lihat_nilai(event)" class="btn btn-warning btn-xs">Lihat</button></label>
				<input type="number" class="form-control" id="fill<?php echo $key['id'] ?>" value="<?php echo $key['nilai']; ?>" name="<?php echo $key['id'] ?>" readonly>
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
		if($key['kategori']=='Praktek' && $key['semester']==1){
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?> &nbsp <button type="button" id-fill="fill<?php echo $key['id'] ?>" no-induk="<?php echo $noinduk; ?>" nm-sk="<?php echo $key['standar_kompetensi']; ?>" id-sk="<?php echo $key['id'] ?>" onclick="lihat_nilai(event)" class="btn btn-warning btn-xs">Lihat</button></label>
				<input type="number" class="form-control" id="fill<?php echo $key['id'] ?>" value="<?php echo $key['nilai']; ?>" name="<?php echo $key['id'] ?>" readonly>
			</div>
			<?php
		}
	}
	?>
</div>
<form method="POST" action="<?php echo base_url(); ?>user/save_nilai">
<div class="col-md-4 well">
<input type="hidden" name="noinduk" value="<?php echo $noinduk; ?>">
<input type="hidden" name="semester" value="1">
<input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>">
<input type="hidden" name="id_mengajar" value="<?php echo $id_mengajar; ?>">
<legend>UTS / UAS</legend>
	<?php
	$x=0;
	foreach ($sk as $key) {
		if($key['kategori']=='Uts' && $key['semester']==1){
		$x++;
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="hidden" name="id_sk_uts" value="<?php echo $key['id'] ?>">
				<input type="number" class="form-control" value="<?php echo $key['nilai']; ?>" name="uts" required>
			</div>
			<?php
		}
	}
	?>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Uas' && $key['semester']==1){
		$x++;
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="hidden" name="id_sk_uas" value="<?php echo $key['id'] ?>">
				<input type="number" class="form-control" value="<?php echo $key['nilai']; ?>" name="uas" required>
			</div>
			<?php
		}
	}
	?>
<?php
if($x!=0){
?>
<div class="form-group">
	<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
</div>
<?php
}
	?>
</div>
</form>

</div>
<div role="tabpanel" class="tab-pane" id="profile">

<div class="col-md-4">
<legend>Teori</legend>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Teori' && $key['semester']==2){
			?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?> &nbsp <button type="button" id-fill="fill<?php echo $key['id'] ?>" no-induk="<?php echo $noinduk; ?>" nm-sk="<?php echo $key['standar_kompetensi']; ?>" id-sk="<?php echo $key['id'] ?>" onclick="lihat_nilai(event)" class="btn btn-warning btn-xs">Lihat</button></label>
				<input type="number" class="form-control" id="fill<?php echo $key['id'] ?>" value="<?php echo $key['nilai']; ?>" name="<?php echo $key['id'] ?>" readonly>
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
		if($key['kategori']=='Praktek' && $key['semester']==2){
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?> &nbsp <button type="button" id-fill="fill<?php echo $key['id'] ?>" no-induk="<?php echo $noinduk; ?>" nm-sk="<?php echo $key['standar_kompetensi']; ?>" id-sk="<?php echo $key['id'] ?>" onclick="lihat_nilai(event)" class="btn btn-warning btn-xs">Lihat</button></label>
				<input type="number" class="form-control" id="fill<?php echo $key['id'] ?>" value="<?php echo $key['nilai']; ?>" name="<?php echo $key['id'] ?>" readonly>
			</div>
			<?php
		}
	}
	?>
</div>
<form method="POST" action="<?php echo base_url(); ?>user/save_nilai">
<div class="col-md-4 well">
<input type="hidden" name="noinduk" value="<?php echo $noinduk; ?>">
<input type="hidden" name="semester" value="2">
<input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>">
<input type="hidden" name="id_mengajar" value="<?php echo $id_mengajar; ?>">
<legend>UTS / UAS</legend>
	<?php
	foreach ($sk as $key) {
		$x=0;
		if($key['kategori']=='Uts' && $key['semester']==2){
		$x++;
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="hidden" name="id_sk_uts" value="<?php echo $key['id'] ?>">
				<input type="number" class="form-control" value="<?php echo $key['nilai']; ?>" name="uts" required>
			</div>
			<?php
		}
	}
	?>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Uas' && $key['semester']==2){
		$x++;
		?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?></label>
				<input type="hidden" name="id_sk_uas" value="<?php echo $key['id'] ?>">
				<input type="number" class="form-control" value="<?php echo $key['nilai']; ?>" name="uas" required>
			</div>
			<?php
		}
	}
	?>
	<?php
if($x!=0){
?>
<div class="form-group">
	<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
</div>
<?php
}
	?>

</div>
</form>
    </div>
  </div>

</div>






<script>
function lihat_nilai(e){
 var sk=$(e.target).attr('nm-sk');	
 var idsk=$(e.target).attr('id-sk');
 var noinduk=$(e.target).attr('no-induk');
 var fill=$(e.target).attr('id-fill');
 $('#datadetail .modal-title').html('Detail Nilai SK '+sk);	
 
 waitingDialog.show('Loading..');
 
 $.post('<?php echo base_url(); ?>modal/modal_detail_nilai',{'idsk':idsk,noinduk:noinduk,fill:fill},function(data){
  $('#datadetail .modal-body').html(data);
  waitingDialog.hide();  
  $('#datadetail').modal('show');
 }).fail(function(data){
 	alert(data.statusText);
 	waitingDialog.hide();
 });
}
</script>