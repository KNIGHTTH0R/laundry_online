<?php 
session_start();
session_destroy();
header('Location: /laundry2/login.php');
?>