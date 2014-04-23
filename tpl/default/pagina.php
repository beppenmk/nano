<div class="row">
	<div class="col-md-12">
		<?php include_once("inc/menu.php")?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php include_once("inc/slide.php")?>
	</div>
</div>


<div class="row">
	<div class="col-md-8">
		 <h1><?php echo $db->pagina('titolo'); ?></h1>
		 <p><?php echo $db->pagina('testo'); ?></p>
	</div>
	<div class="col-md-4">
		<?php include_once("inc/colonna.php")?>
	</div>
</div>


