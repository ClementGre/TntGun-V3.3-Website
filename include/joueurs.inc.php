<?php
	$pla = 0;

	$ord = $_POST['ord'];
	$flt = $_POST['flt'];
	$rch = null;
	if(isset($_POST['rch'])) $rch = $_POST['rch'];
	


	include 'database.inc.php';
	global $db;
	if($ord == 0){
		$q2 = $db->query("SELECT * FROM joueurs ORDER BY status ASC, statusvalue ASC");
	}else if($ord == 1){
		$q2 = $db->query("SELECT * FROM joueurs ORDER BY pseudo");
	}else if($ord == 2){
		$q2 = $db->query("SELECT * FROM joueurs ORDER BY daytime DESC");
	}else if($ord == 3){
		$q2 = $db->query("SELECT * FROM joueurs ORDER BY weektime DESC");
	}else if($ord == 4){
		$q2 = $db->query("SELECT * FROM joueurs ORDER BY totaltime DESC");
	}

	function getTimeWithMinutes($minutes){
		
		$hours = floor($minutes / 60);
		$minutes = $minutes % 60;
		

		$day  = floor($hours / 24);
		$hours = $hours % 24;

		$mounth  = floor($day / 31);
		$day = $day % 31;

		
		if($minutes <= 9) $minutes = '0' . $minutes;
		if($hours == 0 && $day == 0 && $mounth == 0) return $minutes . "mn";

		else if($day == 0 && $mounth == 0) return $hours . 'h' . $minutes;

		else if($mounth == 0) return $day . 'j ' . $hours . 'h';

		else return $mounth . 'Mois ' . $day . 'j';
		
	}
	function getHourWithMinutes($minutes){

		$hours = floor($minutes / 60);
		$minutes = $minutes % 60;
		
		if($minutes <= 9) $minutes = '0' . $minutes;

		return $hours . 'h' . $minutes;
		
	}
	function getDateWithTimeStamp($date){

		$date = str_replace(' ', '/', str_replace(':', '/', str_replace('-', '/', $date)));

		$date = explode('/', $date);


		if($date[0] == 1) $week = 'Lundi';
		else if($date[0] == 2) $week = 'Mardi';
		else if($date[0] == 3) $week = 'Mercredi';
		else if($date[0] == 4) $week = 'Jeudi';
		else if($date[0] == 5) $week = 'Vendredi';
		else if($date[0] == 6) $week = 'Samedi';
		else if($date[0] == 0) $week = 'Dimanche';

		if($date[2] == 0) $mounth = 'Janvier';
		else if($date[2] == 1) $mounth = 'Février';
		else if($date[2] == 2) $mounth = 'Mars';
		else if($date[2] == 3) $mounth = 'Avril';
		else if($date[2] == 4) $mounth = 'Mai';
		else if($date[2] == 5) $mounth = 'Juin';
		else if($date[2] == 6) $mounth = 'Juillet';
		else if($date[2] == 7) $mounth = 'Août';
		else if($date[2] == 8) $mounth = 'Septembre';
		else if($date[2] == 9) $mounth = 'Octobre';
		else if($date[2] == 10) $mounth = 'Novembre';
		else if($date[2] == 11) $mounth = 'Décembre';

		if($date[4] <= 9) $date[4] = '0' . $date[4];

		return $week . ' ' . $date[1] . ' ' . $mounth . ' ' . $date[3] . 'h' . $date[4];

	}
	function rchTest($pseudo, $grade, $status, $statusvalue, $rch, $flt){
		if(!empty($rch)){
			if(similar_text($rch, $pseudo) < strlen($rch) / 2){
				return false;
			}
		}
		if($flt == 0){
			return true;
		}else if($flt == 1){
			if($status != 1) return false;
		}else if($flt == 2){
			if($status != 3) return false;
		}else if($flt == 3){
			if($statusvalue >= 5000) return false;
		}else if($flt == 4){
			if($grade == 'Joueur') return false;
		}
		
		
		return true;
	}
	


	while ($post = $q2->fetch()){


		$pseudo = $post['pseudo'];
		$grade = $post['grade'];
		$gradecolor = 'black';
		$status = $post['status'];
		$statuscolor = 'black';
		$statusvalue = $post['statusvalue'];
		$last = $post['last'];
		$daytime = $post['daytime'];
		$weektime = $post['weektime'];
		$totaltime = $post['totaltime'];

		if(rchTest($pseudo, $grade, $status, $statusvalue, $rch, $flt)){

			$pla ++;

			if($grade == 'Dev-Web' || $grade == 'Dev-MC' || $grade == 'Super-Modo' || $grade == 'Admin') $gradecolor = 'red';
			else if($grade == 'YouTuber') $gradecolor = 'orange';
			else if($grade == 'VIP') $gradecolor = 'yellow';
			else if($grade == 'IRL') $gradecolor = 'purple';
			else if($grade == 'Modo') $gradecolor = 'cyan';
			else if($grade == 'Constructeur') $gradecolor = 'green';

			if($status == 1){	
				$status = 'Connecté depuis ';
				$statuscolor = 'green';
				$statusvalue = getTimeWithMinutes($statusvalue);
			}else if($status == 2){
				$status = 'Hors ligne depuis ';
				$statusvalue = getTimeWithMinutes($statusvalue);
			}else if($status == 3){
				$status = 'Banni encore ';
				$statuscolor = 'red';
				$statusvalue = $statusvalue . ' Jours';
			} 


			echo '<tr><td><img src="https://minotar.net/avatar/' . $pseudo .'/32.png"><p><b>' . $pseudo . '</b></p></td>'

			. '<td><p class="' . $gradecolor . '">' . $grade . '</p></td>'

			. '<td><p class="' . $statuscolor . '">' . $status . $statusvalue . '</p></td>'

			. '<td><p>' . getDateWithTimeStamp($last) . '</p></td>'

			. '<td><p>' . getHourWithMinutes($daytime) . '</p></td>'

			. '<td><p>' . getHourWithMinutes($weektime) . '</p></td>'

			. '<td><p>' . getHourWithMinutes($totaltime) . '</p></td></tr>';
		}


		
	}


	if($pla == 0){

		echo '<tr><td><p>Aucun résultat trouvé ...</p></td></tr>';

	}

?>