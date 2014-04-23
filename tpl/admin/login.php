<?php
$err = '';
//recupero valore dell'errore e lo associo
if (isset($_GET['err']) && ($_GET['err'] != '')) {
	$err = $_GET['err'];
}
switch ($err) {
	case 1 :
		$str_err = '<br><div class=" alert alert-danger">Devi inserire username e password</div>';
		break;
	case 2 :
		$str_err = '<br><div class=" alert alert-danger">Devi inserire username </div>';
		break;
	case 3 :
		$str_err = '<br><div class=" alert alert-danger">Devi inserire la password </div>';
		$login_old = $_SESSION['login_old'];
		$_SESSION['login_old'] = '';
		break;
	case 4 :
		$str_err = '<br><div class=" alert alert-danger">Dati inseriti non corretti</div>';
		break;
	case 5 :
		$str_err = '<br><div class=" alert alert-danger">Non hai i permessi sufficenti</div>';
		break;
	default :
		$str_err = '';
		break;
}
?>

<div class="row">
<div class="col-md-offset-4 col-md-4">

<form role="form"  name="f_login" id="loginform"  class="box" method="post" action="<?php echo $root; ?>/index.php?azione=controllo_login">
	<div id="logo"><img src="<?php echo $root?>/img/logo.png" alt="logo" /></div>
	<?php
		if ($str_err != '')
			echo $str_err;
 ?>
<div class="form-group">	
</div>
	<div class="form-group">
		<label for="login">Login:</label>
		<input id="user_login" class="form-control" type="text" name="login" placeholder="Login"  value='<?php
			if (isset($login_old) && ($login_old != ''))
				echo $login_old;
		?>'
/></div>
<div class="form-group">
	<label for="psw">Password</label>
	<br/>
	<input class="form-control" placeholder="Password"  id="user_pass" type="password" name="psw"/>
</div>
<input type="submit" class="btn btn-success"  id="sub" value="Login"/>
</form>

</div>
</div>
