<?php
include("../lib/config.php");
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from reload_pv");
while($res=mysqli_fetch_array($sql))
{
	$pv=$res['pv']*3;
	//echo "update reload_pv set rm='$pv' where id='".$res['id']."'";
	mysqli_query($GLOBALS["___mysqli_ston"], "update reload_pv set rm='$pv' where id='".$res['id']."'");
}
?>