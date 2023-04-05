<?php
	include("../lib/config.php");

	//check we have username post var
	if(isset($_POST["user"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$userid =  strtolower(trim($_POST["user"])); 
	//sanitize username
	$userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM poc_registration WHERE (user_id='$userid' or username='$userid')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_assoc($results);
	//if value is more than 0, username is not available
	if(!$username_exist) {
	echo "<font color='#FF0000'><strong>"."  PUC Not Available !"."</strong></font>";
	}else{
	echo "<font color='#009999'><strong>".  $row_ref['username']."! [Fullname: ".$row_ref['first_name']." ".$row_ref['last_name']." ]</strong></font>";
	}
	//close db connection
	}
?>