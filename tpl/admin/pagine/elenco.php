<?php include_once('tpl/admin/menu_admin.php')?>

<form  class="form-inline"  role="form" action="#" method="POST">
<div class="form-group">
<select class="form-control" name="l">
 
 <?php foreach($lingue as $lingua){ 
 
 $ch="";
 if($tab==$lingua){$ch="selected"; }
 	echo "<option $ch value=\"$lingua\" >$lingua</option>";
 }	
 ?>
  
  
</select>
 <button type="submit" class="btn btn-primary">Cambia lingua</button>
</div>
</form>
<hr>


<a class="btn btn-warning" href="<?php echo $root?>/index.php?azione=p_pagine_mod&l=<?php echo $tab?>" >Aggiungi </a> (<?php echo $tab ?>)


<?php echo str_err()?>

<?php
//creo tabella 
$tabella_pagine = array ('table'=>array ('class'=>'dataTable'),
	'th'=>$tabella_pagine_k,
	'tr'=>$tabella_pagine_v
);
 new Table ($tabella_pagine,'gradeU');
?>
