<?php

if(trim($_POST['titolo'])==''){
	//controllo campi obbligatori
	header("location:$root/index.php?azione=p_news&err=9");
	exit;
}


$dati['titolo'] = $_POST['titolo'];
$dati['lingua'] = $_POST['lingua'];
$dati['testo'] = $_POST['testo'];
$dati['testo_breve'] = $_POST['testo_breve'];
$dati['data'] = parse_date($_POST['data'],1);
if( $_FILES["img"]["name"] !=''){
	$img = img($_FILES["img"],'uploads/news/',0,300,'min/');
	$dati['foto']=$img["nome"];
	
}


if($_POST['id']!=''){
	//UPDATE
	$db->update('news',$dati,$_POST['id']);
	header("location:$root/index.php?azione=p_news&err=2");
	exit;	
}else{
	//INSERT
	$db->insert('news',$dati);
	header("location:$root/index.php?azione=p_news&err=1");
	exit;	
}
