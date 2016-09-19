<?php
//print_r($detail);
?>
<input type="hidden" id="counter" value="0">
<div class="form-group">
<label>Keterangan Nilai (contoh : P1, P2)</label>
<input type="text" class="form-control" id="lab">
</div>
<div class="form-group">
<button class="btn btn-primary" onclick="adddetail()">Tambah Penilaian</button>
</div>
<br><br>
<div id="area">
	<?php
	foreach ($detail as $key) {
	 ?>
	  <div class="form-group">
	  	<label><?php echo $key->ket; ?></label>
	  	<input type="hidden" class="detailadd" value="<?php echo $key->ket; ?>" id="ket_<?php echo $key->id; ?>">
	  	<input type="number" class="form-control detailadd" id="det_<?php echo $key->id; ?>">
	  </div>
	  <script type="text/javascript">
	  $('#counter').val('<?php echo $key->id; ?>');
	  </script>	  
	 <?php
	}
	?>
</div>
<button class="btn btn-warning" onclick="save_detail()">
 Simpan
</button>
<script>
	function save_detail(){
		var json={};
		$('.detailadd').each(function(){
			alert($('#'+$(this).attr('id')).val());
			//json.push(JSON.stringify("{"+$(this).attr('id')+":"+$('#'+$(this).attr('id')).val()+"}"));
		});
		//console.log(json);
	}
	function adddetail(){
		var batascounter=parseInt($('#counter').val());
		if(batascounter<4){
		  if($('#lab').val()!=''){
			 batascounter++;
			 $('#area').append('<div class="form-group">'+
			 	'<label>'+$('#lab').val()+'</label>'+
			 	'<input type="hidden" class="detailadd" value="'+$('#lab').val()+'" id="ket_'+batascounter+'">'+
		  	   '<input type="number" class="form-control detailadd" id="det_'+batascounter+'">'+
		      '</div>'
			  );
			 $('#counter').val(batascounter);
		  }else{alert('Keterangan nlai tidak boleh kosong')}	 
		}else{
			alert('batas penilaian hanya 4 kali');
		}
	}
	$(function() {
    $('#lab').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
});
</script>