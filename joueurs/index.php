<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="description" content="Ici, vous pouvez voir toutes les informations sur les joueurs, leur temps de jeu, grade, status etc..." />
	<meta name="keywords" content="TntGun, fr, français, jeux, jouer, joueurs, connection, Discord, 1.12, crack, canon, métiers, Minecraft, Serveur, RolePlay, TntWars, themsou, Site, Officiel, joueurs, liste, grade, temps, aujourd'hui, semaine, total, status, bannis, connectés, rechercher, filtre, ordre, filtrer" />
	<link rel="icon" href="../img/icon.png" />
	<title>TntGun V3 - Joueurs | Serveur Minecraft</title>

	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900' type='text/css'>

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
			<h1 class="js-fade title-txt">Liste des joueurs :</h1>
		</center>

	</header>

<!--          MAIN          -->
	<main>
		<center class="marg marg-player player">

			<form>
				<input class="inputtxt" type="text" name="rch" id="rch-txt" placeholder="Rechercher">
				<select class="inputlst" name="flt" id="flt-lst">
					<option value="0">Filtre : Tout les joueurs</option>
					<option value="1">Filtre : Joueurs connectés</option>
					<option value="2">Filtre : Joueurs bannis</option>
					<option value="3">Filtre : Joueurs actifs</option>
					<option value="4">Filtre : Joueurs gradés</option>
				</select>
				<select class="inputlst" name="ord" id="ord-lst">
					<option value="0">Ordre : Dernière connexion</option>
					<option value="1">Ordre : Pseudo</option>
					<option value="2">Ordre : Temps aujourd'hui</option>
					<option value="3">Ordre : Temps cette semaine</option>
					<option value="4">Ordre : Temps total</option>
				</select>
			</form>
			<br>

			<div class="table-responsive player-table">
				<table class="table table-hover table-fixed text-nowrap">
					<thead>
						<tr>
							<td><p><b>Pseudo</b></p></td>
							<td><p><b>Grade</b></p></td>
							<td><p><b>Status</b></p></td>
							<td><p><b>Dernière connexion</b></p></td>
							<td><p><b>Temps</b></p><br><p><b>aujourd'hui</b></p></td>
							<td><p><b>Temps</b></p><br><p><b>cette semaine</b></p></td>
							<td><p><b>Temps</b></p><br><p><b>total</b></p></td>
						</tr>
					</thead>
					<tbody>
						
					</tbody>

				</table>
			</div>

		</center>
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