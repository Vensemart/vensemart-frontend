<?php
include("includes/header.php");

$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$rand=rand(0,1000000);
$userid=$_GET['user'];
$id=$_GET['id'];

//echo $userid; echo "<br>"; echo $id; die();

$date=date("Y-m-d");

$withdrawalamt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from withdraw_request1 where id='".$id."'"));
$reqamount = $withdrawalamt['total_paid_amount'];


$selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from investment_wallet where user_id='".$userid."'"));
$totalamount=$selecting['amount'];
$totalamount=$totalamount+$reqamount; 

mysqli_query($GLOBALS["___mysqli_ston"],"update investment_wallet set amount='$totalamount' where user_id='$userid'");

mysqli_query($GLOBALS["___mysqli_ston"],"update withdraw_request1 set status='2',admin_remark='Withdrawal Cancelled By User',admin_response_date='$date' where id='$id'");

mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) VALUES (NULL, '$rand', '$userid', '$reqamount', '0', '0', '$userid', '$userid', '$date', 'Withdrawal Cancelled', 'Withdrawal Cancelled From User', '0', 'Withdrawal Cancelled', '$rand', 'Withdrawal Cancelled', '0', 'Investment Wallet','$urls')");

header("location:withdrawal-section1.php?msg=Withdrawal Request Cancelled!");

?>