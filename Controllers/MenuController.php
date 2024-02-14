<?php
class MenuController {
   
    public function __construct() {
        
        if (!isset($_SESSION['username'])) { // Supposons que 'user_id' est défini lors de la connexion
            header("Location: index.php");
            exit;
        }
    }

    public function showMenu() {
        require_once 'views/menuView.php';
        
    }
}
