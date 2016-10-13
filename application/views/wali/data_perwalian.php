<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_ekstra.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Perwalian</legend>
		<div class="col-md-8">
		<div class="row">
		<?php
		if($this->session->flashdata('wali')!=null){
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('warna')=='red'?'danger':'success';?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-<?php echo $this->session->flashdata('warna')=='red'?'ban':'check';?>"></i> Alert!</h4>
                <?php echo $this->session->flashdata('wali'); ?>
        	</div>
			<?php
		}
		?>
		
		<?php echo validation_errors(); ?>

		<?php echo form_open('wali/save_perwalian'); ?>		
			<div class="col-md-4">
			<div class="form-group">
			    <label>Nama Kelas</label>
				<select class="form-control" name="id_kelas" required>
					<option value="">-- Pilih Kelas --</option>
					<?php
						foreach ($kelas as $key) {
						  ?>
						  <option value="<?php echo $key['id']; ?>"><?php echo $key['nama_kelas']; ?></option>
						  <?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
			    <label>Nama Siswa</label>
				<input type="text" name="no_induk" class="form-control" id="siswa_id" required >
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="reset" class="btn btn-reset" name="reset">Reset</button>
			</div>
			</div>
			</div>
			</div>
			</div>


			<div class="panel-body">
<table class="table table-striped" id="tabelkelas">
			<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
				<th>Nama Siswa</th>
				<th>Tahun Ajaran</th>
				<th>Lihat</th>
			</tr>
		    </thead>
		    <tbody>
		<?php
			$x=1;
			foreach ($perwalian as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key->nama_kelas; ?></td>
				<td><?php echo $siswa[$key->no_induk]; ?></td>
				<td><?php echo $key->ta; ?></td>
				<td>
					<button class="btn btn-pimary btn-xs" data-noinduk="<?php echo $key->no_induk; ?>">Sikap
					</button>
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