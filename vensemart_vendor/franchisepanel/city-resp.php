<?php
 

include("../lib/config.php");
$s_id=$_POST['s_id'];

// $result = mysqli_query($conn,"SELECT * FROM sub_category where cat_id = $category_id");
	$kd=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cities WHERE state_id='".$s_id."' and status=1");


while($d=mysqli_fetch_object($kd))
{
    $result[]=$d;
}
	echo json_encode($result);
?>