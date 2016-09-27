<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_ekstra.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<legend>Ploting Ekstra Siswa</legend>
		<div class="col-md-8">
		<div class="row">
		<?php
		if($this->session->flashdata('ekstra')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('ekstra'); ?>
        </div>
			<?php
		}
		?>
		<?php echo validation_errors(); ?>

		<?php echo form_open('ekstra/save_ekstra_siswa'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>Nama Ekstra</label>
				<select class="form-control" name="id_ekstra">
					<option value="">-- Pilih Ekstrakulikuler</option>
					<?php
					foreach ($ekstra as $key) {
						?>
						<option value="<?php echo $key->id; ?>"><?php echo $key->nama_ekstra; ?></option>
						<?php
					}
					?>
				</select>	
			</div>
			<div class="form-group">
				<label>Siswa</label>
				<input class="form-control" type="text" id="siswa_id" name="no_induk">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" name="simpan" value="yes" type="submit">Simpan</button>
			</div>
			</div>
		   <div class="col-md-4">
				<blockquote style="font-size:15px;">
				<p style="color:orange;font-size:20px;">Perhatian !!</p>
				<p>Isikan Form data ekstrakulikuler dengan jelas sesuai dengan ekstra di setiap sekolah masing-masing</p>
				</blockquote>
			</div>
			</form>
		</div>
		</div>
		
		<br><br>
	</div>
	<div class="panel-body">
		<legend>Data Ekstra</legend>
		<?php
		if($this->session->flashdata('ekstraupdate')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('ekstraupdate'); ?>
        </div>
			<?php
		}
		?>
		<table id="tabelekstra" class="table table-striped">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th width="20%">Nama Ekstrakulikuer</th>
				<th width="15%">Nama Siswa</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			
			foreach ($ekstra as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key->nama_ekstra; ?></td>
				<td><?php echo $key->nama; ?></td>
				<td>
					<button class="btn btn-primary btn-xs"
				 data-id="<?php echo $key->id; ?>" 
				 onclick="tampildataekstra(event,'<?php echo base_url(); ?>')">Edit</button>
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


<div class="modal fade" id="ekstra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Mapel</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
