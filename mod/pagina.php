<?php 
//echo $_SESSION[$database]['lingua'];
$_GET['id']= $db->trova($_SESSION[$database]['lingua'],'id','pagina',$azione);
include_once('pagine/elenco.php');
