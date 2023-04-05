<?php include("header.php");

if(isset($_POST['submit']))
{
  if($_POST['user']!='')
  {
  $user=$_POST['user'];
  $pin=$_POST['list'];

  $count=mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where (user_id='$user' || username='$user')");
  $count1=mysqli_num_rows($count);
  $count11=mysqli_fetch_array($count);
  $recid=$count11['user_id'];
	  if($count1>0)
	  {
	  	
	

  if(!empty($pin)) {
    foreach($pin as $check)   {
            $am =mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select pin_no,amount from franchise_pins where pin_no='".$check."' "));
		  	mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO `franchise_pin_transfer` (`id`, `sender`, `receiver`, `pinno`, `transferdate`) VALUES (NULL, '$userid', '$recid', '$check', '".date('Y-m-d')."')");
		  	mysqli_query($GLOBALS["___mysqli_ston"],"update franchise_pins set receiver_id='$recid' where pin_no='$check'");
            		  
        	mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO `pins` (`pin_no`,`amount`, `status`,`crt_date`,`created_by_user`,`receiver_id`,`sender_id`,`t_date`,`used_by`,`pin_type`,`package`) VALUES ('$check', '".$am['amount']."','0','".date('Y-m-d')."','','$recid','$userid','0000-00-00','','F','')");

		  	header("location:fresh-epin.php?msg=Pin Transfer Successfully");
	   }}
	  }
	  else
	  {

	  header("location:fresh-epin.php?msg=Wrong Receiver User Id!");
	  exit;

	  }
  }
  else
  {
  	 header("location:fresh-epin.php?msg=Wrong User Id !");
  exit;
  }
  
}
?>
