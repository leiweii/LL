<?php
require_once 'modele/bd.inc.php';
require_once 'modele/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser() {
        $registerMessage = "";
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_register'])) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            
            $registerResult = $this->userModel->registerUser($username, $email, $password);
    
            if ($registerResult) {
                $registerMessage = "Inscription réussie!";
    
            } else {
                $registerMessage = "Erreur lors de l'inscription.";
            }
        }
        return $registerMessage; 
    }
    
    public function loginUser() {
        $loginMessage = "";
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $loggedInUser = $this->userModel->loginUser($email, $password);
    
            if ($loggedInUser) {
                $loginMessage = "Connexion réussie!";
            } else {
                $loginMessage = "Adresse email ou mot de passe incorrect.";
            }
        }
        return $loginMessage;
    }
}
?>
