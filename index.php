<?php

include("conn/connect.php");

error_reporting(0);
session_start();

if(isset($_SESSION['u_id'])) // if already signed in
{
    header("location:user/profile.php"); // redirects to profile.php; should redirect to store in the future
}

if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $loginquery = "SELECT * from users where email='$email' && password='".md5($password)."';";
    $result = $db -> query($loginquery);
    $rows = mysqli_fetch_array($result);

    if(is_array($rows))
    {
        $_SESSION["u_id"] = $rows['u_id'];

        header("location:user/profile.php"); // redirects to profile.php; should redirect to store in the future
    }
    else
    {
        $_SESSION['u_error'] = "Invalid credentials.";
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Login">
        <meta name="description" content="Login page for UPDiet website">

        <link rel="icon" href="img/logo.png" type="image/png">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    
    <body>
        <div class="nav">
            <div class="nav-container">
                <div class="logo">
                    <span class="logo-u">U</span><span class="logo-p">P</span><span class="logo-diet">DIET</span>
                </div>
                <div class="navbar">
                    <a href="#" class="nav-home">Home</a>
                    <a href="#" class="nav-menu">Menu</a>
                    <a href="#" class="nav-contact">Contact</a>
                    <a href="#" class="nav-shop">Shop</a>
                </div>
                <div class="search">
                    <input type="text" name="search" id="search" placeholder="Search">
                </div>
            </div>
            <div class="nav-body">
                <div class="slogan">
                    <img src="img/logo.png" />
                    <p class="l1">it's not just <span>Food</span></p>
                    <p class="l2">it's an <span>Experience</span></p>
                </div>
                <div class="buttons">
                    <div class="order">
                        <button class="order-button">Order Now</button>
                    </div>
                    <div class="watch">
                        <button class="watch-button"><img src="img/play.png" /></button>
                        <p>Watch Video</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form">
            <form action="" method="post">
                <div class="form-header">
                    <div class="header-signup">
                        <div>
                            <img src="img/user.png" />
                            <a href="user/signup.php">Sign Up</a>
                        </div>
                    </div>
                    <div class="header-login">
                        <div>
                            <img src="img/login.png" />
                            <a href="index.php">Login</a>
                        </div>
                    </div>
                </div>
                <input type="text" placeholder="UP Mail" name="email" id="email" required>
                <input  id="password" type="password" placeholder="Password" name="password" required>
                <p class="error" id="error"><?php if(isset($_SESSION['u_error'])){echo $_SESSION["u_error"]; unset($_SESSION["u_error"]);} ?></p>
                <input class="submit" type="submit" name="submit" value="Login" id="submit">
            </form>
        </div>
        <div class="flair">
        </div>
        <script src="js/login.js"></script>
    </body>
</html>
