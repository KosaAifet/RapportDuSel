<?php
require 'config.php';
require '../vendor/autoload.php';
include '../utilitaire/time.php';

class CommentaireModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function creationCommentaire($texte, $user_id, $article_id) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO commentaire(texte, user_id, article_id) VALUES(:texte, :user_id, :article_id)");
            $q->execute([
                'texte' => $texte,
                'user_id' => $user_id,
                'article_id' => $article_id 
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getCommentaireById($id) 
    {
        $q = $this->db->prepare("SELECT * FROM commentaire WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getCommentaireByArticleId($article_id) 
    {
        $q = $this->db->prepare("SELECT * FROM commentaire LEFT JOIN article ON article.id = commentaire.article_id WHERE article_id = :article_id");
        $q->execute(['article_id' => $article_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getCommentaireByUserId($user_id) 
    {
        $q = $this->db->prepare("SELECT * FROM commentaire LEFT JOIN users ON users.id = commentaire.user_id WHERE user_id = :user_id");
        $q->execute(['user_id' => $user_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateCommentaireById($id, $texte)
    {
        $q = $this->db->prepare("UPDATE commentaire SET commentaire.texte = :texte WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteCommentaireById($id)
    {
        $q = $this->db->prepare("DELETE FROM commentaire WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>