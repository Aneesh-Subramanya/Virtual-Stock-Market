<?php
include 'connect.php';  
include 'head.php';
session_destroy();
header('location:signin.php');
include 'foot.php';
?>
