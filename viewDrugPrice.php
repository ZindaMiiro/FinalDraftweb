<?php
require_once("connect.php"); // Assuming "connect.php" contains the database connection code

// Select the database
if (!mysqli_select_db($conn, "drugdispensingtools")) {
    die("Error: " . mysqli_error($conn));
}

$sql = "SELECT p.Drug_No, d.Drug_Name, p.Price 
        FROM price_list p
        JOIN drug d ON p.Drug_No = d.Drug_No";

$results = $conn->query($sql);

if ($results === false) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Price List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Price List</h1>

    <?php if ($results->num_rows > 0) { ?>
        <table>
            <tr>
                <th>Drug Number</th>
                <th>Drug Name</th>
                <th>Price</th>
            </tr>
            <?php while ($row = $results->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["Drug_No"]; ?></td>
                    <td><?php echo $row["Drug_Name"]; ?></td>
                    <td><?php echo $row["Price"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No data found in the Price List table.</p>
    <?php } ?>
    <!-- Insert this code where you want to display the table -->

</body>
</html>

<?php
$results->close();
$conn->close();
?>
