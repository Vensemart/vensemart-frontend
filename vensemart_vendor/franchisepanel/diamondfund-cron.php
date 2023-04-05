<?php include("lib/config.php");




$total_director=0;

$start_date = date('Y-m-') . "01";
$end_date   = date('Y-m-') . "31";
$urls       = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$start_date = "2021-01-01";
 $end_date = "2021-01-31";

$start_date = "2021-02-01";
 $end_date = "2021-02-28";
// $start_date = "2020-07-01";
//  $end_date = "2020-07-30";
$comapany_turn= mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as tbv FROM `amount_detail` where payment_date between '$start_date' and '$end_date'"));
$comapany_turn_over_bv = $comapany_turn['tbv'];

if ($comapany_turn_over_bv == '') {
    $comapany_turn_over_bv = 0;
} else {
    $comapany_turn_over_bv = $comapany_turn_over_bv;
}


echo "Cturn----".$comapany_turn_over_bv;echo"<br>";
echo $fourteen_percent= $comapany_turn_over_bv * 20 / 100;

$ref_details=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where director_level>='4' "));  
   $director_points=$fourteen_percent/$ref_details;






$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where director_level>='4'");

while ($rds = mysqli_fetch_array($rd)) {
    $uid                = $rds['user_id'];
    $user_rank_name     = $rds['user_rank_name'];
    $finder             = $uid;
    $start              = date('Y-m-') . "01";
    $end                = date('Y-m-') . "31";
    $invoice_no=rand(10000000,99999999);
       $total_amount2=$director_points;
   //   $date=          "2021-01-31";
     
     $urls = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
          mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$total_amount2) where user_id='$uid'");
          mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$total_amount2','0','0','$uid','$uid','$end_date','Diamond Income','Diamond Income','$comm','$ref_details','$invoice_no','$fourteen_percent','0','Payout Wallet',CURRENT_TIMESTAMP,'$urls')");

   }
?>
    
 
    
    
