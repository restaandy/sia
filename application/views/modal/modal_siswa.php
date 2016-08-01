<style>
.datepicker{z-index:1151 !important;}
.modal {overflow-y: scroll}
</style>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>siswa/edit_siswa">
	<div class="col-md-12">
		<div class="form-group">
	    <img width="200" height="200" src="<?php echo base_url(); ?>aset/img/<?php echo $siswa['foto']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url()."aset/img/no-image.png"; ?>';">
	    <input type="file" name="foto" class="form-control">
	    </div>
	</div>
	<div class="col-md-4">
	<legend>Data Profil Siswa</legend>
	<div class="form-group">
		<label>NISN</label>
		<input type="text" class="form-control" name="no_induk" value="<?php echo $siswa['no_induk']; ?>" readonly>
	</div>
	<div class="form-group">
		<label>NIS</label>
		<input type="text" class="form-control" name="no_induk_sekolah" value="<?php echo $siswa['no_induk_sekolah']; ?>">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $siswa['nama']; ?>">
	</div>
	<label>Tanggal Lahir</label>
    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $siswa['tgl_lahir']; ?>">
           <div class="input-group-addon">
             <span class="glyphicon glyphicon-th"></span>
           </div>
    </div>
	<div class="form-group">
		<label>Tempat Lahir</label>
		<input type="text" class="form-control" name="tmp_lahir" value="<?php echo $siswa['tmp_lahir']; ?>">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jenkel">
			<?php
			foreach ($jenkel as $key) {
			  ?>
			  <option value="<?php echo $key; ?>" <?php echo $key==$siswa['jenkel']? 'selected':''; ?> ><?php echo $key; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Agama</label>
		<select class="form-control" name="agama">
			<?php
			foreach ($agama as $key) {
			  ?>
			  <option value="<?php echo $key; ?>" <?php echo $key==$siswa['agama']? 'selected':''; ?> ><?php echo $key; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>No Hp</label>
		<input type="text" class="form-control" name="no_hp" value="<?php echo $siswa['no_hp']; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" value="<?php echo $siswa['email']; ?>">
	</div>
	<div class="form-group">
		<label>Asal Sekolah</label>
		<input type="text" class="form-control" name="asal_sekolah" value="<?php echo $siswa['asal_sekolah']; ?>">
	</div>
	</div>
	<div class="col-md-4">
	<legend>Data Alamat Siswa</legend>
		<div class="form-group">
		<label>Provinsi</label>
		<select class="form-control" name="prov" id="prov" onchange="prov_act(event,'<?php echo base_url(); ?>')">
			<option value="0">-- Pilih Provinsi --</option>
			<?php
			foreach ($prov as $key) {
			  ?>
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$siswa['prov']? 'selected':''; ?> ><?php echo $key['provinsi']; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group"> 
		<label>Kabupaten / Kota</label>
		<select class="form-control" name="kabkot" id="kabkota" onchange="kabkota_act(event,'<?php echo base_url(); ?>')">
			<option value="0">-- Pilih Kab / Kota --</option>
			<?php
			foreach ($kabkot as $key) {
			  ?>
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$siswa['kabkot']? 'selected':''; ?> ><?php echo $key['kabkot']; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Kecamatan</label>
		<select class="form-control" name="kec" id="kec" onchange="kec_act(event,'<?php echo base_url(); ?>')">
			<option value="0">-- Pilih Kecamatan --</option>
			<?php
			foreach ($kec as $key) {
			  ?>
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$siswa['kec']? 'selected':''; ?> ><?php echo $key['kecamatan']; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Kelurahan</label>
		<select class="form-control" name="kel" id="kel">
			<option value="0">-- Pilih Kelurahan --</option>
			<?php
			foreach ($keldesa as $key) {
			  ?>
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$siswa['kel']? 'selected':''; ?> ><?php echo $key['keldesa']; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Alamat Tambahan</label>
		<textarea class="form-control" name="almt_tambahan">
			<?php echo $siswa['almt_tambahan']; ?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Nama Ayah</label>
		<input type="text" class="form-control" name="nama_ayah" value="<?php echo $siswa['nama_ayah']; ?>">
	</div>
	<div class="form-group">
		<label>Pekerjaan Ayah</label>
		<input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo $siswa['pekerjaan_ayah']; ?>">
	</div>
	<div class="form-group">
		<label>Nama Ibu</label>
		<input type="text" class="form-control" name="nama_ibu" value="<?php echo $siswa['nama_ibu']; ?>">
	</div>
	<div class="form-group">
		<label>Pekerjaan Ibu</label>
		<input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo $siswa['pekerjaan_ibu']; ?>">
	</div>
	<div class="form-group">
		<label>No Telpon Ortu</label>
		<input type="text" class="form-control" name="nama_ibu" value="<?php echo $siswa['no_telp_ortu']; ?>">
	</div>
		<div class="form-group">
		<label>Alamat Ortu</label>
		<textarea class="form-control" name="alamat_ortu">
			<?php echo $siswa['alamat_ortu']; ?>
		</textarea>
	</div>
	</div>
	<div class="col-md-4">
	<legend>Data Akademik Siswa</legend>
		<div class="form-group">
		<label>Status Akademik</label>
		<select class="form-control" name="agama">
			<?php
			foreach ($akdm_stat as $key) {
			  ?>
			  <option value="<?php echo $key; ?>" <?php echo $key==$siswa['akdm_stat']? 'selected':''; ?> ><?php echo $key; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Status Masuk Sekolah</label>
		<select class="form-control" name="agama">
			<?php
			foreach ($status_masuk as $key) {
			  ?>
			  <option value="<?php echo $key; ?>" <?php echo $key==$siswa['status_masuk']? 'selected':''; ?> ><?php echo $key; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Tahun Masuk</label>
		<input type="number" class="form-control" name="thn_masuk" value="<?php echo $siswa['thn_masuk']; ?>">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="simpan" value="yes">Edit</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</div>	
</form>