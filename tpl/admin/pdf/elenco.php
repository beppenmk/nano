<?php include_once('tpl/admin/menu_admin.php')?>



<?php echo str_err()?>


<?php

$form = new genForm;
$form->startForm($root.'/index.php?azione=p_pdf_add');
  
  $form->startSelect('lingua','Lingua','form-control');
     
	 foreach($lingue as $lingua){
	  	$form->addOption($lingua,$lingua,false);
      }
	  

    $form->closeSelect();
	$form->fileInput('pdf','file pdf');
	
 	$form->submitButton('','Invia','','btn btn-success');
  
$form->closeForm();


if(!$output = $form->getForm()) { die("error: " . $form->error); }
else { echo $output; }
?>





<?php
//creo tabella 
$tabella_pdf = array ('table'=>array ('class'=>'dataTable'),
	'th'=>$pdf_tabella_k,
	'tr'=>$pdf_tabella_v
);
 new Table ($tabella_pdf,'gradeU');
?>
