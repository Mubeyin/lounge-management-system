<?php
session_start();
include 'connection.php'; // Make sure this file establishes the database connection

// Select all rows from the 'worders' table
$sql = "SELECT first_name, last_name, phone_number, block_number, dorm_number, food_title, food_price, delivery FROM worders";

// Execute the query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<h1 style="text-align: center;">Today\'s Orders from the campus</h1>';
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Block Number</th>";
    echo "<th>Dorm Number</th>";
   // echo "<th>Food Title</th>";
    //echo "<th>Food Price</th>";
    echo "<th>Delivery</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        // Access the column values using the column names
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $phoneNumber = $row["phone_number"];
        $blockNumber = $row["block_number"];
        $dormNumber = $row["dorm_number"];
      //  $foodTitle = $_SESSION["food_title"];
        //$foodPrice = $_SESSION["food_price"];
        $delivery = $row["delivery"];

        // Display the values
        echo "<tr>";
        echo "<td>$firstName</td>";
        echo "<td>$lastName</td>";
        echo "<td>$phoneNumber</td>";
        echo "<td>$blockNumber</td>";
        echo "<td>$dormNumber</td>";
       // echo "<td>$foodTitle</td>";
       // echo "<td>$foodPrice</td>";
        echo "<td>";
        echo "<form method='POST'>";
        echo "<p id='button'><button onclick='document.getElementById(\"button\").innerHTML=\"delivered\"' type='submit' name='update_delivery' value='1' id='button'>$delivery</button></p>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No rows found in the 'worders' table.";
}

if (isset($_POST['update_delivery'])) {
    // Assuming you've set $_SESSION['username'] elsewhere in your application
    $username = $_SESSION['username'];

    // Update the value in the 'worders' table
    $stmt = "UPDATE worders SET who = '$username' WHERE delivery = 'delivered'";
    $sql = "UPDATE worders SET delivery = 'delivered'";

    // Execute the queries
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $stmt)) {
        echo "<script>alert('Delivery status updated successfully.');</script>";
    } else {
        echo "Error updating delivery status.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
