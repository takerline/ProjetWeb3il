<?php
class DemandeModelSeigneur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllDemandes($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM impotseigneur WHERE idSeigneur = :userID");
        $stmt->execute(['userID' => $userId]);
        return $stmt->fetchAll();
    }

    // Supposons que chaque demande a une liste de biens associée
    public function transfertBiens($demandeId,$userId) {
        // Logique pour transférer les biens de votre inventaire vers celui de l'utilisateur ciblé
        // Cette méthode nécessitera des détails supplémentaires en fonction de la structure de votre base de données



        try {
            $this->pdo->beginTransaction();
            error_log("Transfert Biens - Demande ID: " . $demandeId);
            // Récupérer les détails de la demande
            $stmt = $this->pdo->prepare("SELECT idSeigneur, blé, denier FROM impotseigneur WHERE id = :demandeId");
            $stmt->execute(['demandeId' => $demandeId]);
            $demande = $stmt->fetch();

            if (!$demande) {
                throw new Exception("Demande non trouvée.");
            }
    
            // Supposons que vous avez une logique pour identifier les biens du demandeur
            // et que $userId est l'ID du demandeur
    
            // Mise à jour des biens du demandeur (décrémentation)
            // $stmt = $this->pdo->prepare("UPDATE bien SET ... WHERE user_id = :userId AND ...");
            $stmt = $this->pdo->prepare("UPDATE bien SET blé = blé - :ble, denier = denier - :denier WHERE id = :idSeigneur");
            $stmt->execute([
                'ble' => $demande['blé'],
                'denier' => $demande['denier'],
                'idSeigneur' => $userId
            ]);
    

            // Mise à jour des biens du destinataire (incrémentation)
            $stmt = $this->pdo->prepare("UPDATE bien SET blé = blé + :ble, denier = denier + :denier WHERE id = :idSeigneur");
            $stmt->execute([
                'ble' => $demande['blé'],
                'denier' => $demande['denier'],
                'idSeigneur' => $demande['idSeigneur']
            ]);
    
            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }


    }
}
