<?php

include("conn/connect.php");

error_reporting(0);
session_start();

if(isset($_SESSION['u_id'])) // if already signed in
{
    header("refresh:0;url=profile.php"); // redirects to profile.php; should redirect to store in the future
}

if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $loginquery = "SELECT * from users where email='$email' && password='".md5($password)."';";
    $result = $db -> query($loginquery);
    $rows = mysqli_fetch_array($result);

    if (is_array($rows))
    {
        $_SESSION["u_id"] = $rows['u_id'];

        echo "<script type='text/javascript'>alert('Logged in');</script>";
        header("refresh:0;url=profile.php"); // redirects to profile.php; should redirect to store in the future
    }
    else
    {
        echo "<script type='text/javascript'>alert('Invalid credentials!');</script>";
        header("refresh:0");
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>UPDiet</title>
    </head>
    
    <body>
        <p>Login</p>
        <form method="post" action="">
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" name="submit" value="Signup" id="submit"><br>
        </form>
        <p id="errorMsg"></p>
        <br>
        <p>Sign up <a href="index.php">here</a>.</p>
    </body>
</html>
