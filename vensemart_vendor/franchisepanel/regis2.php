<?php
	include("../lib/config.php");
	$_SESSION['username']=$_POST['sid'];
	//check we have username post var
	$nom=$_POST['sid'];
	if(isset($_POST["sid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$username =  strtolower(trim($_POST["sid"])); 
	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='$nom' or username='$nom')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records

	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$nom' or username='$nom') and  user_status='0')");
	$row_ref=mysqli_fetch_assoc($results);
	//if value is more than 0, username is not available
	if($username_exist) {
echo "<font color='#009999'><strong>".ucfirst($row_ref['username'])." is your Placement ID!<strong</font>";
	}else{
	echo "<font color='#FF0000'><strong>"."  Invalid user id selected  !"."</strong></font>";
	}
	//close db connection
	}
?>