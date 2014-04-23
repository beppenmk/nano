
<?php

//se son nel pannello .......


if(isset($_GET['id'])){
	$offerta_singola = $db->read('offerte',' id='.$_GET['id']);
	$offerta_singola=$offerta_singola[0];
	
}else{
	$offerta_singola['id']='';
	$offerta_singola['titolo']='';
	$offerta_singola['data_inizio']='';
	$offerta_singola['data_fine']='';
	$offerta_singola['testo_breve']='';
	$offerta_singola['lingua']='';
	
}





//leggo tabella
$elenco_offerte = $db->read('offerte'); 

$non=array('id');

//creo 2 array ottimizzati
$i=0;
foreach($elenco_offerte as $riga){
	$tabella_offerte_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){
			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			$tabella_offerte_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			$tabella_offerte_v[$i][]=$v;				
		}
	}
	//aggiungo link 
	$tabella_offerte_v[$i][]=modifica('p_offerte_mod',$riga['id']);  
	$tabella_offerte_v[$i][]=elimina('p_offerte_del',$riga['id']);  
$i++;
}
//aggiungo titoli
$tabella_offerte_k[]='';
$tabella_offerte_k[]='';


 
//creo tabella 
$tabella_offerte = array ('table'=>array ('id'=>'tabella_offerte','class'=>'dataTable'),
	'th'=>$tabella_offerte_k,
	'tr'=>$tabella_offerte_v
);




