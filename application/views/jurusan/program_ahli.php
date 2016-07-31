<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_program.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Program Keahlian</legend>
		<div class="col-md-8">
		<div class="row">
		<p style="font-size:15px;margin-left:20px;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('program'); ?></p>
		<?php echo validation_errors(); ?>

		<?php echo form_open('jurusan/save_program'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>Pilih Bidang keahlian</label>
				<select class="form-control" name="id_bidang">
					<?php
					foreach ($databidang as $key) {
						?>
						<option value="<?php echo $key['id'] ?>"><?php echo $key['bidang'] ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Program keahlian</label>
				<input class="form-control" type="text" name="program" maxlength="50" required />
			</div>
			<div class="form-group">
				<label>Keterangan Program keahlian</label>
				<textarea class="form-control" name="keterangan"></textarea>
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
			<p>Isikan Form kelas dengan jelas sesuai dengan program jurusan di setiap sekolah masing-masing</p>
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
		<legend>Data Program</legend>
		<p style="font-size:20px;;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('programupdate'); ?></p>
		<table id="tabelprogram" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th width="20%">Bidang Keahlian</th>
				<th width="20%">Program Keahlian</th>
				<th width="20%">Keterangan</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			
			foreach ($dataprogram as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['bidang']; ?></td>
				<td><?php echo $key['program']; ?></td>
				<td><?php echo $key['keterangan']; ?></td>
				<td>
					<button class="btn btn-primary btn-xs" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildataprogram(event,'<?php echo base_url(); ?>')">Edit</button>
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


<div class="modal fade" id="programahli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
