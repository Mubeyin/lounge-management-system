<?php
include 'connection.php';

?>
<?php
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data in an HTML table
   

    while ($row = $result->fetch_assoc()) {
echo "<table border='1'>
<tr>
    <th>Comment ID</th>
    <th>username</th>
    <th>comment</th>
</tr>";

while ($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['comment'] . "</td>";
echo "</tr>";
}
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>