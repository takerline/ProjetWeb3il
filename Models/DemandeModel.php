<?php
class DemandeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllDemandes($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM impotseigneur WHERE idTier = :userID");
        $stmt->execute(['userID' => $userId]);
        return $stmt->fetchAll();
    }


    public function transfertBiens($demandeId,$userId) {

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
    
            $stmt = $this->pdo->prepare("UPDATE bien SET blé = blé - :ble, impotPaye = true, denier = denier - :denier WHERE id = :idSeigneur");
            $stmt->execute([
                'ble' => $demande['blé'],
                'denier' => $demande['denier'],
                'idSeigneur' => $userId
            ]);
    
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
