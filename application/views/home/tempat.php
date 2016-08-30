<div class="panel panel-default">
	<div class="panel-body">
		<!--<form>-->
			<div class="col-md-4">
			<div class="form-group">
				<label>Provinisi</label>
				<select class="form-control" id="idkabkot" onchange="fillkab(event)">
					<option value="">-- Pilik Kab / Kota --</option>
					<?php

					foreach ($dataprov as $key) {
						?>
						<option value="<?php echo $key['id']; ?>"><?php echo $key['provinsi']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Kabupaten</label>
				<div id="kab">
					
				</div>
			</div>
			<div class="form-group">
				<label>Kecamatan</label><button class="btn btn-primary btn-xs" onclick="kecc()">Tambah Kecamatan</button>
				<div id="kec">
					
				</div>
			</div>
			<div class="form-group">
				<label>Kelurahan</label><button class="btn btn-warning btn-xs" onclick="kell()">Tambah kelurahan</button>
				<div id="kel">
					
				</div>
			</div>
			</div>
	
		<!--</form>-->
	<div id="datatempat">	
	
	</div>
	<script type="text/javascript">
	function fillkab(e){
		var idprov=$(e.target).val();
		$.post('<?php echo base_url(); ?>dashboard2/get_kab',{idprov:idprov},function(data){
			$('#kab').html(data);
		});
	}
	function fillkec(e){
		var idkab=$(e.target).val();
		$.post('<?php echo base_url(); ?>dashboard2/get_kec',{idkab:idkab},function(data){
			$('#kec').html(data);
		});
	}
	function fillkel(e){
		var idkec=$(e.target).val();
		$.post('<?php echo base_url(); ?>dashboard2/get_kel',{idkec:idkec},function(data){
			$('#kel').html(data);
			//alert('sdf');
		});
	}
	function kecc(){
		var idkab=$('#idkab').val();
		if(idkab!=''&&idkab!=undefined){
		$.post('<?php echo base_url(); ?>dashboard2/list_kec',{idkab:idkab},function(data){
			$('#tmpt .modal-body').html(data);
			$('#tmpt').modal('show');
		});	
		}
	}
	function kell(){
		var idkec=$('#idkec').val();
		if(idkec!=''&&idkec!=undefined){
		$.post('<?php echo base_url(); ?>dashboard2/list_kel',{idkec:idkec},function(data){
			$('#tmpt .modal-body').html(data);
			$('#tmpt').modal('show');
		});	
		}
	}
	</script>
	</div>
</div>

<div class="modal fade" id="tmpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">tambah tempat</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>