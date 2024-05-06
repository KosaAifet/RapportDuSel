<?php
session_start();
require "../model/userModel.php";
require '../model/auth.php';
require '../vendor/autoload.php';
use \firebase\JWT\JWT;


$user = new userModel($db);
$id = $_SESSION['user_id'];
$userProfile = $user->ProfileUtilisateur($id);

header('Content-Type: application/json');
echo json_encode(array("success" => true, "profile" => $userProfile));
?>