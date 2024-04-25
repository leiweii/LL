<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message de Connexion</title>
    <link href="inscription.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>Message de Connexion</h1>
    <div>
        <?php
        require_once 'controleur/UserController.php';

        // Instancier le contrôleur UserController
        $userController = new UserController();

        // Appeler la méthode loginUser() pour récupérer le message de connexion
        $loginMessage = $userController->loginUser();

        // Afficher le message d'inscription
        echo "<p>$loginMessage</p>";
        ?>
        <a href="index.php?action=accueil">Retour à la page d'accueil pour se connecter ou s'inscrire</a>
    </div>
</body>
</html>
