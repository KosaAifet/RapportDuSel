<?php
session_start();
require "../model/userModel.php";

$user = new userModel($db);

$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'] ?? null;

$userToken = $user->connexionUtilisateur($email, $mdp);

header('Content-Type: application/json');
echo json_encode(array("success" => true, "jwtToken" => $userToken));
?>