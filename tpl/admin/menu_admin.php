<div class="testata row ">
	<div class="col-md-4">
		<img src="<?php echo $root?>/img/logo.png" alt="logo" /> 
	</div>
	<div class="col-md-2 col-md-offset-6">
		<a class="btn btn-danger " href="<?php echo $root?>/index.php?azione=logout" >Logout</a>
	</div>	

</div>
<div class="testata row ">
	<div class="col-md-8 col-md-offset-4">
		<ol class="menu">
			<li><a class="<?php if (strrpos($_GET['azione'], "pagin")!==false){echo "sel";} ?>" href="<?php echo $root?>/index.php?azione=p_pagine" alt="" >Pagine</a></li>
			<li><a class="<?php if (strrpos($_GET['azione'], "news")!==false){echo "sel";} ?>" href="<?php echo $root?>/index.php?azione=p_news" alt="" >News</a></li>		
			<li><a class="<?php if (strrpos($_GET['azione'], "gallery")!==false){echo "sel";} ?>" href="<?php echo $root?>/index.php?azione=p_gallery" alt="" >Gallery</a></li>		
			<li><a class="<?php if (strrpos($_GET['azione'], "Pdf")!==false){echo "sel";} ?>" href="<?php echo $root?>/index.php?azione=p_pdf" alt="" >pdf</a></li>		
			<li><a class="<?php if (strrpos($_GET['azione'], "gallery")!==false){echo "sel";} ?>" href="<?php echo $root?>/index.php?azione=p_offerte" alt="" >Offerte</a></li>		
			<li><a class="<?php if (strrpos($_GET['azione'], "users")!==false){echo "sel";} ?>" href="<?php echo $root?>/index.php?azione=p_users" alt="" >Utenti</a></li>		
		

				

		</ol>



	</div>
</div>
<h1>Pannello di controllo di <?php echo ucfirst($nome_sito)?> :: Sezione <?php $az_tmp = explode('_',$azione); echo ucfirst($az_tmp[1]) ?></h1>