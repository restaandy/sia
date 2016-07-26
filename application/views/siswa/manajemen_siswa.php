<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Siswa</legend>
		<div class="col-md-8">
		<div class="row">
		<?php echo validation_errors(); ?>

		<?php echo form_open('siswa/save_siswa'); ?>		
			<div class="col-md-4">
			<legend>Data Pribadi</legend>	
			<div class="form-group">
				<label>Nama Siswa</label>
				<input class="form-control" type="text" name="nama_sekolah" maxlength="100" required />
			</div>
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
			<label>Tanggal Lahir</label>
            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                <input type="text" name="tgl_lahir" class="form-control">
                <div class="input-group-addon">
                 <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

			</div>
			<div class="col-md-4">
			<legend>Alamat</legend>
			<div class="form-group">
				<label>Provinsi</label>
				<select class="form-control" name="prov"></select>
			</div>
			<div class="form-group">
				<label>Kabupaten / Kota</label>
				<select class="form-control" name="kabkota"></select>
			</div>
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
			</div>

			<div class="col-md-4">
			
			
			
			
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
				<th>Nama Siswa</th>
				<th width="10%">Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($datasiswa as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nama'] ?></td>
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
    $('.datepicker').datepicker({
     format: 'yyyy-mm-dd',
     startDate: '-3d'
    });
});

</script>