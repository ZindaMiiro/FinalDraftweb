<?php
session_start(); // Start the session

require_once("connect.php"); // Assuming "connect.php" contains the database connection code

// Check if the Username session variable is set
if (isset($_SESSION['Username'])) {
    // Retrieve the username from the session
    $username = $_SESSION['Username'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the values from the HTML form
        $column = $_POST['column'];
        $newValue = $_POST['new_value'];

        // Prepare the update query
        $sql = "UPDATE pharmacist SET $column = '$newValue' WHERE Username = '$username'";

        if (mysqli_query($conn, $sql)) {
            echo "Pharmacist record updated successfully.";
        } else {
            echo "Error updating pharmacist record: " . mysqli_error($conn);
        }
    }

    // Retrieve the pharmacist's information from the database
    $sql = "SELECT * FROM pharmacist WHERE Username = '$username'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Display the pharmacist information and update form
        $row = $result->fetch_assoc();
        echo "Username: " . $row['Username'] . "<br>";
        echo "Password: " . $row['Password'] . "<br>";
        echo "SSN: " . $row['SSN'] . "<br>";
        echo "Name: " . $row['Name'] . "<br>";
        echo "Email: " . $row['Email'] . "<br>";
        echo "Number: " . $row['Number'] . "<br>";
        echo "Branch: " . $row['branch'] . "<br>";
        echo "Date_of_birth: " . $row['Date_of_birth'] . "<br>";
        // Add more fields as needed
        
        ?>
        <h2>Update Pharmacist Information</h2>
        <form method="POST" action="">
            <label for="column">Column to Update:</label>
            <input type="text" name="column" id="column" placeholder="Enter column name" required>
            <br>
            <label for="new_value">New Value:</label>
            <input type="text" name="new_value" id="new_value" placeholder="Enter new value" required>
            <br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "Pharmacist not found.";
    }
} else {
    echo "Username not found. Please log in again.";
}

// Close the database connection
$conn->close();
?>
