<?php
include("../lib/config.php");
$category_id = $_POST["category_id"];

// $result = mysqli_query($conn,"SELECT * FROM sub_category where cat_id = $category_id");
	$kd=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM sub_category where cat_id = $category_id");


while($d=mysqli_fetch_object($kd))
{
    $result[]=$d;
}
	echo json_encode($result);
?>
