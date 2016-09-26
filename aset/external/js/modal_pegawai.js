function tampildatapegawai(e,base_url){
 waitingDialog.show('Loading');	
 var id=$(e.target).attr('data-id');
 $.post(base_url+'modal/modal_pegawai',{id:id},function(data){
  $("#datapegawai .modal-body").html(data);
  waitingDialog.hide();
  $("#datapegawai").modal("show");
 });
}
function tampildatajabatan(e,base_url){
 waitingDialog.show('Loading');	
 var id=$(e.target).attr('data-id');
 $.post(base_url+'modal/modal_jabatan',{id:id},function(data){
  $("#datajabatan .modal-body").html(data);
  waitingDialog.hide();
  $("#datajabatan").modal("show");
 });
}
function tampildatapengajar(e,base_url){
 waitingDialog.show('Loading');	
 var id=$(e.target).attr('data-id');
 $.post(base_url+'modal/modal_pengajar',{id:id},function(data){
  $("#datapengajar .modal-body").html(data);
  waitingDialog.hide();
  $("#datapengajar").modal("show");
 });
}

function constrait_pegawai(e){
 if($(e.target).val()=="gtt"){
   $("#email").attr("required",true);
   $("#nip").removeAttr("required");
 }
 if($(e.target).val()=="pns"){
   $("#nip").attr("required",true);
   $("#email").removeAttr("required");
 }	
}
function constrait_pegawai2(e){
 if($(e.target).val()=="gtt"){
   $("#datapegawai #email").attr("required",true);
   $("#datapegawai #nip").removeAttr("required");
 }
 if($(e.target).val()=="pns"){
   $("#datapegawai #nip").attr("required",true);
   $("#datapegawai #email").removeAttr("required");
 }	
}

function prov_act(e,base_url){
waitingDialog.show('Loading');
 var idprov=$(e.target).val()
 $.post(base_url+'modal/get_kabkot',{idprov:idprov},function(data){
 	$('#kabkota').html(data);
 	waitingDialog.hide();
 });
}
function kabkota_act(e,base_url){
waitingDialog.show('Loading');
 var idkabkot=$(e.target).val()
 $.post(base_url+'modal/get_kec',{idkabkot:idkabkot},function(data){
 	$('#kec').html(data);
 	waitingDialog.hide();
 });
}
function kec_act(e,base_url){
waitingDialog.show('Loading');
 var idkec=$(e.target).val()
 $.post(base_url+'modal/get_keldesa',{idkec:idkec},function(data){
 	$('#kel').html(data);
 	waitingDialog.hide();
 });
}

$(document).ready(function(){
	$(".ni").keyup(function(e){
	  var str=$(e.target).val();
	  var n=str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');	
	  $(e.target).val(n);
	});
		$('#tabelpegawai').DataTable();
	    $('.datepicker').datepicker({
	     format: 'yyyy-mm-dd',
	     startDate: '-3d'
    });
});
function jabatanchange(e){
 if($(e.target).val()=='wali'){
 	$('#id_kelas').removeClass('hide');
 }else{
 	$('#id_kelas').addClass('hide');
 }
}
function jabatanchangee(e){
 if($(e.target).val()=='wali'){
 	$('#id_kelass').removeClass('hide');
 }else{
 	$('#id_kelass').addClass('hide');
 }
}

$(function() {
        var availableTags = [];
        
        $("#pegawai").autocomplete({
            source: function(term, suggest){
                $.post('http://localhost/sia/pegawai/autocomplete',{autocomplete:'yes',value:$('#pegawai').val()},function(data){
                    suggest(JSON.parse(data));
                });
            },
            focus: function(event, ui ) {
                $('#pegawai').val(ui.item.label);
                return false;
            }
            /*
            ,
            select: function (event, ui) {

                alert("selected!");
            },

            change: function (event, ui) {

                alert("changed!");
            }
            */
        });

        $("#pegawai").data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            var $li = $('<li>');
            var foto=item.foto;
            if(foto==null){foto="";}

            $img = $('<img width="40" height="50" style="padding-right:5px;">');
            $img.attr({
                src: 'http://localhost/sia/aset/img/pegawai/'+foto,
                alt: ''+foto,
                onError:'$(this).attr({src:"http://localhost/sia/aset/img/no-image.png"})'
            });

            $li.attr('data-value', item.label);
            $li.append('<a href="#">');
            $li.find('a').append($img).append(item.label);
            return $li.appendTo(ul);
        };
  });
// Modal loading
var waitingDialog = waitingDialog || (function ($) {
    'use strict';

	// Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			if (typeof options === 'undefined') {
				options = {};
			}
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			var settings = $.extend({
				dialogSize: 'm',
				progressType: '',
				onHide: null // This callback runs after the dialog was hidden
			}, options);

			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Adding callbacks
			if (typeof settings.onHide === 'function') {
				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
					settings.onHide.call($dialog);
				});
			}
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	};

})(jQuery);