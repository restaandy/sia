<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_kelas.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Kelas</legend>
		<div class="col-md-8">
		<div class="row">
		<p style="font-size:15px;margin-left:20px;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('kelas'); ?></p>
		<?php echo validation_errors(); ?>

		<?php echo form_open('kelas/save_kelas'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>Nama Kelas</label>
				<input class="form-control ni" type="text" name="nama_kelas" maxlength="50" required />
			</div>
			<div class="form-group">
			    <label>Tingkat Kelas</label>
				<select class="form-control" name="tingkat" onchange="">
					<?php
						foreach ($tingkat as $key) {
						  ?>
						  <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
						  <?php
						}
					?>
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
			<p>Isikan Form kelas dengan jelas sesuai dengan nama kelas di setiap sekolah masing-masing</p>
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
		<legend>Data Kelas</legend>
		<p style="font-size:20px;;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('kelasupdate'); ?></p>
		<table id="tabelkelas" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th width="20%">Nama Kelas</th>
				<th width="20%">Tingkat</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($datakelas as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nama_kelas']; ?></td>
				<td><?php echo $key['tingkat']; ?></td>
				<td>
					<button class="btn btn-primary btn-xs" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildatakelas(event,'<?php echo base_url(); ?>')">Edit</button>
					<button class="btn btn-danger btn-xs">Hapus</button>
			</tr> 
			 <?php
			$x++;	
			}
		?>
			
		</tbody>	
		</table>
	</div>
</div>


<div class="modal fade" id="datakelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Kelas</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
