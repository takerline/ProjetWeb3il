<?php
// controllers/LoginController.php
require_once 'models/UserModel.php';
require_once 'config/database.php'; // Assurez-vous que ce chemin est correct

class LoginController {
    
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
       
        error_log("Username: $username"); // Vérifiez les logs de votre serveur web
        error_log("Password: $password");


        if ($user = $this->userModel->checkCredentials($username, $password)) {
            // ou toute autre information pertinente
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $user['id'];
            $_SESSION['role'] = $this->userModel->getRoleByUserId($user['id']);
            header("Location: index.php?action=showMenu");// Redirection vers la page de menu
            exit;
        } else {
            
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    }
}
