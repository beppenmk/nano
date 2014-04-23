<?php
include_once('conf.php');
include_once('functions/functions.php');
include_once('functions/funzioni_img.php');

include_once('class/class.less.php');
include_once('class/class.db.php');
include_once('class/class.form.php');
include_once('class/class.phpmailer.php');
include_once('class/class.smtp.php');
include_once('class/class.db.php');
include_once('class/class.table.php');

//include_once('class/class.mobile.php');


########################################################################
/*GESTIONE AZIOONE*/

#attribuisco un altra azione altrimenti uso quella di default
$p = strrpos(@$_GET['azione'], "pagina_");

#attribuisco un altra azione altrimenti uso quella di default
if(isset($_GET['azione'])&&($_GET['azione']=='install')){
	include_once('install.php');##instal e creazione DB
	exit();	
}elseif(isset($_GET['azione']) && !empty($_GET['azione'])&&(in_array($_GET['azione'],$azione_ar))){
	
	$azione=$_GET['azione']; //azione che ricevo da get
}else{
	if( $p===0){
		$azione=$_GET['azione'];
	}else{
		$azione=$azione_default;    // azione di default
	}

}



$db =  new mysql($database,$host,$user,$password,$root,$azione);
$less = new lessc;




if($debug){
	error_reporting(E_ALL);	 
}else{
  error_reporting(E_ERROR);
}

#######################################################################
//gestione lingua 
if(isset($_GET['ln'])&&($_GET['ln']!='')){
	$_SESSION[$database]['lingua']=$_GET['ln'];
}else{
	 $_SESSION[$database]['lingua']='italiano';	
}

include_once('lang/'.$_SESSION[$database]['lingua'].'.php');


#######################################################################

/*************/
