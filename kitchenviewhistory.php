<?php
include 'connection.php';

// Select all rows from the 'worders' table
$sql = "SELECT * FROM worders";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    echo '<h1 style="float:center;">Todays Orders</h1>';
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Block Number</th>";
    echo "<th>Dorm Number</th>";
    echo "<th>Food title</th>";
    echo "<th>Food price</th>";
    echo "<th>Alert</th>";
    
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the column values using the column names
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $phoneNumber = $row["phone_number"];
        $blockNumber = $row["block_number"];
        $dormNumber = $row["dorm_number"];
        $food_title = $row["food_title"];
        $food_price = $row["food_price"];
        $Alert = $row["Alert"];

        // Display the values (you can modify this as per your requirement)
        echo "<tr>";
        echo "<td>" . $firstName . "</td>";
        echo "<td>" . $lastName . "</td>";
        echo "<td>" . $phoneNumber . "</td>";
        echo "<td>" . $blockNumber . "</td>";
        echo "<td>" . $dormNumber . "</td>";
        echo "<td>" . $food_title . "</td>";
        echo "<td>" . $food_price . "</td>";
        echo "<td>";
echo "<form method='POST'>";
echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
echo "<button type='submit' name='update_delivery' value='1'>" . $row['Alert'] . "</button>";
echo "</form>";
echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No rows found in the 'worders' table.";
}


// Assuming you've already established a database connection

if (isset($_POST['update_delivery'])) {
  $id = $_POST['id'];

  // Update the value in the 'worders' table
  $sql = "UPDATE worders SET Alert = 'Alerted' WHERE id = '$id'";

  // Execute the query
  if (mysqli_query($conn, $sql)) {
    echo "Delivery status updated successfully.";
  } else {
    echo "Error updating delivery status.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
