<?php
session_start();
session_destroy(); // destroy all the current sessions

header('location:index.php');

?>