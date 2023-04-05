<?php
	include("../lib1/config.php");
	$_SESSION['username']=$_POST['username'];
	//check we have username post var
	if(isset($_POST["username"]))
	{
	//check if its an ajax request, exit if not
	  
	//try connect to db
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 
	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM user_registration WHERE (username='$username' || user_id='$username')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_assoc($results);
	//if value is more than 0, username is not available
	if($username_exist) {
	echo "<font color='#009999'><strong>".  $row_ref['first_name']." ".$row_ref['last_name']." Is Your User </strong></font>";
	}else{
	echo "<font color='#FF0000'><strong>"."  User Not Available"."</strong></font>";
	}
	//close db connection
	}
?>