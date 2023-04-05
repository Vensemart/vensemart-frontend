<?php
ob_start();
include("../lib/config.php");
$userid=$_GET['id'];
$bvs=$_GET['status'];
    $start=date('Y-m-d');
 $final = date("Y-m-d", strtotime("+12 months", strtotime($start)));
    $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));
if($ref['user_rank_name']=='Free User' && $userid!='') {
 $final = date("Y-m-d", strtotime("+12 months", strtotime($start)));
  mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Affiliate',user_rank_name='Affiliate',activation_date='$start',repurchase_status='1', next_repurchase_date='$final',capping_slab='".$_GET['status']."',user_plan='".$_GET['status']."',self_purchase=(self_purchase+$bvs),direct_bv_ds=(direct_bv_ds+$bvs) where user_id='".$ref['user_id']."'");

$l= 1;

  $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
        while($upline=mysqli_fetch_array($upliners))
        {
        $income_id=$upline['income_id'];
        $position=$upline['leg'];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$l','".$_GET['status']."','$position','Package Purchase Amount','$date',CURRENT_TIMESTAMP,'1','".$_GET['status']."')");
        
     $l++;
        } 
}

header("location:update-list.php?msg=User Activated Successfully!");
?>