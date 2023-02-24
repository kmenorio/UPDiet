<?php

include("conn/connect.php");

error_reporting(0);
session_start();

$loginquery = "SELECT * from users where u_id='".$_SESSION['u_id']."';";
$result = $db -> query($loginquery);
$rows = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>UPDiet</title>
    </head>
    
    <body>
        <p>Profile</p><br>
        <p>
            <?php
                echo $rows['username']
            ?>
        </p>
        <p>
            <?php
                echo $rows['email']
            ?>
        </p>
        <p>
            <?php
                echo $rows['password'] // placeholder, to change
            ?>
        </p><br>
        <a href="logout.php">Logout</a>
    </body>
</html>