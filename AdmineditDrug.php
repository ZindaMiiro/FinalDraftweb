<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Drug_Name = $_POST["Drug_Name"];
    $Column_Name = $_POST["Column_Name"];
    $New_Value = $_POST["New_Value"];

    // Validate if the column name is valid
    $validColumns = array("Drug_No","Drug_Name", "Serial_Number", "Quantiy", "Man_DATE", "Exp_Date");
    if (!in_array($Column_Name, $validColumns)) {
        die("Error: Invalid column name.");
    }

    $sql = "UPDATE drug SET $Column_Name = ? WHERE Drug_Name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("ss", $New_Value, $Drug_Name);
    $result = $stmt->execute();

    if ($result === false) {
        die("Error: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        echo "Drug information updated successfully.";
    } else {
        echo "Failed to update drug information.";
    }

    $stmt->close();
}

$conn->close();
?>
