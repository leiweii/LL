<?php
require_once 'controleur/Controller.php';
$controller = new Controller();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ajouterJeu"])) {
        $nomJ = $_POST["nomJ"];
        $descriptionJ = $_POST["descriptionJ"];
        $logo = $_POST["logo"];
        $controller->ajouterJeu($nomJ, $descriptionJ, $logo);
    }

    if (isset($_POST["modifierJeu"])) {
        $idJ = $_POST["idJ"];
        $nomJ = $_POST["nomJ"];
        $descriptionJ = $_POST["descriptionJ"];
        $logo = $_POST["logo"];
        $controller->modifierJeu($idJ, $nomJ, $descriptionJ, $logo);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimerJeu'])) {
        $id = $_POST['id'];
        $controller->supprimerJeu($id);
    }
}

$jeux = $controller->getJeux();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header>
        <h1><strong>Mes Jeux</strong></h1>
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
            <h2><strong>Liste des jeux</strong></h2>
            <table>
                <thead>
                    <tr>
                        <th><strong>Nom</strong></th>
                        <th><strong>Description</strong></th>
                        <th><strong>Logo</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jeux as $jeu): ?>
                        <tr>
                            <td><?php echo $jeu['nomJ']; ?></td>
                            <td><?php echo $jeu['DescriptionJ']; ?></td>
                            <td><img src="<?php echo $jeu['Logo']; ?>" alt="Logo"></td>
                            <td>
                                <form action="index.php?action=Jeux" method="post">
                                    <input type="hidden" name="id" value="<?php echo $jeu['idJ']; ?>">
                                    <button type="submit" name="modifierJeu">Modifier</button>
                                    <button type="submit" name="supprimerJeu">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2><strong>Ajouter un jeu</strong></h2>
            <form action="index.php?action=Jeux" method="post">
                <input type="text" name="nomJ" placeholder="Nom du jeu" required>
                <input type="text" name="descriptionJ" placeholder="Description du jeu" required>
                <input type="text" name="logo" placeholder="URL du logo" required>
                <button type="submit" name="ajouterJeu">Ajouter</button>
            </form>
        </section>

        <section>
            <h2><strong>Le jeu auquel je jouais</strong></h2>
            <p><strong>Voici quelques-uns de mes jeux :</strong></p>


            <article>
                <h3><strong>Minecraft</strong></h3>
                <img src="photos/M.jpg" alt="Image du jeu">
                <p><strong>Minecraft est un jeu vidéo de type aventure « bac à sable » (construction complètement libre) développé par le Suédois Markus Persson, alias Notch, puis par la société Mojang Studios. Il s'agit d'un univers composé de voxels et généré de façon procédurale, qui intègre un système d'artisanat axé sur l'exploitation puis la transformation de ressources naturelles (minéralogiques, fossiles, animales et végétales).</strong></p>
                <button class="show-link" data-target="minecraft-link">Voir le site</button>
                <a id="minecraft-link" class="more-link" href="https://www.minecraft.net/fr-fr" style="display: none;">Téléchargement Minecraft</a>
            </article>            


            <article>
                <h3><strong>Battle of Balls (球球大作战) </strong></h3>
                <img src="photos/oo.jpg" alt="Image du jeu">
                <p><strong>Ball Battle est un jeu mobile en ligne développé indépendamment par le studio Superpop&amp;Lollipop de Giant Network et gratuit (hors accessoires). Il a été lancé le 27 mai 2015 par Giant Network en Chine continentale. Le jeu est conçu dans le but de PK interactif en temps réel entre les joueurs, et grâce à des règles simples, l'opération du joueur est directement transformée en stratégie de jeu, expérimentant le plaisir de la bataille de la collision intellectuelle.</strong></p>
                <button class="show-link" data-target="battle-of-balls-link">Voir le site</button>
                <a id="battle-of-balls-link" class="more-link" href="https://www.battleofballs.com/index_PC.html" style="display: none;">Téléchargement Battle of Balls</a>
            </article>


            <article>
                <h3><strong>PUBG: Battlegrounds (绝地求生)</h3>
                <img src="photos/J.jpg" alt="Image du jeu">
                <p><strong>PUBG: Battlegrounds est un jeu de tir à la première personne et à la troisième personne de type joueur contre joueur dans lequel une centaine de joueurs se battent dans un battle royale. Les joueurs peuvent choisir de participer à la partie en solo, en duo ou avec quatre personnes. La dernière personne ou équipe en vie remporte la partie.</strong></p>
                <button class="show-link" data-target="pubg-link">Voir le site</button>
                <a id="pubg-link" class="more-link" href="https://pubg.qq.com/" style="display: none;">Téléchargement PUBG: Battlegrounds</a>
            </article>


            <article>
                <h3><strong>Game of Heroes: Three Kingdoms (三国杀Online)</strong></h3>
                <img src="photos/S.jpg" alt="Image du roman">
                <p><strong>Three Kingdoms est un jeu de cartes stratégique original sur le thème des Trois Royaumes qui combine des éléments d'histoire, d'art et de cartes.</strong></p>
                <button class="show-link" data-target="three-kingdoms-link">Voir le site</button>
                <a id="three-kingdoms-link" class="more-link" href="https://www.sanguosha.com/" style="display: none;">Téléchargement Game of Heroes: Three Kingdoms</a>
            </article>


            <article>
                <h3><strong>时空猎人</strong></h3>
                <img src="photos/SK.jpg" alt="Image du roman">
                <p><strong>Un style de combat horizontal classique, 200 millions de joueurs adorent ce jeu de combat mobile !</strong></p>
                <button class="show-link" data-target="time-hunter-link">Voir le site</button>
                <a id="time-hunter-link" class="more-link" href="https://hunter.yh.cn/hunter/index" style="display: none;">Téléchargement 时空猎人</a>
                </article>


        </section>

        <script>
    // Sélectionne tous les boutons avec la classe "show-link"
    const showLinks = document.querySelectorAll('.show-link');

    // Pour chaque bouton, ajoute un écouteur d'événement pour le clic
    showLinks.forEach(button => {
        button.addEventListener('click', function() {
            // Récupère l'ID de l'élément cible à partir de l'attribut data-target du bouton
            const targetId = button.getAttribute('data-target');
            // Sélectionne l'élément cible à partir de son ID
            const targetLink = document.getElementById(targetId);
            // Change le style de l'élément cible pour le rendre visible (display: block)
            targetLink.style.display = 'block';
            // Masque le bouton sur lequel l'utilisateur a cliqué
            button.style.display = 'none';
        });
    });
</script>
    </main>

    <footer>
        <p>&copy; 2024 Mon Site Personnel. Tous droits réservés.</p>
        <p><a href="index.php?action=ML">Mentions Légales</a></p>
    </footer>

</body>
</html>