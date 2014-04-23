<?php
if(isset($_POST['submit'])&&($_POST['submit']=='SI')){
	
$db->delete($_GET['l'],$_GET['id']);
		header("location:$root/index.php?azione=p_pagine&err=3&l=".$_GET['l']);
		exit;
	
}elseif(isset($_POST['submit'])&&($_POST['submit']=='NO')){
	
	header("location:$root/index.php?azione=p_pagine&l=".$_GET['l']);
	exit;
	
}
?>