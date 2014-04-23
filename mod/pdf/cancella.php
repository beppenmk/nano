<?php



		
if(isset($_POST['submit'])&&($_POST['submit']=='SI')){
	
$db->delete('pdf',$_GET['id']);
		header("location:$root/index.php?azione=p_pdf&err=3");
		exit;
	
}elseif(isset($_POST['submit'])&&($_POST['submit']=='NO')){
	
	header("location:$root/index.php?azione=p_pdf");
	exit;
	
}
?>