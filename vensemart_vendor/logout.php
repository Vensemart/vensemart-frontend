<?php
ob_start();
include("lib/config.php");
$user_id=$_SESSION['user_id'];
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set last_login_date=NOW(),current_login_status='Logout' where user_id='$user_id'");
unset($_SESSION['user_id']);
unset($_SESSION['userpanel_User_Name']);
unset($_SESSION['User_Type']);
unset($_SESSION['cart_products']);
session_destroy();
header("location:franchisepanel/login.php?msg=You are logout now!");
?>