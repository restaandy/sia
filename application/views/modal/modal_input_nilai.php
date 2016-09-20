
<form method="POST" action="<?php echo base_url(); ?>user/save_nilai">
<div class="col-md-4">
<input type="hidden" name="noinduk" value="<?php echo $noinduk; ?>">
<legend>Teori</legend>
	<?php
	foreach ($sk as $key) {
		if($key['kategori']=='Teori'){
			?>
			<div class="form-group">
				<label><?php echo $key['standar_kompetensi']; ?> &nbsp <button type="button" id-fill="fill<?php echo $key['id'] ?>" no-induk="<?php echo $noinduk; ?>" nm-sk="<?php echo $key['standar_kompetensi']; ?>" id-sk="<?php echo $key['id'] ?>" onclick="lihat_nilai(event)" class="btn btn-warning btn-xs">Lihat</button></label>
				<input type="number" class="form-control" id="fill<?php echo $key['id'] ?>" name="<?php echo $key['id'] ?>" readonly>
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
				<label><?php echo $key['standar_kompetensi']; ?> &nbsp <button type="button" no-induk="<?php echo $noinduk; ?>" nm-sk="<?php echo $key['standar_kompetensi']; ?>" id-sk="<?php echo $key['id'] ?>" onclick="lihat_nilai(event)" class="btn btn-warning btn-xs">Lihat</button></label>
				<input type="number" class="form-control" name="<?php echo $key['id'] ?>" readonly>
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

<script>
function lihat_nilai(e){
 var sk=$(e.target).attr('nm-sk');	
 var idsk=$(e.target).attr('id-sk');
 var noinduk=$(e.target).attr('no-induk');
 $('#datadetail .modal-title').html('Detail Nilai SK '+sk);	
 
 waitingDialog.show('Loading..');
 
 $.post('<?php echo base_url(); ?>modal/modal_detail_nilai',{'idsk':idsk,noinduk:noinduk},function(data){
  $('#datadetail .modal-body').html(data);
  waitingDialog.hide();  
  $('#datadetail').modal('show');
 }).fail(function(data){
 	alert(data.statusText);
 	waitingDialog.hide();
 });
}
</script>