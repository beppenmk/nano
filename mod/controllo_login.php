<?php
$login = trim($_POST['login']);
$psw = trim($_POST['psw']);






//controllo valori
if(($login=='')&&($psw=='')){
	header("location:$root/index.php?azione=login&err=1");
	exit;
}elseif (($login=='')&&($psw!='')){
	header("location:$root/index.php?azione=login&err=2");
	exit;
}elseif (($login!='')&&($psw=='')){
	header("location:$root/index.php?azione=login&err=3");
	$_SESSION['login_old']=$login;
	exit;
}else{



//cripto la password x confronto
$psw = md5($psw);

$db= new mysql($database,$host,$user,$password);

$sql ="
SELECT  
id,
tipo
FROM
$database."."users
WHERE
username = '$login'
AND
psw = '$psw'
";

$risultato  = $db->query($sql);

$riga =mysql_fetch_assoc($risultato);



if($riga){
	#echo "si";exit;
	$_SESSION[$database]['logged']=1;
	$_SESSION[$database]['log_tipe']=$riga['tipo'];
	$_SESSION[$database]['log_id']=$riga['id'];
	header("location:$root/index.php?azione=p_pagine");
	exit;
}else{
		#echo "no";exit;
	header("location:$root/index.php?azione=login&err=4");
	exit;
}







}
?>