<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/modal_siswa.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Siswa</legend>
		<div class="col-md-8">
		<div class="row">
		<p style="font-size:15px;margin-left:20px;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('siswa'); ?></p>
		<?php echo validation_errors(); ?>

		<?php echo form_open('siswa/save_belajar'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>Kelas Belajar</label>
				<select class="form-control" name="id_mengajar" required>
					<option value="">Pilih Kelas Belajar</option>
					<?php
					foreach ($datapengajar as $key) {
					  ?>
					  <option value="<?php echo $key['id']; ?>"><?php echo $key['nama_pegawai']." - ".$key['nama_kelas']." - ".$key['nama_mapel']; ?></option>
					  <?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<input class="form-control" type="text" name="no_induk" id="siswa_id" required />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="simpan" value="yes">Simpan</button>
			</div>
			</div>
			<div class="col-md-4">
			<!--
			<div class="row">
			<blockquote style="font-size:15px;">
			<p style="color:orange;font-size:20px;">Perhatian !!</p>
			<p>Untuk username & password setiap siswa, otomatis generate dari sistem dengan format username : <b>NISN+NIS</b> , password : <b>sia+NISN</b></p>
			<p>Contoh : nisn=123 & nis : 456</p>
			<p>Maka username siswa<b> 123456</b> dan password <b>sia123</b></p>
			</blockquote>
			</div>
		     -->
			</div>
			<div class="col-md-4">
			
			</div>
		</form>
		</div>
		</div>
		<div class="col-md-4"></div>
		<br><br>
		</div>
		<div class="panel-body">
		<legend>Data Kelas Belajar</legend>
		<p style="font-size:20px;;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('siswaupdate'); ?></p>
		<table id="tabelsekolah" class="table table-striped">
		<thead>
			<tr>
				<th width="6%">No</th>
				<th width="20%">Nama Siswa</th>
				<th width="20%">Tempat/Tanggal Lahir</th>
				<th width="6%">Jenis Kelamin</th>
				<th width="6%">Status Masuk</th>
				<th width="6%">Status Siswa</th>
				<th width="6%">Tahun Masuk</th>
				<th width="10%">(View More / Edit)</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x=1;
			foreach ($kelasbelajar as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nama'] ?></td>
				<td><?php echo $key['tmp_lahir'].", ".$key['tgl_lahir'] ?></td>
				<td><?php echo $key['jenkel'] ?></td>
				<td><?php echo $key['status_masuk'] ?></td>
				<td><?php echo $key['akdm_stat'] ?></td>
				<td><?php echo $key['thn_masuk'] ?></td>
				<td>
					<button class="btn btn-primary btn-xs" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-noinduk="<?php echo $key['no_induk'] ?>" 
				 onclick="tampildatasiswa(event,'<?php echo base_url(); ?>')">Edit</button>
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


<div class="modal fade" id="datasiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Siswa</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
