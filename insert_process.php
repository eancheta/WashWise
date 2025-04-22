<?php
// --- insert_process.php ---
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = $_POST["brand_table"];
    $name = $_POST["name"];
    $brandofcar = $_POST["Brand_car"];
    $Size = $_POST["size"];
    $contact = $_POST["Contact"];
    $booking = $_POST["book"];

    $sql = "INSERT INTO `$table` (name, Brand_of_The_car, Size_of_the_car, Contact_no, TimeOfBooking) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $brandofcar, $Size, $contact, $booking);

    if ($stmt->execute()) {
        echo "Successfully booked into $table!";  
        if (isset($_SESSION['login_error'])) {
            $error = addslashes($_SESSION['login_error']); // Escape quotes
            echo "<div id='popupAlert' style='
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: trasparent;
                    color: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                    z-index: 9999;
                    display: block;
                    min-width: 250px;
                    text-align: center;
                    '>
                    <span>$error</span><br><br>
                    <button onclick='document.getElementById(\"popupAlert\").style.display = \"none\"' style='padding: 5px 10px; border: none; background: white; color: #f44336; border-radius: 4px; cursor: pointer;'>Close</button>
                    </div>";
            unset($_SESSION['login_error']);
        }
    } else {
        echo "Something went wrong: " . $stmt->error;
    }
} else {
    echo "Form not submitted.";
}
?>