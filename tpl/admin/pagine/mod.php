<?php include_once('tpl/admin/menu_admin.php');?>
<a class="btn btn-danger " href="<?php echo $root?>/index.php?azione=p_pagine">Indietro </a>

<div class="row">
  <div class="col-md-5 col-md-offset-1">
  <?php
  $form = new genForm;
  $form->startForm($root.'/index.php?azione=p_pagina_add');  
  $form->insertHTML('<div class="form-group">');
  $form->textInput('titolo','Titolo*','required form-control','','','','',false,$pagina_singola["titolo"]);
  
   
  
  
  $form->textareaInput('testo','Testo ','form-control','','',$pagina_singola["testo"],50,10);
  $form->textInput('title','Title','form-control','','','','',false,$pagina_singola["title"]);
  $form->textareaInput('keyword','Keyword ','form-control','','',$pagina_singola["keyword"],50,10);
  $form->textareaInput('description','Description ','form-control','','',$pagina_singola["description"],50,10);
  $form->hiddenInput('id',$pagina_singola["id"]); 
  $form->hiddenInput('is_deletable',$pagina_singola["is_deletable"]); 
  $form->hiddenInput('l',$_GET['l']);
  $form->insertHTML('</div>');
  $form->newline = false;
  $form->submitButton('','Salva','','btn btn-success');
  $form->closeForm();
  if(!$output = $form->getForm()) { die("error: " . $form->error); }
  else { echo "<fieldset class=\"valida\">
  ".$output."</fieldset>"; }
  ?>
<br>
<a class="btn btn-danger " href="<?php echo $root?>/index.php?azione=p_pagine">Annulla </a>

  </div>
  <div class="col-md-5 ">
   <!-- UPLOAD IMG-->
<?php if($pagina_singola["id"]){?>
<!--
http://hayageek.com/jquery-multiple-file-upload/
--> 
<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
<h2>Aggiungi foto allo slideshow</h2>
<div id="mulitplefileuploader" class="btn btn-success">Sfoglia...</div>
<div id="status"></div>
<script>

$(document).ready(function()
  {
  var settings = {
    url: "<?php echo $root?>/lib/upload.php?id=<?php echo $pagina_singola['id']?>&tab=<?php echo $_GET['l'] ?>",
    method: "POST",
    allowedTypes:"jpg,png,gif",
    fileName: "myfile",
    multiple: true,
    dragDropStr: "<span><b>Trascina qui le tue foto<br>per caricarle<br> Puoi caricare immagini jpg, png e gif</b></span>",
    onSuccess:function(files,data,xhr)
    {
      $("#status").html("<font color='green'>Upload Avvenuto correttamente. Aggiorna la pagina </font>");
      //location.reload();  
    },
    onError: function(files,status,errMsg)
    {   
      $("#status").html("<font color='red'>Upload Fallito</font>");
    }
  }
  $("#mulitplefileuploader").uploadFile(settings);
});
</script>
<?php } ?>

<ol class="elencoFoto">
<?php
foreach ($pagina_img as $img) {
  
    echo "<li>";
      echo "<img src=\"$root/uploads/".$_GET['l']."/min/".$img['foto']."\">";
      echo elimina('p_pagina_foto_del&id_'.$_GET['l'].'='.$pagina_singola['id']."&l=".$_GET['l'],$img['id']);  
    echo "</li>";

}
?>
</ol>

 


  </div>  
</div><!-- row -->






