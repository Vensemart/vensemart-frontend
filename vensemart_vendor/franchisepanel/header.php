<?php
session_start();
include("../lib/config.php");
if(isset($_SESSION['puc_user_id']) && $_SESSION['puc_user_id'] != "")
{
	$idd = $_SESSION['puc_user_id'];
	$f=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where (user_id='$idd' OR username='$idd')"));
	$userimage = $f['image'];
	$userid=$f['user_id'];

	if($userimage !='' && file_exists('images/'.$userimage))
	{
		$userimage = 'images/'.$userimage;
	} 
	else
	{
		if($f['sex'] == 'male' || $f['sex'] == 'Male')
		{
			$userimage = "images/male.jpg";	
		}
		else if($f['sex'] == 'female' || $f['sex'] == 'Female')
		{
			$userimage = "images/female.jpg";		
		}
		else
		{
			$userimage = "images/male.jpg";	
		}
	}
}
else
{
	echo "<script language='javascript'>window.location.href='../logout.php';</script>";exit;
}
?>