<?php
require "../model/database.php";
require "../model/userModel.php";
require '../model/auth.php';


$user = new UserModel($db);
$id = $_SESSION['user_id'];
$userProfile = $user->ProfileUtilisateur($id);

header('Content-Type: application/json');
echo json_encode(array("success" => true, "profile" => $userProfile));
?>