<?php
include("lib/config.php");
$date=date('Y-m-d');



function find_personal_income_cummulative($user,$start,$end)
{
                                                    
    $bv=0;
    $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pv) as bv FROM `purchase_detail` where user_id='$user'"));
    $bv=$amts1['bv'];
    if($bv=='')
    {
      $bv=0;
    }
    else
    {
      $bv=$bv;  
    }
    return $bv;

}

function find_ternover_cummulative($user,$start,$end)
{
                                                    
    $turnbv=0;
    $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pv) as bv FROM `purchase_detail` where  purchase_date BETWEEN $start AND $end"));
    $turnbv=$amts1['bv'];
    if($turnbv=='')
    {
      $turnbv=0;
    }
    else
    {
      $turnbv=$turnbv;  
    }
    return $turnbv;

}
                     
function find_team_income_cummulative($user,$start,$end)
{
                                                    
    $allbv=0;

    $teambv=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$user'");
    while($teambv1=mysqli_fetch_array($teambv))
    {
        $down_id=$teambv1['down_id'];

        $tbv=0;
        if ($start!='' && $end!='') {
        $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pv) as tbv FROM `purchase_detail` where user_id='$down_id' and purchase_date BETWEEN $start AND $end"));
        }else{
        $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pv) as tbv FROM `purchase_detail` where user_id='$down_id'"));
        }
       $tbv=$amts1['tbv'];
        if($tbv=='')
        {
          $tbv=0;
        }
        else
        {
          $tbv=$tbv;  
        }

        $allbv=$allbv+$tbv;
    }

  return $allbv;
}










function find_team_income_first_ref_this_month($user)
{
   $uid=$user;                                                 
 
    $start='';
  $end=''; 
   $direct_mem=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id from user_registration where user_id IN (SELECT down_id FROM level_income_binary WHERE income_id = '$uid' AND leg = 'left' and level='1') and ref_id='$uid' and user_rank_name='Affiliate'"));

                                

$finder_team_right=find_team_income_cummulative($direct_mem['user_id'],$start,$end);

return $finder_team_right;

}







function find_team_income_second_ref_this_month($user)
{
   $uid=$user;                                                    
 $start='';
  $end=''; 
    $direct_mem=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id from user_registration where user_id IN (SELECT down_id FROM level_income_binary WHERE income_id = '$uid' AND leg = 'right' and level='1') and ref_id='$uid' and user_rank_name='Affiliate'"));
                             

$finder_team_left=find_team_income_cummulative($direct_mem['user_id'],$start,$end);
return $finder_team_left;
}


$start_date = date('Y-m-')."01";
$end_date = date('Y-m-'."31");


$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

//insert commission in user ewallet by fetching from level income table code start here
$rd=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name!='Free User' and user_id='123456'");
while($rds=mysqli_fetch_array($rd))
{
$uid=$rds['user_id'];
$user_rank_name=$rds['user_rank_name'];

$finder=$uid;



$finder_perosnal_bv=0;
$finder_team_bv=0;
$tbvs=0;
$finder_slab=0;

 $finder_perosnal_bv=find_personal_income_cummulative($finder,$start,$end);
 $finder_team_bv=find_team_income_cummulative($finder,$start,$end);
$turn_over_bv=find_ternover_cummulative($finder,$start,$end);
$first_ref_team_bv_this_month=find_team_income_first_ref_this_month($finder,$start,$end);
$second_ref_team_bv_this_month=find_team_income_second_ref_this_month($finder,$start,$end);

$finder_slab=$rds['slab_rank'];
        
        if($finder_slab=='User')
        {
            $self=10;
            $team=0;
            $car_fund=0;
            $houns_fund=0;
            $leadership_fund=0;

        }
        else if($finder_slab=='Distributor')
        {
            $self=15;
            $team=5;
            $car_fund=0;
            $houns_fund=0;
            $leadership_fund=0;
        }
        else if($finder_slab=='Gold Manager')
        {
            $self=20;
            $team=5;
            $car_fund=6;
            $houns_fund=0;
            $leadership_fund=0;
        }
        else if($finder_slab=='Platinum Manager')
        {
            $self=25;
            $team=5;
            $car_fund=6;
            $houns_fund=6;
            $leadership_fund=0;
        }
        else if($finder_slab=='Diamond Manager')
        {
            $self=30;
            $team=5;
            $car_fund=6;
            $houns_fund=6;
            $leadership_fund=6;
        }
        
        else
        {
           $self=0;
            $team=0;
            $car_fund=0;
            $houns_fund=0;
            $leadership_fund=0;
        }

        





        if($self>0)
        {
         echo   $amount2=$finder_perosnal_bv*$self/100;   die;
        $amount12=$amount2*8/100;
        $amount13=$amount2*92/100;
        $invoice=$uid.rand(1000,9999);


        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$amount13','0','$amount12','$uid','123456','$date','Self Purchase Income','Self Purchase Income','Self Purchase Income','Self Purchase Income','$invoice','Self Purchase Income','0','Repurchase Wallet','$urls')");

        mysqli_query($GLOBALS["___mysqli_ston"], "update repurchase_e_wallet set amount=(amount+$amount13) where user_id='".$uid."'");
        }

        if($team>0)
        {
           $amount2=$finder_team_bv*$percnt/100;   
        $amount12=$amount2*8/100;
        $amount13=$amount2*92/100;
        $invoice=$uid.rand(1000,9999);


        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$amount13','0','$amount12','$uid','123456','$date','Team Purchase Income','Team Purchase Income','Team Purchase Income','Team Purchase Income','$invoice','Team Purchase Income','0','Repurchase Wallet','$urls')");

        mysqli_query($GLOBALS["___mysqli_ston"], "update repurchase_e_wallet set amount=(amount+$amount13) where user_id='".$uid."'");
        }




        if($car_fund>0 && $finder_perosnal_bv>1000  &&  $first_ref_team_bv_this_month>25000 &&  $second_ref_team_bv_this_month>25000)
        {
           $amount2=$turn_over_bv*$percnt/100;   
        $amount12=$amount2*8/100;
        $amount13=$amount2*92/100;
        $invoice=$uid.rand(1000,9999);


        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$amount13','0','$amount12','$uid','123456','$date','Car Fund Income','Car Fund Income','Car Fund Income','Car Fund Income','$invoice','Car Fund Income','0','Repurchase Wallet','$urls')");

        mysqli_query($GLOBALS["___mysqli_ston"], "update repurchase_e_wallet set amount=(amount+$amount13) where user_id='".$uid."'");
        }




        if($houns_fund>0 && $finder_perosnal_bv>1000  &&  $first_ref_team_bv_this_month>50000 &&  $second_ref_team_bv_this_month>50000)
        {
           $amount2=$turn_over_bv*$percnt/100;   
        $amount12=$amount2*8/100;
        $amount13=$amount2*92/100;
        $invoice=$uid.rand(1000,9999);


        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$amount13','0','$amount12','$uid','123456','$date','House Fund Income','House Fund Income','House Fund Income','House Fund Income','$invoice','House Fund Income','0','Repurchase Wallet','$urls')");

        mysqli_query($GLOBALS["___mysqli_ston"], "update repurchase_e_wallet set amount=(amount+$amount13) where user_id='".$uid."'");
        }



        if($leadership_fund>0 && $finder_perosnal_bv>1000  &&  $first_ref_team_bv_this_month>200000 &&  $second_ref_team_bv_this_month>200000)
        {
           $amount2=$turn_over_bv*$percnt/100;   
        $amount12=$amount2*8/100;
        $amount13=$amount2*92/100;
        $invoice=$uid.rand(1000,9999);


        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$amount13','0','$amount12','$uid','123456','$date','Leadership Income','Leadership Income','Leadership Income','Leadership Income','$invoice','Leadership Income','0','Repurchase Wallet','$urls')");

        mysqli_query($GLOBALS["___mysqli_ston"], "update repurchase_e_wallet set amount=(amount+$amount13) where user_id='".$uid."'");
        }

}
/* for first pair code end here */





?>