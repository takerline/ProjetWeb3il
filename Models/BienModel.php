<?php
class BienModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getBiensByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM bien WHERE id = :userId");
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll();
    }
    public function updateBien($id, $ble, $denier) {
        $sql = "UPDATE bien SET blé = :ble, denier = :denier WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ble' => $ble, 'denier' => $denier, 'id' => $id]);
        return $stmt->rowCount(); // Retourne le nombre de lignes affectées
    }
    public function getBienById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM bien WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(); // Retourne le premier bien correspondant à l'ID
    }
    



    
}
