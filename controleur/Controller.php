<?php
require_once 'modele/bd.inc.php';
require_once 'modele/Romans.php';
require_once 'modele/Jeux.php';
require_once 'modele/Favoris.php';

class Controller {
    private $favoris;
    private $romans;
    private $jeux;

    public function __construct() {
        $this->favoris = new Favoris();
        $this->romans = new Romans();
        $this->jeux = new Jeux();
    }

    public function afficherFavoris() {
        $favoris = $this->favoris->getFavoris();
        include 'vue/a.php';
    }

    public function afficherRomans() {
        $romans = $this->romans->getRomans();
        include 'vue/romans.php';
    }

    public function afficherJeux() {
        $jeux = $this->jeux->getJeux();
        include 'vue/jeux.php';
    }

    public function getFavoris() {
        return $this->favoris->getFavoris();
    }

    public function getRomans() {
        return $this->romans->getRomans();
    }

    public function getJeux() {
        return $this->jeux->getJeux();
    }

    //La méthode CRUD de la page Roman
    public function ajouterRoman($auteur, $titre, $description, $photo) {
    return $this->romans->ajouterRoman($auteur, $titre, $description, $photo);
    }

    
    public function modifierRoman($idR, $auteur, $titre, $description, $photo) {
        return $this->romans->modifierRoman($idR, $auteur, $titre, $description, $photo);
    }
    
    
    public function supprimerRoman($id) {
        return $this->romans->supprimerRoman($id);
    }
    
    //La méthode CRUD de la page Jeu
    public function ajouterJeu($nomJ, $descriptionJ, $logo) {
        return $this->jeux->ajouterJeu($nomJ, $descriptionJ, $logo);
    }
    
    public function modifierJeu($idJ, $nomJ, $descriptionJ, $logo) {
        return $this->jeux->modifierJeu($idJ, $nomJ, $descriptionJ, $logo);
    }
    
    public function supprimerJeu($id) {
        return $this->jeux->supprimerJeu($id);
    }
    

    

    // Méthode pour diriger vers la vue appropriée en fonction de l'action
    public function controleurPrincipal($action) {
        $lesActions = array();
        $lesActions["accueil"] = "a.php";
        $lesActions["Romans"] = "romans.php";
        $lesActions["Jeux"] = "jeux.php";
        $lesActions["ML"] = "ML.php";
        $lesActions["connexion"] = "connexion.php";
        $lesActions["inscription"] = "inscription.php";
        $lesActions["defaut"] = "a.php";
    
        if (array_key_exists($action, $lesActions)){
            return $lesActions[$action];
        } else {
            return $lesActions["defaut"];
        }
    }  
}
?>