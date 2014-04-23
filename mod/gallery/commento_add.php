<?php
$dati['id'] = $_POST['id'];
$dati['id_img'] = $_POST['id_img'];
$dati['commento'] = $_POST['commento'];
$dati['id_user'] = $_SESSION[$database]["log_id"];



if($_POST['id']!=''){
	//UPDATE
	$db->update('commenti',$dati,$_POST['id']);

	$datiGallery['id_last_comment']=$_POST['id'];
	$db->update('gallery',$datiGallery,$_POST['id_gallery']);
	header("location:$root/index.php?azione=p_gallery_foto_mod&id_gallery=".$_POST['id_gallery']."&id=".$_POST['id_img']."&err=2");
	exit;	
}else{
	//INSERT
	$db->insert('commenti',$dati);
	$datiGallery['id_last_comment'] = $db->last_id('commenti');
	$db->update('gallery',$datiGallery,$_POST['id_gallery']);
	
	if(isset($_POST['frontend'])&&($_POST['frontend']==1)){
		header("location:$root/".$_POST['id_gallery']."/".$_POST['id_img']."/gallery.html");
	}else{

		header("location:$root/index.php?azione=p_gallery_foto_mod&id_gallery=".$_POST['id_gallery']."&id=".$_POST['id_img']."&err=1");
	}
	exit;	
}
