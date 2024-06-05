<?php
require "../model/database.php";
require "../model/commentaireModel.php";
require "../model/auth.php";

// Récupération de la méthode HTTP utilisée pour la requête
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['commentaire_id'])) {

            handleGetCommentaire($db, $_GET['commentaire_id']);        

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
    $commentaire = new CommentaireModel($db);

    // Traitement spécifique pour les requêtes POST

    $user_id = $_SESSION['user_id'];
    $commentaires = $commentaire->getCommentaireByUserId($user_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "commentaires" => $commentaires));
}

function handleGetCommentaire($db, $commentaire_id) {

    $commentaire = new CommentaireModel($db);

    // Traitement spécifique pour les requêtes POST

    // $user_id = $_SESSION['user_id'];
    $commentaires = $commentaire->getCommentaireById($commentaire_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "commentaires" => $commentaires));
}

function handlePost($db, $data) {
    $commentaire = new CommentaireModel($db);
    // Traitement spécifique pour les requêtes POST
    $texte = $data['texte'] ?? null;
    $user_id = $_SESSION['user_id'];
    $article_id = $data['article_id'];


    $commentaires = $commentaire->creationCommentaire($texte, $user_id, $article_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "commentaires" => $commentaires));
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