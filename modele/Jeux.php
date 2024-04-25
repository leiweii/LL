<?php
require_once "bd.inc.php";

class Jeux {
    private $db;

    public function __construct() {
        $this->db = connexionPDO();
    }

    public function getJeux() {
        $query = $this->db->query("SELECT nomJ, DescriptionJ, Logo FROM Jeux");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthodes CRUD
    public function ajouterJeu($nomJ, $descriptionJ, $logo) {
        $stmt = $this->db->prepare("INSERT INTO Jeux (nomJ, DescriptionJ, Logo) VALUES (?, ?, ?)");
        return $stmt->execute([$nomJ, $descriptionJ, $logo]);
    }
    
    public function modifierJeu($idJ, $nomJ, $descriptionJ, $logo) {
        $stmt = $this->db->prepare("UPDATE Jeux SET nomJ = ?, DescriptionJ = ?, Logo = ? WHERE idJ = ?");
        return $stmt->execute([$nomJ, $descriptionJ, $logo, $idJ]);
    }
    
    // public function supprimerJeu($idJ) {
    //     $stmt = $this->db->prepare("DELETE FROM Jeux WHERE idJ = ?");
    //     return $stmt->execute([$idJ]);
    // }
    public function supprimerJeu($idJ) {
        $stmt = $this->db->prepare("DELETE FROM Jeux WHERE idJ = :idJ");
        return $stmt->execute(['idJ' => $idJ]);
    }
    

}
?>