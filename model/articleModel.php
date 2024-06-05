<?php
require 'config.php';
require '../vendor/autoload.php';
include '../utilitaire/time.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ArticleModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function creationArticle($texte, $titre, $user_id) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO article(texte, titre, user_id) VALUES(:texte, :titre, :user_id)");
            $q->execute([
                'texte' => $texte,
                'titre' => $titre,
                'user_id' => $user_id
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getArticleById($id) 
    {
        $q = $this->db->prepare("SELECT * FROM article WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getArticleByUserId($user_id) 
    {
        $q = $this->db->prepare("SELECT * FROM article LEFT JOIN users ON users.id = article.user_id WHERE user_id = :user_id");
        $q->execute(['user_id' => $user_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateArticleById($id, $texte, $titre)
    {
        $q = $this->db->prepare("UPDATE article SET article.texte = :texte, article.titre = :titre WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteArticleById($id)
    {
        $q = $this->db->prepare("DELETE FROM article WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>