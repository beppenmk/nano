<?php
include_once 'init.php';

$dati['id']=$_GET['id'];
$dati["ord"]=$_GET['ord'];


if($db->update('gallery',$dati,$_GET['id'])){
	echo "Modifica avvenuta correttamente";
}else{
	echo "ERRORE";	
}
?>

