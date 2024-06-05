<?php
require 'config.php';
require '../vendor/autoload.php';
include '../utilitaire/time.php';

class ImageModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function creationImage($url) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO image(url) VALUES(:url)");
            $q->execute([
                'url' => $url
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getImageById($id) 
    {
        $q = $this->db->prepare("SELECT * FROM image WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getImageByArticleId($article_id) 
    {
        $q = $this->db->prepare("SELECT * FROM image_article LEFT JOIN image ON image.id = image_article.image_id WHERE image_article.article_id = :article_id");
        $q->execute(['article_id' => $article_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getImageByProduitId($produit_id) 
    {
        $q = $this->db->prepare("SELECT * FROM image_produit LEFT JOIN image ON image.id = image_produit.image_id WHERE image_produit.produit_id = :produit_id");
        $q->execute(['produit_id' => $produit_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateImageById($id, $url)
    {
        $q = $this->db->prepare("UPDATE image SET image.url = :url WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteImageById($id)
    {
        $q = $this->db->prepare("DELETE FROM image WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>