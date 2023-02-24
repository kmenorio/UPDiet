<?php
session_start();
session_destroy(); // destroy all the current sessions

$url = 'login.php';
header('location:'.$url);

?>