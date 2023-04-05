<?php include("lib/config.php");

function find_personal_income_cummulative11($user,$start,$end){
    $bv=0;
    //$amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(net_amount) as bv FROM `amount_detail` where user_id='$user' and purchase_date>='$start' and purchase_date<='$end'"));
    $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as bv FROM `amount_detail` where user_id='$user' and purchase_date>='$start' and  purchase_date<='$end'"));




    $bv=$amts1['bv'];
    if($bv==''){
      $bv=0;
    }else{
      $bv=$bv;  
    }
    return $bv;
}


function find_team_income_cummulative($user, $start, $end)
{
    $allbv  = 0;
//echo "<b"
    $teambv = mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$user'");
    while ($teambv1 = mysqli_fetch_array($teambv)) {
        $down_id = $teambv1['down_id'];
        $tbv     = 0;
        $amts1   = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as tbv FROM `amount_detail` where user_id='$down_id' and purchase_date between '$start' and '$end'"));
        $tbv     = $amts1['tbv'];
        if ($tbv == '') {
            $tbv = 0;
        } else {
            $tbv = $tbv;
        }
        
        $allbv = $allbv + $tbv;
    }
    
    return $allbv;
}

function find_team_income_cummulative11($user,$start,$end){
    $allbv=0;
    $teambv=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$user'");
    while($teambv1=mysqli_fetch_array($teambv)){
        $down_id=$teambv1['down_id'];
        $tbv=0;
        //$amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(net_amount) as tbv FROM `amount_detail` where user_id='$down_id'  and purchase_date>='$start' and purchase_date<='$end'"));
    $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as bv FROM `amount_detail` where user_id='$down_id' and purchase_date>='$start' and  purchase_date<='$end'"));

        $tbv=$amts1['tbv'];
        if($tbv==''){
          $tbv=0;
        }else{
          $tbv=$tbv;  
        }
        $allbv=$allbv+$tbv;
    }
  return $allbv;
}


                     
function find_directteam_income_cummulative11($user,$start,$end){
    $allbv=0;
    $allbv11=0;
    $allbv1=0;
    $teambv=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$user' and director_status=0 and level=1");
    while($teambv1=mysqli_fetch_array($teambv)){
        $down_id=$teambv1['down_id'];
        $tbv=0;
     $allbv=find_personal_income_cummulative11($down_id,$start,$end);
     $tbv=find_team_income_cummulative11($down_id,$start,$end);
        $allbv1=$allbv+$tbv;
        $allbv11=$allbv1+$allbv11;
    }
 
    $allbvaa=find_personal_income_cummulative11($user,$start,$end);
  $allbvaas=find_team_income_cummulative11($user,$start,$end);
  return $allbv11+$allbvaa+$allbvaas;
   
 
}






$total_director=0;

$start_date = date('Y-m-') . "01";
$end_date   = date('Y-m-') . "31";
$urls       = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];


$comapany_turn= mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as tbv FROM `amount_detail` where purchase_date between '$start_date' and '$end_date'"));
$comapany_turn_over_bv = $comapany_turn['tbv'];

if ($comapany_turn_over_bv == '') {
    $comapany_turn_over_bv = 0;
} else {
    $comapany_turn_over_bv = $comapany_turn_over_bv;
}

$fourteen_percent= $comapany_turn_over_bv * 15 / 100;
$rd123 = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where user_rank_name!='Free User' and slab>=24");
while ($rds12 = mysqli_fetch_array($rd123)) {
    $uid                = $rds12['user_id'];
    $finder             = $uid;
    $start              = date('Y-m-') . "01";
    $end                = date('Y-m-') . "31";

   $finder_perosnal_bvks = find_personal_income_cummulative11($uid, $start, $end);
   $finder_team_bvks     = find_team_income_cummulative($uid, $start, $end);
   
    $tbvsks=$finder_perosnal_bvks + $finder_team_bvks;
     $sixpercent = $tbvsks+$sixpercent;

          
        


}

  echo $director_points=$fourteen_percent/$sixpercent;echo"<br/>";






$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where user_rank_name!='Free User' and slab>=24");

while ($rds = mysqli_fetch_array($rd)) {
    $uid                = $rds['user_id'];
    $user_rank_name     = $rds['user_rank_name'];
    $finder             = $uid;
    $start              = date('Y-m-') . "01";
    $end                = date('Y-m-') . "31";
   $teambv=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$uid'");
    while($teambv1=mysqli_fetch_array($teambv)){
      echo  $users=$teambv1['income_id'];echo"<br/>";
      $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$teambv1['income_id']."'"));
        if ($teambv1['level']<=$data11['director_level']) {
                           if($teambv1['level']==1)
                            {
                                $comm=5;
                                $comm1=0;
                            }
                            else if($teambv1['level']==2)
                            {
                                $comm=5;
                                 $comm1=0;
                            }
                            else if($teambv1['level']==3)
                            {
                                $comm=5;
                                 $comm1=0;
                            }
                            else if($teambv1['level']==4)
                            {
                                $comm=4;
                                 $comm1=0;
                            }
                            else if($teambv1['level']==5)
                            {
                                $comm=3;
                                 $comm1=0;
                            }
                              else if($teambv1['level']==6)
                            {
                                $comm=2;
                                 $comm1=0;
                            }
                              else if($teambv1['level']==7)
                            {
                                $comm=1;
                                 $comm1=0;
                            } 
                            
                            else
                            {
                                 $comm=0;
                                  $comm1=0;
                            }
   $finder_perosnal_bvks = find_directteam_income_cummulative11($uid,$start,$end);

   
    
    
    
    $sixpercent =$finder_perosnal_bvks*$comm/100;
   if ($sixpercent > 0) {
               

//$total_director=$total_director+$sixpercent;


          $invoice_no=rand(10000000,99999999);
          $users=$master_idd;
          $total_amount=$sixpercent*$director_points;
       
          $total_amount2 = $total_amount;
          $Remark        = 'Leadership Bonus';
       
          $date=           date('Y-m-d');
          $urls = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
          mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$total_amount2) where user_id='".$teambv1['income_id']."'");
          mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','".$teambv1['income_id']."','$total_amount2','0','0','".$teambv1['income_id']."','$uid','$date','Leadership Bonus','Leadership Bonus','$comm','$finder_perosnal_bvks','$invoice_no','$director_points','0','Payout Wallet',CURRENT_TIMESTAMP,'$urls')");

 

   }

   // if ($comm1==1) {
               



   //        $invoice_no=rand(10000000,99999999);
   //        $users=$master_idd;
   //        $total_amount=$sixpercent*$director_points;
       
   //        $total_amount2 = $total_amount;
   //        $Remark        = 'Director Bonus';
       
   //        $date=           date('Y-m-d');
   //        $urls = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
   //        mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$total_amount2) where user_id='".$uid."'");
   //        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','".$uid."','$total_amount2','0','0','".$uid."','$uid','$date','Director Bonus','Director Bonus','$comm','$finder_perosnal_bvks','$invoice_no','$director_points','0','Payout Wallet',CURRENT_TIMESTAMP,'$urls')");

 

   // }
   }
    } 
   } 
    
 
    
    
