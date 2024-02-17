<?php
require_once 'models/BienModel.php';
class CompteController {


    private $bienModel;

    public function __construct($pdo) {
        $this->bienModel = new BienModel($pdo);
    }

    public function showPage() {
        session_start();
        $userId = $_SESSION['userId'] ?? null;
        if ($userId) {
            $biens = $this->bienModel->getBiensByUserId($userId);
            require_once 'views/compteView.php';
        } else {
            echo "Utilisateur non identifié.";
        }
    }










   /*
    public function __construct() {

    
        
        if (!isset($_SESSION['username'])) { // Supposons que 'user_id' est défini lors de la connexion
            header("Location: index.php");
            exit;
        }
    }

    public function showPage() {
        require_once 'views/compteView.php';
        
    }*/
}
