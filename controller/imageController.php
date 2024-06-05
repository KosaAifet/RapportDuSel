<?php
require "../model/database.php";
require "../model/imageModel.php";
require "../model/auth.php";

// Récupération de la méthode HTTP utilisée pour la requête
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['image_id'])) {

            handleGetImage($db, $_GET['image_id']);        

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
    $image = new ImageModel($db);

    // Traitement spécifique pour les requêtes POST

    $id = $data['image_id'];
    $images = $image->getImageById($id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "images" => $images));
}

function handleGetImage($db, $image_id) {

    $image = new ImageModel($db);

    // Traitement spécifique pour les requêtes POST

    $images = $image->getImageById($image_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "images" => $images));
}

function handlePost($db, $data) {
    $image = new ImageModel($db);
    // Traitement spécifique pour les requêtes POST
    $url = $data['url'] ?? null;

    $images = $image->creationImage($url);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "images" => $images));
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