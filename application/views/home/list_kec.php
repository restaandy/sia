<script type="text/javascript">
	var x=1;
	function tambahfield(){
		x++;
		$('#sk').append("<label>Kecamatan "+x+"</label>"+
				'<div class="form-group" style="background-color:#8adcc8;padding:10px;">'+		
				'<input type="text" class="form-control" name="kecamatan[]">'+
				'</div>'
			);
	}
</script>
<form method="POST" action="<?php echo base_url(); ?>dashboard2/save_camat">
	<div class="form-group">
	  <button type="button" class="btn btn-warning" onclick="tambahfield();">Tambah Field</button>
	</div>
	<input type="hidden" name="idkab" value="<?php echo $idkab; ?>">
	<div id="sk">
		<label>Kecamatan 1</label>
		<div class="form-group" style="background-color:#8adcc8;padding:10px;">
			<input type="text" class="form-control" name="kecamatan[]">
		</div>
	 </div>
	<div class="form-group">
		<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
	</div>
</div>
</form>