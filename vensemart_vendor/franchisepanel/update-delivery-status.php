<?php
 include("header.php");
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 

$id=$_GET['id'];
$invoice_no=$_GET['invoice_no'];

$status=$_GET['status'];
if ($id!='' && $status!='') {

mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set shipping_status='$status' where am_id='$id'");
header("location:purchaseinvoice-report.php?msg=Status Updated!");

}
?>