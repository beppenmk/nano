

<?php if(count($pagina_img)>0){ ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php
        $t = "active";
		foreach ($pagina_img as $img) { ?>
			 
			<li data-target="#myCarousel" data-slide-to="<?php echo $img['id']?>" class="<?php echo $t ;?>"></li>
		<?php
		$t="";
		 } ?>
        
        
        
        
        
        
        
      </ol>
      <div class="carousel-inner">
       <?php  $t = "active";
		foreach ($pagina_img as $img) { ?> 
        <div class="item <?php echo $t ;?>">
          <img src="<?php echo $root?>/uploads/<?php echo $_SESSION[$database]['lingua']?>/<?php echo $img['foto']?> " alt="<?php echo $img['nome']?>" >
          <!--
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
          -->
        </div>
 <?php
		$t="";
		 } ?>
        
   
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
    
<?php } ?>
