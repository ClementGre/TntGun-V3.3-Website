<?php

	$playeronline =  file_get_contents('https://minecraft-api.com/api/ping/playeronline.php?ip=dc1.pyroheberg.fr&port=30016');

	if($playeronline != null){

		if($playeronline <= 1){
			echo '<span>' .  $playeronline . '</span> Joueur connécté';
		}else{
			echo '<span>' .  $playeronline . '</span> Joueurs connéctés';
		}



	}else{

		echo '<span class="red">Le serveur est fermé définitivement<br>Ce site n\'est plus mis à jour<br>Plus d\'inforations sur le <a href="http://discord.gg/zAEAYnN" target="_blank">disocord</a><span>';

	}
?>
