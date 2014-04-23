

function p_pagina_del_img(id){
	action=confirm('Cliccando OK eliminerai definitivamente questa foto')
	
	if (action==true)
	parent.self.location.href = "index.php?azione=p_pagina_del_img&id="+id;
	
}
	