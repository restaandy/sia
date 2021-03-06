<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_kelas.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<legend>Masukan Nama Siswa</legend>
		<div style="float:right;">
		<?php
		foreach ($keterangan as $key) {
		  ?>
		   <table class="table">
		  	<tr>
		  		<td><b>Mata Pelajaran</b></td>
		  		<td>:</td>
		  		<td><b><?php echo $key['nama_mapel']; ?></b></td>
		  	</tr>
		  	<tr>
		  		<td><b>Kompetensi Inti</b></td>
		  		<td>:</td>
		  		<td><b><?php echo $key['komp_inti']; ?></b></td>
		  	</tr>
		  	<tr>
		  		<td><b>Kompetensi Dasar</b></td>
		  		<td>:</td>
		  		<td><b><?php echo $key['komp_dasar']; ?></b></td>
		  	</tr>
		  	<tr>
		  		<td><b>Pengajar</b></td>
		  		<td>:</td>
		  		<td><b><?php echo $key['nama_pegawai']; ?></b></td>
		  	</tr>
		  	<tr>
		  		<td><b>Nama Kelas</b></td>
		  		<td>:</td>
		  		<td><b><?php echo $key['nama_kelas']; ?></b></td>
		  	</tr>
		  	<tr>
		  		<td><b>Tingkat</b></td>
		  		<td>:</td>
		  		<td><b><?php echo $key['tingkat']; ?></b></td>
		  	</tr>
		  </table>
		  <?php
		}
		?>	
	    </div>
		<div class="col-md-4">
		<div class="row">
		<?php
		if($this->session->flashdata('kelas')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('kelas'); ?>
        	</div>
			<?php
		}
		?>	
		<form method="POST" action="<?php echo base_url(); ?>kelas/input_siswa_kelas"> 
			<div class="form-group">
			<input type="text" name="id_mengajar" class="hide" value="<?php echo $id_mengajar; ?>">	
			<input type="text" name="encrypt" class="hide" value="<?php echo $encrypt; ?>">
			<button type="button" onclick="tambahfield()" class="btn btn-warning">
				<span class="glyphicon glyphicon-plus" aria-hidden="true">
				Tambah	
			</button>
			</div>	
			<div id="bindautocom">
			<label>Nama Siswa 1</label>	
			<div class="form-group">
				<input type="text" name="no_induk[]" onkeydown="autocom(event)" class="form-control" required>
			</div>
			</div>
			<div class="form-group">
				<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
			</div>	
		</form>
	    </div>
	    </div>
	    <div>
		<br><br>
		<table class="table table-striped" id="tabelkelas">
			<thead>
			<tr>
				<th>No</th>
				<th>No Induk</th>
				<th>Nama Siswa</th>
				<th>Jenis Kelamin</th>
				<th>Aksi</th>
			</tr>
		    </thead>
		    <tbody>
		<?php
			$x=1;
			foreach ($datasiswa as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['no_induk']; ?></td>
				<td><?php echo $key['nama']; ?></td>
				<td><?php echo $key['jenkel']; ?></td>
				<td>
					
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