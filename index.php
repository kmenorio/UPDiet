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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $emailquery = "SELECT * from users where email='$email';";
    $result = $db -> query($emailquery);
    $rows = mysqli_fetch_array($result);

    if(is_array($rows)) // if email exists
    {
        echo "<script type='text/javascript'>alert('Email is already taken!');</script>";
        header("refresh:0");
    }
    else
    {
        $signupquery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '".md5($password)."');";
        $result = $db -> query($signupquery);
        
        $loginquery = "SELECT * from users where email='$email' && password='".md5($password)."';";
        $result = $db -> query($loginquery);
        $rows = mysqli_fetch_array($result);
        
        $_SESSION["u_id"] = $rows['u_id'];

        echo "<script type='text/javascript'>alert('Sign up successful');</script>";
        header("refresh:0;url=profile.php"); // redirects to profile.php; should redirect to store in the future
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>UPDiet</title>
    </head>

    <body>
        <p>Sign Up</p>
        <form method="post" action="">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" maxlength="10"><br>
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" name="submit" value="Signup" id="submit" disabled="disabled"><br>
        </form>
        <p id="errorMsg"></p>
        <br>
        <p>Have an account? Login <a href="login.php">here</a>.</p>
        <script src="js/index.js"></script>
    </body>
</html>
