<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_guru.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Guru</legend>
		<div class="col-md-8">
		<div class="row">
		<p style="font-size:15px;margin-left:20px;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('guru'); ?></p>
		<?php echo validation_errors(); ?>

		<?php echo form_open('guru/save_guru'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>NIP</label>
				<input class="form-control ni" type="text" name="nip" id="nip" maxlength="50" required />
			</div>
			<div class="form-group">
				<label>Nama Guru</label>
				<input class="form-control" type="text" name="nama_guru" maxlength="100" required />
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" id="email" maxlength="100" />
			</div>
			<div class="form-group">
			    <label>Status Guru</label>
				<select class="form-control" name="status" onchange="constrait_guru(event)">
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
			<p>Untuk username & password setiap guru (PNS), otomatis generate dari sistem dengan format username : <b>NIP</b> , password : <b>sia+NIP</b></p>
			<p>Untuk username & password setiap guru (GTT), otomatis generate dari sistem dengan format username : <b>email</b> , password : <b>gurumulia</b></p>
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
		<legend>Data Guru</legend>
		<p style="font-size:20px;;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('siswaupdate'); ?></p>
		<table id="tabelguru" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th width="10%">NIP</th>
				<th width="20%">Nama Guru</th>
				<th width="20%">Tempat/Tanggal Lahir</th>
				<th width="6%">Jenis Kelamin</th>
				<th width="6%">Status Guru</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($dataguru as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nip']; ?></td>
				<td><?php echo $key['nama_guru']; ?></td>
				<td><?php echo $key['tmp_lahir'].", ".$key['tgl_lahir']; ?></td>
				<td><?php echo $key['jenkel']; ?></td>
				<td><?php echo strtoupper($key['status']); ?></td>
				<td>
					<button class="btn btn-primary btn-xs" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildataguru(event,'<?php echo base_url(); ?>')">Edit</button>
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


<div class="modal fade" id="dataguru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Guru</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
