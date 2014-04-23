<?php include_once('tpl/admin/menu_admin.php');?>
<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_offerte">Indietro </a>


	
	
	
	
<div class="row">
<div class="col-md-6 col-md-offset-2">  	
<?php

$form = new genForm;
$form->startForm($root.'/index.php?azione=p_offerte_add');

//blocco x le lingue 
//	$offerta_singola['lingua']

	$form->startSelect('lingua','Scegli la lingua','form-control');
     
	 foreach($lingue as $lingua){
	  	$form->addOption($lingua,$lingua,($offerta_singola['lingua']==$lingua)?true:false);
      }
	  

    $form->closeSelect();
	
	
	
   $form->textInput('titolo','Titolo *','required form-control','','','','',false,$offerta_singola['titolo'] );
   $form->textInput('data_inizio','Data inizio *','required form-control','','','','',false,parse_date($offerta_singola['data_inizio'] ));
   $form->textInput('data_fine','Data fine *','required form-control','','','','',false,parse_date($offerta_singola['data_fine']) );
   $form->textareaInput('testo_breve','Testo breve *','required form-control','','',$offerta_singola['testo_breve'],50,10);




	$form->hiddenInput('id',$offerta_singola['id']); 
   $form->insertBR();
   $form->newline = false;
  $form->submitButton('','Invia','','btn btn-success');
  
$form->closeForm();


if(!$output = $form->getForm()) { die("error: " . $form->error); }
else { echo "<fieldset class=\"valida\">
".$output."</fieldset>"; }
?>
<br>
<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_offerte">Annulla </a>

</div>
</div>