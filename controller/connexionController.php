<?php
require "../model/database.php";
require "../model/userModel.php";
require "../model/auth.php";

$user = new UserModel($db);

$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'] ?? null;

$userToken = $user->connexionUtilisateur($email, $mdp);

if($userToken)
{
    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "jwtToken" => $userToken));
}
else
{
    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(array("success" => false, "message" => "L'utilisateur n'existe pas"));
}

?>