<?php
include "getRacine.php";
include "$racine/controleur/Controller.php"; 
include "$racine/controleur/UserController.php"; 
include "$racine/modele/bd.inc.php";

// Connexion à la base de données
$db = connexionPDO();
$controller = new Controller();

// Récupération de l'action à partir des paramètres GET
$action = isset($_GET["action"]) ? $_GET["action"] : "accueil"; // Si aucune action n'est spécifiée, l'action par défaut est "accueil"

// Appel de la méthode controleurPrincipal pour obtenir le nom du fichier de vue approprié
$vue = $controller->controleurPrincipal($action);

// Inclusion du fichier de vue correspondant
include "vue/$vue"; // Assurez-vous que le chemin vers le fichier de vue est correct
?>
