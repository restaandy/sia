<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<div class="panel panel-default">
<div class="panel-body">
	<div class="col-md-4">
	<table class="table">
	<?php
	foreach ($ket_siswa as $key) {
		?>
		<tr>
			<td>No Induk</td>
			<td>:</td>
			<td><?php echo $key->no_induk; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $key->nama; ?></td>
		</tr>
		<?php
	}
	?>
	
	</table>
</div>
<table class="table table-striped" id="tabelkelas">
			<thead>
			<tr>
				<th>No</th>
				<th>Pengajar</th>
				<th>Mapel</th>
				<th>Nilai Teori</th>
				<th>Nilai Praktek</th>
				<th>Nilai Sikap</th>
				<th>Tahun Ajaran</th>
			</tr>
		    </thead>
		    <tbody>
		<?php
			$x=1;
			foreach ($datasiswa as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $arc_peg[$key->id_pegawai]['nama_pegawai']; ?></td>
				<td><?php echo $arc_mpl[$key->id_mapel]['nama_mapel']; ?></td>
				<td><?php echo $key->nilai_teori; ?></td>
				<td><?php echo $key->nilai_praktek; ?></td>
				<td><?php echo $key->sikap; ?></td>
				<td><?php echo $key->id_ta; ?></td>
				
			</tr> 
			 <?php
			$x++;	
			}
		?>
		</tbody>	
		</table>
</div>
</div>