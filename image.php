<?php
include_once("config.php");

if (isset($_POST["submit"])) {
    $fullName = $_POST["fullname"];
    $fileName = $_FILES["image"]["name"];
    $password = password_hash ($_POST['passwOw'], PASSWORD_DEFAULT);
    $description = $_POST["description"];

    $sql = "CREATE TABLE `$fullName` (
        name VARCHAR(255) NOT NULL,
        TimeOfBooking VARCHAR(255) NOT NULL UNIQUE,
        Contact_no VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Table '$fullName' created successfully with UNIQUE email!";
    } else {
        echo "❌ Error creating table: " . $conn->error;
    }

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $uniqueName = time() . '_' . basename($fileName);
    $targetPath = "uploads/" . $uniqueName;

    if (in_array(strtolower($ext), $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "INSERT INTO profileowner (image, name, passwordOw, description) VALUES ('$uniqueName', '$fullName', '$password','$description')";
            if (mysqli_query($conn, $query)) {
                header("Location: Login.php");
                exit();
            } else {
                echo "Something is wrong with the DB insert.";
            }
        } else {
            echo "File is not uploaded.";
        }
    } else {
        echo "Your file type is not allowed.";
    }
} else {
    echo "Form not submitted properly.";
}

  
?>