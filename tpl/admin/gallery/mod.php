<?php include_once('tpl/admin/menu_admin.php');?>
<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_gallery">Indietro </a>


<div class="row">
  <div class="col-md-5 col-md-offset-1">
	<?php


	$form = new genForm;
	$form->startForm($root.'/index.php?azione=p_gallery_add');
	$form->insertHTML('<div class="form-group">');
	   $form->textInput('nome','Nome *','form-control required','','','','',false,$gallery_singola['nome'] );
	   $form->hiddenInput('id',$gallery_singola['id']); 
	   $form->insertBR();
	   $form->newline = false;
	   $form->submitButton('','Salva','','btn btn-success');
	   $form->insertHTML('</div>');
	   $form->closeForm();
	if(!$output = $form->getForm()) { die("error: " . $form->error); }
	else { echo "<fieldset class=\"valida\">
	".$output."</fieldset>"; }
	
	?>
	<a class="btn btn-danger" href="<?php echo $root?>/index.php?azione=p_gallery">Annulla </a>

	</div>

	<div class="col-md-5">
	<?php 
	if($gallery_singola['id']){ ?>	
	<!--http://hayageek.com/jquery-multiple-file-upload/-->	
	<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
	<div id="mulitplefileuploader">Sfoglia...</div>
	<div id="status"></div>
	<script>
	$(document).ready(function(){		
	var settings = {
		url: "<?php echo $root?>/lib/upload.php?id=<?php echo $gallery_singola['id']?>&tab=gallery",
		method: "POST",
		allowedTypes:"jpg,png,gif",
		fileName: "myfile",
		multiple: true,
		dragDropStr: "<span><b>Trascina qui le tue foto<br>per caricarle <br>Puoi caricare immagini jpg, png e gif</b></span>",
		onSuccess:function(files,data,xhr)
		{
			$("#status").html("<font color='green'>Upload Avvenuto correttamente. Aggiorna la pagina </font>");
			//$("#status").html("<font color='green'>Upload is success</font>");
			//location.reload();	
		},
		onError: function(files,status,errMsg)
		{		
			$("#status").html("<font color='red'>Upload is Failed</font>");
		}
	}
	$("#mulitplefileuploader").uploadFile(settings);
	});
	</script>
<?php } ?>
</div>
</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">


<ol class="elencoFoto elencoFotoGallery">
<?php
foreach ($gallery_img as $img) {
	echo "<li>";
			echo "<img src=\"$root/uploads/gallery/min/".$img['foto']."\">";
			
			echo "<div class=\"btnFoto\">";
			
			echo modifica('p_gallery_foto_mod&id_gallery='.$gallery_singola['id'],$img['id']);
			echo elimina('p_gallery_foto_del&id_gallery='.$gallery_singola['id'],$img['id']);  
			echo "</div>";
			
			echo "<p>".$img['nome']."</p>";
			echo "<span>". $db->conta('commenti','id_img='.$img['id'])." Commenti</span>";
			echo "<br>";
		
	echo "</li>";
}
?>
</ol>

</div>


</div>




