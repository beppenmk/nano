$(function() {
		$("#data").datepicker($.datepicker.regional['it']);
	});
	
function news_cancella_foto(id){
	action=confirm('Cliccando OK eliminerai definitivamente questa foto')
	
	if (action==true)
	parent.self.location.href = "index.php?azione=p_news_del_foto&id="+id;
	
	
	
}
	