<?php


$dati['lingua'] = $_POST['lingua'];

if(strtolower(substr($_FILES["pdf"]["name"],'-3'))!='pdf' ){
	header("location:$root/index.php?azione=p_pdf&err=9");
	exit;
}

if( $_FILES["pdf"]["name"] !=''){
	
	
	$dati['file'] =  upload($_FILES["pdf"],'uploads/'.$dati['lingua']);
	
}
	//INSERT
	$db->insert('pdf',$dati);
	header("location:$root/index.php?azione=p_pdf&err=1");
	exit;	
