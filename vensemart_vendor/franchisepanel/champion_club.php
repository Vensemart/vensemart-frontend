<?php
include("lib/config.php");
if (isset($_POST['submits'])) {

$leftamt1=0;
$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where direct_bv_ds>=100");

while ($rds = mysqli_fetch_array($rd)) {
  $leftamt1=0;
  $lesser_bv=0;
  $left_carry_total=0;
    $uid                = $rds['user_id'];
    $finder             = $rds['ref_id'];
    $leftamt1= $rds['direct_bv_ds'];
    if (100<=$leftamt1) {
    while(($leftamt1>=100)) {
if (100<=$leftamt1) {
$left_carry_total=$leftamt1-100;
$leftamt1=$left_carry_total;
$lesser_bv=$lesser_bv+100;
}
}
$invoice_no=rand(10000000,99999999);
$total_amount2=$lesser_bv*10;
$tds=$total_amount2*5/100;
$total_amount2=$total_amount2-$tds;
$date=date('Y-m-d');

  mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set direct_bv_ds=(direct_bv_ds-$lesser_bv) where  user_id='$uid'");      
mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$finder','$total_amount2','0','$tds','$finder','$uid','$date','Direct Sponsor','Direct Sponsor','$comm','".$rds['direct_bv_ds']."','$invoice_no','$lesser_bv','1','Payout Wallet',CURRENT_TIMESTAMP,'$urls')");
}
       
   }

header("location:cmsadmin/repurchase-matching-income-closing-report.php?msg=Successfully !");
}
?>