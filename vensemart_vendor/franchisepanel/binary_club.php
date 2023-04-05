<?php
include("lib/config.php");
if (isset($_POST['submits'])) {
	
 $frm=$_REQUEST['from'];
 $til=$_REQUEST['to'];
$dfrom=explode("/",$frm);

$fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 

$dednd=explode("/",$til);
$edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];

$date=$edate;
//$start=date('Y-m-')."20";
$start=$fdate;
//$end=date('Y-m-')."25";
//$end = date('Y-m-d', strtotime($date. ' - 7 days'));
$end = $edate;
 $check=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where receive_date between '$start' and '$end' and ttype='Binary Income'"));

 //if ($check<=0) {


$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_rank_name='Affiliate' ");
while($rds=mysqli_fetch_array($rd)){
  $uid  = $rds['user_id'];
$bakipair_left=0;
$bakipair_right=0;
$lefts=0;
    $rights=0;
 
   $bakipair_left=0;
  $bakipair_right=0;
  $lefts=0;
  $rights=0;
  $lesser_bv=0;

$right_carry_total=0;
$left_carry_total=0;
$lefts=0;
    $rights=0;

  $uid_ref=$rds['ref_id'];
  $querys1  = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalleftamount from manage_bv_history where status='0' and income_id='$uid' and position='left' and date<='$end'"));
  $leftamt1  = $querys1['totalleftamount'];

  $querys12   =   mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalrightamount from manage_bv_history where status='0' and income_id='$uid' and position='right' and date<='$end'"));
  $rightamt1   = $querys12['totalrightamount'];
if($leftamt1>=100 && $rightamt1>=100)
{

$lesser_bv=0;
   while(($leftamt1>=100 && $rightamt1>=100)) {

if (100<=$leftamt1 && 100<=$rightamt1) {

 $left_carry_total=$leftamt1-100;
 $leftamt1=$left_carry_total;

 $right_carry_total=$rightamt1-100;
 $rightamt1=$right_carry_total;
$lesser_bv=$lesser_bv+100;
}
}

   $capping1     = $rds['capping'];
  $match    = $lesser_bv;
  $lesser_bv    = $lesser_bv;


    if($lesser_bv>0){

mysqli_query($GLOBALS["___mysqli_ston"], "update manage_bv_history set status='1' where date<='$date' and income_id='$uid'");
  if($left_carry_total>0){
    
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$uid','$uid','1','$left_carry_total','left','Carry Forward BV','$date',CURRENT_TIMESTAMP,'0','$left_carry_total')");

  }
    if($right_carry_total>0){
    
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$uid','$uid','1','$right_carry_total','right','Carry Forward BV','$date',CURRENT_TIMESTAMP,'0','$right_carry_total')");

  }

$rasaesdt1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_id='$uid'"));

$amount=$lesser_bv*10;

    if($amount > $capping1){
      $amount   =   $capping1;
      $cappingact=1;
    }else{
      $amount   = $amount;
      $cappingact=0;
    }

    $deduct   = $amount*5/100;
    $amount1   = $amount-$deduct;

// echo "Richa4";die();

   // if($resdt1==0){
    //    echo "Richa5";die();
      $invoice_no=$uid.rand(1001,9999);
      $rwallet=$amount1;
    
     
      if($rwallet!= '' && $rwallet!= 0){
          $urls   = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
//mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");

    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$rwallet','0','$deduct','$uid','Admin','$date','Binary Income','Binary Income','Binary Income','$amount','$invoice_no','$lesser_bv','1','Income Wallet',CURRENT_TIMESTAMP,'$urls')");

          
          }
    //}
  
}
}


}






header("location:cmsadmin/matching-income-closing-report.php?msg=Successfully !");
}
/*for after first pair code end here*/
//}


?>