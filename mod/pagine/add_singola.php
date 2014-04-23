<?php


 // $dati["pagina"]="pagina_".$_POST["pagina"];
  $dati["titolo"]=$_POST["titolo"];
  $dati["testo"]=$_POST["testo"];
  $dati["title"]=$_POST["title"];
  $dati["keyword"]=$_POST["keyword"];
  $dati["description"]=$_POST["description"];
  $dati["is_deletable"]=$_POST["is_deletable"];
  
  
  var_dump_pre($_POST);
  $tab = $_POST['l'];
//var_dump_pre($dati);

/*
if( $_FILES["img"]["name"] !=''){
	$img = img($_FILES["img"],'uploads/italiano/',0 ,80,'min/');
	$dati['immagine']=$img["nome"];
	//$datiUpdate['immagine']=$img["nome"];
}

*/

if($_POST['id']!=''){
	//UPDATE
	$db->update($tab,$dati,$_POST['id']);
	header("location:$root/index.php?azione=p_pagine&err=2&l=$tab");
	exit;	
}else{
	//INSERT
	$dati["is_deletable"]=1;
	$dati["is_editable"]=1;
	$dati["is_visibile"]=1;
	$dati["ord"]=4;
	$db->insert($tab,$dati);
	$lastId = $db->last_id($tab);
	$dati["pagina"]="pagina_".$lastId;
	$db->update($tab,$dati,$lastId);
	header("location:$root/index.php?azione=p_pagine&err=1&l=$tab");
	exit;	
}