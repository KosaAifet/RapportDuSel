<?php
include "database.php";

require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserModel {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function inscriptionUtilisateur($nom, $prenom, $genre, $ddn, $email, $mdp) {
        $q = $this->db->prepare("INSERT INTO users(pseudo,nom,prenom,genre,date_naissance,email,mot_de_passe,role) VALUES('',:nom,:prenom,:genre,:ddn,:email,:mdp,'')");
        $q->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'genre' => $genre,
            'ddn' => $ddn, 
            'email' => $email,
            'mdp' => $mdp]);
        
        return $this->db->lastInsertId();
    }

    public function connexionUtilisateur($email, $mdp) {

        $q = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $q->execute(['email' => $email]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);

        if($data[0]['mot_de_passe'] == $mdp)
        {
            $payload = [
            'id' => $data[0]['id'],
            'nom' => $data[0]['nom'],
            'prenom' => $data[0]['prenom'],
            'email' => $data[0]['email'],
            'role' => $data[0]['role']
            ];

            $key = 'Abracadabra'; //Clé d'encryptage (à mettre dans une variable global)

            $jwt = JWT::encode($payload, $key, 'HS256'); //Encryptage des informations
            $info = JWT::decode($jwt, new Key($key, 'HS256')); //Decryptage des informations
            return $jwt;
        }
        
        
        
    }
}
?>