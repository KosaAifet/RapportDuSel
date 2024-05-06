<?php
session_start();
include "config.php";
require '../vendor/autoload.php';
use \firebase\JWT\JWT;

// Fonction pour obtenir le Bearer Token de l'en-tête Authorization
function getBearerToken() {
    $headers = getallheaders();
    // Vérifier si l'en-tête Authorization est présent et utiliser un regex pour extraire le token
    if (isset($headers['Authorization'])) {
        if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
            return $matches[1];
        }
    }
    return null;
}

$jwt = getBearerToken();
if ($jwt) {
    try {
        $decoded = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key($key, 'HS256'));
        // Supposons que $decoded contienne un champ avec l'identifiant utilisateur
        $_SESSION['user_id'] = $decoded->data->userId;
    } catch (Exception $e) {
        // Gérer l'exception si le JWT est invalide
        http_response_code(401);
        echo "Unauthorized: " . $e->getMessage();
        exit;
    }
}

?>