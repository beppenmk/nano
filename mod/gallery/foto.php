<?php


$gallery = $db->read('gallery','id='.$_GET['id_gallery']); 
$gallery=$gallery[0];
$foto = $db->read('gallery_img','id='.$_GET['id']);
$foto=$foto[0];
$commenti = $db->read('commenti','id_img='.$_GET['id']);

if(isset($_GET['id'])&&($_GET['id']!='')){
	$commento = $db->read('commenti','id_img='.$_GET['id_foto'].' and id='.$_GET['id']);
	$commento=$commento[0];
}




/*
$non = array('id','id_img');
//creo 2 array ottimizzati
$i=0;
foreach($commenti as $riga){
	$commenti_tabella_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){
			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			if($k=='id_user'){
				$k ="Utente";
			}	

			$commenti_tabella_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			$v = ($k=='data')?parse_date($v):$v;

			if($k=='Utente'){
				$lastUser=$db->riga('users',$riga['id_user']) ;
				$v=$lastUser['cognome']." ".$lastUser['nome'].' '.$lastUser['email'];
			}
			$commenti_tabella_v[$i][]=$v;

		}
	}
	//aggiungo link 
	$commenti_tabella_v[$i][]=modifica('p_gallery_commento_mod',$riga['id']."&id_gallery=".$gallery['id']."&id_foto=".$foto['id']);  
	$commenti_tabella_v[$i][]=elimina('p_gallery_commento_del',$riga['id']."&id_gallery=".$gallery['id']."&id_foto=".$foto['id']);  
$i++;
}
//aggiungo titoli
$commenti_tabella_k[]='';
$commenti_tabella_k[]='';

//creo tabella 
$tabella_commenti = array ('table'=>array ('id'=>'tabella_commenti','class'=>'dataTable'),
	'th'=>$commenti_tabella_k,
	'tr'=>$commenti_tabella_v
);*/