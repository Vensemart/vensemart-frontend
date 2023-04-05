<?php
include("../lib/config.php");

$country_id = $_POST["countryid"];
$userId=$_POST['userId'];

// $usercountdata="select * from poc_registration  where user_id='$userid'";
//  $user_countrykd=mysqli_query($GLOBALS["___mysqli_ston"],$usercountdata);
// $usercountdata_fetch=mysqli_fetch_array($user_countrykd);
// $result = mysqli_query($conn,"SELECT * FROM sub_category where cat_id = $category_id");
	
	$kd=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM states where country_id = $country_id and status='1'");

while($d=mysqli_fetch_object($kd))
{

    
    $result[]=$d;
}
	echo json_encode($result);
?>