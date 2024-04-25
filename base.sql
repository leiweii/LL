SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE Favoris(
   idF INT,
   idU INT,
   idR INT,
   idJ INT,
   PRIMARY KEY(idF)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO Favoris (idF, idU, idR, idJ) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 1, 3, 3);

CREATE TABLE Utilisateur(
   idU INT AUTO_INCREMENT PRIMARY KEY,
   nomU VARCHAR(200),
   email VARCHAR(200),
   mpd VARCHAR(200),
   idF INT NULL,
   FOREIGN KEY(idF) REFERENCES Favoris(idF)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO Utilisateur (idU, nomU, email, mpd, idF) VALUES
(1, 'SHI', 'shileiwei200@gmail.com', 'QSLKVJNnc99', 1),
(2, 'LSHI', 'shileiwei0930@gmail.com', '1Z09IJK?C', 2);

CREATE TABLE Roman(
   idR INT AUTO_INCREMENT PRIMARY KEY,
   Auteur VARCHAR(50),
   Titre VARCHAR(50),
   DescriptionR VARCHAR(250) ,
   Photo VARCHAR(100) ,
   idF INT NULL,
   FOREIGN KEY(idF) REFERENCES Favoris(idF)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO Roman (idR, Auteur, Titre, DescriptionR, Photo, idF) VALUES
(1, 'Éclaboussures légères de source', 'Le Roi des bêtes', 'Dans cette ère nouvelle des bêtes soumises, qui peut devenir le Roi des bêtes sans conteste ?', 'photos/livre1.jpg', 1),
(2, 'Le corbeau le plus blanc', 'Qui la fait sentraîner à limmortalité ?', '"Jai souligné à plusieurs reprises que latmosphère dans le monde de la cultivation est déjà faussée.', 'photos/livre8.jpg', 2),
(3, 'Étoile du matin LL', 'Ce jeu est trop réaliste aussi', 'Ce jeu est trop réaliste aussi !', 'photos/livre9.jpg', 3);

CREATE TABLE Jeux(
   idJ INT AUTO_INCREMENT PRIMARY KEY,
   nomJ VARCHAR(50) ,
   DescriptionJ VARCHAR(250) ,
   Logo VARCHAR(100) ,
   idF INT NULL,
   FOREIGN KEY(idF) REFERENCES Favoris(idF)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO Jeux (idJ, nomJ, DescriptionJ, Logo, idF) VALUES
(1, 'Honneur des rois', '-Honor of Kings est une arène de combat multijoueur en ligne', 'photos/logo.jpg', 1),
(2, 'Happy Fun', 'Happy Fun est un jeu casual à trois consommations développé par Le Element.', 'photos/K.jpeg', 2),
(3, 'Genshin Impact', 'Genshin Impact est un jeu vidéo de rôle d’action développé et publié par miHoYo. Il est sorti sur Android, iOS, PlayStation 4 et Windows en 2020, sur PlayStation 5 en 2021. ', 'photos/PP.jpeg', 3);
