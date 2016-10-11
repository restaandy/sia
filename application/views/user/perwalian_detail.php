<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Semester 1</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Semester 2</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home"> 
<div class="panel panel-default">
<div class="panel-body">
	<div class="col-md-4">
	<table class="table">
	<?php
	$no_induk="";
	foreach ($ket_siswa as $key) {
		?>
		<tr>
			<td>No Induk</td>
			<td>:</td>
			<td><?php echo $key->no_induk; $no_induk=$key->no_induk;?></td>
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
			foreach ($datasiswa1 as $key) {
			 
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

<div class="panel panel-body">
<form method="POST" action="<?php echo base_url(); ?>user/save_sikap_wali">
<input type="hidden" name="semester" value="1">
<input type="hidden" name="no_induk" value="<?php echo $no_induk; ?>">
<div class="form-group">
<label>Input Rapot Deskripsi Sikap</label>
<textarea class="form-control" name="sikap">
<?php
foreach ($sikap as $key) {
	if($key->semester==1){echo $key->nilai_sikap;}
}
?>
</textarea>
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit" name="simpan" value="yes">Generate Rapot</button>
</div>
</form>

</div>
</div>

</div>
    <div role="tabpanel" class="tab-pane" id="profile">
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
			foreach ($datasiswa2 as $key) {
			 
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
<div class="panel panel-body">
<form method="POST" action="<?php echo base_url(); ?>user/save_sikap_wali">
<input type="hidden" name="semester" value="2">
<input type="hidden" name="no_induk" value="<?php echo $no_induk; ?>">
<div class="form-group">
<label>Input Rapot Deskripsi Sikap</label>
<textarea class="form-control" name="sikap"><?php
foreach ($sikap as $key) {
	if($key->semester==2){echo $key->nilai_sikap;}
}
?></textarea>
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit" name="simpan" value="yes">Generate Rapot</button>
</div>
</form>

</div>
</div>
    </div>
   </div>
 </div>