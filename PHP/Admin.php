
<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS File/Admin.css">
</head>
<body>
<button onclick="location.href='AdminLogout.php';" style="position: absolute; top: 10px; right: 10px;">Logout</button>
<h2>Guest Feedbacks</h2>
<form action="" method="get">
    <label for="month" style=" color:black; Margin-left: 10%;">Month:</label>
    <select name="month" id="month">
        <option value="">All</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
</select>
    <label for="gender" style=" color:black;">Gender:</label>
    <select name="gender" id="gender">
        <option value="">All</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <button type="submit">Filter</button>
</form>

<?php
session_start();

if (!isset($_SESSION["Admin"])) {
    header("Location: AdminLogin.php");
    exit;
}

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'spa_feedback';

$conn = new mysqli($servername, $username, $password, $dbname);

$selected_month = isset($_GET['month']) ? $_GET['month'] : '';
$selected_gender = isset($_GET['gender']) ? $_GET['gender'] : '';

$sql_condition = '';
if ($selected_month != '') {
    $sql_condition = "MONTH(feedback.answered_at) = $selected_month";
}

if ($selected_gender != '') {
    if ($sql_condition != '') {
        $sql_condition .= " AND feedback.Gender = '$selected_gender'";
    } else {
        $sql_condition = "feedback.Gender = '$selected_gender'";
    }
}

if ($sql_condition != '') {
    $sql = "SELECT * FROM feedback WHERE $sql_condition";
} else {
    $sql = "SELECT * FROM feedback";
}

$result = $conn->query($sql);
$prev_month = null;
while ($row = $result->fetch_assoc()):
    $row_month = date('m', strtotime($row["answered_at"]));
    if ($row_month != $prev_month) {
        if ($prev_month !== null) {
            // Close the previous table
            ?>
            </table>
            <?php
        }
        // Start a new table for the new month
        
        ?>
        
        <table id="data-table">
            <tr>
                <th colspan="2"><?php echo date('F Y', strtotime($row["answered_at"])); ?></th>
            </tr>
            <tr>
                <th>Guest Name</th>
                <th>Gender</th>
                <th>Ambience of the Spa</th>
                <th>Applied pressure</th>
                <th>Pace of your massage</th>
                <th>Massage Therapist</th>
                <th>Name of the Therapist</th>
                <th>overall Satisfaction experience at the spa</th>
                <th>Comments/suggestions of the Guest</th>
                <th>Room Number</th>
                <th>Answered At</th>
                <th>Remove</th>
            </tr>
            <?php
        }
        $prev_month = $row_month;
    
    ?>
    <tr>
        <td><?php echo $row["Gname"]; ?></td>
        <td><?php echo $row["Gender"]; ?></td>
        <td><?php echo $row["Ambience"]; ?></td>
        <td><?php echo $row["Pressure"]; ?></td>
        <td><?php echo $row["Pace"]; ?></td>
        <td><?php echo $row["Therapist"]; ?></td>
        <td><?php echo $row["TheraName"]; ?></td>
        <td><?php echo $row["Satisfaction"]; ?></td>
        <td><?php echo $row["Comment"]; ?></td>
        <td><?php echo $row["RoomNum"]; ?></td>
        <td><?php echo date('m/d/Y', strtotime($row["answered_at"])).'<br>'.date('g:i a', strtotime($row["answered_at"])); ?></td>
        <td>
            <form method="post" action="remove.php" class="remove-form">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <button type="submit">Remove</button>
            </form>
        </td>
    </tr>
    <?php
    
endwhile;

?>
</table>

<?php

$sql = "SELECT Ambience, Pressure, Pace, Therapist, Satisfaction FROM feedback";
$result = $conn->query($sql);

$excellent_Ambi = 0;
$good_Ambi = 0;
$poor_Ambi = 0;

$excellent_Press = 0;
$good_Press = 0;
$poor_Press = 0;

$excellent_Pace = 0;
$good_Pace = 0;
$poor_Pace = 0;

$excellent_Thera = 0;
$good_Thera = 0;
$poor_Thera = 0;

$excellent_Satis = 0;
$good_Satis = 0;
$poor_Satis = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Ambience"] == "Excellent") {
            $excellent_Ambi++;
        } elseif ($row["Ambience"] == "Good") {
            $good_Ambi++;
        } elseif ($row["Ambience"] == "Poor") {
            $poor_Ambi++;
        }

        if ($row["Pressure"] == "Excellent") {
            $excellent_Press++;
        } elseif ($row["Pressure"] == "Good") {
            $good_Press++;
        } elseif ($row["Pressure"] == "Poor") {
            $poor_Press++;
        }
        if ($row["Pace"] == "Excellent") {
            $excellent_Pace++;
        } elseif ($row["Pace"] == "Good") {
            $good_Pace++;
        } elseif ($row["Pace"] == "Poor") {
            $poor_Pace++;
        }
        if ($row["Therapist"] == "Excellent") {
            $excellent_Thera++;
        } elseif ($row["Therapist"] == "Good") {
            $good_Thera++;
        } elseif ($row["Therapist"] == "Poor") {
            $poor_Thera++;
        }
        if ($row["Satisfaction"] == "Excellent") {
            $excellent_Satis++;
        } elseif ($row["Satisfaction"] == "Good") {
            $good_Satis++;
        } elseif ($row["Satisfaction"] == "Poor") {
            $poor_Satis++;
        }
    }
} else {
    echo "0 results";
}


$conn->close();
?>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS File/Pie.css">


<label for="category" style="color:black;">Category:</label>
<select name="category" id="category">
  <option value="Ambience">Ambience</option>
  <option value="Pressure">Pressure</option>
  <option value="Pace">Pace</option>
  <option value="Therapist">Therapist</option>
  <option value="Satisfaction">Satisfaction</option>
</select>

<figure class="highcharts-figure" id="Ambience">
    <div id="container1"></div>
</figure>

<figure class="highcharts-figure" id="Pressure">
    <div id="container2"></div>
</figure>

<figure class="highcharts-figure" id="Pace">
    <div id="container3"></div>
</figure>

<figure class="highcharts-figure" id="Therapist">
    <div id="container4"></div>
</figure>

<figure class="highcharts-figure" id="Satisfaction">
    <div id="container5"></div>
</figure>
<script>
const category = document.getElementById("category");
const categories = [
  { id: "Ambience", container: document.getElementById("Ambience") },
  { id: "Pressure", container: document.getElementById("Pressure") },
  { id: "Pace", container: document.getElementById("Pace") },
  { id: "Therapist", container: document.getElementById("Therapist") },
  { id: "Satisfaction", container: document.getElementById("Satisfaction") }
];

category.addEventListener("change", () => {
  const categoryValue = category.value;

  // Hide all categories and containers
  categories.forEach(({ id, container }) => {
    document.getElementById(id).style.display = "none";
    container.style.display = "none";
  });

  // Show the selected category and container
  if (categoryValue!== "") {
    const categoryToShow = categories.find(category => category.id === categoryValue);
    document.getElementById(categoryValue).style.display = "block";
    categoryToShow.container.style.display = "block";
  }
});


// Show the "Ambience" category and container initially
window.onload = function() {
  document.getElementById("Ambience").style.display = "block";
  let categoryToShow = categories.find(category => category.id === "Ambience");
  if (categoryToShow) {
    categoryToShow.container.style.display = "block";
  }

}
</script>
<script>
   
Highcharts.chart('container1', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        },
        backgroundColor: '#faf2a7cc' // Add this line
    },
    title: {
        text: 'Ambience of the Spa Feedback Count',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Ambience',
        data: [
            ['Excellent', <?php echo $excellent_Ambi;?>],
            ['Good', <?php echo $good_Ambi;?>],
            ['Poor', <?php echo $poor_Ambi;?>],
        ]
        
    }]
});
Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        },
        backgroundColor: '#faf2a7cc' 
    },
    title: {
        text: 'Applied Massage Pressure Feedback Count',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Pressure',
        data: [
            ['Excellent', <?php echo $excellent_Press;?>],
            ['Good', <?php echo $good_Press;?>],
            ['Poor', <?php echo $poor_Press;?>],
        ]
        
    }]
});
Highcharts.chart('container3', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        },
        backgroundColor: '#faf2a7cc' 
    },
    title: {
        text: 'Pace of Massage Feedback Count',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Pace',
        data: [
            ['Excellent', <?php echo $excellent_Pace;?>],
            ['Good', <?php echo $good_Pace;?>],
            ['Poor', <?php echo $poor_Pace;?>],
        ]
        
    }]
});
Highcharts.chart('container4', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        },
        backgroundColor: '#faf2a7cc' // Add this line
    },
    title: {
        text: 'Therapist Feedback Count',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Therapist',
        data: [
            ['Excellent', <?php echo $excellent_Thera;?>],
            ['Good', <?php echo $good_Thera;?>],
            ['Poor', <?php echo $poor_Thera;?>],
        ]
        
    }]
});
Highcharts.chart('container5', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        },
        backgroundColor: '#faf2a7cc' // Add this line
    },
    title: {
        text: 'Satisfaction of Customer Feedback Count',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Satisfaction',
        data: [
            ['Excellent', <?php echo $excellent_Satis;?>],
            ['Good', <?php echo $good_Satis;?>],
            ['Poor', <?php echo $poor_Satis;?>],
        ]
        
    }]
});
</script>

</body>
</html> 