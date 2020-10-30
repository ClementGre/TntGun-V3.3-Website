<?php
	session_start();

	function getGradeColor($grade){

		if($grade == 'Dev-Web' || $grade == 'Dev-MC' || $grade == 'Super-Modo' || $grade == 'Admin') return 'red';
		else if($grade == 'YouTuber') return 'orange';
		else if($grade == 'VIP') return 'yellow';
		else if($grade == 'IRL') return 'purple';
		else if($grade == 'Modo') return 'cyan';
		else if($grade == 'Constructeur') return 'green';

		return 'gray';

	}

	include 'database.inc.php';
	global $db;

	if(!empty($_POST['msg'])){
		$msg = $_POST['msg'];
		$psd = $_SESSION['psd'];
		$grd = $_SESSION['grd'];

		echo '<tr><td><img src="https://minotar.net/avatar/' . $psd . '/32.png">';
		echo '<p class="' . getGradeColor($grd) . '"><b>' . $psd . '</b></p><br><p class="msg">' . $msg . '</p></td></tr>';

		$q1 = $db->prepare("INSERT INTO post(joueur,text,verify) VALUES(:pseudo,:message,:verify)");
		$q1->execute(['pseudo' => $psd, 'message' => $msg, 'verify' => '1']);

	}else{

		$q2 = $db->query('SELECT grade, pseudo FROM joueurs');
		$grade;
		while ($post = $q2->fetch()) $grade[$post['pseudo']] = $post['grade'];


		$q3 = $db->query("SELECT * FROM post ORDER BY date ASC");
		while ($post = $q3->fetch()){

			$color = "123456789";

			if($color != null){
				$color = getGradeColor($grade[$post['joueur']]);
			}

			echo '<tr><td><img src="https://minotar.net/avatar/' . $post['joueur'] . '/32.png">';
			echo '<p class="' . $color . '"><b>' . $post['joueur'] . '</b></p><br><p class="msg">' . utf8_encode($post['text']) . '</p></td></tr>';

		}

	}











?>
