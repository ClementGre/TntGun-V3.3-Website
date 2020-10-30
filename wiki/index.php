<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="description" content="Grace au wiki, vous pourez découvrir le RolePlay de TntGun tout en détail pour une meilleur expèrience de jeu." />
	<meta name="keywords" content="TntGun, fr, français, jeux, jouer, joueurs, connection, Discord, 1.12, crack, canon, métiers, Minecraft, Serveur, RolePlay, TntWars, themsou, Site, Officiel, wiki, wikipedia, aide, infos, détail, précis, texte, explication, " />
	<link rel="icon" href="../img/icon.png" />
	<title>TntGun V3 - Wiki | Serveur Minecraft</title>

	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" type="text/css" href="../css/wiki.css" />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900' type='text/css'>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<script src="https://cdn.rawgit.com/leonardosnt/mc-player-counter/1.1.0/dist/mc-player-counter.min.js"></script>
	
	

</head>


<body>
	<div class="filtre"></div>


<!--          HEADER          -->
	<header class="small swup-fade" id="swup">
		<!-- Menu -->
		<?php $acc = false; include '../include/menu.inc.php'; ?>

		<!-- Titre -->
		<center class="title">
			<br><br><br>
			<h1 class="js-fade title-txt">Wiki :</h1>
			
		</center>

	</header>

<!--          MAIN          -->
	<main>

		<nav class="wiki-nav">
				<ul class="wiki-nav-list">

					<?php 
					echo '<li class="wiki-nav-element';
					if(!isset($_GET['page'])){
						echo ' curent';
					}
					echo '"><a href="./">Introduction</a></li>';
					 
					echo '<li class="wiki-nav-element';
					if(isset($_GET['page'])){ if($_GET['page'] == 'claims'){ 
						echo ' curent';
					}}
					echo '"><a href="?page=claims">Claims</a></li>';

					echo '<li class="wiki-nav-element';
					if(isset($_GET['page'])){ if($_GET['page'] == 'entreprises'){
						echo ' curent';
					}}
					echo '"><a href="?page=entreprises">Entreprises</a></li>';

					echo '<li class="wiki-nav-element';
					if(isset($_GET['page'])){ if($_GET['page'] == 'compétences'){
						echo ' curent';	
					}}
					echo '"><a href="?page=compétences">Compétences</a></li>';

					?>
						
				</ul>
			</nav>

		<div class="marg">

			<?php
				
				if(!isset($_GET['page'])){
					include 'introduction.php';
				}else{
					$page = $_GET['page'];
					if($page == 'claims'){
						include 'claims.php';
					}else if($page == 'entreprises'){
						include 'entreprises.php';
					}else if($page == 'compétences'){
						include 'compétences.php';
					}else{
						include 'introduction.php';
					}
				}

			?>

			
			
		</div>
	</main>
	

<!--          FOOTER          -->
	<footer>
		
		<?php include '../include/bas-de-page.inc.php'; ?>
		
	</footer>   
	
	<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
	<script type='text/javascript' src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	
</body>
</html>
