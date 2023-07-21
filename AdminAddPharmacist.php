<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $Name = $_POST["Name"];
    $SSN = $_POST["SSN"];
    $Email = $_POST["Email"];
    $Number = $_POST["Number"];
    $Branch = $_POST["Branch"];
    $Date_of_birth = $_POST["Date_of_birth"];

    $sql = "INSERT INTO pharmacist (Username, Password, Name, SSN, Email, Number, Branch, Date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssssisd", $Username, $Password, $Name, $SSN, $Email, $Number, $Branch, $Date_of_birth);
    $result = $stmt->execute();

    if ($result === false) {
        die("Error: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        echo "Pharmacist's information inserted successfully.";
    } else {
        echo "Failed to insert pharmacist's information.";
    }

    $stmt->close();
}

$conn->close();
?>
