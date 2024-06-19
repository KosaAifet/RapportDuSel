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

   public function creationArticle($texte, $titre, $article_type, $sous_type, $user_id) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO article(texte, titre, article_type, sous_type, user_id) VALUES(:texte, :titre, :article_type, :sous_type, :user_id)");
            $q->execute([
                'texte' => $texte,
                'titre' => $titre,
                'article_type' => $article_type,
                'sous_type' => $sous_type,
                'user_id' => $user_id
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getArticleById($id) 
    {
        try 
        {
            $q = $this->db->prepare("SELECT 
            a.id as id, 
            a.titre as titre, 
            a.texte as texte,
            a.article_type as article_type,
            a.sous_type as sous_type,
            u.pseudo as pseudo,
            u.id as user_id FROM article a LEFT JOIN users u ON u.id = a.user_id WHERE a.id = :id");
            $q->execute(['id' => $id]);

            $data = $q->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(Exception $e)
        {
            var_dump($e);
        }        
    }

    public function getArticleByUserId($user_id) 
    {
        $q = $this->db->prepare("SELECT 
        a.id as id, 
        a.titre as titre, 
        a.texte as texte,
        a.article_type as article_type,
        a.sous_type as sous_type,
        u.pseudo as pseudo,
        u.id as user_id FROM article a LEFT JOIN users u ON u.id = a.user_id WHERE a.user_id = :user_id");
        $q->execute(['user_id' => $user_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getArticleByType($article_type) 
    {
        $q = $this->db->prepare("SELECT 
        a.id as id, 
        a.titre as titre, 
        a.texte as texte,
        a.article_type as article_type,
        a.sous_type as sous_type,
        u.pseudo as pseudo,
        u.id as user_id FROM article a LEFT JOIN users u ON u.id = a.user_id WHERE article_type = :article_type");
        $q->execute(['article_type' => $article_type]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getArticleByLastDateByType($article_type, $nbrResultat)
    {
        $q = $this->db->prepare("SELECT * FROM article WHERE article_type = :article_type ORDER by date_crea DESC LIMIT ".$nbrResultat);
        $q->execute([
            'article_type' => $article_type
        ]);

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