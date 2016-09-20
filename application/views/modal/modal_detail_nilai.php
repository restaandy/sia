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
<input type="hidden" class="detailadd" name="id_sk" value="<?php echo $idsk;?>">
<input type="hidden" class="detailadd" name="no_induk" value="<?php echo $noinduk; ?>">
<div id="area">
	<?php
	foreach ($detail as $key) {
	 ?>
	  <div class="form-group">
	  	<label><?php echo $key->ket; ?></label>
	  	<input type="hidden" class="detailadd" value="<?php echo $key->ket; ?>" name="ket_<?php echo $key->id; ?>">
	  	<input type="number" class="form-control detailadd" value="<?php echo $key->sub_nilai; ?>" name="det_<?php echo $key->id; ?>">
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
		var formData = new FormData();
		var json={};
		$('.detailadd').each(function(){
			if($(this).attr('newer')!='undefined'){
			   formData.append($(this).attr('name'),$(this).val());	
			}else{
				formData.append($(this).attr('name'),$(this).val());
			}
		});
		//console.log(formData.getAll);
		  $.ajax({
		  	url: '<?php echo base_url(); ?>modal/save_detail_nilai',
            type: "POST",
            dataType: "json",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            complete: function(res) {
             alert(res.responseText);	
            }
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
			 	'<input type="hidden" name="newket_'+batascounter+'" class="detailadd" newer="yes" value="'+$('#lab').val()+'" id="newket_'+batascounter+'">'+
		  	   '<input type="number" class="form-control detailadd" newer="yes" name="newdet_'+batascounter+'" id="newdet_'+batascounter+'">'+
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