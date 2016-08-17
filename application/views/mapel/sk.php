<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_mapel.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<legend>Masukan Mapel</legend>
		
		<div class="col-md-4">
		<div class="row">	
		<?php
		if($this->session->flashdata('sk')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('sk'); ?>
        	</div>
			<?php
		}
		?>	
		<form method="POST" action="<?php echo base_url(); ?>mapel/input_sk"> 
			
			<label>Mapel</label>	
			<div class="form-group">
				<select class="form-control" name="id_mapel" required>
					<option value="">-- Pilih Mapel --</option>
					<?php foreach ($datamapel as $key) {
						?>
					<option value="<?php echo $key['id']; ?>"><?php echo $key['nama_mapel']; ?></option>	
						<?php
					} ?>
				</select>
			</div>
			<div class="form-group">
				<button type="button" class="btn btn-warning" onclick="tambahfield();">Tambah SK</button>
			</div>
			<div id="sk">
			<label>Standar Kompetensi 1</label>
			<div class="form-group" style="background-color:#8adcc8;padding:10px;">
				<label>Teori</label>
				<textarea class="form-control" name="sk_teori[]" required></textarea>
				<label>Praktek</label>
				<textarea class="form-control" name="sk_praktek[]" required></textarea>
			</div>
		    </div>
		    <div class="form-group">
				<button type="submit" name="simpan" value="yes" class="btn btn-primary">Simpan</button>
			</div>	
			</div>
			
		</form>
	    </div>
	    </div>
	    <div style="padding:10px;">
		<br><br>
		<table class="table table-striped tabelpagin">
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Mapel</th>
				<th>Standar Kompetensi</th>
				<th>Kategori</th>
				<th>Status Mapel</th>
				<th>Aksi</th>
			</tr>
		    </thead>
		    <tbody>
			<?php
			$x=1;
			foreach ($datask as $key) {
			  ?>
			  <tr>
			  	<td><?php echo $x; ?></td>
			  	<td><?php echo $key['nama_mapel']; ?></td>
			  	<td><?php echo $key['standar_kompetensi']; ?></td>
			  	<td><?php echo $key['kategori']; ?></td>
			  	<td><?php echo $key['status_mapel']; ?></td>
			  	<td></td>
			  </tr>
			  <?php
			  $x++;
			}
			?>
			
		</tbody>	
		</table>
	</div>
</div>