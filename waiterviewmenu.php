<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>waiterhome</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="footer.css">
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
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px;
    color:color;

}


.logo {
    display: flex;
    align-items: center;
}

.logo-image {
    width: 70px;
    height: 70px;
}

.right-section {
    display: flex;
    gap: 10px;
}

.right-section a {
    text-decoration: none;
    color: white;
}

.right-section a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="images/wculogo.jpg" alt="" class="logo-image">
    </div>

    <div class="right-section">
        <a class="home" href="">Home</a>
        <a class="orders" href="">Orders</a>
        <a class="logout" href="">Logout</a>
    </div>
</div>
<h2 style="text-align: center;">Wellcome to Cashier home page</h2>
<div class="usertasks">
    <h2 style="margin-left:%; color:orange;">What do you want to do?</h2>
    <ul>
        <li><a href="">View daily food Menu</a></li>
        <li><a href="managervieworder.php">View Order histories</a></li>
       
    </ul>
</div>
<img  style="margin-left:25%;height:100%;width:40%;"
        class="mangr_img" src="images/waiter11.jpg" alt="waiter_photo">
        </figure>
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