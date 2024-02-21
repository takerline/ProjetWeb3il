<?php
require_once 'models/BienModel.php';


class BienController {
    private $bienModel;

    public function __construct($pdo) {
        $this->bienModel = new BienModel($pdo);
    }

    public function editBienForm() {

        $id = $_SESSION['userId'];
        $bien = $this->bienModel->getBienById($id);
        require_once 'views/declarationView.php';
    }

    public function updateBien() {
        $id = $_SESSION['userId'];

        $ble = $_POST['blé'];
        $denier = $_POST['denier'];
        // Récupérez les autres champs comme nécessaire
        $this->bienModel->updateBien($id, $ble, $denier);
        // Redirection ou affichage d'un message de succès
        header("Location: index.php?action=compte");
    }
}
