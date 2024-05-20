<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="images/orange-logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title> WACHEMO UNIVERSITY LOUNGE SERVICE SYSTEM</title>
   
<link rel="stylesheet" href="manipulate.css">
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="admin.css">
  <style>

    .form-group{
        margin-left: 25%;;
        margin: top 10px;;
    }
  </style>
</head>
<body>
<div class="header">
<div>
    <img src="images/wculogo.jpg" alt="" style="width: 60px; height: 60px;">
</div>

<div class="right-section">
    <a class="home" href="cashierhome.php">Home</a>
    <a class="orders" href="cashiervieworder">Orders</a>
    <a class="logout" href="logout.php">Logout</a>
    <a class="logout" href="cashierdelete.php">Delete Menu</a>
</div>

</div>
<form method="POST">
<div class="form-group">
<label class="col-md-3 control-lable">Food Title:</label>
<div class="col-md-6">
<input name="f_title" class="form-control" type="text" required/>
</div>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-lable">Food Image :</label>
<div class="col-md-6">
<input name="f_image" class="form-control" type="file" required/>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-lable">Food Price:</label>
<div class="col-md-6">
<input name="f_price" class="form-control" type="text" required/>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-lable">Food Description:</label>
<div class="col-md-6">
<textarea name="f_descrp" cols="19" rows="6" class="form-control"></textarea>
</div>
</div>
<div class="form-group">
<div class="col-md-6">
<input name="insert" value="Insert Food" type="submit" >
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_title = $_POST["f_title"];
    $f_price = $_POST["f_price"];
    $f_descrp = $_POST["f_descrp"];
    $f_image = $_POST["f_image"];

    $sql = "INSERT INTO foods (f_title, image, price, description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $f_title, $f_image, $f_price, $f_descrp);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

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
       
     </footer>
</div>
</body>

</html>