<?php

if(isset($_POST['submit'])&&($_POST['submit']=='SI')){
	

	$db->delete('gallery',$_GET['id']);
	header("location:$root/index.php?azione=p_gallery&err=3");
	exit;
	
	
}elseif(isset($_POST['submit'])&&($_POST['submit']=='NO')){
	
	header("location:$root/index.php?azione=p_gallery");
	exit;
	
}
?>