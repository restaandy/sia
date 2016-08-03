<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_mapel.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Mata Pelajaran</legend>
		<div class="col-md-8">
		<div class="row">
		<?php
		if($this->session->flashdata('mapel')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('mapel'); ?>
        </div>
			<?php
		}
		?>
		<?php echo validation_errors(); ?>

		<?php echo form_open('mapel/save_mapel'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>Pilih Bidang keahlian</label>
				<select class="form-control" name="id_bidang" onchange="fillprogram(event,'<?php echo base_url(); ?>')" required>
					<option value=''>-- Pilih Bidang --</option>
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
				<label>Pilih Program keahlian</label>
				<select class="form-control" name="id_program" id="id_program" onchange="fillpaket(event,'<?php echo base_url(); ?>')" required>
					<option value=''>-- Pilih Program --</option>
				</select>
			</div>
			<div class="form-group">
				<label>Pilih Paket keahlian</label>
								<select class="form-control" name="id_paket" id="id_paket" required>
					<option value=''>-- Pilih Paket --</option>
				</select>
			</div>
			<div class="form-group">
				<label>Mapel</label>
				<input type="text" class="form-control" name="nama_mapel">
			</div>
			</div>
			<div class="col-md-4">
			<div class="row">
			<div class="form-group">
				<label>Status Mapel</label>
				<select class="form-control" name="status_mapel" required>
					<option value=''>-- Status --</option>
					<option value='wajib'>Mapel Wajib</option>
					<option value='minat'>Mapel Pilihan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Kompetensi Dasar</label>
				<textarea class="form-control" name="komp_dasar"></textarea>
			</div>
			<div class="form-group">
				<label>Kompetensi Inti</label>
				<textarea class="form-control" name="komp_inti"></textarea>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="reset" class="btn btn-reset" name="reset">Reset</button>
			</div>
			</div>
			</div>
		   <div class="col-md-4">
			
			<blockquote style="font-size:15px;">
			<p style="color:orange;font-size:20px;">Perhatian !!</p>
			<p>Isikan Form mapel dengan jelas sesuai dengan mapel di setiap sekolah masing-masing</p>
			</blockquote>
			
		</div>
		</form>
		</div>
		</div>
		
		<br><br>
		<legend>Data Mapel</legend>
		<?php
		if($this->session->flashdata('mapelupdate')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('mapelupdate'); ?>
        </div>
			<?php
		}
		?>
		<table id="tabelprogram" class="table table-striped">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th width="20%">(Bidang/Program/paket)</th>
				<th width="15%">Mapel</th>
				<th width="20%">Kompetensi Dasar</th>
				<th width="20%">Kompetensi Inti</th>
				<th width="5%">Status</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			
			foreach ($datamapel as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['bidang']."/".$key['program']."/".$key['paket']; ?></td>
				<td><?php echo $key['nama_mapel']; ?></td>
				<td><?php echo $key['komp_dasar']; ?></td>
				<td><?php echo $key['komp_inti']; ?></td>
				<td><?php echo $key['status_mapel']; ?></td>
				<td>
					<button class="btn btn-primary btn-xs" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildatamapel(event,'<?php echo base_url(); ?>')">Edit</button>
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


<div class="modal fade" id="mapel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
