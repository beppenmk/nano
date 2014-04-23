<?php include_once('tpl/admin/menu_admin.php');?><br>
<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_users">Indietro </a><br>
(manca gestione psw)

	
	
	
<div class="row">
<div class="col-md-6 col-md-offset-2">  	

<?php

$form = new genForm;
$form->startForm($root.'/index.php?azione=p_users_add');

	
$form->textInput('username','Username *','required form-control','','','','',false,$utente_singolo['username'] );
/*gestione tipo (1 amministratore/2 utente /3 bannato)*/


/*

	$utente_singolo['data_nascita']='';
	$utente_singolo['cellulare']='';
	$utente_singolo['cognome']='';
	$utente_singolo['comune_residenza']='';
	$utente_singolo['img']='';
*/
$form->textInput('nome','Nome *','required form-control','','','','',false,$utente_singolo['nome'] );
$form->textInput('cognome','Cognome','form-control','','','','',false,$utente_singolo['cognome'] );
$form->textInput('email','Email *','required form-control','','','','',false,$utente_singolo['email'] );
$form->textInput('data_nascita','Data nascita ','form-control','','','','',false,$utente_singolo['data_nascita'] );
$form->textInput('cellulare','Cellulare','form-control','','','','',false,$utente_singolo['cellulare'] );
$form->textInput('comune_residenza','Comune residenza','form-control','','','','',false,$utente_singolo['comune_residenza'] );

$form->startSelect('tipo','Stato utente',' form-control','block');     
	$form->addOption('1','Amministratore',($utente_singolo['tipo']=='1')?true:false);
	$form->addOption('2','Utente Attivo',($utente_singolo['tipo']=='2')?true:false);
	$form->addOption('3','Bannato',($utente_singolo['tipo']=='3')?true:false);
$form->closeSelect();


 /*
   //blocco foto 
	if($utente_singolo['foto']!=''){
	  $form->insertHTML('<div class="containerFoto">');
	  $form->insertHTML('<img src="'.$root.'/uploads/users/min/'.$utente_singolo['foto'].'" />');
    //$form->genericButton('news_cancella_foto('.$news_singola['id'].')','cancella foto ',false,false,false,3) ;
      $form->insertHTML('<a class="eliminaFoto" title="elimina" href="javascript:users_cancella_foto('.$utente_singolo['id'].')"></a>');
      $form->insertHTML('</div>');
	}else{
		$form->fileInput('foto','Immagine ');
	}
*/


   $form->hiddenInput('id',$utente_singolo['id']); 
   $form->insertBR();
   $form->newline = false;
  $form->submitButton('','Invia','','btn btn-success');
$form->closeForm();

if(!$output = $form->getForm()) { die("error: " . $form->error); }
else { echo "<fieldset class=\"valida\">
".$output."</fieldset>"; }
?>
<br>
<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_users">Annulla </a>

</div>
</div>