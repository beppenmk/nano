<?php

$dati['ord'] = 1;

if(trim($_POST['nome'])==''){
	//controllo campi obbligatori
	header("location:$root/index.php?azione=p_gallery&err=9");
	exit;
}


$dati['nome'] = $_POST['nome'];


if($_POST['id']!=''){
	//UPDATE
	$db->update('gallery',$dati,$_POST['id']);
	header("location:$root/index.php?azione=p_gallery&err=2");
	exit;	
}else{
	//INSERT
	$db->insert('gallery',$dati);
	header("location:$root/index.php?azione=p_gallery&err=1");
	exit;	
}
