<div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><?php echo $nome_sito ?></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">	
			   
			   
			   <?php
			foreach ($elenco_pagine as $pagina) {
				if ($pagina['ord'] == 1)
					echo "<li><a href=\"$root/" . $pagina["pagina"] . ".html\">" . $pagina["titolo"] . "</a></li>";

			}
					?>
               
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Altre pagine <b class="caret"></b></a>
                  <ul class="dropdown-menu">
               
               <?php
			foreach ($elenco_pagine as $pagina) {
				if ($pagina['ord'] == 4)
					echo "<li><a href=\"$root/" . $pagina["pagina"] . ".html\">" . $pagina["titolo"] . "</a></li>";

			}
					?>
					</ul>
               
                
               </li> 
              </ul>
            </div>
          </div>
        </div>