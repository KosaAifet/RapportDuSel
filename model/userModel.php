<?php
require "database.php";
require "config.php";
require '../vendor/autoload.php';
include '../utilitaire/time.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function inscriptionUtilisateur($nom, $prenom, $genre, $ddn, $email, $mdp) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO users(nom, prenom, genre, date_naissance, email, mot_de_passe) VALUES(:nom, :prenom, :genre, :ddn, :email, :mdp)");
            $q->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'genre' => $genre,
                'ddn' => $ddn,
                'email' => $email,
                'mdp' => $mdp
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function connexionUtilisateur($email, $mdp) 
    {

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

            $jwt = JWT::encode($payload, $key, 'HS256'); //Encryptage des informations
            $info = JWT::decode($jwt, new Key($key, 'HS256')); //Decryptage des informations
            return $jwt;
        }
    }

    public function profileUtilisateur($id)
    {
        $q = $this->db->prepare("SELECT * FROM users LEFT JOIN profile ON profile.user_id = users.id WHERE users.id = :id");
        $qArticles = $this->db->prepare("SELECT * FROM article WHERE article.user_id = :id");
        $q->execute(['id' => $id]);
        $qArticles->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $articles = $qArticles->fetchAll(PDO::FETCH_ASSOC);

        $payload = [
        'id' => $data[0]['id'],
        'pseudo' => $data[0]['pseudo'],
        'grade' => $data[0]['grade'],
        'genre' => $data[0]['genre'],
        'age' => age($data[0]['ddn']),
        'description' => $data[0]['description'],
        'articles' => $articles
        ];

        return $payload;
    }
}
?>