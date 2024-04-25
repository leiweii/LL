<?php

require_once 'bd.inc.php';

class UserModel {
    public function registerUser($username, $email, $password) {
        try {
            $conn = connexionPDO();

            // Crypter le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insertion de l'utilisateur dans la base de données
            $query = $conn->prepare("INSERT INTO Utilisateur (nomU, email, mpd) VALUES (?, ?, ?)");
            $query->execute([$username, $email, $hashedPassword]);

            return true; // L'inscription a réussi
        } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage();
            return false; // L'inscription a échoué
        }
    }

    public function loginUser($email, $password) {
        try {
            $conn = connexionPDO();

            // Récupération de l'utilisateur depuis la base de données
            $query = $conn->prepare("SELECT * FROM Utilisateur WHERE email = :email");
            $query->bindValue(':email',$email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            // Vérification du mot de passe
            if ($user && password_verify($password, $user['mpd'])) {
                return $user; // Retourne les données de l'utilisateur s'il est authentifié avec succès
            } else {
                return null; // Retourne null si l'authentification a échoué
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null; // Retourne null en cas d'erreur
        }
    }
}
?>