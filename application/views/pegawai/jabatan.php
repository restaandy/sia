<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_pegawai.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Jabatan Pegawai</legend>
		<div class="col-md-4">
		<div class="row">
			<?php
		if($this->session->flashdata('jabatan')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('jabatan'); ?>
        </div>
			<?php
		}
		?>
		<form method="POST" action="<?php echo base_url(); ?>pegawai/input_jabatan">
			<div class="form-group">
				<label>Jabatan</label>
				<select name="jabatan" class="form-control" onchange="jabatanchange(event)" required>
					<option value="">-- Pilih Jabatan --</option>
					<option value="guru">Guru</option>
					<option value="wali">Wali</option>
					<option value="kepsek">Kepala Sekolah</option>
				</select>
			</div>
			<div class="form-group hide" id="id_kelas">
				<label>Kelas</label>
				<select name="id_kelas" class="form-control">
					<option value="">-- Pilih Kelas --</option>
					<?php
					foreach ($kelas as $key) {
					 ?>
					 <option value="<?php echo $key['id'] ?>"><?php echo $key['nama_kelas']." (".$key['tingkat'].")"; ?></option>
					 <?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Pegawai</label>
				<input type="text" name="id_pegawai" id="pegawai" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		</div>
	</div>
	<br><br>
		<legend>Data Jabatan</legend>
		<?php
		if($this->session->flashdata('jabatanupdate')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('jabatanupdate'); ?>
        </div>
			<?php
		}
		?>
		<table id="tabelpegawai" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th width="20%">NIP</th>
				<th width="20%">Nama Pegawai</th>
				<th width="20%">Jabatan</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$x=1;
		foreach ($datajabatan as $key) {
		  ?>
		  <tr>
		  	<td><?php echo $x; ?></td>
		  	<td><?php echo $key['nip']; ?></td>
		  	<td><?php echo $key['nama_pegawai']; ?></td>
		  	<td><?php echo $key['jabatan']; ?> <?php echo $key['nama_kelas']!=null?"(".$key['nama_kelas'].")":''; ?></td>
		  	<td>
					<button class="btn btn-primary btn-xs"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildatajabatan(event,'<?php echo base_url(); ?>')">Edit</button>
					<button class="btn btn-danger btn-xs">Hapus</button>
				</td>	
		  </tr>
		  <?php
		  $x++;
		}
		?>
			
		</tbody>	
		</table>
	</div>
</div>
<div class="modal fade" id="datajabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Jabatan</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">        
      </div>
    </div>
  </div>
</div>
