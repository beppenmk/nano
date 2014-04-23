<!DOCTYPE html>
<html lang="en">
  <head>
<?php // META TAG ?>	
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $db->pagina('keyword')?>"/>  
	<meta name="description" content="<?php echo $db->pagina('description')?>"/> 
	<meta name="dc.title" content="<?php echo ucfirst(strtolower($nome_sito)).' :: '. ucfirst(strtolower($db->pagina('title')));  ?>"/> 
	<title><?php echo ucfirst(strtolower($nome_sito)).' :: '. ucfirst(strtolower($db->pagina('title')));  ?></title>


<?php // FINE META TAG ?>	


<!--
meta tag mancanti 
<META NAME="robots" CONTENT="index/noindex/follow/nofollow">

index la pagina viene indicizzata.
noindex la pagina non viene indicizzata.
follow le pagine linkate al documento in questione vengono indicizzate.
nofollow le pagine linkate al documento in questione non vengono indicizzate.

<META NAME="revisit-after" CONTENT="15 days">
<META NAME=GENERATOR CONTENT="Risorse.net - http://www.risorse.net"> 
<meta name="language" content="it, eng">
<META name="AUTHOR" content="Nome e cognome autori">
<META name="reply-to" content="indirizzo email autori">
-->



<?php // jquery ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<?php // bootstrap ?>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


<?php // FINE JQUERY ?>
<?php // JS ?>



<?php
if(isset($file_js)&&($file_js!='')){
	$js=explode(';',$file_js);
	$c=count($js);
	for($i=0;$i<$c;$i++){
		if($js[$i]!='')
		echo "<script language=\"javascript\" type=\"text/javascript\" src=\"$root/lib/js/".trim($js[$i]).".js\"></script>\n";
	}
}
?>


<?php // FINE JS ?>


<?php //css ?>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">




<?php
echo "<style>";

if(in_array($azione,$azione_ar_admin_base)) {  
	echo $less->compileFile("css/layout.pannello.less");
}

if(isset($file_less)&&($file_less!='')){
	$l=explode(';',$file_less);
 	$c=count($l);
	for($i=0;$i<$c;$i++){
		if($l[$i]!=''){
			//echo "<link href=\"$root/css/".trim($css[$i]).".css\" rel=\"stylesheet\" type=\"text/css\" />\n";	
			echo $less->compileFile("css/".trim($l[$i]).".less");	
		}
		
	}
}
echo "</style>";

if(isset($file_css)&&($file_css!='')){
	$css=explode(';',$file_css);
	$c=count($css);
	for($i=0;$i<$c;$i++){
		if($css[$i]!='')
		echo "<link href=\"$root/css/".trim($css[$i]).".css\" rel=\"stylesheet\" type=\"text/css\" />\n";
	}
}
?>





		
<!-- AGGIORNA IE EXPLORER SCARICATO DA http://ie6update.com/ --> 
<!--[if IE 6]>
<script type="text/javascript"> 
	/*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; } 
	var IE6UPDATE_OPTIONS = {
		icons_path: "http://static.ie6update.com/hosted/ie6update/images/"
	}
</script>
<script type="text/javascript" src="http://static.ie6update.com/hosted/ie6update/ie6update.js"></script>
<![endif]--> 

	
</head>
<body >
<div class="container" > <!-- CORPO -->
