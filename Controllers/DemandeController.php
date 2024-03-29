<?php 
require_once 'models/DemandeModel.php';

class DemandeController {
    private $demandeModel;

    public function __construct($pdo) {
        $this->demandeModel = new DemandeModel($pdo);
    }

    public function showDemandes() {
        $id = $_SESSION['userId'];
        $demandes = $this->demandeModel->getAllDemandes($id);
        require_once 'views/demandeView.php';
    }

    public function repondreDemande($demandeId) {
        $id = $_SESSION['userId'];
        $this->demandeModel->transfertBiens($demandeId,$id);
        // Redirection ou affichage d'un message de succès
        header("Location: index.php?action=showDemandes");
    }
}
