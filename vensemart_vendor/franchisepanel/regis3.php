<?php
	include("../lib/config.php");
	$_SESSION['sponsorid']=$_POST['sponsorid'];
	//check we have username post var
	if(isset($_POST["sponsorid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$sponsorid =  strtolower(trim($_POST["sponsorid"])); 
	//sanitize username
	$sponsorid = filter_var($sponsorid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' or username='$sponsorid') and  user_status='0')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_assoc($results);
	//if value is more than 0, username is not available
	if(!$username_exist) {
	echo "<font color='#FF0000'><strong>"."  Sponsor Not Available !"."</strong></font>";
	}else{
	echo "<font color='#009999'><strong>".  $row_ref['first_name']." ". $row_ref['last_name']." is your sponsor !</strong></font>";
	}
	//close db connection
	}
?>