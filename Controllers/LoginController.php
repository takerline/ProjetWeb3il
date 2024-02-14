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

        if ($user = $this->userModel->checkCredentials($username, $password)) {
            header("Location: menu.php"); // Redirection vers la page de menu
            exit;
        } else {
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    }
}
