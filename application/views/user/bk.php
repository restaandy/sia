<?php
$ta="";
foreach ($datakelas as $key) {
$ta=$key['ta']." (".$this->session->userdata("ta_status").")";
}
?>
<div class="panel panel-default">
	<div class="panel-body">
        <div class="col-md-12"> 
        <div class="row">
        <p><?php echo $ta; ?></p>
        <?php
			$x=1;$legend=true;
			foreach ($datakelas as $key) {
			 if($key['tingkat']=="X"){
			 	$newid = $this->enkripsi->encode($key['id']);
			 ?>
			  <?php
			 	if($legend){
			 		?>
			 		<legend>Kelas X</legend>
			 		<?php
			 		$legend=false;
			 	}
			  if($jab['jabatan']=='bk'){
			 ?>

			<div class="col-lg-3 col-xs-6">	
		        <div class="small-box bg-green">
		          <div class="inner">
		              <h4><u><?php echo $key['nama_kelas']." (".$key['tingkat'].")"; ?></u></h4>
		              <p>Mapel : <?php echo $key['nama_mapel']; ?></p>
		              <p>Pengajar : <?php echo substr($key['nama_pegawai'],0,8)."_"; ?></p>
		          </div>
		          <div class="icon" style="padding:5px;">
              			<i class="ion-ios-star"></i>
            	  </div>
            	  
		            <a href="<?php echo base_url(); ?>user/siswa_bk/<?php echo $newid; ?>" class="small-box-footer">
		            	 
		            	 <?php 
 						/*
 						foreach ($datawali as $keys) {
 							if($key['id_kelas']==$keys['id_kelas']){
 								echo "Wali Kelas : ". substr($keys['nama_pegawai'],0,8)."_";
 							}
 						}
						*/
		               ?>
		               <br>
		               Masuk <i class="fa fa-arrow-circle-right"></i>
		            </a>
				</div>

			</div> 
			 <?php
			$x++;
			}
			}	
			}
		?>
        
        
        <?php
			$x=1;$legend=true;
			foreach ($datakelas as $key) {
			 
			 if($key['tingkat']=="XI"){
			 	$newid = $this->enkripsi->encode($key['id']);
			 ?>
			 <?php
			 	if($legend){
			 		?>
			 		<legend>Kelas XI</legend>
			 		<?php
			 		$legend=false;
			 	}
			 	if($jab['jabatan']=='guru'){
			 ?>
			<div class="col-lg-3 col-xs-6">	
		        <div class="small-box bg-yellow">
		          <div class="inner">
		              <h4><u><?php echo $key['nama_kelas']." (".$key['tingkat'].")"; ?></u></h4>
		              <p>Mapel : <?php echo $key['nama_mapel']; ?></p>
		              <p>Pengajar : <?php echo substr($key['nama_pegawai'],0,8)."_"; ?></p>
		          </div>
		          <div class="icon" style="padding:5px;">
              			<i class="ion-ios-star"></i>
            	  </div>
		            <a href="<?php echo base_url(); ?>user/datasiswa/<?php echo $newid; ?>" class="small-box-footer">
		            	 <?php 
 						/*
 						foreach ($datawali as $keys) {
 							if($key['id_kelas']==$keys['id_kelas']){
 								echo "Wali Kelas : ". substr($keys['nama_pegawai'],0,8)."_";
 							}
 						}
						*/
		               ?>
		               <br>
		               Masuk <i class="fa fa-arrow-circle-right"></i>
		            </a>
				</div>
			</div> 
			 <?php
			$x++;
			}
			}	
			}
		?>

        <?php
			$x=1;$legend=true;
			foreach ($datakelas as $key) {
			 if($key['tingkat']=="XII"){
			 	$newid = $this->enkripsi->encode($key['id']);
			 ?>
			 <?php
			 	if($legend){
			 		?>
			 		<legend>Kelas XII</legend>
			 		<?php
			 		$legend=false;
			 	}
			 	if($jab['jabatan']=='guru'){
			 ?>
			<div class="col-lg-3 col-xs-6">	
		        <div class="small-box bg-red">
		          <div class="inner">
		              <h4><u><?php echo $key['nama_kelas']; ?></u></h4>
		              <p>Mapel : <?php echo $key['nama_mapel']; ?></p>
		              <p>Kelas : <?php echo $key['tingkat']; ?></p>
		              <p>Pengajar : <?php echo substr($key['nama_pegawai'],0,8)."_"; ?></p>
		          </div>
		          <div class="icon" style="padding:5px;">
              			<i class="ion-ios-star"></i>
            	  </div>
		            <a href="<?php echo base_url(); ?>user/datasiswa/<?php echo $newid; ?>" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div> 
			 <?php
			$x++;
		    }
			}	
			}
		?>
		</div>
</div>
</div>
</div>