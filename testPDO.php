<?php

	$valeur = $_GET["valeur"]; // testPDO.php?valeur=156
	// Nouvelle instance de PDO
	$cnx = new PDO("MariaDB:host=localhost;dbname=tpweb","tpweb","TyTy1234");

	// Requ�te de selection test
	// Cr�er le texte de la Requ�te
	// etudiant_matiere(login, id_matiere,bonus)
	$texteReq = "select * ";
	$texteReq.= "from users ";
	$texteReq = "where bonus<=val ";

	// Demander la cr�ation de la requ�te 
	$requete = $cnx->prepare($texteReq);

	// Ex�cuter la requ�te 
	$requete->execute();

	// R�cuperer le r�sultat
	$tabRes = $requete->fetchAll();

	var_dump($tabRes);
