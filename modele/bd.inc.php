<?php
if (!function_exists('connexionPDO')) {
    function connexionPDO() {
        $login = "root";
        $mdp = "";
        $bd = "site";
        $serveur = "ec2-34-203-190-220.compute-1.amazonaws.com";

        try {
            $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erreur de connexion PDO : " . $e->getMessage();
            die();
        }
    }
}
?>
