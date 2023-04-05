<?php  //delete page
include("../lib/config.php");
$id=$_GET['id'];
mysql_query("delete from manage_news where id='$id'");	
$_SESSION['admin_sess']="Deleted Successfull";
header("Location:manage_news.php");
?>
