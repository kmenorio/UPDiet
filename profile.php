<?php

include("conn/connect.php");

error_reporting(0);
session_start();

$loginquery = "SELECT * from users where u_id='".$_SESSION['u_id']."';";
$result = $db -> query($loginquery);
$rows = mysqli_fetch_array($result);

if(isset($_POST['submit']))
{
    if(isset($_POST['username']))
    {
        $username = $_POST['username'];
    
        $editquery = "UPDATE users SET username='$username' WHERE u_id='".$_SESSION['u_id']."';";
        $result = $db -> query($editquery);
    
        echo "<script type='text/javascript'>alert('Username updated');</script>";
        header("refresh:0");
    }
    elseif(isset($_POST['password']))
    {
        $password = $_POST['password'];
    
        $editquery = "UPDATE users SET password='".md5($password)."' WHERE u_id='".$_SESSION['u_id']."';";
        $result = $db -> query($editquery);
    
        echo "<script type='text/javascript'>alert('Password updated');</script>";
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
        <p>Profile</p><br>
        <p>
            <span id="dispUsername">
                <span id="txtUsername"><?php echo $rows['username'] ?></span>
                <button id="btnEditUsername">Edit username</button>
            </span>
            <form method="post" action="" hidden="hidden" id="formUsername">
                <input type="text" name="username" id="inpUsername" maxlength="10">
                <input type="submit" value="Save" name="submit" id="btnEditUsernameSave">
                <button type="button" id="btnEditUsernameCancel" >Cancel</button>
            </form>
        </p>
        <p><?php echo $rows['email'] ?></p>
        <p>
            <span id="txtPassword" hidden="hidden"><?php echo $rows['password'] ?></span>
            <button id="btnEditPassword">Edit Password</button>
            <form method="post" action="" hidden="hidden" id="formPassword">
                <label for="inpCurrentPassword">Current Password:</label><br>
                <input type="password"id="inpCurrentPassword"><br>
                <label for="inpNewPassword">New Password:</label><br>
                <input type="password" name="password" id="inpNewPassword"><br>
                <input type="submit" value="Save" name="submit" id="btnEditPasswordSave" disabled="disabled">
                <button type="button" id="btnEditPasswordCancel" >Cancel</button>
            </form>
        </p><br>
        <a href="logout.php">Logout</a>

        <script type="module" src="js/profile.js"></script>
    </body>
</html>