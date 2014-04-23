<?php include_once('tpl/admin/menu_admin.php');?>
<a class="btn btn-danger " href="<?php echo $root?>/index.php?azione=p_news">Indietro </a>


<div class="row">
  <div class="col-md-6 col-md-offset-2">
  <?php
  $form = new genForm;
  $form->startForm($root.'/index.php?azione=p_news_add');
  $form->insertHTML('<div class="form-group">');
  
  	$form->startSelect('lingua','Scegli la lingua','form-control');
     
	 foreach($lingue as $lingua){
	  	$form->addOption($lingua,$lingua,($offerta_singola['lingua']==$lingua)?true:false);
      }
	  

    $form->closeSelect();
  
  
     $form->textInput('titolo','Titolo *','required form-control ','','','','',false,$news_singola['titolo'] );
     $form->textInput('data','Data *','required form-control ','','','','',false,parse_date($news_singola['data'] ));
     //blocco foto 
  	if($news_singola['foto']!=''){
  		$form->insertHTML('<div class="containerFoto">');
      $form->insertHTML('<img src="'.$root.'/uploads/news/min/'.$news_singola['foto'].'" />');
    	//$form->genericButton('news_cancella_foto('.$news_singola['id'].')','cancella foto ',false,false,false,3) ;
      $form->insertHTML('<a class="eliminaFoto" title="elimina" href="javascript:news_cancella_foto('.$news_singola['id'].')">
       <img alt="elimina" src="'.$root.'/img/elimina.png"> 
      
      </a>');
      $form->insertHTML('</div>');
    }else{
  		$form->fileInput('img','Immagine ','');
  	}
    $form->textareaInput('testo','Testo ','form-control','','',$news_singola['testo'],50,10);
    $form->textareaInput('testo_breve','Testo breve   ','form-control','','',$news_singola['testo_breve'],50,10);
  	$form->hiddenInput('id',$news_singola['id']); 
    $form->insertBR();
    $form->newline = false;
    $form->submitButton('','Salva','','btn btn-success');
    $form->insertHTML('</div>');
    $form->closeForm();
    if(!$output = $form->getForm()) { die("error: " . $form->error); }
    else { echo "<fieldset class=\"valida\">
    ".$output."</fieldset>"; }
  ?>
  <a class="btn btn-danger " href="<?php echo $root?>/index.php?azione=p_news">Annulla </a>

  </div>
</div>

