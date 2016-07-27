function tampildatasiswa(e,base_url){
 var idsekolah=$(e.target).attr('data-idsekolah'); 
 var noinduk=$(e.target).attr('data-noinduk');
 $.post(base_url+'modal/modal_siswa',{nisn:noinduk},function(data){
  $("#datasiswa .modal-body").html(data);
  $("#datasiswa").modal("show");
 });
}
function pilih_tahun_masuk(ket){
 if(ket=="ini"){$('#thn_masuk_lalu').addClass('hide');}
 if(ket=="lalu"){$('#thn_masuk_lalu').removeClass('hide');}	
}
$(document).ready(function(){
	$(".ni").keyup(function(e){
	  var str=$(e.target).val();
	  var n=str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');	
	  $(e.target).val(n);
	});
	
});