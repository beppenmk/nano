<div id="contenitore">
 	<?php
 	$azione="?";
 	foreach ($_GET as $k => $v) {
 		$azione.="&$k=$v";
 	}
	
 	?>



 	<center>
<br><br>
	<form role="form" method="post" action="<?php echo $root?>/index.php<?php echo $azione?>">
		<label class="h2">Confermi ?</label><br><br><br>
		<input class="btn btn-success" type="submit" value="SI" name="submit" >
		<input class="btn btn-danger" type="submit" value="NO" name="submit" >
	</form>
	</center>
</div>