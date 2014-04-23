<?php

function TagliaStringa($stringa, $max_char){
		if(strlen($stringa)>$max_char){
			$stringa_tagliata=substr($stringa, 0,$max_char);
			$last_space=strrpos($stringa_tagliata," ");
			$stringa_ok=substr($stringa_tagliata, 0,$last_space);
			return $stringa_ok."...";
		}else{
			return $stringa;
		}
	}

#var_dump_pre
/*
 * stampo un array in modo graficamente chiaro
 * $mixed = array
 */
function var_dump_pre($mixed) {
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
}
#################
#parse_date
/*
 * converte una data in vari formati
 * $datetoparse= data da convertire
 * $code=il modo di conversione 0\1\2
 * 2 = da americana a italiana con mese in parola
 * 1 = da italiana ad americana
 * 0 = da americano a italiana
 */
function parse_date($datetoparse,$code="0") {

	switch ($code){
		case 2:
		case 3:	
		$v_d=substr($datetoparse,8,2);
   		$v_m=substr($datetoparse,5,2);
   		$v_y=substr($datetoparse,0,4);

   		   				
   			switch ($v_m){
   				case '00':
   					$mese ="";
   					break;
   				case '01':
   					$mese ="Gennaio";
   					break;
   				case '02':
   					$mese ="Febbraio";
   					break;
				case '03':
					$mese ="Marzo";
   					break;
   				case '04':
   					$mese ="Aprile";
   					break;
   				case '05':
   					$mese ="Maggio";
   					break;
   				case '06':
   					$mese ="Giugno";
   					break;
   				case '07':
   					$mese ="Luglio";
   					break;
   				case '08':
   					$mese ="Agosto";
   					break;
				
   				case '09':
					$mese ="Settembre";
   					break;
   				case '10':
   					$mese ="Ottobre";
   					break;
   				case '11':
   					$mese ="Novembre";
					break;
   				case '12':
   					$mese ="Dicembre";
   					break;
   			}
   		
   			if($code==2){
   				$dateparsed=$v_d." ".$mese." ".$v_y;
			}elseif($code==3){
				$timestamp = strtotime($datetoparse);
				$dayN = date( "w", $timestamp);
				switch ($dayN) {
					case 0:
						$day = 'Domenica';
					break;
					case 1:
						$day = 'Lunedì';
					break;
					case 2:
						$day = 'Martedì';
					break;
					case 3:
						$day = 'Mercoledì';
					break;
					case 4:
						$day = 'Giovedì';
					break;
					case 5:
						$day = 'Venerdì';
					break;
					case 6:
						$day = 'Sabato';
					break;
					
				}
				$dateparsed=$day."<span class=\"ombra  \"> ".$v_d." </span>".$mese;
			}
			
			break;
		case 1:
			if ($datetoparse == "")
  		$dateparsed = "0000-00-00";
  	else {
   		$v_d=substr($datetoparse,0,2);
   		$v_m=substr($datetoparse,3,2);
   		$v_y=substr($datetoparse,6,4);
   		$dateparsed=$v_y."-".$v_m."-".$v_d;
	}
			
			break;

		

		case 0:
		default:
			
			if ($datetoparse == "" || $datetoparse == "0000-00-00")
  		$dateparsed = "";
  	else {
	  	$v_d=substr($datetoparse,8,2);
   		$v_m=substr($datetoparse,5,2);
   		$v_y=substr($datetoparse,0,4);
   		$dateparsed=$v_d."-".$v_m."-".$v_y;
   	}	
			
			break;	
	}
 
 return $dateparsed;
}

#################
#controllo_email
/*
 * controllo tramite espressione regolare validità email
 * $email= indirizzo da verificare
 */
function controllo_email($email){
	$result = eregi("^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$",$email);
	if($result == false){
		return false;
	}else{
		return true;
	}
}
#################
#upload
/*
 * permette di eseguire upload di file (semplice) che rinomina il file
 * $file = array $FILES
 * $dres = destinazione
 */
function upload($file,$des){
	$des="$des/".date("dmygis")."_".$file['name'];
	//copio il file
	copy($file['tmp_name'],$des) 
			or die ('copia non riuscita');
	//cancellazione file temporaneo
		#	unlink($file['tmp_name'])
		#	or die ('file non cancellato');
		
	return (date("dmygis")."_".$file['name']);
}
#################
#genera_password
/*
 * genera una passwor casuale
 * $lung_pass = lunghezza della psw default 10
 */
function genera_password($lung_pass=10){
	// Creo un ciclo for che si ripete per il valore di $lung_pass
	for ($x=1; $x<=$lung_pass; $x++){
	  // Se $x è multiplo di 2...
	  if ($x % 2){
	    // Aggiungo una lettera casuale usando chr() in combinazione
	    // con rand() che genera un valore numerico compreso tra 97
	    // e 122, numeri che corrispondono alle lettere dell'alfabeto
	    // nella tabella dei caratteri ASCII
	    $mypass = $mypass . chr(rand(97,122));
	  // Se $x non è multiplo di 2...
	  }else{
	    // Aggiungo alla password un numero compreso tra 0 e 9
	    $mypass = $mypass . rand(0,9);
	  }
	}
return $mypass;
}
#################
#genera_numeri
/*
 * genera una select con n numeri 
 * $nome = il name e l'id della select
 * $n = numero finale
 * $def = elemento di defult
 */
function genera_numeri ($nome,$n,$def='00'){
	$str="<select name=\"$nome\" id=\"$nome\">";
	for($i=0;$i<=$n;$i++){
			if(strlen($i)==1){$ii='0'.$i;}else{$ii=$i;}
			if($def==$ii){$sel = 'selected="selected"';}else{$sel='';}
			$str.="<option value=\"$ii\" $sel >$ii</option>";
	}
		$str.="</select>";
return($str);		
}
#################




function modifica($url,$n ,$class=''){
	global $root;
	return '<a class="'.$class.'" href="'.$root.'/index.php?azione='.$url.'&id='.$n.'" title="modifica">  <img alt="modifica" src="'.$root.'/img/modifica.png">  </a>';	
}
function elimina($url,$n ,$class=''){
	global $root;
	return '<a class="'.$class.'" href="'.$root.'/index.php?azione='.$url.'&id='.$n.'" title="elimina">  <img alt="elimina" src="'.$root.'/img/elimina.png">  </a>';
}


/**
 * tipo 
 * tag
 * classe
 * url img
 */
function news($t='', $tag="li",$class="", $foto=''){
	global $root;
	global $database;
	global $db;
	$str='';
	
	
	$cl="";
	switch($t){
		
		case 1:
			$filtro='limit 1';
		break;
		
		case 2:
			$filtro='';
		break;
		case 3:
			$filtro='data < now() order by data DESC';
		break;

		default;
			$filtro='data > now() order by data ASC';
		break;		
		
	}
	$lingua = $_SESSION[$database]['lingua'];
	$ris = $db->read('news','  '.$filtro);
	foreach($ris as $news){
			$str.="<$tag class=\"$class  \">";
			$str.="<img  src=\"$root/uploads/news/$foto".$news['foto']." \" alt=\"".$news['titolo']."\" />";
			$str.="<span class=\"data\">".parse_date($news['data'],3)."</span>";
			$str.="<span class=\"titolo\">".$news['titolo']."</span>";
			$str.="<p>".$news['testo_breve']."</p>";
			$str.="<a href=\"$root/".$news['id']."/evento.html\" class=\"btn btn-default\">VEDI</a> ";
			$str.="</$tag>";
		}
 	return $str; 
}





function offerte($t='',$tag="li" ){
	global $root;
	global $database;
	global $db;
	$str='';
	
	if($t==1) {$t = 'limit 1';}else{$t='';};
	
	$lingua = $_SESSION[$database]['lingua'];

	$ris = $db->read('offerte',' lingua = "'.$lingua.'" and now()>data_inizio and now() < data_fine order by data_inizio desc '.$t);

 
	foreach($ris as $offerta){
		$str.="<$tag>";
			$str.="<h3>".$offerta['titolo']."</h3>";
			$str.="<h4>".parse_date($offerta['data_inizio'])." - ".parse_date($offerta['data_fine'])."</h4>";
			$str.="<p>".$offerta['testo_breve']."</p>";
		$str.="</$tag>";	
	}
return  $str ;
}







function pdf($tag="li"){
	global $root;
	global $database;
	global $db;
	$str='';
	
	
	$lingua =$_SESSION[$database]['lingua'];

	$ris = $db->read('pdf',' lingua = "'.$lingua.'"');

	foreach($ris as $file){
		$str.="<$tag>";
			$str.="<a href=\"$root/uploads/$lingua/".$file['file']."\" target=\"_blank\"> <img src=\"$root/img/pdf.jpg \" alt=\"pdf\" />".substr($file['file'],12)."</a>";
		
		$str.="</$tag>";	
	}

return $str ;
}






//gestione errore
function str_err(){
	$str_err='';
	if(isset($_GET['err'])){
	
		switch($_GET['err']){
			case 0:
			$str_err='<p class="alert   alert-danger">Errore</p>';		
			break;
	
			case 1:
			$str_err='<p class="alert   alert-success">Inserimento avvenuto correttamente </p>';		
			break;
			case 2:
			$str_err='<p class="alert   alert-success">Modifica avvenuta correttamente </p>';		
			break;
			case 3:
			$str_err='<p class="alert   alert-success">Eliminazione avvenuta correttamente </p>';		
			break;
			case 9:
			$str_err='<p class="   alert alert-danger">Campi obbligatori non soddisfatti</p>';		
			break;
		}
	}


return "
<div class=\"row\">
<div class=\"col-md-12 \"> 
 <br>
$str_err
</div>
</div>";
}
function array_remove_null(&$array, $maintian_keys = true){
    $new_array = array();
    if(is_array($array)){
        foreach($array as $k=>$v){
            if($v&&$maintian_keys) $new_array[$k]=$v;
            elseif($v) $new_array[]=$v;
        }
    }
    $array = $new_array;
    return $array;
}
 


function chkLogin($n){

$cll =" none";
$str='';
	switch ($n){
	case 2:
			$str ="Utente già nel nostro database";
			$cll="warning";
		break;
		case 1:
			
			$str ="Inserimento avvenuto correttamente";
			$cll="success";
		break;
		
		case 2:
			$str ="Utente già nel nostro database";
			$cll="warning";
		break;

		case 10:
			$str ="Parametri mancanti";
			$cll="warning";
		break;

		case 20:
			$str ="Manca il nome utente";
			$cll="warning";
		break;

		case 30:
			$str ="Manca la password";
			$cll="warning";
		break;

		case 40:
			$str ="Dati inseriti non corretti ";
			$cll="warning";
		break;

		case 50:
			$str ="Benvenuto !";
			$cll="success";
		break;

		
	}
	
	

return '<div class="alert alert-'.$cll.' fade in ">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong>ATTENZIONE:</strong>
'.$str.'
</div>';



}