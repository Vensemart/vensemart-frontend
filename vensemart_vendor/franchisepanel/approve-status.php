<?php
ob_start();
 include("header.php");
 $User=$_GET['id'];
 $status=$_GET['status'];
$issue_date=date("Y-m-d");

$amount_usered=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where id='$User'"));
 $amount = $amount_usered['amount'];
  $paymode = $amount_usered['payment_mode'];
  $tranno = $amount_usered['tranno'];
if($status=='1'){
   
   // $selecting=mysql_fetch_array(mysql_query("select * from final_e_wallet where user_id='".$amount_usered['user']."'"));
		//$request_amount1=$selecting['amount']; 
	//	$request_amounts1=$request_amount1+$amount;
	
//mysql_query("update final_e_wallet set amount='$request_amounts1' where user_id='".$amount_usered['user']."'");



//mysql_query("INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`,`invoice_no`, `product_name`, `status`, `ewallet_used_by`) VALUES (NULL, '$tranno', '".$amount_usered['user']."', '$amount', '0', '0', '123456', '".$amount_usered['user']."', '".date("Y-m-d")."', 'Payment Approved', 'Payment Approved From Admin', '0', 'Payment Approved', '$tranno', 'Payment Approved', '0', 'Fund Wallet')");

mysqli_query($GLOBALS["___mysqli_ston"], "update paymentproof set status='$status' where id='$User'");


}

header("location:poc_pending_request.php?msg= Updated Successfully!");
?>