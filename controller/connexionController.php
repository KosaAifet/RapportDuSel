<?php
require "../model/database.php";
require "../model/userModel.php";
require "../model/auth.php";

$user = new UserModel($db);

$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'] ?? null;

$userToken = $user->connexionUtilisateur($email, $mdp);

header('Content-Type: application/json');
echo json_encode(array("success" => true, "jwtToken" => $userToken));
?>