<style>
	.err{
		color:red;
	}
	.ok{
		color:green;
	}
</style>
<?php
function DbWrite($sql){
	global $database;
	global $host;
	global $user;
	global $password;
	$db=mysql_connect($host,$user,$password) or die("Impossibile connettersi al DB");
	mysql_select_db($database,$db) or die("Impossibile selezionare DB");
	if(mysql_query($sql) ) {
		#mysql_close($db);
		return true;
	}else{
		return false;
	}
}
?>


	
	
<?php
if(isset($_POST['invio'])&&($_POST['invio']=='ok')){
####################################################################################################################################
//Cancello DB 
$sql_crea_db="DROP DATABASE IF EXISTS $database;";
$d=mysql_connect($host,$user,$password)or die('<p class="err">Impossibile collegarsi al Db</p>');
if(mysql_query($sql_crea_db)){echo '<p class="ok">DB <b>'.$database.'</b> eliminato correttamente (sempre se esisteva)</p>';}else{echo '<p class="err">Errore nella cancellazione DB</p>';exit;}
mysql_close();

//creazione db
$sql_crea_db="CREATE DATABASE IF NOT EXISTS $database;";
$d=mysql_connect($host,$user,$password)or die('<p class="err">Impossibile collegarsi al Db</p>');
if(mysql_query($sql_crea_db)){echo '<p class="ok">DB <b>'.$database.'</b>creato correttamente</p>';}else{echo '<p class="err">Errore nella creazione DB</p>';exit;}
mysql_close();

//creazione tabelle
foreach($lingue as $tabella){
	//creo i file lingue
	fopen("lang/$tabella.php", 'w+');
	//controllo creazione
	if(file_exists("lang/$tabella.php"))
	{echo '<p class="ok"><b>Creato correttamente il file per la lingua '.$tabella.' </b></p>';}
	else
	{echo '<p class="err">Errore nel creare il file \''.$tabella.'\'<br>Ricontrolla i permessi</p>';exit;}  

	
	//creo tabelle upload	
	if(!is_dir("uploads/$tabella")){
		if((mkdir("uploads/$tabella",0777))&&(mkdir("uploads/$tabella/min",0777)) )
		{echo '<p class="ok"><b>Creata correttamente la dir  uploads/'.$tabella.' </b></p>';}
		else
		{echo '<p class="err">Errore nel creare la dir  uploads/'.$tabella.'<br>Ricontrolla i permessi</p>';exit;}  
	
	}
	


	
	
	 $sql_tabella = "CREATE TABLE IF NOT EXISTS $tabella ( id int(11) NOT null auto_increment,";
	 	//creo elementi interni tabella
					$sql_tabella.=" pagina varchar(255) NOT NULL,";
					$sql_tabella.=" titolo varchar(255) NOT NULL,";
					$sql_tabella.=" testo text NOT NULL,";
					$sql_tabella.=" testo_2 text NOT NULL,";
					$sql_tabella.=" testo_3 text NOT NULL,";
					$sql_tabella.=" title text NOT NULL,";
					$sql_tabella.=" keyword text NOT NULL,";
					$sql_tabella.=" description text NOT NULL,";
					$sql_tabella.=" immagine varchar(255) NOT NULL,";
					$sql_tabella.=" is_deletable tinyint(1) NOT NULL,";
					$sql_tabella.=" is_visibile tinyint(1) NOT NULL,";
					$sql_tabella.=" is_editable tinyint(1) NOT NULL,";
  					$sql_tabella.=" ord int(11) NOT NULL,";
					
				
			
			
			
	
			
			
						 	
				
	 	
	 	
	 	
	 $sql_tabella.=' PRIMARY KEY (id))ENGINE = MyISAM DEFAULT CHARSET = utf8;';
	 
	 
	 
	 $sql_tabella2="CREATE TABLE IF NOT EXISTS `".$tabella."_img` (";
	 $sql_tabella2.='`id` int(11) NOT NULL AUTO_INCREMENT,';
	 $sql_tabella2.='`id_'.$tabella.'` int(11) NOT NULL,';
	 $sql_tabella2.='`foto` varchar(255) NOT NULL,';
	 $sql_tabella2.='`nome` varchar(255) NOT NULL,';
	 $sql_tabella2.='PRIMARY KEY (`id`)';
	 $sql_tabella2.=') ENGINE=InnoDB  DEFAULT CHARSET=latin1  ;';
		 
	 
	 
	//creo tabella	 
	if(dbWrite($sql_tabella)){echo '<p class="ok">TABELLA \''.''.$tabella.'\' creata correttamente</p>';
	
	
	
	//creazione andata a buon fine, popolo con pagine	
		foreach($azione_ar_base as $riga){
			//popolazione tabella 
			$sql_tabella_insert = "INSERT INTO $tabella (`id`, `pagina`, `titolo`, `testo`, `testo_2`, `testo_3`, `title`, `keyword`, `description`, `immagine`, `is_deletable`, `is_visibile`, `is_editable`, `ord`)VALUES( NULL, '$riga', '$riga', '', '', '', '', '', '', '', '0', '1', '1', '1'  )";
			if(dbWrite($sql_tabella_insert)){echo '<p class="ok">TABELLA \''.''.$tabella.'\':dati inseriti correttamente per la pagina '.$riga.'</p>';}else{echo '<p class="err">Errore nell\'inserire i dati nella tabella </p>'.$sql_tabella_insert;exit;} 
		}
		
	
	}else{echo '<p class="err">Errore nella creazione della tabella \''.$tabella.'\'</p>'.$sql_tabella;exit;}  
echo "<br>";


if(dbWrite($sql_tabella2)){echo '<p class="ok">TABELLA \''.''.$tabella.'_img\' creata correttamente</p>';
}else{echo '<p class="err">Errore nella creazione della tabella \''.$tabella.'_img\'</p>'.$sql_tabell2;exit;}	




}





$sql_tabella=" 
CREATE TABLE IF NOT EXISTS `"."users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascita` varchar(255) NOT NULL,
  `cellulare` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `comune_residenza` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


";


if(dbWrite($sql_tabella)){echo '<p class="ok">TABELLA \''.'users\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'users\'</p>'.$sql_tabella;exit;
}





$sql_tabella=" 

CREATE TABLE IF NOT EXISTS "."commenti (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_img` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `commento` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1  ;
 
";


if(dbWrite($sql_tabella )){echo '<p class="ok">TABELLA \''.'commenti\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'commenti\'</p>'.$sql_tabella;exit;
}


$sql_tabella=" 

CREATE TABLE IF NOT EXISTS "."gallery (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ord` int(11) NOT NULL,
  `id_last_comment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1   ;

 
";


if(dbWrite($sql_tabella )){echo '<p class="ok">TABELLA \''.'gallery\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'gallery\'</p>'.$sql_tabella;exit;
}



$sql_tabella=" 

CREATE TABLE IF NOT EXISTS `"."gallery_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gallery` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1   ;

 
";


if(dbWrite($sql_tabella )){echo '<p class="ok">TABELLA \''.'gallery_img\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'gallery_img\'</p>'.$sql_tabella;exit;
}













$sql_tabella="CREATE TABLE IF NOT EXISTS "."offerte (
  `id` int(11) NOT NULL auto_increment,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL,
  `testo_breve` text NOT NULL,
  `lingua` varchar(255) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8";


if(dbWrite($sql_tabella)){echo '<p class="ok">TABELLA \''.'offerte\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'offetrte\'</p>'.$sql_tabella;exit;
}

$sql_tabella="CREATE TABLE IF NOT EXISTS "."news (
  `id` int(11) NOT NULL auto_increment,
  `titolo` varchar(255) collate utf8_bin default NULL,
  `testo_breve` text collate utf8_bin,
  `testo` text collate utf8_bin,
  `data` date default NULL,
  `foto` varchar(255) collate utf8_bin NOT NULL,
  `lingua` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
 ) ENGINE=InnoDB  DEFAULT CHARSET=utf8
";



if(dbWrite($sql_tabella)){echo '<p class="ok">TABELLA \''.'news\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'news\'</p>'.$sql_tabella;exit;
}
$sql_tabella="CREATE TABLE IF NOT EXISTS `"."pdf` (
  `id` int(11) NOT NULL auto_increment,
  `file` varchar(255) collate utf8_bin default NULL,

  `lingua` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
 ) ENGINE=InnoDB  DEFAULT CHARSET=utf8
";


if(dbWrite($sql_tabella)){echo '<p class="ok">TABELLA \''.'pdf\' creata correttamente</p>';}else{
	echo '<p class="err">Errore nella creazione della tabella \''.'pdf\'</p>'.$sql_tabella;exit;
}



$sql_tabella="INSERT INTO `"."users` (`id`, `username`, `psw`, `tipo`) VALUES
(1, 'beppe', 'ebd708c7afb53fd607f52f39cf15dd0a', '1');
";



if(dbWrite($sql_tabella)){echo '<p class="ok">Dati inseriti correttamente</p>';}else{
	echo '<p class="err">Errore nell\'inserimento dati </p>'.$sql_tabella;exit;
}







echo "<h3 style=\"color:green;text-align:center;\">SE LEGGI QUESTA RIGA TUTTO &Egrave; ANDATO BENE!!!!</h3>";


	
####################################################################################################################################	
}elseif(isset($_POST['invio'])&&($_POST['invio']=='no')){
	echo "<h2 align='center' class=\"err\">ok non faccio nulla</h2>";
	exit;
}else{
?>
<h2 align='center' class="err">ATTENZIONE!</h2>
<p align='center'>
	Ogni volta che ricaricherai questa pagina cancellerai il DB;<br>
	<h2 style="text-align:center"><?php echo $database?></h2>
	Ti consiglio quindi di NON inserire dei contenuti fino a che questo file non verrà cancellato;<br>
	Io ti ho avvisato.......<br>
	PS, creerò una tabella per ogni lingua, una riga per ogni azione nell'array '$azione_ar_base' e le seguenti colonne:<br>
</p>
	
	 <ol>
	 	<li>titolo</li>
	 	<li>testo</li>
		<li>testo_2</li>
		<li>testo_3</li>
		<li>immagine</li>
	 </ol>
	 
<p align='center'>
	 Potrai richiamarli usando la fuinzione trova  ES:<br><br>
	&lt;?php $db->pagina('testo_3'); ?&gt;<br>
	La lingua  e la pagina vengono riconosciute automaticamente<br><br>
</p>
	
	<h3 align='center'>Continuo?</h3>
	<form action="#" method='post'>
		<input type="submit" name='invio'value="no">
		<input type="submit" name='invio'value="ok">
	</form>
<?php
	
}

?>

