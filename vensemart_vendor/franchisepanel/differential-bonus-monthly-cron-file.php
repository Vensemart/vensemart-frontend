<?php
include("lib/config.php");
$date=date('Y-m-d');

    
$start = "2021-03-01";
 $end = "2021-03-31";
mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `user_registration` SET  pre_month_rank=designation,pre_month_slab=slab");

function find_personal_income_cummulative($user,$start,$end){
    $bv=0;
    //$amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(net_amount) as bv FROM `amount_detail` where user_id='$user' and payment_date>='$start' and payment_date<='$end'"));

    $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as bv FROM `amount_detail` where user_id='$user' and payment_date>='$start' and  payment_date<='$end'"));




    $bv=$amts1['bv'];
    if($bv==''){
      $bv=0;
    }else{
      $bv=$bv;  
    }
    return $bv;
}
                     



function find_team_income_cummulative($user,$start,$end)
{


$total_team_point=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT sum(am.pp) as teampurchase FROM `matrix_downline` as ur join amount_detail as am on am.user_id=ur.down_id  and ur.income_id='$user' and am.payment_date>='$start' and  am.payment_date<='$end'"));
   



        $tbv=$total_team_point['teampurchase'];
        if($tbv=='')
        {
          $tbv=0;
        }
        else
        {
          $tbv=$tbv;  
        }

        $allbv=$allbv+$tbv;

 
  return $allbv;
}







$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$check=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where receive_date between '$start' and '$end' and ttype='Performance Bonus'"));

if ($check<=0) {


//insert commission in user ewallet by fetching from level income table code start here
$rd=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name!='Free User' and user_id!='123456'");
while($rds=mysqli_fetch_array($rd))
{
$uid=$rds['user_id'];
$ref=$rds['ref_id'];
$user_slab=$rds['slab'];
if ($user_slab>0) {
$giver=$uid;
// $start=date('Y-m-')."01";
// $end=date('Y-m-')."31";
$finder_perosnal_bv=0;
$finder_team_bv=0;
$tbvs=0;

$finder_perosnal_bv=find_personal_income_cummulative($giver,$start,$end);
$finder_team_bv=find_team_income_cummulative($giver,$start,$end);
 $tbvs=$finder_perosnal_bv+$finder_team_bv;


   $ref_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_id='$ref' "));        
        $ref_slab=$ref_details['slab'];
if ($user_slab<$ref_slab) {
    

  $persentage=$ref_slab-$user_slab;






        $amount2=$tbvs*$persentage/100;
        if($amount2>0)
        {
              
        $amount12=$amount2;
      
        $invoice=$ref_details['user_id'].rand(10000000000,99999999999);


        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','".$ref_details['user_id']."','$amount12','0','0','".$ref_details['user_id']."','$uid','$end','Performance Bonus','Performance Bonus','$tbvs','$ref_slab','$invoice','$persentage','0','Income Wallet','$urls')");

      mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$amount12) where user_id='".$ref_details['user_id']."'");
        }

}
}
}






$rdasas=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name!='Free User'");
while($rdaas=mysqli_fetch_array($rdasas))
{
  $giver=$rdaas['user_id'];
  $wete=$rdaas['user_id'];

  $finder_perosnal_bv=find_personal_income_cummulative($giver,$start,$end);echo"<br>";
  $ref_slab=$rdaas['slab'];
 $amount2=$finder_perosnal_bv*$ref_slab/100;
        $tds=$amount2*0/100;
         $amount12=$amount2-$tds;
        $invoice=$ref_details['user_id'].rand(10000000000,99999999999);
if ($amount12>0) {
 
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','".$rdaas['user_id']."','$amount12','0','$tds','".$rdaas['user_id']."','".$rdaas['user_id']."','$end','Self Purchase Bonus','Performance Bonus Self','$finder_perosnal_bv','$ref_slab','$invoice','$persentage','0','Income Wallet','$urls')");
$wete=$rdaas['user_id'];
      mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$amount12) where user_id='".$wete."'");

}

}

}

/* for first pair code end here */





?>