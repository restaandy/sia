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
		  $idmapel=$key['id_mapel'];
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
				<th>NISN</th>
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>Tempat / Tgl Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Input / Edit Nilai</th>
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
				<td><?php echo $key['no_induk_sekolah']; ?></td>
				<td><?php echo $key['nama']; ?></td>
				<td><?php echo $key['tmp_lahir'].", ".$key['tgl_lahir']; ?></td>
				<td><?php echo $key['jenkel']; ?></td>
				<td><?php echo $key['agama']; ?></td>
				<td>
					<button class="btn btn-primary btn-xs" id-mapel="<?php echo $key['id_mapel']; ?>" data-noinduk="<?php echo $key['no_induk'] ?>"
						onclick="tampildatasiswa(event,'<?php echo base_url(); ?>')"
						>Nilai</button>
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
<div class="modal fade" id="datainput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Nilai Siswa</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="datadetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>