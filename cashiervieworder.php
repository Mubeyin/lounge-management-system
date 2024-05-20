<?php
session_start();
include 'connection.php';
$sql1 = "SELECT * FROM lorders";

// Execute the query
$result1 = mysqli_query($conn, $sql1);

// Check if any rows were returned
if (mysqli_num_rows($result1) > 0) {
    echo '<h1 style="float:center;">Orders from the Lounge</h1>';
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Food title</th>";
    echo "<th>Food price</th>";
    echo "<th>Approval</th>";
    echo "<th>Alert</th>";
    echo "<th>Delivery</th>";
    echo "<th>who delivered</th>";
    
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result1)) {
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $phoneNumber = $row["phone_number"];
        $food_title = $row["food_title"];
        $food_price = $row["food_price"];
        $approval1 = $row["approval"];
        $Alert = $row["Alert"];
        $delivery = $row["delivery"];
        $who = $row["who"];

        echo "<tr>";
        echo "<td>" . $firstName . "</td>";
        echo "<td>" . $lastName . "</td>";
        echo "<td>" . $phoneNumber . "</td>";
        echo "<td>" . $food_title . "</td>";
        echo "<td>" . $food_price . "</td>";
        echo "<form method='POST'>";
        echo "<p id='button1'><button onclick='document.getElementById(\"button1\").innerHTML=\"approved\"' type='submit' name='update_delivery' value='1' id='button1'>$approval1</button></p>";
        echo "</form>";
        echo "<td>" . $delivery . "</td>";
        echo "<td>" . $who . "</td>";
        echo "</tr>";
    }
} else {
    echo "No rows found in the 'worders' table.";
}
if (isset($_POST['update_delivery'])) {
    $stmt1 = "UPDATE lorders SET approval = 'approved' ";
    // Execute the queries
    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $stmt1)) {
        echo "<script>alert('Approval status updated successfully.')";"</script>";
    } else {
        echo "Error updating approval status.";
    }
}
// Close the database connection
mysqli_close($conn);
?>

<hr>
<?php
include 'connection.php';

// Select all rows from the 'worders' table
$sql = "SELECT * FROM worders";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    echo '<h1 style="float:center;">Orders from the campus</h1>';
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Block Number</th>";
    echo "<th>Dorm Number</th>";
    echo "<th>Food title</th>";
    echo "<th>Food price</th>";
    echo "<th>Approval</th>";
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
        $approval = $row["approval"];
        $delivery = $row["delivery"];
        $who = $row["who"];

        echo "<tr>";
        echo "<td>" . $firstName . "</td>";
        echo "<td>" . $lastName . "</td>";
        echo "<td>" . $phoneNumber . "</td>";
        echo "<td>" . $blockNumber . "</td>";
        echo "<td>" . $dormNumber . "</td>";
        echo "<td>" . $food_title . "</td>";
        echo "<td>" . $food_price . "</td>";
        echo "<form method='POST'>";
        echo "<p id='button'><button onclick='document.getElementById(\"button\").innerHTML=\"approved\"' type='submit' name='update_delivery' value='1' id='button'>$approval</button></p>";
        echo "</form>";
        echo "<td>" . $delivery . "</td>";
        echo "<td>" . $who . "</td>";
        echo "</tr>";
    }
} else {
    echo "No rows found in the 'worders' table.";
}
if (isset($_POST['update_delivery'])) {

    // Update the value in the 'worders' table
    $stmt = "UPDATE worders SET approval = 'approved' ";
    // Execute the queries
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $stmt)) {
        echo "<script>alert('Delivery status updated successfully.');</script>";
    } else {
        echo "Error updating delivery status.";
    }
}
// Close the database connection
mysqli_close($conn);
?>