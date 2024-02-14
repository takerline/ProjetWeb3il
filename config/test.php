<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'database.php'; 


try {
    $pdo = require_once 'database.php';
    echo "Connexion à la base de données réussie !";
} catch (Exception $e) {

    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
