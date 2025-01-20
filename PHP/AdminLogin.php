<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $username = $_POST ["username"];
       $password = $_POST ["passw"];

        if ($username == 'Spa_Admin' && $password =='Spa_Admin') {
            $_SESSION["Admin"] = true;            
            header("Location: Admin.php");
            exit;
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../CSS File/Login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<img src="../Images/THE SPA.png"/>
    <div class="container">
        <div class="login-form">
            <div class="login">
                <h3>Admin Login</h3>
            </div>
            <form method="post" action="AdminLogin.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required autocomplete="nope">
                <br>
                <label for="pass">Password:</label>
                <input type="password" id="passw" name="passw" placeholder="Enter Password" required autocomplete="nope">
                <br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>