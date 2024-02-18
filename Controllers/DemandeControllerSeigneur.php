<?php 
require_once 'models/DemandeModelSeigneur.php';

class DemandeControllerSeigneur {
    private $demandeModel;

    public function __construct($pdo) {
        $this->demandeModel = new DemandeModelSeigneur($pdo);
    }

    public function showDemandes() {
        $id = $_SESSION['userId'];
        $demandes = $this->demandeModel->getAllDemandes($id);
        require_once 'views/demandeViewSeigneur.php';
    }

    public function repondreDemande($demandeId) {
        $id = $_SESSION['userId'];
        $this->demandeModel->transfertBiens($demandeId,$id);
        // Redirection ou affichage d'un message de succès
        header("Location: index.php?action=showDemandes");
    }
}
