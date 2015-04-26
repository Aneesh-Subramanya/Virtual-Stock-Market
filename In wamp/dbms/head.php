<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
    <meta name="description" content="DBMS" />  
    <meta name="keywords" content="DBMS" /> 
    <link rel="shortcut icon" href="favicon (1).ico" type="image/x-icon"> 
    <title>Virtual Stock Market</title>  
    <link rel="stylesheet" href="forum.css" type="text/css">
    <link rel="stylesheet" href="basic.css" type="text/css" />
</head>
<body> 
<h1>Virtual Stock Market</h1>
    <div id="wrapper">
    <div id="menu">  
        <a class="item" href="/DBMS/indexer.php"><b>Home</b></a> -  
        <a class="item" href="/DBMS/profile.php"><b>View and Edit Profile</b></a> 
        <a class="item" href="/DBMS/port.php"><b>Manage Portfolio</b></a>
        <?php
		session_start();
        if(isset($_SESSION['signed_in']))  
    {  
        echo '<div style="float:right">Hello <a href="profile.php">'.strtoupper($_SESSION['user_name']).'</a> <b> <a href="signout.php" class="item">Sign out</a></b></div>';  
    }  
    else  
    {  
        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><a class = "item" href="signin.php">Sign in</a> or <a class = "item"  href="index.html">Create an account</a></b>';  
    }
?></div>
<div id="content">
