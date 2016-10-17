<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/external/css/datatables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>aset/external/js/datatables.min.js"></script>
<div class="panel panel-default">
<div class="panel-body">
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
				<th>Lihat</th>
			</tr>
		    </thead>
		    <tbody>
		<?php
			$x=1;
			foreach ($siswa_wali as $key) {
			 ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key->no_induk; ?></td>
				<td><?php echo $key->no_induk_sekolah; ?></td>
				<td><?php echo $key->nama; ?></td>
				<td><?php echo $key->tmp_lahir.", ".$key->tgl_lahir; ?></td>
				<td><?php echo $key->jenkel; ?></td>
				<td><?php echo $key->agama; ?></td>
				<td>
					<a class="btn btn-primary btn-xs" href="<?php echo base_url().'user/perwalian_detail/'.$this->enkripsi->encode($key->no_induk); ?>">Lihat Nilai Akhir
					</a>
					<a class="btn btn-info btn-xs" href="<?php echo base_url().'user/ekstra/'.$this->enkripsi->encode($key->no_induk); ?>">Input Nilai Ekstra
					</a>
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