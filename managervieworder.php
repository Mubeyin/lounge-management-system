<?php
session_start();
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
    echo "<th>Delivery</th>";
    echo "<th>who delivered</th>";
    
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
        $delivery = $row["delivery"];
        $who = $row["who"];
        // Display the values (you can modify this as per your requirement)
        echo "<tr>";
        echo "<td>" . $firstName . "</td>";
        echo "<td>" . $lastName . "</td>";
        echo "<td>" . $phoneNumber . "</td>";
        echo "<td>" . $blockNumber . "</td>";
        echo "<td>" . $dormNumber . "</td>";
        echo "<td>" . $food_title . "</td>";
        echo "<td>" . $food_price . "</td>";
        echo "<td>" . $delivery . "</td>";
        echo "<td>" . $who . "</td>";
        echo "</tr>";
    }
} else {
    echo "No rows found in the 'worders' table.";
}

// Close the database connection
mysqli_close($conn);
?>