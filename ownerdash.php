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
    <link rel="stylesheet" href="Style_ownerdash.css">
    <title>WashWise Dashboard</title>
    <style>
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
                <li><a href="profowner.php">Profile</a></li>
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

    <form method="post" action="walkin.php" style="display:inline;">
        <input type="hidden" name="brand_table" value="<?= htmlspecialchars($_SESSION['table']) ?>">
        <button type="submit" class="btn0" style="
            height: 45px;
            width: 7%;
            margin-left: 84%;
            margin-top: 1%;
            margin-bottom: -2%;
            background:#0b14d6;
            color: white;
            outline: none;
            border: 2px solid black;
            border-radius: 40px;
            display: block; 
            font-weight: bold;
            font-size: 20px;
        ">Walk in</button>
    </form>
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
      <th>Action</th>";
echo "</tr></thead><tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $col) {
        echo "<td>" . htmlspecialchars($col) . "</td>";
    }
    echo "<td>
            <form method='post' action='cancelbooking.php' onsubmit=\"return confirm('Are you sure you want to cancel this booking?');\">
                <input type='hidden' name='cancel' value='" . htmlspecialchars($table) . "'>
                <input type='hidden' name='Name' value='" . htmlspecialchars($row['name']) . "'>
                <input type='hidden' name='reason' value='Owner deleted from dashboard'>
                <button type='submit' class='delete-btn'>Cancel</button>
                
            </form>
            <button type='submit' class='finish''>Done</button>
          </td>";
    echo "</tr>";

    
}

echo "</tbody></table>";
echo "</div>";
?>
</section>
<script>
function Edit() {
  window.location.href = "walkin.php";
}
    
</script>
</body>
</html>
