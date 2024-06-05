<?php
require 'config.php';
require '../vendor/autoload.php';
include '../utilitaire/time.php';

class ProduitModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function creationProduit($nom, $caracteristiques, $description, $prix, $stock) 
   {
        try {
            $q = $this->db->prepare("INSERT INTO produit(nom, caracteristiques, description, prix, stock) VALUES(:nom, :caracteristiques, :description, :prix, :stock)");
            $q->execute([
               "nom" => $nom,
               "caracteristiques" => $caracteristiques,
               "description" => $description,
               "prix" => $prix,
               "stock" => $stock
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getProduitById($id) 
    {
        $q = $this->db->prepare("SELECT * FROM produit WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateProduitById($id, $nom, $caracteristiques, $description, $prix, $stock)
    {
        $q = $this->db->prepare("UPDATE produit SET produit.nom = $nom, produit.caracteristiques = $caracteristiques, produit.description = $description, produit.prix = $prix, produit.stock = $stock WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteProduitById($id)
    {
        $q = $this->db->prepare("DELETE FROM produit WHERE id = :id");
        $q->execute(['id' => $id]);

        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>