
<?php


if(isset($_GET['id'])){
	$utente_singolo = $db->read('users',' id='.$_GET['id']);
	$utente_singolo=$utente_singolo[0];
	
}else{
	$utente_singolo['id']='';
	$utente_singolo['username']='';
	$utente_singolo['psw']='';
	$utente_singolo['tipo']='';
	$utente_singolo['nome']='';
	$utente_singolo['email']='';
	$utente_singolo['data_nascita']='';
	$utente_singolo['cellulare']='';
	$utente_singolo['cognome']='';
	$utente_singolo['comune_residenza']='';
	$utente_singolo['img']='';
}

//leggo tabella
$elenco_utenti = $db->read('users'); 

$non=array('id','psw','data_nascita','foto',	'cellulare', 	'cognome', 	'comune_residenza' ,	'img');

//creo 2 array ottimizzati
$i=0;
foreach($elenco_utenti as $riga){
	$tabella_utenti_k=array(); 
	foreach($riga as $k => $v){
		if(!in_array($k,$non)){
			//creo array di chiavi (se serve posso farlo a mano e non in un ciclo)
			$tabella_utenti_k[]=str_replace('_',' ',$k);
			//posso inserire qui correzioni
			if($k=='tipo'){
				switch ($v) {
					case '1':
						$v="Amministratore";
						break;
				case '2':
						$v="Utente Attivo";
						break;
				
				case '3':
						$v="Bannato";
				break;
					
				
				}
			}

			$tabella_utenti_v[$i][]=$v;				
		}
	}
	//aggiungo link 
	$tabella_utenti_v[$i][]=modifica('p_users_mod',$riga['id']);  
	if($riga['tipo']!=1){
		$tabella_utenti_v[$i][]=elimina('p_users_del',$riga['id']);  
	}else{
		$tabella_utenti_v[$i][]="";
	}

$i++;
}
//aggiungo titoli
$tabella_utenti_k[]='';
$tabella_utenti_k[]='';


 
//creo tabella 
$tabella_utenti = array ('table'=>array ('id'=>'tabella_utenti','class'=>'dataTable'),
	'th'=>$tabella_utenti_k,
	'tr'=>$tabella_utenti_v
);




