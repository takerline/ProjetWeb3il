<?php
require_once 'models/BienModel.php';
class CompteController {


    private $bienModel;

    public function __construct($pdo) {
        $this->bienModel = new BienModel($pdo);
    }

    public function showPage() {
        $userId = $_SESSION['userId'] ?? null;
        if ($userId) {
            $biens = $this->bienModel->getBiensByUserId($userId);
            require_once 'views/compteView.php';
        } else {
            echo "Utilisateur non identifié.";
        }
    }

}
