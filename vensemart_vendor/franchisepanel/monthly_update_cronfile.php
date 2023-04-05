<?php
include("lib/config.php");
$date=date('Y-m-d');


        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set leader_rank='0',team_bv='0',repurchase_status='0'");    

echo "closing Done";
?>