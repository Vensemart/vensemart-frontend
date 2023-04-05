<?php
ob_start();
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security

$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$rand=rand(0,1000000);
$userid=$_GET['user'];
$id=$_GET['id'];

//echo $userid; echo $id; die();

$date=date("Y-m-d");

$withdrawalamt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from 	withdraw_request_fip where id='".$id."'"));
$reqamount = $withdrawalamt['total_paid_amount'];


$selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from 	investment_profit_wallet where user_id='".$userid."'"));
$totalamount=$selecting['amount'];
$totalamount=$totalamount+$reqamount; 

mysqli_query($GLOBALS["___mysqli_ston"],"update 	investment_profit_wallet set amount='$totalamount' where user_id='$userid'");

mysqli_query($GLOBALS["___mysqli_ston"],"update 	withdraw_request_fip set status='2',admin_remark='Withdrawal Cancelled',admin_response_date='$date' where id='$id'");

mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) VALUES (NULL, '$rand', '$userid', '$reqamount', '0', '0', '$userid', '123456', '$date', 'Withdrawal Cancelled', 'Withdrawal Cancelled From Admin', '0', 'Withdrawal Cancelled', '$rand', 'Withdrawal Cancelled', '0', 'Investment Profit Wallet','$urls')");

header("location:fip-open-withdrawal-request.php?msg=Withdrawal Request Cancelled!");

?>