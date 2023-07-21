<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $PatientID = $_POST["PatientID"];
    $DoctorID = $_POST["DoctorID"];
    $Drug_No = $_POST["Drug_No"];
    $Dosage = $_POST["Dosage"];
    $StartDate = $_POST["Start_date"];
    $EndDate = $_POST["End_date"];

    $sql = "INSERT INTO patient_prescription (PatientID, DoctorID, Drug_No, Dosage, Start_date, End_date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("iiisss", $PatientID, $DoctorID, $Drug_No, $Dosage, $StartDate, $EndDate);
    $result = $stmt->execute();

    if ($result === false) {
        die("Error: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        echo "Prescription inserted successfully.";
    } else {
        echo "Failed to insert prescription.";
    }

    $stmt->close();
}

$conn->close();
?>



