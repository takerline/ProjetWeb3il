<?php
require_once 'models/BienModel.php';


class BienController {
    private $bienModel;

    public function __construct($pdo) {
        $this->bienModel = new BienModel($pdo);
    }

    public function editBienForm() {
        // Récupérer les informations du bien pour les afficher dans le formulaire
       
        $id = $_SESSION['userId'];
        $bien = $this->bienModel->getBienById($id);
        require_once 'views/declarationView.php';
    }

    public function updateBien() {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        // Récupérez les autres champs comme nécessaire
        $this->bienModel->updateBien($id, $nom, $description, $autresChamps);
        // Redirection ou affichage d'un message de succès
        header("Location: index.php?action=showMenu");
    }
}
