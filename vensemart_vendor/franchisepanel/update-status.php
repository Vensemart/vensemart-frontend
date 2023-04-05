<?php
ob_start();
include("../lib/config.php");

$id=$_GET['id'];
$status=$_GET['status'];
$issue_date=date("Y-m-d");

$amts11a	=	mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where am_id='$id'"));	

$urls 	=	"http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 $amts11=$amts11a['dp']*4/100;
mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set delst='1',dtdcno='1',delivery_date='$issue_date' where am_id='$id'");
$uid=$amts11a['puc'];
$invoice_no=$amts11a['invoice_no'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into puc_credit_debit values(NULL,'$invoice_no','$uid','$amts11','0','0','$uid','Admin','$issue_date','Sales Income','Sales Income','Sales Income','Sales Income','$invoice_no','".$amts11a['dp']."','1','Income Wallet',CURRENT_TIMESTAMP,'$urls')");
    
header("location:puc-purchaseinvoice-report.php?msg=Status Updated!");
?>