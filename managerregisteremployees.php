<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background: #5b13b9;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background: #7d2ae8;
        }
        .right-section{
            align-items: right;
            float: right;
             color: white;
             margin-left:10px;
        }
        .form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-control {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

select.form-control {
  height: 38px;
}

input[type="submit"] {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #0e3854;
  color: #fff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0c2c46;
}
    </style>
</head>
<body>
<div class="right-section">
    <a class="home" href="customerhome.php">Home</a>
    <a class="orders" href="managervieworder.php">Orders</a>
    <a class="logout" href="logout.php">Logout</a>
    
</div>
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
          
            <div class="form-group">
                <label>Full Address:</label>
                <input type="text" class="form-control" name="adress" required>
            </div>
            <div class="form-group">
                <label>Sex:</label>
                <select name="sex" class="form-control" name="sex" required>
                    <option >Select Sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Register as:</label>
                <select class="form-control" name="description" required>
                    <option value="">Please Select</option>
                    <option value="waiter" >Waiter</option>
                    <option value="kitchen">Kitchen</option>
                    <option value="cashier">Cashier</option>
                 
                </select>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label>City:</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <label>salary:</label>
                <input type="text" class="form-control" name="salary" required>
            </div>
            <div class="form-group">
                <label>UserName:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="register" value="Register">
            </div>
        </form>
    </div>
    <?php
if (isset($_POST['register'])) {
    // Use $_POST to get form data
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $adress = $_POST['adress'];
    $sex = $_POST['sex'];
    $description = $_POST['description'];
    $phone_number = $_POST['phone'];
    $city = $_POST['city'];
    $salary = $_POST['salary'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $sql = $conn->prepare("INSERT INTO employee (first_name, last_name, full_adress, sex, description, phone_number, salary, city, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt = $conn->prepare("INSERT INTO users (first_name,last_name,username, password, description) VALUES (?, ?, ?, ?,?)");
    $sql->bind_param("ssssssssss", $first_name, $last_name, $adress, $sex, $description, $phone_number, $salary, $city, $username, $password);
    $stmt->bind_param("sssss", $first_name,$last_name, $username, $password, $description);

    // Execute and check for success
    if ($sql->execute() && $stmt->execute()) {
        echo "Registered successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $sql->close();
    $stmt->close();
}
?>

</body>
</html>
