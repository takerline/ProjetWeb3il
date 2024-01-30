<?php

	$valeur = $_GET["valeur"]; // testPDO.php?valeur=156
	// Nouvelle instance de PDO
	$cnx = new PDO("MariaDB:host=localhost;dbname=tpweb","tpweb","TyTy1234");

	// Requête de selection test
	// Créer le texte de la Requête
	// etudiant_matiere(login, id_matiere,bonus)
	$texteReq = "select * ";
	$texteReq.= "from users ";
	$texteReq = "where bonus<=val ";

	// Demander la création de la requête 
	$requete = $cnx->prepare($texteReq);

	// Exécuter la requête 
	$requete->execute();

	// Récuperer le résultat
	$tabRes = $requete->fetchAll();

	var_dump($tabRes);
