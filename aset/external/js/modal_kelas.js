function tampildatakelas(e,base_url){
 waitingDialog.show('Loading');	
 var id=$(e.target).attr('data-id');
 $.post(base_url+'modal/modal_kelas',{id:id},function(data){
  $("#datakelas .modal-body").html(data);
  waitingDialog.hide();
  $("#datakelas").modal("show");
 });
}
function tampildatasiswa(e,base_url){
 waitingDialog.show('Loading');	
 var id=$(e.target).attr('data-noinduk');
 var id_mapel=$(e.target).attr('id-mapel');
 var id_mengajar=$(e.target).attr('id-meng');
 $.post(base_url+'modal/modal_input_nilai',{noinduk:id,id_mengajar:id_mengajar,id_mapel:id_mapel},function(data){
  $("#datainput .modal-body").html(data);
  waitingDialog.hide();
  $("#datainput").modal("show");
 });
}
$(document).ready(function(){
	 $('#tabelkelas').DataTable();
	    $('.datepicker').datepicker({
	     format: 'yyyy-mm-dd',
	     startDate: '-3d'
    });
});
var x=1;
function tambahfield(){
    x++;
	$('#bindautocom').append('<label>Nama Siswa '+x+'</label>'+	
			'<div class="form-group">'+
			'	<input type="text" name="no_induk[]" onkeydown="autocom(event)" class="form-control" >'+
			'</div>'
		);
}
function autocom(e){
	var availableTags = [];
        $(e.target).autocomplete({
            source: function(term, suggest){
                $.post('http://localhost/sia/kelas/autocompletesiswa',{autocomplete:'yes',value:$(e.target).val()},function(data){
                    suggest(JSON.parse(data));
                });
            },
            focus: function(event, ui ) {
                $(e.target).val(ui.item.label);
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
}

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