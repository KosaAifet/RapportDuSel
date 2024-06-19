<?php
require "../model/database.php";
require "../model/likeModel.php";
require "../model/auth.php";

// Récupération de la méthode HTTP utilisée pour la requête
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Gérer les requêtes GET
        if (isset($_GET['id'])) {

            handleGetLike($db, $_GET['id']);        

        } else if(isset($_GET['all'])) {
            handleGetLikeByType($db, $_GET);

        } else {
            handleGet($db, $_GET);

        }
        break;
    case 'POST':
        // Gérer les requêtes POST
        if (isset($_POST['entite_id']) && isset($_POST['like_on'])) {

           
            handlePost($db, $_POST);

        } else if(isset($_GET['all'])) {
            handleGetLikeByType($db, $_GET);

        } else {
            handleGet($db, $_GET);

        }
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
    $like = new LikeModel($db);

    // Traitement spécifique pour les requêtes POST

    $user_id = $_SESSION['user_id'];
    $likes = $like->getLikeByUserId($user_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "likes" => $likes));
}

function handleGetLike($db, $like_id) {

    $like = new LikeModel($db);

    // Traitement spécifique pour les requêtes POST

    // $user_id = $_SESSION['user_id'];
    $likes = $like->getLikeById($like_id);

    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "like" => $likes));
}

function handleGetLikeByType($db, $GET) 
    {
        $like = new LikeModel($db);

        $rapports = $like->getLikeByType("rapport");
        $critiques = $like->getLikeByType("critique");
        $news = $like->getLikeByType("news");
        $likes = $like->getLikeByType("like");

        header('Content-Type: application/json');
        echo json_encode(array("success" => true,
        "data" => [
            "rapports" => $rapports,
            "critiques" => $critiques,
            "news" => $news,
            "likes" => $likes
        ]));
    }

function handlePost($db, $data) {
    try 
    {
        // Traitement spécifique pour les requêtes POST
        $like = new LikeModel($db);
        $liked = $data["value"];
        $like_on = $data["liked_on"];
        $entite_id = $data["entite_id"];
        $user_id = $_SESSION["user_id"];
        
        $like_id = $like->creationLike($liked, $like_on, $entite_id, $user_id);

        $count = $like->getLikeCountByEntiteId($like_on, $entite_id);
        

        header('Content-Type: application/json');
        echo json_encode(array("success" => true, "like_id" => $like_id, "likeCount" => $count, "entite_id" => $entite_id, "like_on" => $like_on));
    }
    catch(Exception $e)
    {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(array("success" => false, "message" => "L'like n'a pas pu être crée"));
    }
    
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

function verifyOwner($db, $like_id)
{
    $like = new LikeModel($db);
    $likes = $like->getLikeById($like_id);

    $ownerId = $likes[0]['user_id'];
    $user_id = $_SESSION['user_id'];

    return $user_id == $ownerId;
}
?>