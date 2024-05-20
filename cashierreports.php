<?php
include 'connection.php';
echo "<h2>Report From The Lounge";
$sql1="SELECT first_name,last_name,table_number,food_title,food_price,approval,who FROM lorders WHERE approval='approved' AND delivery='delivered'";
$result1 = mysqli_query($conn, $sql1);

// Check if any rows were returned
if (mysqli_num_rows($result1) > 0) {
    echo '<h1 style="float:center;">Orders from the Lounge</h1>';
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Food title</th>";
    echo "<th>Food price</th>";
    echo "<th>Approval</th>";
    echo "<th>who delivered</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result1)) {
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $food_title = $row["food_title"];
        $food_price = $row["food_price"];
        $approval1 = $row["approval"];
        $who = $row["who"];
    }
    echo "<tr>";
        echo "<td>" . $firstName . "</td>";
        echo "<td>" . $lastName . "</td>";
        echo "<td>" . $food_title . "</td>";
        echo "<td>" . $food_price . "</td>";
        echo "<td>" . $approval1 . "</td>";
        echo "<td>" . $who . "</td>";
        echo "</tr>";
}
?>
<hr>

