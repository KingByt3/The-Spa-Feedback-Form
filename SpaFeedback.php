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
    $TheraName = $_POST["TheraName"];
    $Comment	 = $_POST["Comment"];
    $Gname = $_POST["Gname"];
    $Gender = $_POST["Gender"];
    $RoomNum = $_POST["RoomNum"];


    $sql = "INSERT INTO feedback (Ambience, Pressure, Pace, Therapist, TheraName, Comment, Gname, Gender, RoomNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss",$Ambience, $Pressure, $Pace, $Therapist, $TheraName, $Comment, $Gname, $Gender, $RoomNum);  // Bind the parameters with variable names
    $stmt->execute();
    $conn->close();
    echo "<script>alert('Thank you for answering the Feedback Form');</script>";
    echo "<script>window.location.href='SpaFeedback.php';</script>";
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <script src="JScript File/Spa.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS File/Spa.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
   <div class="feedback-form-container"> 
    <h2>FEEDBACK FORM</h2>
    <form method="post" action="SpaFeedback.php">

        <table>
          <thead>
            <tr class="lab">
              <td></td>
              <td>Excellent</td>
              <td>Good</td>
              <td>Poor</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ambience of The Spa</td>
              <td><input type="radio" name="Ambience" id ="Ambience" value="Excellent" required></td>
              <td><input type="radio" name="Ambience" id ="Ambience" value="Good"></td>
              <td><input type="radio" name="Ambience" id ="Ambience" value="Poor"></td>
            </tr>
            <tr>
              <td>Applied pressure</td>
              <td><input type="radio" name="Pressure" id = "Pressure" value="Excellent" required></td>
              <td><input type="radio" name="Pressure" id = "Pressure" value="Good"></td>
              <td><input type="radio" name="Pressure" id = "Pressure" value="Poor"></td>
            </tr>
            <tr>
              <td>Pace of your massage</td>
              <td><input type="radio" name="Pace" id = "Pace" value="Excellent" required></td>
              <td><input type="radio" name="Pace" id = "Pace" value="Good"></td>
              <td><input type="radio" name="Pace" id = "Pace" value="Poor"></td>
            </tr>
            <tr>
              <td>Massage Therapist</td>
              <td><input type="radio" name="Therapist" id="Therapist" value="Excellent" required></td>
              <td><input type="radio" name="Therapist" id="Therapist" value="Good"></td>
              <td><input type="radio" name="Therapist" id="Therapist" value="Poor"></td>
            </tr>
            <tr>
                <td><div class="form-floating mb-3">
                  <input type="text" name ="TheraName" id="TheraName" class="form-control" id="floatingInput" placeholder="Therapist Name" style=" width: fit-content; margin-bottom: -8%;" required>
                  <label for="floatingInput">Name of the Therapist</label>
                </div></td>
            </tr>
            <tr>
              <td>How satisfied were you with your overall<br> experience at The  Spa</td>
              <td><input type="radio" name="Satisfaction" id ="Satisfaction" value="Excellent" required></td>
              <td><input type="radio" name="Satisfaction" id ="Satisfaction" value="Good"></td>
              <td><input type="radio" name="Satisfaction" id ="Satisfaction" value="Poor"></td>
            </tr>
            <tr>
          </tbody>
        </table>
        <div class="form-floating">
          <textarea class="form-control" name="Comment" id="floatingTextarea" placeholder="Comments" style="height: 100px; margin-top: auto; margin-bottom: 3%;"></textarea>
          <label for="floatingTextarea">Comments/Suggestions</label>

          <div class="form-floating mb-3">
            <input type="text" name= "Gname" class="form-control" id="floatingInput" placeholder="Guest Name" style="margin-bottom: 3%;" required >
            <label for="floatingInput">Guest Name</label>
        </div>
        <div class="form-floating mb-3" style="display: flex; flex-direction: column; padding:10px; ">
        <div style="margin-bottom: 5px;">
          <input type="radio" name="Gender" id="maleGender" value="Male" required>
          <label for="maleGender">Male</label>
        </div>
        <div>
          <input type="radio" name="Gender" id="femaleGender" value="Female" required>
          <label for="femaleGender">Female</label>
        </div>
      </div>
        <div class="form-floating mb-3">
          <input type="text" name= "RoomNum" class="form-control" id="floatingInput" placeholder="Room Naumber" style="margin-bottom: 3%; width: auto;" required >
          <label for="floatingInput">Room Number</label>
      </div>
        <button type="Submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>