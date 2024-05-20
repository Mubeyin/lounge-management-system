<?php
session_start();
include 'connection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customerhomepage</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="footer.css">
    <style>
    body{
        position: scroll;
    }    
        .grid-container {
           margin-left: 120px;
            display: grid;
            align-items:center;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px; 
            
        }

        .food-item {
            border-radius: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color:#f9f9f9;
        }

       
        .food-item img {

            width: 140px;
            height: 130px;
            //object-fit: cover;
        }

        .food-item div {
            
            margin: left 40px;
            font-size: 14px;
            margin-bottom: 5px;
        }

       
        .food-item a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        button{
            background-color: #04AA6D;
            border:1px none;
            padding:5px;
            border-radius:15%;
            color: white;
           color: white;
        }
        button:hover {
         background-color:white;
         color:green;
        
          cursor: pointer;
        }
        button:active{
            background-color:red;
            color:white;
        }
     a{
        color:white;
        margin:2px;
        font-size:20px;
     }
    </style>
</head>
<body>

<script>
        function orderNow(foodTitle, foodPrice) {
       
            alert("Order placed for: " + foodTitle + " (Price: $" + foodPrice + ")");
        }
    </script>
<div class="header">
<div>
    <img src="images/wculogo.jpg" alt="" style="width: 70px; height: 70px;">
    
</div>

<div class="right-section">
    <a class="" href="index.html">Home</a>
    <a class="" href="logout.php">Logout</a>
    
</div>

    </div>

<h1 style="text-align:center;"> WCU LOUNGE </h1>
 <h3 style="margin-left:60px;color:red;"><em>AVAILABLE FOODS:</em></h3>
 <?php
    $sql = "SELECT * FROM foods";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='grid-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='food-item'>
                    <img src='images/" . $row['image'] . "' alt='Food Image'>
                    <div>Title: " . $row['f_title'] . "</div>
                    <div>Price: $" . $row['price'] . "</div>
                    <div>Description: " . $row['description'] . "</div>
                    <form method='POST' action='order.php'>
                        <button type='submit' name='order_now'>Order Now</button>
                    </form>
                </div>";
                
                // Store the values in session variables
                $_SESSION["f_title"] = $row['f_title'];
                $_SESSION["price"] = $row['price'];

                if(isset($_POST['submit'])){
                    echo "<a href"
                }
        }
        echo "</div>";
    } else {
        echo "No food is inserted yet";
    }
?>   <div id="form" style="display:none;">

    
    </script>
     </div>
<div class="footer">

<footer>
        <div>
            <p>USEFUL Link</p>
            <a style="color: white;"  href="">About US</a><br><br>
            <a style="color: white;"  href="">Contact US</a><br><br>
            <a style="color: white;"  href=""> comment</a><br><br>
        </div>
        <div>
            <p>WCU LOUNGES</p>
            <a style="color: white;" href="">About US</a><br><br>
            <a style="color: white;"  href="">Contact US</a><br><br>
            <a style="color: white;"  href=""> comment</a><br><br>

        </div>
        <div>
      <p>GIVE COMMENT</p>
      <form action="" method="POST">
      <textarea placeholder="Send Your Comment Here" name="message"></textarea>
      <input class="sumit_btn" type="Submit" name="SubmitBtn" value="send">
      </form>
       <?php
       if (isset($_POST['SubmitBtn'])) {
        $uname = $_SESSION['username'];
        $comment = $_POST['message'];
       
       $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
        $stmt->bind_param("ss", $uname, $comment);
        if ($stmt->execute()) {
            // Display an alert for successful signup
            echo "<script>alert('your comment recieved successfully.');</script>";
        } else {
            // Display an alert for database error
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
       ?>
        </div>
     </footer>
</div>

     <script>
function showForm() {
    document.getElementById('form').style.display = 'unset';
}
</script>
</body>
</html>
