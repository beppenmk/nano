<?php
$dati['nome'] = $_POST['nome'];


if($_POST['id']!=''){
	//UPDATE
	$db->update('gallery_img',$dati,$_POST['id']);
	header("location:$root/index.php?azione=p_gallery_foto_mod&id_gallery=".$_POST['id_gallery']."&id=".$_POST['id']."&err=2");
	exit;	
}else{
	//INSERT
	//$db->insert('gallery',$dati);
	//header("location:$root/index.php?azione=p_gallery&err=1");
	//exit;	
}
