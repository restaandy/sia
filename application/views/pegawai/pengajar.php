<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_pengajar.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
	<legend>Tambah Pengajar</legend>
	 <?php
		if($this->session->flashdata('pengajar')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('pengajar'); ?>
        </div>
			<?php
		}
		?>
	 <form method="POST" action="<?php echo base_url(); ?>pegawai/save_pengajar">
	 <div class="col-md-4">
	 <div class="row">
	 	
	 	<div class="form-group">
	 		<label>Nama Pengajar</label>
	 		<input type="text" name="pegawai" id="pegawai" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Kelas</label>
	 		<select class="form-control" name="kelas" required>
	 			<option value="">-- Pilih Kelas --</option>
	 			<?php
	 			foreach ($kelas as $key) {
	 			 ?>
	 			 <option value="<?php echo $key['id'].'-'.$key['nama_kelas']; ?>"><?php echo $key['nama_kelas'] ?></option>
	 			 <?php
	 			}
	 			?>
	 		</select>
	 	</div>
	 	<div class="form-group">
	 		<label>Mata Pelajaran</label>
	 		<select class="form-control" name="mapel" required>
	 			<option value="">-- Pilih Mapel --</option>
	 			<?php
	 			foreach ($mapel as $key) {
	 			 ?>
	 			 <option value="<?php echo $key['id'].'-'.$key['nama_mapel']; ?>"><?php echo $key['nama_mapel'] ?></option>
	 			 <?php
	 			}
	 			?>
	 		</select>
	 	</div>
	 	<div class="form-group">
	 		<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
	 		<button type="reset" class="btn btn-warning" >Reset</button>
	 	</div>
	 </div>
	 </div>	
	 </form>
	 <br><br><br><br>
	 	
		<legend>Data Pengajar</legend>
		<?php
		if($this->session->flashdata('pengajarupdate')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('pengajarupdate'); ?>
        </div>
			<?php
		}
		?>
		
		<table id="tabelpengajar" class="table table-striped">
		<thead>
			<tr>
				<th width="3%">No</th>
				<th width="10%">NIP</th>
				<th width="20%">Nama Pegawai</th>
				<th width="17%">Mapel</th>
				<th width="8%">Kelas</th>
				<th width="10%">Tahun Ajaran</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($datapengajar as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nip']; ?></td>
				<td><?php echo $key['nama_pegawai']; ?></td>
				<td><?php echo $key['nama_mapel']; ?></td>
				<td><?php echo $key['nama_kelas']; ?></td>
				<td><?php echo $key['ta']." - ".$key['keterangan']; ?></td>
				<td>
					<button class="btn btn-primary btn-xs"
				 data-id="<?php echo $key['id'] ?>" 
				 onclick="tampildatapengajar(event,'<?php echo base_url(); ?>')">Edit</button>
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
<div class="modal fade" id="datapengajar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Pengajar</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">        
      </div>
    </div>
  </div>
</div>
