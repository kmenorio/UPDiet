<?php

include("../conn/connect.php");

error_reporting(0);
session_start();

if(isset($_SESSION['u_id'])) // if already signed in
{
    header("location:profile.php"); // redirects to profile.php; should redirect to store in the future
}

if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $emailquery = "SELECT * from users where email='$email';";
    $result = $db -> query($emailquery);
    $rows = mysqli_fetch_array($result);

    if(is_array($rows)) // if email exists
    {
        $_SESSION['u_error'] = "Email is already taken!";
    }
    else
    {
        $signupquery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '".md5($password)."');";
        $result = $db -> query($signupquery);
        
        $loginquery = "SELECT * from users where email='$email' && password='".md5($password)."';";
        $result = $db -> query($loginquery);
        $rows = mysqli_fetch_array($result);
        
        $_SESSION["u_id"] = $rows['u_id'];

        header("location:profile.php"); // redirects to profile.php; should redirect to store in the future
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create an account</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Create an account">
        <meta name="description" content="Signup page for UPDiet website">

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/signup.css">
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
                    <img src="../img/logo.png" />
                    <p class="l1">it's not just <span>Food</span></p>
                    <p class="l2">it's an <span>Experience</span></p>
                </div>
                <div class="buttons">
                    <div class="order">
                        <button class="order-button">Order Now</button>
                    </div>
                    <div class="watch">
                        <button class="watch-button"><img src="../img/play.png" /></button>
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
                            <img src="../img/user.png" />
                            <a href="signup.php">Sign Up</a>
                        </div>
                    </div>
                    <div class="header-login">
                        <div>
                            <img src="../img/login.png" />
                            <a href="../index.php">Login</a>
                        </div>
                    </div>
                </div>
                <div class="signup-field">
                    <input type="text" name="username" id="username" maxlength="16" placeholder="Username" required>
                    <p>?<span class="tooltip">Max of 16 alphanumeric characters.</span>
                </div>
                <div class="signup-field">
                    <input type="text" placeholder="UP Mail" name="email" id="email" required>
                    <p>?<span class="tooltip">Emails ending in 'up.edu.ph' only.</span>
                </div>
                <div class="signup-field">
                    <input  id="password" type="password" placeholder="Password" name="password" maxlength="16" required>
                    <p>?<span class="tooltip">Max of 16 alphanumeric characters.</span>
                </div>
                <p class="error" id="error"><?php if(isset($_SESSION['u_error'])){echo $_SESSION["u_error"]; unset($_SESSION["u_error"]);} ?></p>
                <input class="submit" type="submit" name="submit" value="Sign Up" id="submit" disabled="disabled">
            </form>
        </div>
        <div class="flair">
        </div>
        <script src="../js/usignup.js"></script>
    </body>
</html>
