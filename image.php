<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");

if (isset($_POST["register"])) {
    $fullName = $_POST["fullname"];
    $fileName = $_FILES["image"]["name"];
    $password = password_hash($_POST['passwOw'], PASSWORD_DEFAULT);
    $description = $_POST["description"];
    $district = $_POST['rolOw'];
    $fulladd = $_POST['address'];
    $carwahs = $_POST['Store'];

    $sql = "CREATE TABLE `$fullName` (
        name VARCHAR(255) NOT NULL UNIQUE,
        Size_of_the_car ENUM('HatchBack', 'Sedan', 'MPV', 'SUV', 'Pickup','Van','Motorcycle') NOT NULL,
        Contact_no VARCHAR(255) NOT NULL,
        TimeOfBooking ENUM('8:00AM', '8:30AM', '9:00AM','9:30AM','10:00AM','10:30AM','11:00AM','11:30AM','12:00PM','12:30PM','1:00PM','1:30PM','2:00PM','2:30PM','3:00PM','3:30PM','4:00PM','4:30PM','5:00','5:30PM','6:00PM','6:30PM','7:00PM','7:30PM','8:00PM','8:30PM','9:00PM','9:30PM','10:00','10:30PM','11:00PM','11:30PM','12:00AM','12:30AM','1:00AM') NOT NULL,
        DateOfBooking VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql)) {
        die("Error creating table: " . $conn->error);
    }

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $uniqueName = time() . '_' . basename($fileName);
    $targetPath = "uploads/" . $uniqueName;

    if ($_FILES["image"]["error"] > 0) {
        die("File upload error: " . $_FILES["image"]["error"]);
    }

    if (in_array(strtolower($ext), $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "INSERT INTO profileowner (image, name, username, passwordOw, district, fulladdress, description) 
                      VALUES ('$uniqueName', '$fullName', '$carwahs', '$password', '$district', '$fulladd', '$description')";

            if (mysqli_query($conn, $query)) {
                header("Location: verificationpage.php");
                exit();
            } else {
                die("Insert error: " . mysqli_error($conn));
            }
        } else {
            die("Failed to move uploaded file.");
        }
    } else {
        die("Unsupported file type.");
    }
}
?>
