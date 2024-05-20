<?php
session_start();
include 'connection.php';
?>
<?php

if(isset($_POST["login"])){
  $query = "SELECT username, password, description FROM users";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
  
      $users = [];
      while ($row = $result->fetch_assoc()) {
          $users[] = $row;
      }
$username = $_POST["username"]; 
$password = $_POST["password"];

foreach ($users as $user) {
  if ($user["username"] === $username && $user["password"] === $password) {
    $_SESSION['username']=$username;
      
      switch ($user["description"]) {
        case "Admin":
            header("Location:adminhome.php");
            exit;
        case "regular":
            header("Location:customerhome.php");
            exit;
        case "manager":
            header("Location:managerhome.html");
            exit;
        case "non-cafe":
            header("Location:customerhome.php");
            exit;
        case "waiter":
            header("Location:waiterviewhistory.php");
            exit;
        case "kitchen":
            header("Location:kitchenhome.php");
            exit;
            case "cashier":
              header("Location:cashierhome.php");
              exit;
    }
  }
}
echo " <script> alert('Invalid username or password. Please try again.') </script>";
}
}

?>
 
      
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>LMS </title>
    <style>


body{
  background-image: url("images/loginbg.jpg");
  display: flex;
  align-items: right;
  justify-content: center;
  padding: 30px;
}
.container{
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
}
.container .cover{
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
}
.container #flip:checked ~ .cover{
  transform: rotateY(-180deg);
}
 .container .cover .front,
 .container .cover .back{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.cover .back{
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover::before,
.container .cover::after{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: #7d2ae8;
  opacity: 0.5;
  z-index: 12;
}
.container .cover::after{
  opacity: 0.3;
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover img{
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}
.container .cover .text{
  position: absolute;
  z-index: 130;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.cover .text .text-1,
.cover .text .text-2{
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}
.cover .text .text-2{
  font-size: 15px;
  font-weight: 500;
}
.container .forms{
  height: 100%;
  width: 100%;
  background: #fff;
}
.container .form-content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form{
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #7d2ae8;
}
.forms .signup-form  .title:before{
  width: 20px;
}
.forms .form-content .input-boxes{
  margin-top: 30px;
}
.forms .form-content .input-box{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #7d2ae8;
}
.form-content .input-box i{
  position: absolute;
  color: #7d2ae8;
  font-size: 17px;
}
.forms .form-content .text{
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a{
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input{
  color: #fff;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
  background: #5b13b9;
}
.forms .form-content label{
  color: #5b13b9;
  cursor: pointer;
}
.forms .form-content label:hover{
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text{
  text-align: center;
  margin-top: 25px;
}
.container #flip{
  display: none;
}
@media (max-width: 730px) {
  .container .cover{
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form{
    width: 100%;
  }
  .form-content .signup-form{
    display: none;
  }
  .container #flip:checked ~ .forms .signup-form{
    display: block;
  }
  .container #flip:checked ~ .forms .login-form{
    display: none;
  }
}
    </style>
   </head>
<body>

  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/abyssinian_kitchen.0.0.jpg" alt="">
        <div class="text">
          <span class="text-1">Food is our common ground <br> a universal experience that transcends borders.</span>
    
        </div>
      </div>
      <div class="back">
        <div class="text">
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your username" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
              <div class="text"><a href="index.html">return to home?</a></div>
              <div class="button input-box">
                <input type="submit" value="login" name="login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>

        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your first name" name ="first_name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your last name" name ="last_name"required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your username" name ="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" name='submit'>
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
      <?php
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
 

    $query = "SELECT * FROM users WHERE username = '$username'";
    // Check if the username exists
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Display an alert for existing username
        echo "<script>alert('Username already taken.');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $username, $password);

        // Execute and check for success
        if ($stmt->execute()) {
            // Display an alert for successful signup
            echo "<script>alert('Signed up successfully.');</script>";
        } else {
            // Display an alert for database error
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
}
?>


    </div>
    </div>
    </div>
  </div>
</body>
</html>