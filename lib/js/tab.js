$(document).ready(function() {
	$('.dataTable').dataTable({
	//"sPaginationType": "full_numbers",
	//"bSort": false,
	"oLanguage": {
		"sLengthMenu": "Visualizza _MENU_ righe per pagina",
		"sZeroRecords": "Nessun elemento trovato",
		"sInfo": "Visualizzo da _START_ a _END_ di _TOTAL_ righe",
		"sInfoEmtpy": "Visualizzo da 0 a 0 di 0 righe",
		"sSearch": "Cerca"
				},
	});
	
	$('table tr td:nth-last-child(1)').css('width','50px');
	$('table tr td:nth-last-child(2)').css('width','50px');
	$('table tr th:nth-last-child(1)').css('width','50px');
	$('table tr th:nth-last-child(2)').css('width','50px');
	
});