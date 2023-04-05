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



$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name!='Free User' && user_status='0' ");

while($rds=mysqli_fetch_array($rd)){
   $uid  = $rds['user_id'];
  $bakipair_left=0;
  $bakipair_right=0;
  $lefts=0;
  $rights=0;
  $lesser_bv=0;

$right_carry_total=0;
$left_carry_total=0;
$lefts=0;
    $rights=0;
  $vccunt=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$uid'"));
   

 
if($vccunt>=2)
{

   $uid_ref=$rds['ref_id'];
  $querys1  = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalleftamount from manage_bv_history where status='0' and income_id='$uid' and position='left' and date<='$end'"));
  $leftamt1  = $querys1['totalleftamount'];

  $querys12   =   mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalrightamount from manage_bv_history where status='0' and income_id='$uid' and position='right' and date<='$end'"));
  $rightamt1   = $querys12['totalrightamount'];

if (100<=$leftamt1 && 100<=$rightamt1) {

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

 



  mysqli_query($GLOBALS["___mysqli_ston"], "update manage_bv_history set status='1' where date<='$date' and income_id='$uid'");



if($leftamt1>0)
{

 mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$uid','$uid','1','$leftamt1','left','1','Carry Forward BV','$date',CURRENT_TIMESTAMP,'0','$leftamt1')");
}
if($rightamt1>0)
{
mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$uid','$uid','1','$rightamt1','right','1','Carry Forward BV','$date',CURRENT_TIMESTAMP,'0','$rightamt1')");
}


  $match = $lesser_bv;
  $lesser_bv = $lesser_bv;
   $carry = $carry;



  if($lesser_bv>0){
    
  

           mysqli_query($GLOBALS["___mysqli_ston"], "insert into matching_binary values(NULL,'','$lesser_bv','$end','$carry','$uid','$leftamt1','$rightamt1','0')");

      }
    

    
  
  
}
}
}










$start=$fdate;
$end = $edate;



$total_matching=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(bp) as amt from matching_binary where matching_binary.date='$end'"));




   $companyturn=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as newsum from eshop_purchase_detail where   product_type!='Repurchase Product' and pay_status=1  and purchase_date>='$start' and purchase_date<='$end'"));
$companyturn11=$companyturn['newsum']*4000;
   $companyturnover=$companyturn11;

$rd=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matching_binary where date='$end' and status=0");
while($rds=mysqli_fetch_array($rd))
{
   $uid=$rds['user_id'];
$self=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT bp  from matching_binary where id='".$rds['id']."' and  matching_binary.date='$end' and  status=0"));

 $ttlmtch=$total_matching['amt'];

 $gi=$companyturnover/$total_matching['amt'];
// if ($gi>1000) {
 
// }else{
//   $gi=$gi/100;
// }
 $gi=10;
$resdt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_id='$uid'"));
    $final_amt=$self['bp']*$gi;
      
     $capping=0;
    if ($resdt['capping_slab']==1) {
      $capping=50000;
    }elseif ($resdt['capping_slab']==2) {
      $capping=100000;
    }elseif ($resdt['capping_slab']==3) {
      $capping=200000;
    }

    if ($final_amt>$capping) {
 $amount1=$capping;
}else{
 $amount1=$final_amt; 
}
    

    if($resdt['id_no']!=''){
    $charge=$amount1*3.75/100;
    $per=3.75;
    }else{
      $charge=$amount1*3.75/100;
      $per=3.75;
    }


$total_amt=$amount1-$charge;
 mysqli_query($GLOBALS["___mysqli_ston"], "update matching_binary set gi='$amount1',status='1' where  id='".$rds['id']."'");
    if($total_amt>0)
    {
       if($resdt['repurchase_status']==1){
$invoice_no=rand(100000,999999);
     mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$total_amt','0','$charge','$uid','Admin','".date('Y-m-d')."','Binary Income','Binary Income','Binary Income','".$gi."','$invoice_no','".$self['bp']."','1','Income Wallet',CURRENT_TIMESTAMP,'$per')");
   }else{
    $invoice_no=rand(100000,999999);
     mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$total_amt','0','$charge','$uid','Admin','".date('Y-m-d')."','Binary Income','Binary Income','Binary Income','".$gi."','$invoice_no','".$self['bp']."','2','Income Wallet',CURRENT_TIMESTAMP,'$per')");
   }
  }

  mysqli_query($GLOBALS["___mysqli_ston"], "insert into bv_rate values(NULL,'$end','$ttlmtch','$companyturnover','$gi')");
 }







header("location:cmsadmin/matching-income-closing-report.php?matching=$ttlmtch&turnover=$companyturnover&msg=Successfully !");
}
/*for after first pair code end here*/
//}


?>