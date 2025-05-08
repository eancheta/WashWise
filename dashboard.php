<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="Cancel.php">Cancel booking</a></li>
                    <li><a href="district.php">District-Based Car Wash Listing</a></li>
                    <li><a href="Login.php">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <div class="user-section">
            <label class="names" style="font-size: 25px; font-weight: bold; ">
                <?= isset($_SESSION['username']) 
                    ? htmlspecialchars($_SESSION['username']) 
                    : 'Guest' ?>
            </label>
            <img src="car.png" alt="User Icon">
        </div>
    </header>

    <section>
        <div class="container">    
            <?php
            $query = "SELECT * FROM profileowner";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $name = $row["name"];
                    $fileName = $row["image"];
                    $description = $row["description"];
                    $imageUrl = "uploads/" . $fileName;
                    echo "<div class='profile'>";
                    echo "<a href='profileowner.php'><img src='$imageUrl'></a>";
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
    <?php 
    if (!empty($_SESSION['alert_message'])) {
        $message = $_SESSION['alert_message'];
        $type = $_SESSION['alert_type'] ?? 'error';

        $bgColor = $type === 'success' ? '#D4EDDA' : '#ECC8C5';
        $borderColor = $type === 'success' ? '#28a745' : '#fa3625';
        $textColor = $type === 'success' ? '#155724' : '#fa3625';
        $icon = $type === 'success' ? 'bxs-check-circle' : 'bxs-x-circle';
    ?>
    <div id="popupAlert" style="
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: <?= $bgColor ?>;
        color: <?= $textColor ?>;
        padding: 20px;
        border: 4px solid <?= $borderColor ?>;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 400px;
        font-family: sans-serif;
    ">
        <i class='bx <?= $icon ?>' style='font-size: 32px; color: <?= $borderColor ?>;'></i>
        <span style="flex: 1; font-size: 16px;"><?= htmlspecialchars($message) ?></span>
        <button onclick="document.getElementById('popupAlert').style.display='none'" style="
            background: transparent;
            border: none;
            color: <?= $borderColor ?>;
            font-size: 20px;
            cursor: pointer;
            font-weight: bold;
        ">x</button>
    </div>
    <?php 
        unset($_SESSION['alert_message'], $_SESSION['alert_type']);
    }
    ?>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('popupAlert');
            if (alert) alert.style.display = 'none';
        }, 5000);
    </script> 

</body>
</html>
