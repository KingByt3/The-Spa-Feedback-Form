<?php
session_start();

if (!isset($_SESSION["Admin"])) {
    header("Location: AdminLogin.php");
    exit();
}

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'spa_feedback';

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_POST["id"];

$sql = "DELETE FROM feedback WHERE id=$id";
$conn->query($sql);

header("Location: Admin.php");
?>