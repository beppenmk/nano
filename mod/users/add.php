
<?php

  $dati["username"]=$_POST["username"];
  $dati["nome"]=$_POST["nome"];
  $dati["cognome"]=$_POST["cognome"];
  $dati["email"]=$_POST["email"];
  $dati["data_nascita"]=$_POST["data_nascita"];
  $dati["cellulare"]=$_POST["cellulare"];
  $dati["comune_residenza"]=$_POST["comune_residenza"];
  $dati["tipo"]=$_POST["tipo"];


if($_POST['id']!=''){
	//UPDATE
	$db->update('users',$dati,$_POST['id']);
	header("location:$root/index.php?azione=p_users&err=2");
	exit;	
}else{





	//INSERT
	//  $dati["psw"]=md5($_POST["password"]);
	
	//se esiste utente non inserisco e segnalo errore
	if( $db->conta('users','email="'.$_POST["email"].'"') ==0){
		$db->insert('users',$dati);
		
	//include_once 'lib/mail/registrazione_sito.php';
		/**

		 
		INSERIRE BLOCCO MAIL


		*/
		header("location:$root/?azione=p_users&err=1");
		exit;	
	}else{






		header("location:$root/index.php?err=2");
		exit;
	}

	

}
