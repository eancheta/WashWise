<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Style_ownerdash.css">
    <title>WashWise Dashboard</title>
    <style>

        body{
            background-color: #f1f3fa;
        }
        th {
            font-family: 'Barlow Condensed', sans-serif;
            background: #232ab9;
            color: whitesmoke;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 24px;
            padding: 5px 30px;
        }

        .customer {
            border: 1px solid black;
            margin: auto;
        }

        table, td, tr {
            font-family: 'Barlow Condensed', sans-serif;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 24px;
            padding: 10px;
            background: white;
        }

        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .finish {
            background-color: limegreen;
            color: black;
            border: none;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .dat{
            margin-top: 20px;
        }
        .texts{
            margin-left: 8%;
            color: #0b14d6;
            font-size: 26px;
            font-weight: bold;
        }

        .To{
            margin-left: 10.5%;
        }

        .Inp{
            margin-left: 8%;
        }

        .Inpu{
            width: 12%;
            height: 10%;
            font-size: 19px;
            font-weight: bold;
            border: none;
        }

        .Inpu::placeholder{
            color: #0b14d6;
        }

        .Input{
            width: 12%;
            height: 10%;
            font-size: 19px;
            font-weight: bold;
            border: none;
            margin-left: 1%;
        }
        .Input::placeholder{
            color: #0b14d6;
        }

        .btn0 {
            margin-left: 2%;
            width: 7%;
            height: 10%;
            font-size: 19px;
            font-weight: bold;
            color: white;
    background: #0b14d6;
    border: 2px solid black;
    border-radius: 40px;

}

    </style>
</head>
<body>
<header>
    <div class="logo"></div>
    <nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox" id="menuCheckbox">
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <li><a href="ownerdash.php">Home</a></li>
                <li><a href="reportpage.php">Reports</a></li>
                <li><a href="Login.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class="user-section">
        <label class="names" style="font-size: 25px; font-weight: bold;">
            <?= isset($_SESSION['username']) 
                ? htmlspecialchars($_SESSION['username']) 
                : 'Guest' ?>
        </label>
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="User Icon">
    </div>
</header>

<section>
<div class="dat">
  <div class = "texts">
    <label class="From">From</labe>
    <label class="To">To</label>
    
  </div>
  <div class="Inp">
    <input id="dateHack" type="text" placeholder="Select a start date" class="Inpu" required>
    <i class='bx bx-calendar'></i>
    <input id="date"     type="text" placeholder="Select a end date"   class="Input" required>
    <i class='bx bx-calendar'></i>

    <button type="submit" class="btn0" name="loginOw">Generate</button> 
  </div>  

 
</div>

<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['table'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$table = preg_replace('/[^a-zA-Z0-9_]/', '', $_SESSION['table']);

include_once("config.php");

$result = $conn->query("SELECT * FROM `$table`");

if (!$result) {
    echo "❌ Failed to fetch data: " . $conn->error;
    exit();
}

echo "<div class='gh'>";
echo "<table class='customer'>";
echo "<thead><tr>";
echo "<th>Name</th>
      <th>Vehicle types</th>
      <th class='CN'>Contact Number</th>
      <th>Time Of Booking</th>
      <th>Date Of Booking</th>
      <th>Time Created</th>
      <th>Remarks</th>";
echo "</tr></thead><tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "</tr>";

    
}

echo "</tbody></table>";
echo "</div>";
?>
</section>

<script>
  const inputs = [document.getElementById('dateHack'), document.getElementById('date')];

  inputs.forEach(input => {
    input.addEventListener('focus', () => {
      input.type = 'date';
    });

    input.addEventListener('blur', () => {
      if (!input.value) {
        input.type = 'text';
      }
    });
  });
</script>



  
</script>
</body>
</html>
