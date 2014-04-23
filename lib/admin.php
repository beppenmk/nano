<?php
if(!isset($_SESSION[$database]['logged'])||($_SESSION[$database]['logged']!=1)){
	include('session_init.php');
	header("location:$root/index.php?azione=login&err=5");
}
?>