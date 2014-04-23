<?php

  

if(isset($_GET['id'])&&($_GET['id']!='')){

	$gallery_singola = $db->read('gallery','id='.$_GET['id']); 
	$gallery_singola = $gallery_singola[0];
	
	$gallery_img = $db->read('gallery_img','id_gallery='.$_GET['id']);

}else{
	$gallery_singola['nome']='';
	$gallery_singola['id']='';	


}


//leggo tabella
$elenco_gallery = $db->read('gallery','1 order by ord DESC' ); 
//elenco le chiavi che non voglio visualizzare
$non = array('id','id_last_comment');
//creo 2 array ottimizzati
$i=0;
foreach($elenco_gallery as $riga){
	$gallery_tabella_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){

			$n = $db->conta('gallery_img','id_gallery = '.$riga['id']);
			if($riga['id_last_comment']!=0){

				$lastComment=$db->riga('commenti',$riga['id_last_comment']) ;
				$lastUser=$db->riga('users',$lastComment['id_user']) ;


				$lastCommentUser=$lastUser['cognome']." ".$lastUser['nome'].' '.$lastUser['email'];
				$lastCommentData= parse_date($lastComment['data']);
			}else{
				$lastCommentUser="";
				$lastCommentData="";
			}

			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			$gallery_tabella_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			$v = ($k=='data')?parse_date($v):$v;
		
			if($k=="ord"){
				$v=ordina($v,$riga['id']);
			}
			$gallery_tabella_v[$i][]=$v;				

		}
	}
	//aggiungo link 
	$gallery_tabella_v[$i][] = $n;
	$gallery_tabella_v[$i][] = $lastCommentUser;
	$gallery_tabella_v[$i][] = $lastCommentData;
	$gallery_tabella_v[$i][]=modifica('p_gallery_mod',$riga['id']);  
	$gallery_tabella_v[$i][]=elimina('p_gallery_del',$riga['id']);  
$i++;
}
//aggiungo titoli
$gallery_tabella_k[]='Numero Immagini';
$gallery_tabella_k[]='Utente ultimo commento';
$gallery_tabella_k[]='Data ultimo commento';
$gallery_tabella_k[]='';
$gallery_tabella_k[]='';

//creo tabella 
$tabella_gallery = array ('table'=>array ('id'=>'tabella_gallery','class'=>'dataTable'),
	'th'=>$gallery_tabella_k,
	'tr'=>$gallery_tabella_v
);



function ordina($v,$id){
	 return genera_numeri ("ordina_".$id,1000,$v);

	
}