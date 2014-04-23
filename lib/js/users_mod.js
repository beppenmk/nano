$(function() {
		$("#data_nascita").datepicker($.datepicker.regional['it']);
	});
	
function users_cancella_foto(id){
	var action=confirm('Cliccando OK eliminerai definitivamente questa foto');
	
	if (action==true)
	parent.self.location.href = "index.php?azione=p_users_del_foto&id="+id;
	
	
	
}
	