<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_kelas.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-4">
			<legend>Keterangan Kelas</legend>
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

	    </div>
	    <br><br>
	    <table class="table table-striped" id="tabelkelas">
			<thead>
			<tr>
				<th>No</th>
				<th>No Induk</th>
				<th>Nama Siswa</th>
				<th>Tempat / Tgl Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
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
				<td><?php echo $key['tmp_lahir'].", ".$key['tgl_lahir']; ?></td>
				<td><?php echo $key['jenkel']; ?></td>
				<td><?php echo $key['agama']; ?></td>
				
			</tr> 
			 <?php
			$x++;	
			}
		?>
			
		</tbody>	
		</table>
	</div>
</div>	    