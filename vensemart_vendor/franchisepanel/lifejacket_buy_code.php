<?php
ob_start();
include("header.php"); 








if(($_POST['package_id']!='') && ($_POST['password']!='') && ($_POST['amount']!=''))
{
	$password=$_POST['password'];
	$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_POST['package_id']."'"));
    $package_name=$comm['name'];
     $pbs1=$comm['pb'];
    $amount=$_POST['amount'];
	$ewa='final_e_wallet';
	$walls="Fund Wallet";
    $rand = rand(100000000,999999999);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+365 days'));
    $t_code1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' and t_code='$password'"));

       $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));

	if($t_code1>0)
	{

		$ewalletdetail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewa where user_id='$userid'"));
		$user_ewalletamt=$ewalletdetail['amount'];
		$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        if($user_ewalletamt>=$amount)
        {



             $pv=$pbs1;


	    $lfid="LJ".$userid.$rand;
	   	$yes=mysqli_query($GLOBALS["___mysqli_ston"], "update $ewa set amount=(amount-$amount) where user_id='$userid'");
		if($yes)
        {

		mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$userid', '".$_POST['package_id']."', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$userid."','".$ref['ref_id']."','$pv')");
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$rand','$userid','0','$amount','0','$userid','$userid','$start','Package Upgrade','Package Upgrade by $userid','Package Upgrade by $userid ','Package Upgrade $userid','$rand','Package Upgrade by $userid','0','$walls','$urls')");
					
		
	/*Inserting Record of BV in manage bv table for all upliners code starts here*/
	$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
	while($upline=mysqli_fetch_array($upliners))
	{
		$income_id=$upline['income_id'];
		$position=$upline['leg'];
		$user_level=$upline['level'];
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$pv','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$pv')");
	}
   /*Inserting Record of BV in manage bv table for all upliners code ends here*/
  
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Affiliate', user_rank_name ='Affiliate',user_plan='".$_POST['package_id']."' where user_id='$userid'");

   	
			 	
 
}
?>
<script type="text/javascript">
window.location.href='package-upgrade.php?msg=Thank You! You have Successfully Upgraded to Premium Membership';
</script>
<?php
exit;
}
else
{
?>
<script type="text/javascript">

						   window.location.href='package-upgrade.php?msg=Insufficient Fund In your Leaders Wallet ';

						   </script>

                        <?php

						

					}

			}

		

			else

			{

				?>

                 <script type="text/javascript">

						   window.location.href='package-upgrade.php?msg=Wrong Transaction Password';

						   </script>

                

                <?php

				

			}



}

else

{

	?>

      <script type="text/javascript">

						   window.location.href='package-upgrade.php?msg=Validation Error Occurs';

						   </script>

    <?php

	

	

}

?>

