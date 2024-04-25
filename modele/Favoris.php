<?php
require_once "bd.inc.php";

class Favoris {
    private $db;

    public function __construct() {
        $this->db = connexionPDO();
    }

    public function getFavoris() {
        $query = $this->db->query("SELECT F.idF, F.idU, F.idR, F.idJ, R.Titre AS Nom, R.DescriptionR AS Description, R.Photo AS Image, 'Roman' AS Type FROM Favoris F JOIN Roman R ON F.idR = R.idR 
                                     UNION 
                                     SELECT F.idF, F.idU, F.idR, F.idJ, J.nomJ AS Nom, J.DescriptionJ AS Description, J.Logo AS Image, 'Jeu' AS Type FROM Favoris F JOIN Jeux J ON F.idJ = J.idJ");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>