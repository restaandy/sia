<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Sekolah</legend>
		<div class="col-md-8">
		<div class="row">
		<?php echo validation_errors(); ?>

		<?php echo form_open('home/save_sekolah'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>Nama Sekolah</label>
				<input class="form-control" type="text" name="nama_sekolah" maxlength="100" required />
			</div>
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" maxlength="15" name="username" required />
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="password" name="password" required />
			</div>
			<div class="form-group">
				<label>Visi</label>
				<textarea class="form-control" type="text" name="visi"></textarea>
			</div>
			<div class="form-group">
				<label>Misi</label>
				<textarea class="form-control" type="text" name="misi"></textarea>
			</div>

			</div>
			<div class="col-md-4">
			<div class="form-group">
				<label>Telepon</label>
				<input class="form-control" type="password" name="telp" maxlength="50" required />
			</div>
			<div class="form-group">
				<label>Alamat Email</label>
				<input class="form-control" type="email" name="email" maxlength="100" required />
			</div>
			<div class="form-group">
				<label>Website</label>
				<input class="form-control" type="password" name="website" maxlength="100" required />
			</div>
			<div class="form-group">
				<label>Provinsi</label>
				<select class="form-control" name="prov"></select>
			</div>
			<div class="form-group">
				<label>Kabupaten / Kota</label>
				<select class="form-control" name="kabkota"></select>
			</div>

			</div>	
			<div class="col-md-4">
			
			<div class="form-group">
				<label>Kecamatan</label>
				<select class="form-control" name="kec"></select>
			</div>
			<div class="form-group">
				<label>Desa / Kelurahan</label>
				<select class="form-control" name="kel"></select>
			</div>
			<div class="form-group">
				<label>Alamat Tambahan</label>
				<textarea class="form-control" name="almt_tambahan"></textarea>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
				<button type="reset" class="btn btn-reset" name="reset">Reset</button>
			</div>
			</div>
		</form>
		</div>
		</div>
		<div class="col-md-4"></div>
		<br><br>
		<legend>Data Sekolah</legend>
		<table id="tabelsekolah" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th>Nama Sekolah</th>
				<th width="10%">Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($datasekolah as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nama_sekolah'] ?></td>
				<td><a href="#">Edit</a></td>
			</tr> 
			 <?php
			$x++;	
			}
		?>
			
		</tbody>	
		</table>
	</div>
</div>
<script>
$(document).ready(function(){
    $('#tabelsekolah').DataTable();
});
</script>