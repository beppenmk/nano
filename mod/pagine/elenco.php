<?php


$tab = "italiano";
if(isset($_REQUEST['l'])){
	$tab = $_REQUEST['l'];
}



if(isset($_GET['id'])){
	$pagina_singola = $db->read($tab ,' id='.$_GET['id']);
	$pagina_singola=$pagina_singola[0];
	$pagina_img = $db->read($tab .'_img','id_'.$tab.'='.$_GET['id']);
	
}else{
	
  $pagina_singola["id"]="";
  $pagina_singola["pagina"]="";
  $pagina_singola["titolo"]="";
  $pagina_singola["testo"]="";
  $pagina_singola["testo_2"]="";
  $pagina_singola["testo_3"]="";
  $pagina_singola["title"]="";
  $pagina_singola["keyword"]="";
  $pagina_singola["description"]="";
  $pagina_singola["immagine"]="";
  $pagina_singola["is_deletable"]="1";
  $pagina_singola["is_editable"]="1";
  $pagina_singola["is_visible"]="1";
}
//var_dump_pre($pagina_singola);





//leggo tabella
//foreach($lingue as $lingua){
	 $elenco_pagine = $db->read($tab," 1 order by ord ASC");
//}




$non=array('id','ord', 'pagina','is_visibile','is_editable','is_deletable', 'testo','testo_2','testo_3','title','keyword','description','immagine');
$i=0;
foreach($elenco_pagine as $riga){
	$tabella_pagine_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){
			if($riga['is_visibile']){
			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			$tabella_pagine_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			$tabella_pagine_v[$i][]=$v;				
			}
		}	
	}
	if($riga['is_visibile']){
		//aggiungo link
		if($riga['is_editable']){
			$tabella_pagine_v[$i][]=modifica('p_pagine_mod',$riga['id']."&l=$tab");  
		}else{
			$tabella_pagine_v[$i][]="";  
		}

		if($riga['is_deletable']){
			$tabella_pagine_v[$i][]=elimina('p_pagina_del',$riga['id']."&l=$tab");  
		}else{
			$tabella_pagine_v[$i][]="";  
		} 
	}
$i++;
}
//aggiungo titoli
$tabella_pagine_k[]='';
$tabella_pagine_k[]='';



 





