<?php
session_start();
header('Content-Type: application/json');

if(isset($_SESSION['user_role']));
{
    echo json_encode(array("role" => $_SESSION['user_role']));
}
?>