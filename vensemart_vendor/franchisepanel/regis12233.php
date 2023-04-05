<?php
	include_once("header.php");
	//check we have username post var
	if(isset($_POST["user_id"]))
	{
	//check if its an ajax request, exit if not

	//try connect to db
	//trim and lowercase username
	$pan =  strtolower(trim($_POST["user_id"])); 
	//sanitize username
	$puc = filter_var($puc, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db

	$results = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM amount_detail WHERE invoice_no='$pan'  and puc='".$f['user_id']."'"));
	//return total count
	$results1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM amount_detail WHERE invoice_no='$pan'  and puc='".$f['user_id']."'"));

	if($results==1) {
		    echo "<font color='#009999'><strong>"."  Invoice is Available !"."</strong></font>";
	
	}else{
              echo "<font color='#FF0000'><strong>"."  Invoice Not Available !"."</strong></font>";
	}
	//close db connection
	}
?>