<?php
	$bdd = new PDO('mysql:host=localhost;dbname=atlaslivre', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$rep= $bdd->query("SET NAMES UTF8");
?>