<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'spa_feedback';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ambience = $_POST["Ambience"];
    $Pressure = $_POST["Pressure"];
    $Pace = $_POST["Pace"];
    $Therapist = $_POST["Therapist"];
    $Comment	 = $_POST["Comment"];
    $Gname = $_POST["Gname"];
    $RoomNum = $_POST["RoomNum"];


    $sql = "INSERT INTO feedback (Ambience, Pressure, Pace, Therapist, Comment, Gname, RoomNum) VALUES (?, ?, ?, ?, ?,?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss",$Ambience, $Pressure, $Pace, $Therapist, $Comment, $Gname, $RoomNum);  // Bind the parameters with variable names
    $stmt->execute();
    $conn->close();
    echo "<script>alert('Thank you for your answer!');</script>";
    echo "<script>window.location.href='user.php';</script>";
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>