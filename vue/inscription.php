<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message d'inscription</title>
    <link href="inscription.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>Message d'inscription</h1>
    <div>
        <?php
        require_once 'controleur/UserController.php';

        // Instancier le contrôleur UserController
        $userController = new UserController();

        // Appeler la méthode registerUser() pour récupérer le message d'inscription
        $registerMessage = $userController->registerUser();

        // Afficher le message d'inscription
        echo "<p>$registerMessage</p>";
        ?>
        <a href="index.php?action=accueil">Retour à la page d'accueil pour se connecter</a>
    </div>
</body>
</html>
