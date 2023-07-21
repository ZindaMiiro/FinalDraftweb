<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Drug_No = $_POST["Drug_No"];
    $Drug_Name = $_POST["Drug_Name"];
    $Serial_Number = $_POST["Serial_Numbe"];
    $Quantity = $_POST["Quantiy"];
    $Man_DATE = $_POST["Man_DATE"];
    $Exp_Date = $_POST["Exp_Date"];

    $sql = "INSERT INTO drug (Drug_No, Drug_Name, Serial_Number, Quantiy, Man_DATE, Exp_Date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("ississ", $Drug_No, $Drug_Name, $Serial_Number, $Quantity, $Man_DATE, $Exp_Date);
    $result = $stmt->execute();

    if ($result === false) {
        die("Error: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        echo "Drug information inserted successfully.";
    } else {
        echo "Failed to insert drug information.";
    }

    $stmt->close();
}

$conn->close();
?>
