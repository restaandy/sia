<style>
.datepicker{z-index:1151 !important;}
.modal {overflow-y: scroll}
</style>
<script>
 $(document).ready(function(){
	$(".ni").keyup(function(e){
	  var str=$(e.target).val();
	  var n=str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');	
	  $(e.target).val(n);
	});
 });
</script>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>pegawai/edit_pegawai">
	<div class="col-md-12">
		<div class="form-group">
	    <img width="200" height="200" src="<?php echo base_url(); ?>aset/img/<?php echo $pegawai['foto']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url()."aset/img/no-image.png"; ?>';">
	    <input type="file" name="foto" class="form-control">
	    </div>
	</div>
	<div class="col-md-4">
	<legend>Data Profil Pegawai</legend>
	<div class="form-group">
		<label>NIP</label>
		<input type="text" name="id" value="<?php echo $pegawai['id']; ?>" class="hide" readonly>
		<input type="text" class="form-control ni" name="nip" id="nip" value="<?php echo $pegawai['nip']; ?>">
	</div>
	
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama_pegawai" value="<?php echo $pegawai['nama_pegawai']; ?>">
	</div>
	<label>Tanggal Lahir</label>
    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $pegawai['tgl_lahir']; ?>">
           <div class="input-group-addon">
             <span class="glyphicon glyphicon-th"></span>
           </div>
    </div>
	<div class="form-group">
		<label>Tempat Lahir</label>
		<input type="text" class="form-control" name="tmp_lahir" value="<?php echo $pegawai['tmp_lahir']; ?>">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jenkel">
			<?php
			foreach ($jenkel as $key) {
			  ?>
			  <option value="<?php echo $key; ?>" <?php echo $key==$pegawai['jenkel']? 'selected':''; ?> ><?php echo $key; ?></option>
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
			  <option value="<?php echo $key; ?>" <?php echo $key==$pegawai['agama']? 'selected':''; ?> ><?php echo $key; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>No Telp</label>
		<input type="text" class="form-control" name="no_telp" value="<?php echo $pegawai['no_telp']; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" id="email" name="email" value="<?php echo $pegawai['email']; ?>" <?php echo $pegawai['nip']==null || $pegawai['nip']==''?'required':''; ?>>
	</div>
	</div>
	<div class="col-md-4">
	<legend>Data Alamat Pegawai</legend>
		<div class="form-group">
		<label>Provinsi</label>
		<select class="form-control" name="prov" id="prov" onchange="prov_act(event,'<?php echo base_url(); ?>')">
			<option value="0">-- Pilih Provinsi --</option>
			<?php
			foreach ($prov as $key) {
			  ?>
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$pegawai['prov']? 'selected':''; ?> ><?php echo $key['provinsi']; ?></option>
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
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$pegawai['kabkot']? 'selected':''; ?> ><?php echo $key['kabkot']; ?></option>
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
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$pegawai['kec']? 'selected':''; ?> ><?php echo $key['kecamatan']; ?></option>
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
			  <option value="<?php echo $key['id']; ?>" <?php echo $key['id']==$pegawai['kel']? 'selected':''; ?> ><?php echo $key['keldesa']; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Alamat Tambahan</label>
		<textarea class="form-control" name="alamat_tmb">
			<?php echo $pegawai['alamat_tmb']; ?>
		</textarea>
	</div>

	
	</div>
	<div class="col-md-4">
	<legend>Data Akademik Pegawai</legend>
		<div class="form-group">
		<label>Status Pegawai</label>
		<select class="form-control" name="status" onchange="constrait_pegawai2(event)">
			<?php
			foreach ($status as $key) {
			  ?>
			  <option value="<?php echo $key; ?>" <?php echo $key==$pegawai['status']? 'selected':''; ?> ><?php echo $key; ?></option>
			  <?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Asal Perguruan Tinggi</label>
		<input type="text" class="form-control" name="asal_pt" value="<?php echo $pegawai['asal_pt']; ?>">
	</div>
	<div class="form-group">
		<label>Jurusan</label>
		<input type="text" class="form-control" name="jurusan" value="<?php echo $pegawai['jurusan']; ?>">
	</div>
	<div class="form-group">
		<label>Gelar Depan</label>
		<input type="text" class="form-control" name="gelar_dpn" value="<?php echo $pegawai['gelar_dpn']; ?>">
	</div>
	<div class="form-group">
		<label>Gelar Belakang</label>
		<input type="text" class="form-control" name="gelar_blk" value="<?php echo $pegawai['gelar_blk']; ?>">
	</div>
	<div class="form-group">
		<label>Tahun Lulus</label>
		<input type="number" class="form-control" name="thn_lulus" value="<?php echo $pegawai['thn_lulus']; ?>">
	</div>
	<div class="form-group">
		<label>Jabatan</label>
		<input type="text" class="form-control" name="jabatan" value="<?php echo $pegawai['jabatan']; ?>">
	</div>
	<div class="form-group">
		<label>Nomor SK</label>
		<input type="text" class="form-control" name="nomor_sk" value="<?php echo $pegawai['nomor_sk']; ?>">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="simpan" value="yes">Edit</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</div>	
</form>
