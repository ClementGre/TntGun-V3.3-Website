<?php
	session_start();
	//$_SESSION['psd'] = null;

	if(!empty($_POST['dec'])){
		$_SESSION['psd'] = null;
	}


	if(!empty($_POST['psd']) && !empty($_POST['mdp'])){

		include 'database.inc.php';
		global $db;
		$q = $db->query("SELECT * FROM joueurs");
		
		while ($user = $q->fetch()){
			if($user['pseudo'] == $_POST['psd'] && $user['mdp'] == $_POST['mdp']){

				$_SESSION['psd'] = $_POST['psd'];
				$_SESSION['vrf'] = true;
				$_SESSION['grd'] = $user['grade'];
				
			}
		}if(!isset($_SESSION['psd'])){
			echo '<br><p class="red">Aucun compte trouvé.</p><br>';
		}
	}


	if(isset($_SESSION['psd'])){
		echo '<textarea class="textarea" rows="2" rowtype="text" name="send-txt" id="send-txt" placeholder="Envoyer un message"></textarea><br>';
	}else{
		?>
			<br><p><b>Tout les messages sont automatiquement transférés sur Discord</b></p><br>
			<p><b>Vous devez vous connecter pour pouvoir poster des messages</b></p><br><br>
			<input class="inputtxt" type="text" name="rch-txt" id="psd-txt" placeholder="Pseudo en jeu">
			<input class="inputtxt" type="password" name="rch-txt" id="mdp-txt" placeholder="Mot de passe en jeu"><br>
			<input class="inputsub" type="submit" name="submit" id="log-sub" value="Connexion"><br><br>

		<?php
	}


?>