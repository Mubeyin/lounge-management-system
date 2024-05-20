<?php
include 'connection.php';
$sql = "SELECT * FROM users";
$sql2 = "SELECT * FROM employee";
$result = $conn->query($sql);
$result2= $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet"  href="admin.css">
   
</head>
<body>
   
    
<div class="header">
<div>
    <img src="images/wculogo.jpg" alt="" style="width: 60px; height: 60px;">
</div>

<div class="right-section">
    <a class="home" href="">Home</a>
    <a class="orders" href="">Orders</a>
    <a class="logout" href="logout.php">Logout</a>
    
</div>

    </div>
       

    <div class="usertasks">
   
    <ul>
 
        
        <h2 style="text-align: left;">what do you want to do?</h2>
        <a href="managerviewemployee.php">View employee information</a><br><br>
        <a href="managerviewusers.php">View users information</a><br><br>
    <a href="managervieworder.php">View Order histories</a><br><br>
    <a href="managermanipulatemenu.php">Manipulate Menu</a><br><br>
    <a href="">View comments</a><br><br>
    <h3>Manage User:</h3>
    <a href="managerregisteremployees.php" target="_blank">Register users</a><br><br>
    <a href="updateaccount.php">Update Account</a><br><br>
    <a href="SearchUser.html" target="_blank">Search Users</a><br><br>
    <h3>Generate Reports:</h3>
    <a href="">Daily Reports</a><br><br><br><br><br><br>

    </ul>
    

</div>
    <div class="larger">
   
    
   </div>
    <h1>User Information</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>username</th><th>password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>

    
</div>
    
   
    
 
     <hr>
    
     
     
     <footer class="footer">
        <div style="display: inline-block; margin-right: 120px;
            
        ">
            <p>USEFUL Link</p>
            <a style="color: white;"  href="">About US</a><br><br>
            <a style="color: white;"  href="">Contact US</a><br><br>
            <a style="color: white;"  href=""> comment</a><br><br>
        </div>
        <div style="display: inline-block;
             margin-right: 100px;
        ">
            <p>WCU LOUNGES</p>
            <a style="color: white;" href="">About US</a><br><br>
            <a style="color: white;"  href="">Contact US</a><br><br>
            <a style="color: white;"  href=""> comment</a><br><br>

        </div>
        <div style="display: inline-block;">
      <p>Follow Us On</p>
      <a style="color: white;" href="">Facebook</a><br><br>
      <a style="color: white;" href="">Whatsap</a><br><br>
      <a style="color: white;" href="">Twitter</a><br><br>
        </div>
     </footer>
</body>
</html>
