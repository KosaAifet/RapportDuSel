<?php
require "../model/database.php";
require "../model/produitModel.php";
require "../model/auth.php";

// Récupération de la méthode HTTP utilisée pour la requête
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['produit_id'])) {

            handleGetProduit($db, $_GET['produit_id']);        

        } else {
            handleGet($db, $_GET);

        }
        // Gérer les requêtes GET

        break;
    case 'POST':
        // Gérer les requêtes POST
        handlePost($db, $_POST);
        break;
    case 'PUT':
        // Gérer les requêtes PUT
        handlePut($db, $_PUT);
        break;
    case 'DELETE':
        // Gérer les requêtes DELETE
        handleDelete($db, $_DELETE);
        break;
    default:
        // Méthode non prise en charge
        header('HTTP/1.1 405 Method Not Allowed');
        break;
}

function handleGet($db, $data) {
    $produit = new ProduitModel($db);

    // Traitement spécifique pour les requêtes POST

    $id = $data['produit_id'];
    $produits = $produit->getProduitById($id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "produits" => $produits));
}

function handleGetProduit($db, $produit_id) {

    $produit = new ProduitModel($db);

    // Traitement spécifique pour les requêtes POST

    $produits = $produit->getProduitById($produit_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "produits" => $produits));
}

function handlePost($db, $data) {
    $produit = new ProduitModel($db);

    // Traitement spécifique pour les requêtes POST
    $nom = $data['nom'] ?? null;
    $caracteristiques = $data['caracteristiques'] ?? null;
    $description = $data['description'] ?? null;
    $prix = $data['prix'] ?? null;
    $stock = $data['stock'] ?? null;

    $produits = $produit->creationProduit($nom, $caracteristiques, $description, $prix, $stock);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "produits" => $produits));
}

function handlePut($db, $data) {
    // Traitement spécifique pour les requêtes PUT
    echo "Handling PUT\n";
    // Logique pour mettre à jour des données ici
}

function handleDelete($db, $data) {
    // Traitement spécifique pour les requêtes DELETE
    echo "Handling DELETE\n";
    // Logique pour supprimer des données ici
}
?>