<?php include_once('tpl/admin/menu_admin.php');?>

<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_gallery_mod&id=<?php echo $_GET['id_gallery']?>">Indietro </a>
<h1>Album:<?php echo $gallery['nome']?></h1>
<?php echo str_err()?>

<div class="row">
<div class="col-md-6 col-md-offset-2">   
<?php
   $form = new genForm;
   $form->startForm($root.'/index.php?azione=p_gallery_foto_add');
   $form->textInput('nome','Titolo foto *','form-control required','','','','',false,$foto['nome'] );
   $form->hiddenInput('id',$foto['id']); 
   $form->hiddenInput('id_gallery',$gallery['id']); 
   $form->insertBR();
   $form->insertHTML('<div class="containerFotoBig"><img src="'.$root.'/uploads/gallery/'.$foto['foto'].'" /></div>');
   $form->newline = false;
   $form->submitButton('','Salva','','btn btn-success');
   $form->closeForm();
   if(!$output = $form->getForm()) { die("error: " . $form->error); }
   else { echo "<fieldset class=\"valida\">
   ".$output."</fieldset>"; }
?>



<?php
   $form = new genForm;
   $form->startForm($root.'/index.php?azione=p_gallery_commento_add');
   $form->textareaInput('commento','Aggiungi commento *','required form-control','','',"",60,4);
   $form->newline = false;
   $form->hiddenInput('id_img',$foto['id']); 
   $form->hiddenInput('id_gallery',$gallery['id']); 
   $form->newline = false;
   $form->submitButton('','Pubblica','','pubblica btn btn-info');
   $form->closeForm();
   if(!$output = $form->getForm()) { die("error: " . $form->error); }
   else { echo "<fieldset class=\"valida containerAddComment\">
   ".$output."</fieldset>"; }
   
if(count($commenti)>0){
  // new Table ($tabella_commenti);
echo "<ol id=\"commenti\">";
   foreach ($commenti as $riga) {
            $lastUser=$db->riga('users',$riga['id_user']) ;
            $user=$lastUser['cognome']." ".$lastUser['nome'].' '.$lastUser['email'];

      echo '<li>';
      echo parse_date($riga['data'])."-".$user.'<br>'.$riga['commento'];

      /*foreach ($riga as $k => $v) {
         echo $k.'-'.$v;
      }
      */
      echo "<span>";
      echo modifica('p_gallery_commento_mod',$riga['id']."&id_gallery=".$gallery['id']."&id_foto=".$foto['id']);  
      echo elimina('p_gallery_commento_del',$riga['id']."&id_gallery=".$gallery['id']."&id_foto=".$foto['id']);  
      echo "</span>";

      echo '</li>';
   }
echo "</ol>";
}
?>
</div>
</div>
