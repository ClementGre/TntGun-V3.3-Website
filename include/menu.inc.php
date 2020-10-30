 <div class="container-fluid" class="top">
 	<div class="row">
		<!-- Logo -->
		<div class="col-xs-10 col-3">
			<?php if($acc){ ?>
				<a href=""><img src="img/logo.png"></a>
			<?php }else{ ?>
				<a href="../"><img src="../img/logo.png"></a>
			<?php } ?>
		</div>
		<!-- Menu -->
		<div class="col-xs-2 col-9">
			<nav class="nav-condensed">
				<ul class="nav-list">

					<?php if($acc){ ?>

						<li class="list"><a href="">Accueil</a></li>
						<li class="list"><a href="joueurs/">Joueurs</a></li>	
						<li class="list"><a href="support/">Support</a></li>
						<li class="list"><a href="grades/">Grades</a></li>
						<li class="list"><a href="jeux/">Jeux</a></li>
						<li class="list"><a href="wiki/">Wiki</a></li>
						

					<?php }else{ ?>

						<li class="list"><a href="../">Accueil</a></li>
						<li class="list"><a href="../joueurs/">Joueurs</a></li>	
						<li class="list"><a href="../support/">Support</a></li>
						<li class="list"><a href="../grades/">Grades</a></li>
						<li class="list"><a href="../jeux/">Jeux</a></li>
						<li class="list"><a href="../wiki/">Wiki</a></li>
						
					<?php } ?>
				</ul>
			</nav>
			<?php if($acc){ ?>
				<img class="nav-condensed-btn" src="img/menu.png">
			<?php }else{ ?>
				<img class="nav-condensed-btn" src="../img/menu.png">
			<?php } ?>
			
		</div>
	</div>
</div>