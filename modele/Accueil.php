<?php
require_once "bd.inc.php";
require_once "Favoris.php";

class Accueil {
    private $favorisModel;

    public function __construct() {
        $this->favorisModel = new Favoris();
    }

    public function getFavoris() {
        return $this->favorisModel->getFavoris();
    }
}
?>
