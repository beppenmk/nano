<?php

$dati['titolo']=$_POST["titolo"];
$dati['data_inizio']=parse_date($_POST["data_inizio"],1);
$dati['data_fine']=parse_date($_POST["data_fine"],1);
$dati['testo_breve']=$_POST["testo_breve"];
$dati['lingua']=$_POST['lingua'];







if($_POST['id']!=''){
	//UPDATE
	$db->update('offerte',$dati,$_POST['id']);
	header("location:$root/index.php?azione=p_offerte&err=2");
	exit;	
}else{
	//INSERT
	$db->insert('offerte',$dati);
	header("location:$root/index.php?azione=p_offerte&err=1");
	exit;	
}
