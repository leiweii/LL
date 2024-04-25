<?php
require_once "bd.inc.php";

class Romans {
    private $db;

    public function __construct() {
        $this->db = connexionPDO();
    }

    public function getRomans() {
        $query = $this->db->query("SELECT idR, Auteur, Titre, DescriptionR, Photo FROM Roman");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthodes CRUD
    public function ajouterRoman($auteur, $titre, $description, $photo) {
        $stmt = $this->db->prepare("INSERT INTO Roman (Auteur, Titre, DescriptionR, Photo) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$auteur, $titre, $description, $photo]);
    }
    

    public function modifierRoman($idR, $auteur, $titre, $description, $photo) {
    $stmt = $this->db->prepare("UPDATE Roman SET Auteur = ?, Titre = ?, DescriptionR = ?, Photo = ? WHERE idR = ?");
    return $stmt->execute([$auteur, $titre, $description, $photo, $idR]);
}
        

    public function supprimerRoman($id) {
        $stmt = $this->db->prepare("DELETE FROM Roman WHERE idR = ?");
        return $stmt->execute([$id]);
    }
}
?>
