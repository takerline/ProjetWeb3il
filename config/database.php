<?php
// config/database.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';       //serveur
$dbname = 'basile'; // Nom de la bdd
$username = 'root';  // utilisateur
$password = '';  // mdp


$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    
    $pdo = new PDO($dsn, $username, $password, $options);
  
} catch (\PDOException $e) {

    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


return $pdo;
