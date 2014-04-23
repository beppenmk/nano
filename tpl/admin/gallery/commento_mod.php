<?php include_once('tpl/admin/menu_admin.php');?>

<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_gallery_foto_mod&id_gallery=<?php echo $_GET["id_gallery"]?>&id=<?php echo $_GET["id_foto"]?>">Indietro </a>

<div class="row">
<div class="col-md-6 col-md-offset-2">  
<?php

$form = new genForm;
$form->startForm($root.'/index.php?azione=p_gallery_commento_add');
  
   $form->textareaInput('commento','Commento *','form-control required','','',$commento['commento'],60,6);
   $form->hiddenInput('id',$commento['id']);
   $form->hiddenInput('id_img',$commento['id_img']); 
   $form->hiddenInput('id_gallery',$gallery['id']); 
   $form->insertBR();
   $form->newline = false;
   $form->submitButton('','Invia','','btn btn-success');
  
$form->closeForm();


if(!$output = $form->getForm()) { die("error: " . $form->error); }
else { echo "<fieldset class=\"valida\">
".$output."</fieldset>"; } ?>
<br>
<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_gallery_foto_mod&id_gallery=<?php echo $_GET["id_gallery"]?>&id=<?php echo $_GET["id_foto"]?>">Annulla </a>
</div>
</div>