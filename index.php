<?php
session_start(); //faccio partire la sessione 
include_once('lib/init.php');

########################################################################

/*Struttura del blocco:
 *  tutte queste variabili sono opzionali
 * 
$file_mod=''; //indica il percorso del file di modulo da includere, se lasciato vuoto non include nulla
$file_tpl=''; //indica il percorso del file di template da includere, se lasciato vuoto non include nulla 
$file_css=''; //indicare l'elenco dei file da includere separati da ;
$file_js="";  //indicare l'elenco dei file da includere separati da ;
$footer=0; impostare a 0 per non includere il footer, se non inserita lo include di default
$utenti_abilitati=$all; oppure $utenti_abilitati=array(0,1,2);  elencare il tipo di utenti (in base al db) che han accesso al blocco 
 AIR%s721
 */
switch ($azione){
		

		case 'home':
			$file_tpl='pagina';
			$file_mod='pagina';		
			$file_css='';
			$footer=1;
			$file_js='';	
		break;
 		default:
			$file_tpl='pagina';
			$file_mod='pagina';		
			$file_css='';
			$file_js='';	
			$footer=1;
		break;

#####################################
####PANNELLO DI CONTROLLO############
#####################################
##########
		##pagine##
		##########
		case 'p_pagine':			
			$file_tpl='pagine/elenco';
			$file_mod='pagine/elenco';
			$titolo='home';			
			$file_css='tabella_pannello';
			$file_js='jquery.dataTables.min;tab';
			$footer=0;
			$layout = 'admin';
			$utenti_abilitati=array(1);
		break;	


		case 'p_pagina_add':	
			$file_mod='pagine/add_singola';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		case 'p_pagine_add':
			$file_mod='pagine/add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		
		case 'p_pagine_mod':
			$file_tpl='pagine/mod';
			$file_mod='pagine/elenco';
			$file_css='upload';
			$footer=0;
			$file_js='pagina_mod;jquery.validate.min;valida';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;
		
		case 'p_pagina_del':
			$file_tpl='conferma_cancella';
			$file_mod='pagine/elimina';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;	


		//p_pagina_foto_del
		case 'p_pagina_foto_del':
			$file_tpl='conferma_cancella';
			$file_mod='pagine/elimina_immagine';
			$footer=0;	
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	

		##########
		##pagine##
		##########

		##########
		##utenti##
		##########
		case 'p_users':
			$file_tpl='users/elenco';
			$file_mod='users/elenco';
			$file_css='tabella_pannello';
			$file_js='jquery.dataTables.min;tab';
			$footer=0;
			$layout = 'admin';
			$utenti_abilitati=array(1);
		break;

		case 'p_users_csv':
			$file_tpl='users/csv';
			$file_mod='users/elenco';
			$file_css='tabella_pannello';
			$file_js='jquery.dataTables.min;tab';
			$footer=0;
			$header=0;
			$layout = 'admin';
			$utenti_abilitati=array(1);
		break;

		 

		case 'p_users_mod':
			$file_tpl='users/mod';
			$file_mod='users/elenco';
			$footer=0;
			$file_css='jquery.ui.base;jquery.ui.theme;jquery.ui.datepicker';
			$file_js='jquery.ui.datepicker;jquery.ui.datepicker-it;users_mod;jquery.validate.min;valida';	
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;



		case 'p_users_add':
			$file_mod='users/add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	


		case 'p_users_del':
			$file_tpl='conferma_cancella';
			$file_mod='users/elimina';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;	
 

 
		##########
		##utenti##
		##########

		###########
		##gallery##
		###########
		case 'p_gallery':
			$file_tpl='gallery/elenco';
			$file_mod='gallery/elenco';
			$file_css='tabella_pannello';
			$file_js='gallery;jquery.dataTables.min;tab';
			$footer=0;
			$layout = 'admin';
			$utenti_abilitati=array(1);
		break;

		case 'p_gallery_mod':
			$file_tpl='gallery/mod';
			$file_mod='gallery/elenco';
			$file_css='upload';
			$footer=0;
			$file_js='jquery.validate.min;valida';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;
		case 'p_gallery_add':
			$file_mod='gallery/add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;
	
		case 'p_gallery_del':
			$file_tpl='conferma_cancella';
			$file_mod='gallery/cancella';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;
		case 'p_gallery_foto_add':
			$file_mod='gallery/foto_add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;

		case 'p_gallery_foto_del':
			$file_tpl='conferma_cancella';
			$file_mod='gallery/cancella_foto';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;	
		case 'p_gallery_foto_mod':
			$file_tpl='gallery/foto';
			$file_mod='gallery/foto';
			$footer=0;
			$file_css='tabella_pannello';
			$file_js='jquery.dataTables.min;tab;jquery.validate.min;valida';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;
		case 'p_gallery_commento_add':
			$file_mod='gallery/commento_add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;
		
		


		###########
		##gallery##
		###########
		
		###########
		####PDF####
		###########
		case 'p_pdf':		
			$file_tpl='pdf/elenco';
			$file_mod='pdf/elenco';
			$file_css='tabella_pannello';
			$file_js='jquery.dataTables.min;tab';
			$footer=0;
			$layout = 'admin';
			$utenti_abilitati=array(1);
		break;	
		case 'p_pdf_add':
			$file_mod='pdf/add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		case 'p_pdf_del':
			$file_tpl='conferma_cancella';
			$file_mod='pdf/cancella';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;				
		###########
		####PDF####
		###########

		
		#############
		###OFFERTE###
		#############

	 	
		case 'p_offerte':
			$file_tpl='offerte/elenco';
			$file_mod='offerte/elenco';
			$file_css='tabella_pannello';
			$file_js='jquery.dataTables.min;tab';
			$footer=0;
			$layout = 'admin';
			$utenti_abilitati=array(1);
		break;	
		case 'p_offerte_mod':
			$file_tpl='offerte/mod';
			$file_mod='offerte/elenco';
			$file_css='jquery.ui.base;jquery.ui.theme;jquery.ui.datepicker';
			$footer=0;
			$file_js='jquery.ui.datepicker;jquery.ui.datepicker-it;calendario;jquery.validate.min;valida';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		case 'p_offerte_add':
			$file_mod='offerte/add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
	case 'p_offerte_del':
			$file_tpl='conferma_cancella';
			$file_mod='offerte/cancella';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;				
	 	#############
		###OFFERTE###
		#############


		#######
		##news##
		########
		case 'p_news':
			$file_tpl='news/elenco';
			$file_mod='news/elenco';
			$file_css='tabella_pannello;';
			$file_js='jquery.dataTables.min;tab;';
			$footer=0;
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		case 'p_news_mod':
			$file_tpl='news/mod';
			$file_mod='news/elenco';
			$file_css='jquery.ui.base;jquery.ui.theme;jquery.ui.datepicker';
			$file_js='jquery.ui.datepicker;jquery.ui.datepicker-it;news_mod;jquery.validate.min;valida';	
			$footer=0;
			

			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		case 'p_news_add':
			$file_mod='news/add';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		case 'p_news_del':
			$file_tpl='conferma_cancella';
			$file_mod='news/cancella';
			$utenti_abilitati=array(1);
			$footer=0;
			$layout = 'admin';
		break;	
		case 'p_news_del_foto':
			$file_mod='news/cancella_foto';
			$utenti_abilitati=array(1);
			$layout = 'admin';
		break;	
		########
		##news##
		########
	/*
	
		case 'admin_home':
			$file_tpl='home';
			$footer=0;
			$utenti_abilitati=$all;
			$layout = 'admin';
		break;	
		
	*/	
		
/*
 * gestione login
 */
		case 'log':
			$file_mod='home_login';
		break;
		case 'l_out':
			$file_mod='l_out';
		break;
		case 'login':
			$file_tpl='login';
			$footer=0;
			$layout = 'admin';
		break;
		case 'controllo_login';
			$file_mod='controllo_login';
		break;
		case 'logout':
			$file_mod="l_out";
			//$utenti_abilitati=array(1);
			$layout = 'admin';
		break;
}

/*
 * 
 * non modificare da qui
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
########################################################################
#struttura che genera i dati della pagina dinamica (dopo aver controllato variabile)
if(isset($_SESSION[$database]["logged"])&&($_SESSION[$database]["logged"]==1) &&(in_array($azione,$azione_ar_admin_base))){
	#se son loggatto verifico la tipologia dell'utente e reindirizzo in caso negativo
	if(!in_array($_SESSION[$database]['log_tipe'],$utenti_abilitati)){
		include_once('lib/session_init.php');
		header("location:$root/index.php?azione=login&err=5");
		exit;	
	}
}
#effettuo il controllo se si è effettuato il login 
if($utenti_abilitati!='')
include_once("lib/admin.php");
########################################################################

/*GESTIONE INCLUSIONI*/

if($file_mod)
include_once("mod/$file_mod.php");
###########

#header html
if($header)
include_once("tpl/header.php");
###########

#pagina dinamica (dopo aver controllato variabile)
if($file_tpl)
include_once("tpl/$layout/$file_tpl.php");
###########

//debug

if($debug){
echo "<div style=\"border:1px solid red;padding:0.5em;width:80%;background-color:#fdfeda;margin:auto;\">";	
		echo "Azione : $azione <br/>";
		echo "File tpl : $file_tpl <br/>";
		echo "File mod : $file_mod <br/>";
		echo "File js : $file_js <br/>";
		echo "File css : $file_css <br/>";
		echo $db->debug();
 echo "</div>"; 
}

###########
#GESTINE FOTER HTML
if($footer==1){
include_once("tpl/$layout/inc/footer.php");
}else{
echo "</div></body></html>";
	

}
###########

