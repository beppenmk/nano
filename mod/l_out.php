<?php
	@session_start();
	include_once('lib/conf.php');
	include_once('lib/functions.php');


   $_SESSION[$database]['login_utente']=0;
   $_SESSION[$database]['login_utente_type']=0;
   $_SESSION=array();
   
	header("location:$root/index.php");
	exit;   
   
?>
