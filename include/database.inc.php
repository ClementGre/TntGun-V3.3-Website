<?php
	try{
		$db = new PDO('mysql:host=ips17.e-c.com;dbname=tntgunfr_WebCom','tntgunfr_WebCom','rdbFV29Hwg52');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo "Erreur de connexion à la base de donnée, veuillez contacter le staff.<br> Erreur : " . $e;
	}
?>
