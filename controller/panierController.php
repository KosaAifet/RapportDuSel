<?php
require "../model/database.php";
require "../model/panierModel.php";
require "../model/auth.php";

// Récupération de la méthode HTTP utilisée pour la requête
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['panier_id'])) {

            handleGetPanier($db, $_GET['panier_id']);        

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
    $panier = new PanierModel($db);

    // Traitement spécifique pour les requêtes POST

    $user_id = $_SESSION['user_id'];
    $paniers = $panier->getPanierByUserId($user_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "paniers" => $paniers));
}

function handleGetPanier($db, $panier_id) {

    $panier = new PanierModel($db);

    // Traitement spécifique pour les requêtes POST

    $paniers = $panier->getPanierById($panier_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "paniers" => $paniers));
}

function handlePost($db, $data) {
    $panier = new PanierModel($db);
    // Traitement spécifique pour les requêtes POST
    $quantite = $data['quantite'] ?? null;
    $user_id = $_SESSION['user_id'];
    $produit_id = $data['produit_id'];


    $paniers = $panier->creationPanier($quantite, $user_id, $produit_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "paniers" => $paniers));
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