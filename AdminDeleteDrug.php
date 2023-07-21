<?php
require_once("connect.php"); // Assuming "connect.php" contains the database connection code

// Get the username from the form
if (isset($_POST['Drug_Name'])) {
    $Drug_Name = $_POST['Drug_Name'];

    // Prepare and execute the SQL statement to delete the row
    $sql = "DELETE FROM drug WHERE Drug_Name = '$Drug_Name'";

    if ($conn->query($sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
