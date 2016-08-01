<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_pengajar.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
	<legend>Tambah Pengajar</legend>
	 <form>
	 <div class="col-md-4">
	 <div class="row">
	 	<div class="form-group">
	 		<label>Nama Pengajar</label>
	 		<input type="text" name="pegawai" id="pegawai" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Kelas</label>
	 		<input type="text" name="kelas" id="kelas" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Mata Pelajaran</label>
	 		<input type="text" name="mapel" id="mapel" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Tahun Ajaran</label>
	 		<input type="text" name="ta" id="ta" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
	 		<button type="reset" class="btn btn-warning" >Reset</button>
	 	</div>
	 </div>
	 </div>	
	 </form>
	</div>
</div>	