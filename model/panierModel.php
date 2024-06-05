<?php
require 'config.php';
require '../vendor/autoload.php';
include '../utilitaire/time.php';

class PanierModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function creationPanier($quantite, $user_id, $produit_id) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO panier(quantite, user_id, produit_id) VALUES(:quantite, :user_id, :produit_id)");
            $q->execute([
               "quantite" => $quantite,
               "user_id" => $user_id,
               "produit_id" => $produit_id
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getPanierById($id) 
    {
        $q = $this->db->prepare("SELECT * FROM panier WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getPanierByUserId($user_id) 
    {
        $q = $this->db->prepare("SELECT * FROM panier WHERE user_id = :user_id");
        $q->execute(['user_id' => $user_id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updatePanierById($id, $quantite, $user_id, $produit_id)
    {
        $q = $this->db->prepare("UPDATE panier SET panier.quantite = $quantite, panier.user_id = $user_id, panier.produit_id = $produit_id WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deletePanierById($id)
    {
        $q = $this->db->prepare("DELETE FROM panier WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>