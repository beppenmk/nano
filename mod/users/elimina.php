<?php
if(isset($_POST['submit'])&&($_POST['submit']=='SI')){
	//controllo non sia associata a categorie
	//$chk_1 = $db->conta('categorie','id_area_business = '.$_GET['id']);
	//controllo non sia associata a cicli
	///$chk_2 = $db->conta('cicli_applicazione','id_area_business = '.$_GET['id']);
	$chk_1=$chk_2=0;
	
	
	if(($chk_1==0)&&($chk_2==0)){

		$db->delete('users',$_GET['id']);
		header("location:$root/index.php?azione=p_users&err=3");
		exit;
	
	}else{
		header("location:$root/index.php?azione=p_users&err=4");
		exit;	
	
	}
	
}elseif(isset($_POST['submit'])&&($_POST['submit']=='NO')){
	
	header("location:$root/index.php?azione=p_users");
	exit;
	
}
?>