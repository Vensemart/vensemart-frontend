<?php
include("lib/config.php");
$end =date('Y-m-d');

$date=$end;
$expire=$end;
mysqli_query($GLOBALS["___mysqli_ston"], "insert into test_cron values(NULL,'Kamlesh','$date','Binary Income')");
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  $start="2021-02-01";
    $end="2021-02-28";
$check=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where receive_date between '$start' and '$end' and ttype='Direct Sponsorship Bonus'"));

if ($check<=0) {
//insert commission in user ewallet by fetching from level income table code start here
$rd=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_rank_name!='Free User' and user_id!='123456' order by id desc");
while($rds=mysqli_fetch_array($rd))
{
  
    $paying_id=$rds['user_id'];
    $rdss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt+admin_charge) as dfg from credit_debit where  credit_amt>0  and user_id='$paying_id' and receive_date>='$start' and  receive_date<='$end' and ttype!='Fund Transfer'"));


$amount=$rdss['dfg'];
 $ref_id=$rds['ref_id'];
$user_rank_name=$rds['user_rank_name'];
$amount1=$amount*10/100;
$date=date('Y-m-d');
$invoice_no=rand(10000000,99999999);
$withdrawal_commission=$amount1;
$rwallet=$withdrawal_commission;

    
if($withdrawal_commission!='' && $withdrawal_commission!=0 && $user_rank_name!='Free User' && $ref_id!='cmp')
        {

  $plansd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where ttype='Direct Bonus' and user_id='".$ref_id."' and invoice_no='$invoice_no'"));
if ($plansd==0) {
 // $deduct   = $amount1*5/100;
    $amount1   = $amount1-$deduct;


      mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$amount1) where user_id='".$ref_id."'");
        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref_id','$amount1','0','$deduct','$ref_id','$paying_id','$end','Direct Sponsorship Bonus','Direct Bonus','Direct Bonus','$amount','$invoice_no','".$rds['product_name']."','0','Income Wallet',CURRENT_TIMESTAMP,'$urls')");  

 
}

        
        
        
        
          
        }
        else
        {}
    
    }
}
echo "Closing Done";
?>