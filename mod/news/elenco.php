<?php

  

if(isset($_GET['id'])&&($_GET['id']!='')){

	$news_singola = $db->read('news','id='.$_GET['id']); 
	$news_singola = $news_singola[0];
}else{
	$news_singola['lingua']='';
	$news_singola['titolo']='';
	$news_singola['data']='';
	$news_singola['foto']='';
	$news_singola['testo']='';
	
	$news_singola['id']='';	
}



//leggo tabella
$elenco_news = $db->read('news',' 1 order by data DESC'); 
//elenco le chiavi che non voglio visualizzare
$non = array('id','testo','testo_breve','foto');
//creo 2 array ottimizzati
$i=0;
foreach($elenco_news as $riga){
	$news_tabella_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){
			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			$news_tabella_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			$v = ($k=='data')?parse_date($v):$v;
			$news_tabella_v[$i][]=$v;				
		}
	}
	//aggiungo link 
	$news_tabella_v[$i][]=modifica('p_news_mod',$riga['id']);  
	$news_tabella_v[$i][]=elimina('p_news_del',$riga['id']);  
$i++;
}
//aggiungo titoli
$news_tabella_k[]='';
$news_tabella_k[]='';




