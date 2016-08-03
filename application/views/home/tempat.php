<div class="panel panel-default">
	<div class="panel-body">
		<!--<form>-->
			<div class="col-md-4">
			<div class="form-group">
				<label>Kabupaten</label>
				<select class="form-control" name="id_kabkot">
					<option>-- Pilik Kab / Kota --</option>
					<?php

					foreach ($datakab as $key) {
						?>
						<option value="<?php echo $key['id']; ?>"><?php echo $key['kabkot']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Kecamatan</label>
				<input type="text" class="form-control" name="kecamatan"  data-mask="999-99-999-9999-9">
			</div>
			<div class="form-group">
				<button type="button" class="btn btn-primary">Simpan</button>
			</div>
			</div>
	
		<!--</form>-->
	<div id="datatempat">	
	
	</div>
	<script type="text/javascript">
	function req_tempat(){
		$.get("",function(data){

		});
	}
	</script>
	</div>
</div>