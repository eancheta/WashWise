<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['table'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$table = $_SESSION['table'];

include_once("config.php");

$table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);

$result = $conn->query("SELECT * FROM `$table`");

if (!$result) {
    echo "❌ Failed to fetch data: " . $conn->error;
    exit();
}

echo "<h2>Welcome, " . htmlspecialchars($username) . "</h2>";
echo "<table border='1'>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $col) {
        echo "<td>" . htmlspecialchars($col) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
