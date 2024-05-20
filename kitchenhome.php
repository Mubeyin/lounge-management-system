<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kitchenhome</title>
    <link rel="stylesheet"  href="style2.css">
    <link rel="stylesheet"  href="footer.css">
    <style>

.usertasks {
    width: 15%;
    height: 45%;
    margin-top: -2.5%;
    padding: 0;
    text-align: left;
    background-color: #0e3854;
    border: 1px solid powderblue;
    display: inline-block;
    margin-left: 2%;
   
    position: absolute;
    top: 25%;
    left: 0;
    padding-left: 3%;
    padding-right: -1%;
    padding-top:2%;
}

.usertasks h2, .usertasks h3 {
    margin-bottom: 20px;
}

.usertasks ul {
    list-style-type: none;
    padding: 0;
}

.usertasks li {
    
    margin-bottom: 10px;
}

.usertasks a {
    margin-bottom: 10px;
    text-decoration: none;
    color:#ffffff;
}

.usertasks a:hover {
    text-decoration: underline;
}
    </style>
   
</head>
<body>
    <div class="header">
<div>
    <img src="images/wculogo.jpg" alt="" style="width: 70px; height: 70px;">
</div>

<div class="right-section">
    <a class="home" href="">Home</a>
    <a class="orders" href="kitchenviewhistory.php">Orders</a>
    <a class="logout" href="logout.php">Logout</a>
    
</div>

    </div>
    <h1 style="text-align: center;">Wellcome to kitchen home page</h1>
    <div class="usertasks">
    <h2 style="margin-left:%; color:orange;">What do you want to do?</h2>
    <ul>
        <li><a href="">View daily food Menu</a></li>
        <li><a href="managervieworder.php">View Order histories</a></li>
       
    </ul>
</div>
<img  style="margin-left:28%;height:100%;width:40%;"
        class="mangr_img" src="images/kitchen.avif" alt="kitchen_photo">
        </figure>
   
    
 
     <hr>
    
     <div class="footer">

<footer style=" background-color: #0e3854;">
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