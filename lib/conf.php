<?php

/*
 * VARIABILI DI CONFIGURAZIONE
 * 
 * 
 */



$host="localhost";#lasciare localhost
$user="root"; #utende del DB
$password = "beppenmk";#password del DB
$database="base";#nome del DB
$root="/nano"; #root del sito (se su www lasciare vuoto senno /cartella)
$nome_sito="nome sito";#nome che viene visualizzato nei menù, OPZIONALE 
$azione_default='home'; #azione di default

$mittente='';
$mittente_name='';


$all=array(1);//array con tutti i tipi possibili (scorciatoia)

 


/*imposto se visualizzare il debug o no */
$debug=0;#1 mostra errori









/*
 * 
 * elementi del sito 
 * 
 * 
 */

$lingue=array('italiano','inglese');#array contenente le lingue con cui costruire le pagine 

//pagine del sito  
$azione_ar_base=array('home' );#azioni modulo base (che utilizzerò nell'install)


// azioni del pannello di controllo
$azione_ar_admin_base= array (
'controllo_login','login','admin','admin_home',
'p_pagine','p_pagine_add','p_pagine_mod','p_pagina_add','p_pagina_del','p_pagina_foto_del',
'p_offerte','p_offerte_mod','p_offerte_add','p_offerte_del',
'p_news','p_news_mod','p_news_add','p_news_del','p_news_del_foto',
'p_users','p_users_mod','p_users_del','p_users_csv','p_users_add',
'p_pdf','p_pdf_add','p_pdf_del',
'p_gallery','p_gallery_mod','p_gallery_add','p_gallery_del','p_gallery_foto_del','p_gallery_foto_mod','p_gallery_foto_add','p_gallery_commento_add'
);
 

#qui unisco le azioni
$azione_ar = array_merge($azione_ar_base,$azione_ar_admin_base);
########################################################################
			
########################################################################
date_default_timezone_set('Europe/Rome');
$data=(date("Y-m-d"));
/*variabili inizializzate*/
$file_mod=''; // nome modulo da caricare
$file_tpl=''; // nome tpl da caricare
$footer=1;//se 1 include il file del footer di default chiudo solo il codice
$utenti_abilitati='';
$file_css='';
$file_js='';
$footer=1;
$header=1;

$layout="default";
