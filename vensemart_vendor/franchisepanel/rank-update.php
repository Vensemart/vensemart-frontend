<?php
$star_month=date('Y-m-')."01";
$end_month=date('Y-m-')."31";
$date=date('Y-m-d');
function Rank_update($userone)
{
   $queryt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userone'");
   while($teds=mysqli_fetch_array($queryt))
   {
   	 $user_id=$teds['user_id'];
     $user_rank_name=$teds['user_rank_name'];

     $reds=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where ref_id='$user_id'");
     while($reds1=mysqli_fetch_array($reds))
     {
       $refuser=$reds1['user_id'];

          $level1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as toks1 from manage_bv_history where income_id='$user_id' and description!='Carry Forward BV' and date between '$star_month' and '$end_month'"));

          $level2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as toks2 from manage_bv_history where income_id='$user_id' and description!='Carry Forward BV' and date between '$star_month' and '$end_month'"));

          $sum1=$level1['toks1'];
          $sum2=$level2['toks2'];

          $totalsum=$sum1+$sum2;
          $totalsum1=$totalsum1+$totalsum;
     }
   

   	    $nums_ref_reg=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$user_id' and registration_date between '$star_month' and '$end_month'"));
          
         
          if($totalsum1>=100 && $nums_ref_reg>=1 && $user_rank_name=='Normal User')
          {

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Assistant Member', designation='Assistant Member' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`,`price`) VALUES (NULL, '$user_id', 'Normal User', 'Assistant Member', CURRENT_TIMESTAMP, '$date','10')");
              
           }
           else if($totalsum1>=3000 && $nums_ref_reg>=5 && $user_rank_name=='Assistant Member')
          {
              
                mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Consultant', designation='Consultant' where user_id='$user_id'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`,`price`) VALUES (NULL, '$user_id', 'Assistant Member', 'Consultant', CURRENT_TIMESTAMP, '$date','10')");
              
           }
             else if($totalsum1>=10000 && $nums_ref_reg>=10 && $user_rank_name=='Consultant')
          {
                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Manager', designation='Manager' where user_id='$user_id'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`,`price`) VALUES (NULL, '$user_id', 'Consultant', 'Manager', CURRENT_TIMESTAMP, '$date','10')");
              
           }
             else if($totalsum1>=20000 && $nums_ref_reg>=20 && $user_rank_name=='Manager')
          {
                   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Director', designation='Director' where user_id='$user_id'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`,`price`) VALUES (NULL, '$user_id', 'Manager', 'Director', CURRENT_TIMESTAMP, '$date','10')");
              
           }
            else if($totalsum1>=30000 && $nums_ref_reg>=30 && $user_rank_name=='Director')
          {
                   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Regional Director', designation='Regional Director' where user_id='$user_id'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`,`price`) VALUES (NULL, '$user_id', 'Director', 'Regional Director', CURRENT_TIMESTAMP, '$date','10')");
              
           }
           else if($totalsum1>=100000 && $user_rank_name=='Regional Director')
          {
               mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='President', designation='President' where user_id='$user_id'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`,`price`) VALUES (NULL, '$user_id', 'Regional Director', 'President', CURRENT_TIMESTAMP, '$date','10')");
              
           }
               
           else
           {}
     

   } // while close here
} //function close here


?>