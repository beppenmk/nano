<?php

if(isset($_POST['submit'])&&($_POST['submit']=='SI')){

$db->delete('commenti',$_GET['id']);


//p_gallery_foto_mod&id_gallery=3&id=43&err=1
	header("location:$root/index.php?azione=p_gallery_foto_mod&id_gallery=".$_GET['id_gallery']."&id=".$_GET['id_foto']."&err=3");


exit;
}elseif(isset($_POST['submit'])&&($_POST['submit']=='NO')){
	header("location:$root/index.php?azione=p_gallery_foto_mod&id_gallery=".$_GET['id_gallery']."&id=".$_GET['id_foto']."");
}	