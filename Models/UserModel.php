<?php
// models/UserModel.php

class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function checkCredentials($username, $password) {
        $sql = "SELECT * FROM Personne WHERE username = :username"; // Assurez-vous que la table et les colonnes correspondent
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user; // Les identifiants sont corrects
        }

        return false; // Les identifiants sont incorrects
    }
}
