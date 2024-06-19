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
        $decoded = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key($_SESSION['key'], 'HS256'));
        // Supposons que $decoded contienne un champ avec l'identifiant utilisateur
        $_SESSION['user_id'] = $decoded->id;
        $_SESSION['user_role'] = $decoded->role;

    } catch (Exception $e) {
        // Gérer l'exception si le JWT est invalide
        header('Content-Type: application/json');
        echo json_encode(array("success" => false, "error" => "Il n'y a pas d'utilisateur connecté"));
        exit;
    }
}
?>