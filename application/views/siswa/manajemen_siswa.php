<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/plugins/datepicker/datepicker3.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/custom.js"></script>

<div class="panel panel-default">
	<div class="panel-body">
		<legend>Tambah Siswa</legend>
		<div class="col-md-8">
		<div class="row">
		<p style="font-size:15px;margin-left:20px;color:<?php echo $this->session->flashdata('warna');?>;"><?php echo $this->session->flashdata('siswa'); ?></p>
		<?php echo validation_errors(); ?>

		<?php echo form_open('siswa/save_siswa'); ?>		
			<div class="col-md-4">
			<div class="form-group">
				<label>No Induk Nasional</label>
				<input class="form-control ni" type="text" name="no_induk" maxlength="30" required />
			</div>
			<div class="form-group">
				<label>No Induk Sekolah</label>
				<input class="form-control ni" type="text" name="no_induk_sekolah" maxlength="20" required />
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<input class="form-control" type="text" name="nama" maxlength="100" required />
			</div>
			<label>Tahun Masuk</label>
			<div class="form-group">
				<input type="radio" name="thn_masuk" value="ini" onclick="pilih_tahun_masuk('ini')" checked> Tahun Ini
				&nbsp
				<input type="radio" name="thn_masuk" value="lalu" onclick="pilih_tahun_masuk('lalu')"> Tahun Lalu
			</div>
			<div class="form-group hide" id="thn_masuk_lalu">
				<label>Tahun Masuk (tahun lalu)</label>
				<input type="number" name="thn_masuk_lalu" class="form-control">
			</div>
			<div class="form-group">
			    <label>Status Siswa</label>
				<select class="form-control" name="akdm_stat">
					<option value="aktif">Aktif</option>
					<option value="lulus">Lulus</option>
					<option value="do">Di Keluarkan</option>
					<option value="wafat">Wafat</option>
				</select>
			</div>
			<div class="form-group">
			    <label>Status Masuk</label>
				<select class="form-control" name="status_masuk">
					<option value="baru">Baru</option>
					<option value="pindahan">Pindahan</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan" value="yes">Simpan</button>
				<button type="reset" class="btn btn-reset" name="reset">Reset</button>
			</div>

			</div>
			<div class="col-md-4">
			<div class="row">
			<blockquote style="font-size:15px;">
			<p style="color:orange;font-size:20px;">Perhatian !!</p>
			<p>Untuk username & password setiap siswa, otomatis generate dari sistem dengan format username : <b>NISN+NIS</b> , password : <b>sia+NISN</b></p>
			<p>Contoh : nisn=123 & nis : 456</p>
			<p>Maka username siswa<b> 123456</b> dan password <b>sia123</b></p>
			</blockquote>
			</div>
			</div>
			<div class="col-md-4">
			
			</div>
		</form>
		</div>
		</div>
		<div class="col-md-4"></div>
		<br><br>
		<legend>Data Sekolah</legend>
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
			foreach ($datasiswa as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['nama'] ?></td>
				<td><?php echo $key['tmp_lahir'].", ".$key['tgl_lahir'] ?></td>
				<td><?php echo $key['jenkel'] ?></td>
				<td><?php echo $key['status_masuk'] ?></td>
				<td><?php echo $key['akdm_stat'] ?></td>
				<td><?php echo $key['thn_masuk'] ?></td>
				<td><a href="#" data-idsekolah="<?php echo $key['id_sekolah'] ?>"
				 data-noinduk="<?php echo $key['no_induk'] ?>" 
				 onclick="tampildatasiswa(event,'<?php echo base_url(); ?>')">Edit</a></td>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#tabelsekolah').DataTable();
    $('.datepicker').datepicker({
     format: 'yyyy-mm-dd',
     startDate: '-3d'
    });
});

</script>