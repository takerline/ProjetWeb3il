<?php
// models/UserModel.php

class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function checkCredentials($username, $password) {
        $sql = "SELECT * FROM personne WHERE username = :username"; // Assurez-vous que la table et les colonnes correspondent
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        //if ($user && password_verify($password, $user['password'])) {
        if ($user && $user['password'] === $password) {
            return $user; // Les identifiants sont corrects
        }

        return false; // Les identifiants sont incorrects
    }
    public function getRoleByUserId($userId) {
        // Vérifier dans la table "clerge"
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM clerge WHERE id = :userId");
        $stmt->execute(['userId' => $userId]);
        if ($stmt->fetchColumn() > 0) return 'clerge';
    
        // Vérifier dans la table "seigneur"
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM seigneur WHERE id = :userId");
        $stmt->execute(['userId' => $userId]);
        if ($stmt->fetchColumn() > 0) return 'seigneur';
    
        // Vérifier dans la table "tieretat"
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM tieretat WHERE id = :userId");
        $stmt->execute(['userId' => $userId]);
        if ($stmt->fetchColumn() > 0) return 'tieretat';
    
        return null; // Retourne null si l'utilisateur n'est trouvé dans aucune table
    }
    
}
