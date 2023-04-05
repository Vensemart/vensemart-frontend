<?php
ob_start();
include("lib/config.php");
$user_id=session_id();

unset($user_id);
session_destroy();
header("location:franchisepanel/login.php?msg=You are logout now!");
?>