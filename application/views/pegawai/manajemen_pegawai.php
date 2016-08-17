<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_pegawai.js"></script>

<div class="panel panel-default">
	<div class="panel-body" id="pegawai">
		<legend>Tambah Pegawai</legend>
		<div class="col-md-8">
		<div class="row">
		<?php
		if($this->session->flashdata('pegawai')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('pegawai'); ?>
        	</div>
			<?php
		}
		?>	
		
		<?php echo validation_errors(); ?>

		<?php echo form_open('pegawai/save_Pegawai'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>NIP</label>
				
				<input class="form-control ni" type="text" name="nip" id="nip" maxlength="50" required />
			</div>
			<div class="form-group">
				<label>Nama Pegawai</label>
				<input class="form-control" type="text" name="nama_pegawai" maxlength="100" required />
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" id="email" maxlength="100" />
			</div>
			<div class="form-group">
			    <label>Status Pegawai</label>
				<select class="form-control" name="status" onchange="constrait_pegawai(event)">
					<option value="pns">PNS</option>
					<option value="gtt">GTT</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="reset" class="btn btn-reset" name="reset">Reset</button>
			</div>

			</div>
			<div class="col-md-4">
			<div class="row">
			<blockquote style="font-size:15px;">
			<p style="color:orange;font-size:20px;">Perhatian !!</p>
			<p>Untuk username & password setiap pegawai (PNS), otomatis generate dari sistem dengan format username : <b>NIP</b> , password : <b>sia+NIP</b></p>
			<p>Untuk username & password setiap pegawai (GTT), otomatis generate dari sistem dengan format username : <b>email</b> , password : <b>gurumulia</b></p>
			</blockquote>
			</div>
			</div>
			<div class="col-md-4">
			
			</div>
		</form>
		</div>
		</div>
		<div class="col-md-4"></div>
		<br><br>
		<legend>Data Pegawai</legend>
		<?php
		if($this->session->flashdata('pegawaiupdate')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('pegawaiupdate'); ?>
        	</div>
			<?php
		}
		?>
		<table id="tabelpegawai" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th width="10%">NIP</th>
				<th width="20%">Nama Pegawai</th>
				<th width="20%">Tempat/Tanggal Lahir</th>
				<th width="6%">Jenis Kelamin</th>
				<th width="6%">Status Pegawai</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($datapegawai as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nip']; ?></td>
				<td><?php echo $key['nama_pegawai']; ?></td>
				<td><?php echo $key['tmp_lahir'].", ".$key['tgl_lahir']; ?></td>
				<td><?php echo $key['jenkel']; ?></td>
				<td><?php echo strtoupper($key['status']); ?></td>
				<td>
					<button class="btn btn-primary btn-xs" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildatapegawai(event,'<?php echo base_url(); ?>')">Edit</button>
					<button class="btn btn-danger btn-xs">Reset</button>
			</tr> 
			 <?php
			$x++;	
			}
		?>
			
		</tbody>	
		</table>
	</div>
</div>


<div class="modal fade" id="datapegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Pegawai</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">        
      </div>
    </div>
  </div>
</div>
