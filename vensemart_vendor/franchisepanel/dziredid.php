<?php
	include("../lib/config.php");
	$user=$_POST['userid'];
	$user_id=strlen($user);
	//check we have username post var
	if($user_id==6)
	{
	$userid =  strtolower(trim($_POST["userid"])); 
	//sanitize username
	$userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$userid1="AV".$userid;
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE user_id='$userid1' ");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) {
	
	echo "<font color='#009999'><strong> Userid  already exists</strong></font>";
	}else{
		
		echo "<font color='#009999'><strong> Congrats Userid Available !</strong></font>";
	}
	}
	else{
	echo "<font color='#009999'><strong>Please enter 6 digits Only!</strong></font>";
	}
?>