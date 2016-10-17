<div class="panel panel-default">
	<div class="panel-body">
	
	<div class="col-md-4">
	<table class="table table-striped">
		<tr>
			<td>No Induk</td>
			<td>:</td>
			<td><?php echo $siswa->no_induk; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $siswa->nama; ?></td>
		</tr>
	</table>
	<?php
	if(sizeof($nilai_ekstra)>0){
	foreach ($nilai_ekstra as $keys) {
		?>
		<form method="POST" action="<?php echo base_url(); ?>user/edit_ekstra">
			<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $keys->id; ?>">
			<input type="hidden" name="no_induk" value="<?php echo $siswa->no_induk; ?>">
			<?php
			foreach ($ekstra as $key) {
				if($key->id==$keys->id_ekstra){
					?>
					<input type="hidden" name="id_ekstra" value="<?php echo $key->id ?>">
					<?php
					echo "<label>".$key->nama_ekstra."</label>";
				}
			}
			?>
			</div>
			<div class="form-group">
			<input type="number" class="form-control" name="nilai" value="<?php echo $keys->nilai; ?>">
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
			</div>
		</form>
		<?php
	}
}else{
	?>
		<form method="POST" action="<?php echo base_url(); ?>user/save_ekstra">
			<div class="form-group">
			
			<?php
			foreach ($ekstra_siswa as $keys) {
					foreach ($ekstra as $key) {
						if($key->id==$keys->id_ekstra){
							?>
							 <input type="hidden" name="id_ekstra" value="<?php echo $key->id ?>">
							<?php
							echo "<label>".$key->nama_ekstra."</label>";
						}
					}
				}	
			
			?>
			
			</div>
			<input type="hidden" name="no_induk" value="<?php echo $siswa->no_induk; ?>">
			<div class="form-group">
			<input type="number" class="form-control" name="nilai">
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
			</div>
		</form>
		<?php
}
	?>	
	</div>	
	</div>
</div>	    
