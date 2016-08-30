<script type="text/javascript">
	var x=1;
	function tambahfield(){
		x++;
		$('#sk').append("<label>Kelurahan "+x+"</label>"+
				'<div class="form-group" style="background-color:#8adcc8;padding:10px;">'+		
				'<input type="text" class="form-control" name="kelurahan[]">'+
				'</div>'
			);
	}
</script>
<form method="POST" action="<?php echo base_url(); ?>dashboard2/save_lurah">
	<div class="form-group">
	  <button type="button" class="btn btn-warning" onclick="tambahfield();">Tambah Field</button>
	</div>
	<input type="hidden" name="idkec" value="<?php echo $idkec; ?>">
	<div id="sk">
		<label>Kelurahan 1</label>
		<div class="form-group" style="background-color:#8adcc8;padding:10px;">
			<input type="text" class="form-control" name="kelurahan[]">
		</div>
	 </div>
	<div class="form-group">
		<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
	</div>
</div>
</form>