<?php
include_once("config.php");

if (isset($_POST["submit"])) {

    $fullName = $_POST["fullname"];
    $fileName = $_FILES["image"]["name"];
    $password = password_hash ($_POST['passwOw'], PASSWORD_DEFAULT);
    $description = $_POST["description"];
    $address = $_POST['cityOw'];
    $district = $_POST['rolOw'];
    $fulladdress = $_post['address'];

    $sql = "CREATE TABLE `$fullName` (
        name VARCHAR(255) NOT NULL UNIQUE,
        Size_of_the_car ENUM('HatchBack', 'Sedan', 'MPV', 'SUV', 'Pickup','Van','Motorcycle') NOT NULL,
        Contact_no VARCHAR(255) NOT NULL,
        TimeOfBooking ENUM('8:00AM', '8:30AM', '9:00AM','9:30AM','10:00AM','10:30AM','11:00AM','11:30AM','12:00PM','12:30PM','1:00PM','1:30PM','2:00PM','2:30PM','3:00PM','3:30PM','4:00PM','4:30PM','5:00','5:30PM','6:00PM','6:30PM','7:00PM','7:30PM','8:00PM','8:30PM','9:00PM','9:30PM','10:00','10:30PM','11:00PM','11:30PM','12:00AM','12:30AM','1:00AM') NOT NULL,
        DateOfBooking VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";


    if ($conn->query($sql) === TRUE) {
        echo "✅ Table '$fullName' created successfully!";
    } else {
        echo "❌ Error creating table: " . $conn->error;
    }


    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $uniqueName = time() . '_' . basename($fileName);
    $targetPath = "uploads/" . $uniqueName;

    if ($_FILES["image"]["error"] > 0) {
        echo "Error: " . $_FILES["image"]["error"];
    }


    if (in_array(strtolower($ext), $allowedTypes)) {

        if (move_uploaded_file($tempName, $targetPath)) {
            echo "✅ File uploaded successfully to: $targetPath";

            $query = "INSERT INTO profileowner (image, name, passwordOw, district, city, fulladdress, description) 
                      VALUES ('$uniqueName', '$fullName', '$password', '$district', '$address', '$fulladdress', '$description')";

            if (mysqli_query($conn, $query)) {
                echo "✅ Data inserted successfully!";
                header("Location: Login.php");
                exit();
            } else {
                echo "❌ Error inserting data: " . mysqli_error($conn);
            }
        } else {
            echo "❌ File is not uploaded to the target directory.";
        }
    } else {
        echo "❌ Your file type is not allowed.";
    }

    header("Location: Login.php");
} else {
    echo "❌ Form not submitted properly.";
}
?>
