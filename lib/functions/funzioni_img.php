<?php
#							IMMAGINE 
#$img= cio che ricevo da $_FILES
#$upload = percorso dove fare upload
#$new_widt = ridimensionamento immagine (lasciare a 0 se non la si vuole modificare)
#$thumb_width = se diverso da 0 crea miniatur, specificare il valore
#$min= se esiste la miniatura è possibile specificare il percorso  
#$pref= prefisso nome foto
#$lar =0 se != da 0 allora scambio width con height






function  img($img,$upload,$new_width=0,$thumb_width=0,$min='min_',$nomeFile='',$pref='',$lar='0'){

	global $root;

if($img['name']==''){
$nome_img='';
$des='';

}else

{
 $size = getimagesize ($img['tmp_name']);
//definisco l'estensione del file
switch ($size[2]){
	case 1:
		$est='.gif';
		$create='ImageCreateFromgif';
		$copy='imagegif';
	break;
	
	case 2:
		$est='.jpg';
		$create='ImageCreateFromjpeg';
		$copy='imagejpeg';
	break;
	
	case 3:
		$est='.png';
		$create='ImageCreateFrompng';
		$copy='imagepng';
	break;
	
	default:
    exit('Formato di file non accettato');
}

// attribuisco il nome del file
// data attuale (ore minuti e secondi)  + estensione
//echo $nomeFile;
/*
if($nomeFile==""){
	$nomeFile=(date("dmygis"));
	$img_nome=$pref.$nomeFile.$est;
}else{
	$img_nome=$pref.$nomeFile;
}
*/

	$img_nome=$pref.rand(100, 900).date("dmygis")."_".$nomeFile;


//variabile con destinazione file
#$img_url=$des=$_SERVER['DOCUMENT_ROOT'].$root.$upload.$img_nome;

$img_url=$des=$upload.$img_nome;
//copio l'immagine

copy($img['tmp_name'],$des)  
		or die ('copia non riuscita qui');
//cancellazione file temporaneo
		unlink($img['tmp_name'])
		or die ('file non cancellato');
	
}






		

					
				
					
					//Inizio il resize dell'immagine principale solo se new_width != 0
					if($new_width!=0){
						$fullsize=$create($img_url);//Prelevo l'immagine da dove l'ho salvata pocanzi
						$fullsize_height=imagesy($fullsize);
						$fullsize_width=imagesx($fullsize);
						
						//ottengo altezza
						$new_height=floor($fullsize_height/($fullsize_width/$new_width));#ridimensiono l'altezza in base alla larghezza
						
							//inverto altezza e larghezza
							if($lar!=0){
								$tmp='';
								
								$tmp = $new_width;
								#$new_width=$new_height;
								
								$new_height=$tmp;
								
								//ottengo larghezza 
								$new_width=floor($fullsize_width/($fullsize_height/$new_height));#ridimensiono l'altezza in base alla larghezza
								
							}
							
							
						$thumb=imagecreatetruecolor($new_width,$new_height);
						imagecopyresampled($thumb,$fullsize,0,0,0,0,$new_width,$new_height,$fullsize_width,$fullsize_height);
						 
						imagedestroy($fullsize);
						$copy($thumb,$img_url);//posso modivicare il percorso dell'immagine piccola da qui
						imagedestroy($thumb);
					}
					
					
					
					
					
					#creo miniatura
					if($thumb_width!=0){
						#$thumb_url=$des=$des=$_SERVER['DOCUMENT_ROOT'].$root.$upload.$min.$img_nome;
						
					 	$thumb_url=$des=$upload.$min.$img_nome;
	
						$fullsize=$create($img_url);//Prelevo l'immagine da dove l'ho salvata pocanzi
						$fullsize_height=imagesy($fullsize);
						$fullsize_width=imagesx($fullsize);
						
						$new_height=floor($fullsize_height/($fullsize_width/$thumb_width));#ridimensiono l'altezza in base alla larghezza
						
							
						$thumb=imagecreatetruecolor($thumb_width,$new_height);
						imagecopyresampled($thumb,$fullsize,0,0,0,0,$thumb_width,$new_height,$fullsize_width,$fullsize_height);
						 
						imagedestroy($fullsize);
						$copy($thumb,$thumb_url);//posso modivicare il percorso dell'immagine piccola da qui
						imagedestroy($thumb);
						$dati_img['thumb']= $thumb_url;
					}



	$dati_img['nome']= $img_nome;
	$dati_img['url']= $img_url;
	


	return $dati_img;
}
?>