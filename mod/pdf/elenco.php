<?php


//leggo tabella
$elenco_pdf = $db->read('pdf'); 

//elenco le chiavi che non voglio visualizzare
$non = array('id');
//creo 2 array ottimizzati
$i=0;
foreach($elenco_pdf as $riga){
	$pdf_tabella_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){
			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			$pdf_tabella_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			$v = ($k=='data')?parse_date($v):$v;
			$pdf_tabella_v[$i][]=$v;				
		}
	}
	//aggiungo link 
  
	$pdf_tabella_v[$i][]=elimina('p_pdf_del',$riga['id']);  
$i++;
}
$pdf_tabella_k[]='Elimina';




