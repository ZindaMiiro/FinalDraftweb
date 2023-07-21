<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $DoctorID = $_POST["DoctorID"];
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $Name = $_POST["Name"];
    $SSN = $_POST["SSN"];
    $Email = $_POST["Email"];
    $Number = $_POST["Number"];
    $Date_Joined = $_POST["Date_Joined"];
    $Date_of_birth = $_POST["Date_of_birth"];

    $sql = "INSERT INTO doctor (DoctorID, Username, Password, Name, SSN, Email, Number, Date_Joined, Date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("isssssiss", $DoctorID, $Username, $Password, $Name, $SSN, $Email, $Number, $Date_Joined, $Date_of_birth);
    $result = $stmt->execute();

    if ($result === false) {
        die("Error: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        echo "Doctor's information inserted successfully.";
    } else {
        echo "Failed to insert doctor's information.";
    }

    $stmt->close();
}

$conn->close();
?>
