<?php
    session_start();
include "connection.php";
if (isset($_SESSION["f_title"]) && isset($_SESSION["price"])) {
    $f_title = $_SESSION["f_title"];
    $price = $_SESSION["price"];
    if (isset($_POST['order_now'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $f_title = $_POST['fTile'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $payment = $_POST['photo'];
        $table = $_POST['table']; // Hidden field to store the selected table name

        // Insert data based on the selected address
        if ($address === 'wachemo university') {
            $blockNumber = $_POST['block_number'];
            $dormNumber = $_POST['dorm_number'];
            $gender = $_POST['sex'];
            // Insert into 'worders' table
            $sql = "INSERT INTO worders (first_name, last_name, sex, phone_number, block_number, dorm_number, food_title,payement)
                    VALUES ('$fname', '$lname', '$gender', '$phone', '$blockNumber', '$dormNumber', '$f_title', '$payment')";
        } elseif ($address === 'Lounge') {
            $tableNumber = $_POST['table'];

            // Insert into 'lorders' table
            $sql = "INSERT INTO lorders (first_name, last_name, phone_number, table_number, food_title, payment)
                    VALUES ('$fname', '$lname', '$phone', '$tableNumber', '$f_title', '$payment')";
        } else {
            // Handle other cases (if needed)
            $message = 'Invalid address selection.';
            echo "<script>alert('$message');</script>";
            exit;
        }

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            $message = 'Order placed successfully!';
            echo "<script>alert('$message');</script>";
        } else {
            $error = 'Error: ' . mysqli_error($conn);
            echo "<script>alert('$error');</script>";
        }
    }
}
    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order</title>
    <style type="text/css">
body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    color: #333;
    padding: 20px;
    line-height: 1.6;
    display: flex;           
    justify-content: center;    
    flex-direction: column;     
    min-height: 100vh;          
    margin: 0;              
}

h1, h2 {
    color: #2c3e50;
    text-align: center;         
}
form {
    background: #ffffff;
    padding: 20px;
    margin-top: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
    width: 100%;                
    max-width: 500px;      
    box-sizing: border-box; 
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

input[type="file"] {
    border: 1px solid #ccc;
    display: block;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 20px;
}

label {
    margin-top: 20px;
    display: block;
    font-weight: bold;
}

.form-group {
    margin-bottom: 15px;
}

.form-container {
    width: 100%;                
    max-width: 500px;            
    margin-top: 30px;
}
.anchors{
    display:inline;
    font-size:20px;
    align-items:right;
}

</style>

</head>
<body>
    <h1>Please fill in these fields</h1>
    <div class="anchor">
        <a style="float:right;margin-right:3px;" href="customerhome.php">AVAILABLES</a>
        <a style="float:right;margin-right:3px;" href="logout.php">Logout</a>
    </div>
    <form method="POST" class="form">
        <input type="text" name="fname" placeholder="Enter your first name" required> <br>
        <input type="text" name="lname" placeholder="Enter your last name" required> <br>
        <input type="text" name="fTile" placeholder="Enter the food title" required> <br>
        <div class="form-group">
            <select name="sex" class="form-control" required>
                <option>Select Sex</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <label for="address">Select your address:</label>
        <select id="address" name="address" onchange="showInputField()" required>  
            <option value="Lounge">Lounge</option>
            <option value="wachemo university">Wachemo University</option>
        </select> <br>
        <input type="text" name="phone" placeholder="Enter your phone number" required>
        <div id="inputFieldContainer" style="display: none;">
            <input type="text" id="block" name="block_number" placeholder="Enter your block number"> <br>
            <input type="text" id="dorm" name="dorm_number" placeholder="Enter your dorm or room number">
        </div>
        <input type="number" name="table" placeholder="Enter table number" id="tablen">

        <div class="form-container">
            <h2>Payment Form</h2>
            <div id="payment-form">
                <div class="form-group">
                    <label for="bank">Choose Payment Method:</label>
                    <select id="bank" name="bank">
                        <option value="CBE">CBE : 1000....</option>
                        <option value="TELEBIRR">Tele-Birr : 092345....</option>
                        <option value="OTHER">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Upload Payment Screenshot:</label>
                    <input type="file" id="photo" name="photo" accept="image/*" required>
                </div>
            </div>
        </div>
        <input type="submit" name="order_now" value="Order">

    </form>
    

    <script>
        function showInputField() {
            var address = document.getElementById("address").value;
            var inputFieldContainer = document.getElementById("inputFieldContainer");
            var tablen = document.getElementById("tablen");

            if (address === "wachemo university") {
    inputFieldContainer.style.display = "block";
    tablen.disabled = true;
} else {
    inputFieldContainer.style.display = "none";
    tablen.disabled = false;
}
        }
    </script>
</body>
</html>