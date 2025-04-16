<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_dashboard.css">
    <title>WashWise Dashboard</title>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Student</a></li>
                </ul>
            </div>
        </nav>

        <div class="user-section">
            <label class="names">
                <?= isset($_SESSION['username']) 
                    ? htmlspecialchars($_SESSION['username']) 
                    : 'Guest' ?>
            </label>
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="User Icon">
        </div>
    </header>

    <section>
    <div class="container">    
        <?php
    include_once("config.php");
    $query = "SELECT * FROM profileowner";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows>0) {
        while($row = mysqli_fetch_array($result)){
            $name = $row["name"];
            $fileName = $row["image"];
            $description = $row["description"];
            $imageUrl = "uploads/".$fileName;
            echo "<div class='profile'>";
            echo "<img src='$imageUrl'>";
            echo "<div class='info'>";
            echo "<h3 class='nam'>$name</h3>";
            echo "<h3 class='des'>$description</h3>";
            echo "<form method='post' action='dash.php'>";
            echo "<input type='hidden' name='brand_table' value='$name'>";
            echo "<button type='submit' class='save-btn'>Book at $name</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>
    </div>


    </section>

</body>
</html>