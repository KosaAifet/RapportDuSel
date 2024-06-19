<?php
    require "../model/database.php";
    require "../model/articleModel.php";
    require "../model/auth.php";

    // Récupération de la méthode HTTP utilisée pour la requête
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            if (isset($_GET['article_id'])) {
                handleGetArticle($db, $_GET['article_id']);        
            } else {
                handleGetArticleByLastDateByType($db, $_GET);
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
        $article = new ArticleModel($db);

        // Traitement spécifique pour les requêtes POST

        $user_id = $_SESSION['user_id'];
        $articles = $article->getArticleByUserId($user_id);

        header('Content-Type: application/json');
        echo json_encode(array("success" => true, "articles" => $articles));
    }

    function handleGetArticle($db, $article_id) {

        $article = new ArticleModel($db);

        // Traitement spécifique pour les requêtes POST

        // $user_id = $_SESSION['user_id'];
        $articles = $article->getArticleById($article_id);

        header('Content-Type: application/json');
        echo json_encode(array("success" => true, "articles" => $articles));
    }

    function handleGetArticleByLastDateByType($db, $GET) 
    {
        $article = new ArticleModel($db);
        $nbrResultat = 4;

        $rapports = $article->getArticleByLastDateByType("rapport", $nbrResultat);
        $critiques = $article->getArticleByLastDateByType("critique", $nbrResultat);
        $news = $article->getArticleByLastDateByType("news", $nbrResultat);
        $articles = $article->getArticleByLastDateByType("article", $nbrResultat);

        header('Content-Type: application/json');
        echo json_encode(array("success" => true,
        "data" => [
            "rapports" => $rapports,
            "critiques" => $critiques,
            "news" => $news,
            "articles" => $articles
        ]));
    }

    function handlePost($db, $data) {
        $article = new ArticleModel($db);

        // Traitement spécifique pour les requêtes POST
        $texte = $data['texte'] ?? null;
        $titre = $data['titre'] ?? null;
        $articleType = $data['articleType'] ?? null;
        $newsType = $data['newsType'] ?? null;
        $user_id = $_SESSION['user_id'];
        
        $articles = $article->creationArticle($texte, $titre, $articleType, $newsType, $user_id);

        header('Content-Type: application/json');
        echo json_encode(array("success" => true, "articles" => $articles));
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