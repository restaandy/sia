<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_pengajar.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
	<legend>Tambah Pengajar</legend>
	 <form method="POST" action="<?php echo base_url(); ?>pegawai/save_pengajar">
	 <div class="col-md-4">
	 <div class="row">
	 	<div class="form-group">
	 		<label>Nama Pengajar</label>
	 		<input type="text" name="pegawai" id="pegawai" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Kelas</label>
	 		<input type="text" name="kelas" id="kelas" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Mata Pelajaran</label>
	 		<input type="text" name="mapel" id="mapel" class="form-control" required>
	 	</div>
	 	<div class="form-group">
	 		<label>Tahun Ajaran</label>
	 		<input type="text" name="ta" id="ta" class="form-control" required>
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
		<p style="font-size:20px;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('pengajarupdate'); ?></p>
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