<!-- Requête Inscription -->
<?php
require "../model/database.php";
require "../model/userModel.php";
require "../model/auth.php";

$user = new UserModel($db);

$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$genre = $_POST['genre'] ?? null;
$ddn = $_POST['ddn'] ?? null;
$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'] ?? null;

$userId = $user->inscriptionUtilisateur($nom, $prenom, $genre, $ddn, $email, $mdp);

header('Content-Type: application/json');
echo json_encode(array("success" => true, "userId" => $userId));
?>