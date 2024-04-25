<?php
require_once 'controleur/Controller.php';
require_once 'controleur/UserController.php';


$userController = new UserController();
$userController->loginUser();
$userController->registerUser();

$controller = new Controller();
$favoris = $controller->getFavoris();
$romans = $controller->getRomans();
$jeux = $controller->getJeux();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Personnel</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header>
        <h1><strong>Bienvenue sur Mon Site Personnel</strong></h1>
        <nav>
        <ul>
            <li><a href="index.php?action=accueil">Accueil</a></li>
            <li><a href="index.php?action=Romans">Romans</a></li>
            <li><a href="index.php?action=Jeux">Jeux</a></li>
        </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2><strong>À propos de mon site</strong></h2>
            <p><strong>Bienvenue sur mon site où je partage mes passions pour les romans et les jeux.</strong></p>
            
        </section>
       
        <section>
            <h2><strong>Liens Utiles</strong></h2>
            <p><strong>Site de lecture en ligne</strong></p>
            <ul>
                <li><a href="https://www.qidian.com/" target="_blank"> 起点阅读 </a></li>
                <li><a href="https://www.jjwxc.net/" target="_blank"> 晋江文学城 </a></li>
                <li><a href="https://www.69shuba.com/?t=2023" target="_blank"> 69书吧 </a></li>
                <li><a href="https://www.shubl.com/" target="_blank"> 书耽 </a></li>
            </ul>

            <p><strong>Le site du jeu:</strong></p>
            <ul>
                <li><a href="https://www.4399.cn/" target="_blank">4399游戏盒 </a></li>
            </ul>
        </section>

        <section>
            <h2><strong>Mes Favoris</h2>
            <table>
                <thead>
                    <tr>
                        <th><strong>Type</strong></th>
                        <th><strong>Nom</strong></th>
                        <th><strong>Description</strong></th>
                        <th><strong>Image / Logo</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($favoris as $favori) : ?>
                        <tr>
                            <td><?php echo $favori['Type']; ?></td>
                            <td><?php echo $favori['Nom']; ?></td>
                            <td><?php echo $favori['Description']; ?></td>
                            <td><img src="<?php echo $favori['Image']; ?>" alt="Image"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <div class="container">
        <section>
            <h2>Connexion</h2>
            <form action="index.php?action=connexion" method="post">
                <input type="hidden" name="action_login">
                <label for="login_email">Adresse email :</label>
                <input type="email" id="login_email" name="email" placeholder="Votre email" required>
                <label for="login_password">Mot de passe :</label>
                <input type="password" id="login_password" name="password" placeholder="Votre mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
        </section>
        <section>
            <h2>Inscription</h2>
            <form action="index.php?action=inscription" method="post">
                <input type="hidden" name="action_register">
                <label for="register_username">Nom d'utilisateur :</label>
                <input type="text" id="register_username" name="username" placeholder="Votre nom d'utilisateur" required>
                <label for="register_email">Adresse email :</label>
                <input type="email" id="register_email" name="email" placeholder="Votre email" required>
                <label for="register_password">Mot de passe :</label>
                <input type="password" id="register_password" name="password" placeholder="Votre mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
        </section>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Mon Site Personnel. Tous droits réservés.</p>
        <p><a href="index.php?action=ML">Mentions Légales</a></p>
    </footer>
</body>
</html>
