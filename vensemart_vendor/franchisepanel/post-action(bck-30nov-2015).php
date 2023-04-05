<?php
ob_start();
include("lib/config.php");
define("Currency",'USD');
$value1 = $_GET['action'];
include("rank-update.php");
/*function to show user on which level code ends here*/
function level_countdd($crid,$tpid)
{
	global $a;
	$query1="select * from user_registration where user_id='$crid'";
	$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
	$row=mysqli_fetch_array($result1);
	$rclid1=$row['nom_id'];
	$a=1;
	if($rclid1!=$tpid)
	{
		level_countdd($rclid1,$tpid);
		$a++;
	}
	else
	{
		$a=1;
	}
	return $a;
}
/*function to show user on which level code ends here*/


if($value1!='')
{
$value = $_GET['action'];	
}
else
{
$value = $_POST['action'];
}

switch($value)
{

case "UserRegistration":			
_UserRegistration();
break;

case "CheckUserPin":
_CheckUserPin();
break;

case "loginuser":
_LoginUserCode();
break;

case "ForgotPassword":			
_ForgotPassword();
break;

case "CheckUserEwalletBalance":
_CheckUserEwalletBalance();
break;

}

/*User Login Code Starts here*/
function _LoginUserCode(){
	global $mxDb;
	 @$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
     @$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
     if($username!='' && $password!='' )
	 {
		if(strlen($username) && strlen($password))
        {
			 $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') && password = '$password'))");
			 $result=mysqli_fetch_array($query);
					if($num=mysqli_num_rows($query))
					{ 
						$user_id=$result['user_id'];
						$_SESSION['SD_User_Name']=$result['username'];
						$_SESSION['user_id']=$user_id;
						$_SESSION['userpanel_user_id']=$user_id;

						/* store the visitor info in table code start here*/
						$guest_ip   = $_SERVER['REMOTE_ADDR'];
       					$fo=$result['first_name']." ".$result['last_name'];
						mysqli_query($GLOBALS["___mysqli_ston"], "insert into visitor values (NULL,'$user_id','".$result['username']."','$fo','$guest_ip',CURRENT_TIMESTAMP)");
						/* store the visitor info in table code ends here*/						
					    header("location:userpanel/index.php"); 

					}
					else
					{
						header("location:login.php?msg=wrong");
	       			}
	 		} 
	}
}
/*User Login Code Ends here*/

/*Userid Generate Code Starts Here */
function userid()
{
$table_name='user_registration';
$encypt1=uniqid(rand(1111,9999), true);
$usid1=str_replace(".", "", $encypt1);
$pre_userid1 = substr($usid1, 0, 4);
$pre_userid = "50".$pre_userid1;
$checkid=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from $table_name where user_id='$pre_userid'");
if(mysqli_num_rows($checkid)>0)
{
userid();
}
else
return $pre_userid;
}
/*Userid Generate Code Ends Here */


/*Registration Spill Code Starts Here for finding the nomid */
function spill_id1s2($sponserid,$posi)
{
global $nom_id;
$query1="select * from user_registration where nom_id='$sponserid' and binary_pos='$posi'";
$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
$row=mysqli_fetch_array($result1);
$rclid1=$row['user_id'];
if($rclid1!=""){
spill_id1s2($rclid1,$posi);
} 
else {
$nom_id=$sponserid;
}
return $nom_id;
}

function mem_pos($ref_id123){
$count_left_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='left'"));
$count_right_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='right'"));
// if both leg same 
if($count_left_count==$count_right_count)
{
$posi='left';
}
else
{
// find the weeker leg
$min=min($count_left_count,$count_right_count);
if($min==$count_left_count){
$posi='left';
}
if($min==$count_right_count){
$posi='right';
}
}
return $posi;
}
/*Registration Spill Code Ends Here for finding the nomid */




/*Ambassador Registration Code Starts Here */
function _UserRegistration(){
	global $mxDb;
	$term_cond=$_POST['term_cond'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$sponsorid=$_POST['sponsorid'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$country=$_POST['country'];
	$password=rand(0000000001,999999999);
    $state=$_POST['state'];
	$city=$_POST['city'];
    $address=$_POST['address'];
        $masterid=$_POST['masterid'];
    $phone=$_POST['phone'];
	$binary_pos=$_POST['binary_pos'];
	$zipcode=$_POST['zipcode'];
	$platform=$_POST['platform'];
	$passport=$_POST['passport'];
	$dob=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$amts=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='$platform'"));
	$amount=$amts['amount'];
    $tran=rand(0000000001,999999999);	
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' || username='$sponsorid') and user_status='0')");
	$row_ref=mysqli_fetch_assoc($results);
    $ref_id=$row_ref['user_id'];	
	$ref_username=$row_ref['username'];	
	$ref_pos=$row_ref['binary_pos'];
    $ref_id123=$ref_id;
	$nom_id123=$_POST['placementid'];
    $reg_inner=$_POST['reg_inner'];

    if($masterid!='' && $masterid!=0)
    {
    	$masterid=$masterid;
    	 $mast = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$masterid' || username='$masterid') and user_status='0')"));
         if($mast<=0)
         {
         	 header("location:register.php?msg=Master ID account not available !");
         	 exit;
         	 $masterid=$masterid;
         }

    }
    else
    {
    	$masterid='';
    }

    
    $resultings = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$nom_id123' || username='$nom_id123') and user_status='0')");
    $row_refing=mysqli_fetch_array($resultings);
    $nom_id1=$row_refing['user_id'];
    if($ref_id!=$nom_id1)
    {
    $yesd = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM level_income_binary WHERE (income_id='$ref_id' and down_id='$nom_id1')"));
    if($yesd==0)
    {
            header("location:register.php?msg=Placement User Not Available or not in the downline of sponsor");
            exit;
    }
    }
    

    if($reg_inner==0)
    {
    $nom_id=spill_id1s2($nom_id1,$binary_pos);
    }
    else
    {
    	$nom_id=$nom_id1;
    }
    $_SESSION['binary_pos']=$binary_pos;
	$_SESSION['firstname']=$firstname." ".$lastname;
    $_SESSION['lastname']='';
	$_SESSION['sponsorid']=$ref_id123;
	
	$_SESSION['email']=$email;
    $_SESSION['country']=$country;
	$_SESSION['password']=$password;
	$_SESSION['state']=$state;
	$_SESSION['city']=$city;
	$_SESSION['address']=$address;
	$_SESSION['phone']=$phone;
	$_SESSION['zipcode']=$zipcode;
	$_SESSION['lamount']=$amount;
	$_SESSION['platform']=$platform;
	$_SESSION['nomid']=$nom_id;
	$_SESSION['transaction_pwd']=$tran;
    $_SESSION['term_cond']=$term_cond;
	$_SESSION['position']=$posi;
    $_SESSION['passport']=$passport;
    $_SESSION['dob']=$dob;
    $_SESSION['masterid']=$masterid;

    
    $_SESSION['ref_username']=$ref_username;
	if($sponsorid!='')
	{
		  $resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$sponsorid' || username='$sponsorid') and  user_status=='0')");
		  $resos1=mysqli_num_rows($resos);
		  if($resos1 == '0')
		  {
		  header("location:register.php?msg=sponsor");
		  }
		  else
		  {
			  
					 	$user_id=userid();
					 	$_SESSION['user_id']=$user_id;
						header("location:registration-payment.php");  
					
		  }

}
}
/*Ambassador Registration Code Ends Here */


/*Forgot Password Code starts here */
function _ForgotPassword(){
global $mxDb;
$strSubject = "Password Credential From Grand Total Network";  
$from ='kamlesh@maxtratechnologies.net';
if($_POST['email']!='')
{
$email=$_POST['email'];
$res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email'");
$res1=mysqli_num_rows($res);
if($res1 == '0')
{
header("location:forgot.php?msg=Sorry No email Found In Our Database");
}
else
{
$res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email'");
$res1=mysqli_fetch_array($res);
$pass=$res1['password'];
$strSid = md5(uniqid(time()));  
$strHeader = "";  
$strHeader .= "From:<".$from.">\nReply-To: ".$from."";  
$strHeader .= "MIME-Version: 1.0\n";  
$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";  
$strHeader .= "This is a multi-part message in MIME format.\n"; 
$strHeader .= "--".$strSid."\n";  
$strHeader .= "Content-type: text/html; charset=utf-8\n";  
$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";  
$strHeader .= "Your Password is  ". $pass. "<br/> <br/>";
$strHeader .= "Thank You from Our Company";
$strHeader .= " \n\n";
//*** Attachment ***//  
mail($email,$strSubject,null,$strHeader);  // @ = No Show Error //  
header("location:forgot.php?msg=Thank You ! Password is sent to your email id !");
}
}
else
{
header("location:forgot.php?msg=Sorry Unable to send the password right now !");
}
}
/*Forgot Password Code Ends here */



/*Generate Invoice Number format code starts here*/
function _generateInvoiceNo(){
global $mxDb;
$rand = mt_rand(100000000000000,99999999999999999);
$condition = " where invoice_no='".$rand."'";
$args_invoice = $mxDb->get_information('lifejacket_subscription','invoice_no',$condition,true,'assoc');
if(isset($args_invoice['invoice_no']))
{
if($args_invoice['invoice_no'] == $rand)
_generateInvoiceNo();
else
return $rand;
}
else
return $rand;
}
/*Generate Invoice Number format code ends here*/




/*Payment and user register Code starts here*/
function  _CheckUserEwalletBalance(){
	global $mxDb;
	$date=date("Y-m-d");
	$payment_type=$_POST['payment_method'];print_r("<br/>");
	$username = $_POST['pay_username'];print_r("<br/>");
    $t_password = $_POST['pay_password'];print_r("<br/>");
    $total_amount = $_SESSION['lamount'];print_r("<br/>");
	if($payment_type=='Ewallet')
	{
		$ewallet_table='final_e_wallet'; 
		$ewallet_table1='Withdrawal Wallet';
	}
    $condition1 = " where (username='".$username."' || user_id='".$username."')";
	$args_sponsor1 = $mxDb->get_information('user_registration', 'user_id', $condition1, true, 'assoc');
	$paid_id1=$args_sponsor1['user_id'];
	if($paid_id1)
		{
		if( ($username != '' && $t_password != '') && ($payment_type!='') )
		{
		$condition = " where user_id='".$paid_id1."' and t_code='".$t_password."'";
		$args_sponsor = $mxDb->get_information('user_registration', 'user_id', $condition, true, 'assoc');
	   	$paid_id=$args_sponsor['user_id'];
		if( isset($args_sponsor['user_id']) ){
			$wallet_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewallet_table where user_id='$paid_id'"));
			$cut_wallet=$wallet_amount['amount'];
		    $wall1=$total_amount;
		   	if(($cut_wallet>=$wall1))
			{   	
			$country_code=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from country where name='".$_SESSION['country']."'"));
            $usercountry=$country_code['iso'];		
		    $invoice_no = _generateInvoiceNo();
			$user_id=$usercountry.$_SESSION['user_id'];
			$username=$user_id;
			$_SESSION['username']=$username;



			$insert_array = array('user_id'=>$user_id,'dob'=>$_SESSION['dob'], 'master_account'=>$_SESSION['masterid'], 'ref_id'=>$_SESSION['sponsorid'],'nom_id'=>$_SESSION['nomid'],'username'=>$_SESSION['username'],'password'=>$_SESSION['password'],'first_name'=>$_SESSION['firstname'],'last_name'=>$_SESSION['lastname'],'email'=>$_SESSION['email'],'country'=>$_SESSION['country'],'admin_status'=>"0",'user_status'=>"0",'registration_date'=>$date,'designation'=>"Normal User",'user_rank_name'=>'Normal User','t_code'=>$_SESSION['transaction_pwd'], 'state'=>$_SESSION['state'], 'city'=>$_SESSION['city'], 'telephone'=>$_SESSION['phone'], 'address'=>$_SESSION['address'], 'user_plan'=>"Paid", 'id_card'=>'Passport', 'id_no'=>$_SESSION['passport']);
			if($mxDb->insert_record('user_registration', $insert_array))
			{
		    $nom=$_SESSION['nomid'];
			$pos=$_SESSION['binary_pos'];
			$l=1;
			while($nom!='cmp'){
		    if($nom!='cmp'){
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='$user_id', income_id='$nom', leg='$pos', status=0, level='$l'");
			$l++;
			$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom' ");
			$fetchnompos=mysqli_fetch_array($selectnompos);
			$pos=$fetchnompos['binary_pos'];
			$nom=$fetchnompos['nom_id'];
			}
		}	
	}
	mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='".$_SESSION['nomid']."', binary_pos='".$_SESSION['binary_pos']."' where user_id='$user_id'");		

				$qur = mysqli_query($GLOBALS["___mysqli_ston"], "update $ewallet_table set amount=(amount-$wall1) where user_id='".$paid_id."'");
				if($qur){
                $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			    
				}
				$subs_date=date('Y-m-d');
		        $end = date('Y-m-d', strtotime('+12 months'));
				
				$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_SESSION['platform']."'"));
				$sponsor_benifit_bonus=$comm['sponsor_commission'];
				$pb=$comm['pb'];
				

				$rand = rand(0000001,9999999);
				$lfid="LJ".$user_id.$rand;
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
	           
	            
	            commission_of_referal($_SESSION['sponsorid'],$user_id,$_SESSION['lamount'],$invoice_no,$_SESSION['platform']);
	            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '".$_SESSION['platform']."', '".$_SESSION['lamount']."', '$ewallet_table1', '$t_password', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','".$_SESSION['ref_username']."','$pb')");
    			mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice_no','$paid_id','0','".$wall1."','0','$user_id','$paid_id','$subs_date','Package Purchase','Package Purchase by $user_id','Package Purchase by $user_id ','Package Purchase $user_id','$invoice_no','Package Purchase by $user_id','0','Withdrawal Wallet','$urls')");
                
                $repli="http://198.154.241.136/~kamlesh/Aric/".$_SESSION['username'];
                $email=$_SESSION['email'];
				$strSubject = "Registration Confirmation From Frozenage";
				$from = 'kamlesh@maxtratechnologies.net';
	     		$strSid = md5 ( uniqid ( time () ) );
		    	$strHeader = "";
				$strHeader .= "From:<" . $from . ">\nReply-To: " . $from . "";								
				$strHeader .= "MIME-Version: 1.0\n";
		        $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
		        $strHeader .= "This is a multi-part message in MIME format.\n";
				$strHeader .= "--" . $strSid . "\n";
				$strHeader .= "Content-type: text/html; charset=utf-8\n";
			    $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
			    $strHeader .= " \n\n";
			    $strHeader .= "  <br>";

		        $msg = '<html>

				<body>
				<img src="http://198.154.241.136/~kamlesh/Aric/images/logo.png" width="300" height="80" /><br/>
				<fieldset style="border-color:#09F;background-color:#ebebeb;width:700px;"><table width="700" border="0" cellspacing="5" cellpadding="1">
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="2">Dear '.$_SESSION['username'].'</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td width="316" colspan="3" align="justify">Thank you for joining us at http://198.154.241.136/~kamlesh/Aric/. We welcome you on board and
				    
				    are excited to have your business. We always ready to enrich each of your investment 
				    
				    capital with higher values just like how we valued you..!</td>
				  <td width="19">&nbsp;</td>

				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Your login and transaction Credential</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Your  Sponsor Id : '.$_SESSION['sponsorid'].' </td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Username  : '.$_SESSION['username'].'</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Password  : '.$_SESSION['password'].' </td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Transaction Password : '.$_SESSION['transaction_pwd'].' </td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Replicated Link : '.$repli.' </td>
				  <td>&nbsp;</td>
				 
				  
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td  colspan="3" align="justify"><strong>Risk statement:</strong> Any specific investment or investment service contained or referred to in this web site

				may not be suitable for all visitors to this site. An investment in derivatives may mean investors may lose 

				an amount even greater than their original investment. Anyone wishing to invest in any of the products 

				mentioned should seek their own financial or professional advice. Trading of securities, options and 

				futures may not be suitable for everyone and involves the risk of losing part or all of your money. 

				Trading in the financial markets has large potential rewards, but also large potential risk. You must be 

				aware of the risks and be willing to accept them in order to invest in the markets. Don`t trade with 

				money you can`t afford to lose.</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				</table></fieldset>


				</body>

				</html>';

				mail ( $email, $strSubject, $msg, $strHeader );

	
	
	
				/*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$user_id'");
				while($upline=mysqli_fetch_array($upliners))
				{
				$income_id=$upline['income_id'];
				$position=$upline['leg'];
				$user_level=level_countdd($user_id,$income_id); 
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$user_id','$user_level','".$pb."','$position','Package Purchase Amount','$date',CURRENT_TIMESTAMP,'0')");
				}
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

				
			    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$nom123=$_SESSION['sponsorid'];
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$user_id."', income_id='$nom123', l_date='$date', status=0, level='$l1'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				}
				}	
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

			    Rank_update();

			    //$_SESSION['userpanel_user_id']=$user_id;
				header("Location:thankyou.php");
				}
				else{
				header("Location:ewallet-payment.php?msg=Insufficient fund in ewallet or company cash wallet");
				}
				}
				else{
				header("Location:ewallet-payment.php?msg=Your username or transaction password is incorrect");
				}
				}
				else{
					header("Location:ewallet-payment.php?msg=Please fill the details");
			    }

}
else
{
header("Location:ewallet-payment.php?msg=Your Sponsor Id Not Match");
}
}
/*Payment and user register Code ends here*/





function  _CheckUserPin(){
	global $mxDb;
	$date=date("Y-m-d");
	$payment_type=$_POST['payment_method'];print_r("<br/>");
	$pincodes = $_POST['pincodes'];print_r("<br/>");
   
    $total_amount = $_SESSION['lamount'];print_r("<br/>");
	 if($payment_type=='Pin')
	 {
		$ewallet_table='pins'; 
		$ewallet_table1='E Pin';
	 }



		if( ($pincodes != '' && $total_amount != '') && ($payment_type!='') ){

		$condition = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pins where pin_no='".$pincodes."' and amount='".$total_amount."' and status='0'"));
		if($condition>0)
		{
		
		$condition1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pins where pin_no='".$pincodes."' and amount='".$total_amount."'  and status='0'"));
		$ids=$condition1['id'];
		$rids=$condition1['receiver_id'];
		$subs_date=date('Y-m-d');
		        $end = date('Y-m-d', strtotime('+12 months'));
				
	if($rids!='')
	{
		mysqli_query($GLOBALS["___mysqli_ston"], "update pins set status='1',used_by='".$_SESSION['user_id']."',t_date='$subs_date' where pin_no='$pincodes'");
     
    }
    if($rids=='')
	{
		mysqli_query($GLOBALS["___mysqli_ston"], "update pins set status='1', receiver_id='".$_SESSION['user_id']."', used_by='".$_SESSION['user_id']."', t_date='$subs_date' where pin_no='$pincodes'");
     
    }
            $invoice_no = _generateInvoiceNo();
           				$user_id=$_SESSION['user_id'];
           				$username=$user_id;
			$_SESSION['username']=$username;

				$insert_array = array('user_id'=>$user_id,'dob'=>$_SESSION['dob'],'ref_id'=>$_SESSION['sponsorid'],'nom_id'=>$_SESSION['nomid'],'username'=>$_SESSION['username'],'password'=>$_SESSION['password'],'first_name'=>$_SESSION['firstname'],'last_name'=>$_SESSION['lastname'],'email'=>$_SESSION['email'],'country'=>$_SESSION['country'],'admin_status'=>"0",'user_status'=>"0",'registration_date'=>$date,'designation'=>"Normal User",'user_rank_name'=>'Normal User','t_code'=>$_SESSION['transaction_pwd'], 'state'=>$_SESSION['state'], 'city'=>$_SESSION['city'], 'telephone'=>$_SESSION['phone'], 'address'=>$_SESSION['address'], 'user_plan'=>"Paid", 'id_card'=>'Passport', 'id_no'=>$_SESSION['passport']);
								
				if($mxDb->insert_record('user_registration', $insert_array))
			{
		    $nom=$_SESSION['nomid'];
			$pos=$_SESSION['binary_pos'];
			$l=1;
			while($nom!='cmp'){
		    if($nom!='cmp'){
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='$user_id', income_id='$nom', leg='$pos', status=0, level='$l'");
			$l++;
			$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom' ");
			$fetchnompos=mysqli_fetch_array($selectnompos);
			$pos=$fetchnompos['binary_pos'];
			$nom=$fetchnompos['nom_id'];
			}
		}	}
				mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='".$_SESSION['nomid']."', binary_pos='".$_SESSION['binary_pos']."' where user_id='$user_id'");		

				
                $subs_date=date('Y-m-d');
		        $end = date('Y-m-d', strtotime('+12 months'));
				
				$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_SESSION['platform']."'"));
				$sponsor_benifit_bonus=$comm['sponsor_commission'];
				$pb=$comm['pb'];
				

				$rand = rand(0000001,9999999);
				$lfid="LJ".$user_id.$rand;
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
	           
	            
	            commission_of_referal($_SESSION['sponsorid'],$user_id,$_SESSION['lamount'],$invoice_no,$_SESSION['platform']);
	            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '".$_SESSION['platform']."', '".$_SESSION['lamount']."', '$ewallet_table1', '$pincodes', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','".$_SESSION['sponsorid']."','$pb')");
    			   
                $repli="http://198.154.241.136/~kamlesh/Aric/".$_SESSION['username'];
                $email=$_SESSION['email'];
				$strSubject = "Registration Confirmation From Grand Total Network";
				$from = 'kamlesh@maxtratechnologies.net';
	     		$strSid = md5 ( uniqid ( time () ) );
		    	$strHeader = "";
				$strHeader .= "From:<" . $from . ">\nReply-To: " . $from . "";								
				$strHeader .= "MIME-Version: 1.0\n";
		        $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
		        $strHeader .= "This is a multi-part message in MIME format.\n";
				$strHeader .= "--" . $strSid . "\n";
				$strHeader .= "Content-type: text/html; charset=utf-8\n";
			    $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
			    $strHeader .= " \n\n";
			    $strHeader .= "  <br>";

		        $msg = '<html>

				<body>
				<img src="http://198.154.241.136/~kamlesh/Aric/images/logo.png" width="300" height="80" /><br/>
				<fieldset style="border-color:#09F;background-color:#ebebeb;width:700px;"><table width="700" border="0" cellspacing="5" cellpadding="1">
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="2">Dear '.$_SESSION['username'].'</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td width="316" colspan="3" align="justify">Thank you for joining us at http://198.154.241.136/~kamlesh/Aric/. We welcome you on board and
				    
				    are excited to have your business. We always ready to enrich each of your investment 
				    
				    capital with higher values just like how we valued you..!</td>
				  <td width="19">&nbsp;</td>

				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Your login and transaction Credential</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Your  Sponsor Id : '.$_SESSION['sponsorid'].' </td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Username  : '.$_SESSION['username'].'</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Password  : '.$_SESSION['password'].' </td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Transaction Password : '.$_SESSION['transaction_pwd'].' </td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>Replicated Link : '.$repli.' </td>
				  <td>&nbsp;</td>
				 
				  
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td  colspan="3" align="justify"><strong>Risk statement:</strong> Any specific investment or investment service contained or referred to in this web site

				may not be suitable for all visitors to this site. An investment in derivatives may mean investors may lose 

				an amount even greater than their original investment. Anyone wishing to invest in any of the products 

				mentioned should seek their own financial or professional advice. Trading of securities, options and 

				futures may not be suitable for everyone and involves the risk of losing part or all of your money. 

				Trading in the financial markets has large potential rewards, but also large potential risk. You must be 

				aware of the risks and be willing to accept them in order to invest in the markets. Don`t trade with 

				money you can`t afford to lose.</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				</table></fieldset>


				</body>

				</html>';

				mail ( $email, $strSubject, $msg, $strHeader );

	
	
	
				/*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$user_id'");
				while($upline=mysqli_fetch_array($upliners))
				{
				$income_id=$upline['income_id'];
				$position=$upline['leg'];
				$user_level=level_countdd($user_id,$income_id); 
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$user_id','$user_level','".$_SESSION['lamount']."','$position','Package Purchase Amount','$date',CURRENT_TIMESTAMP,'0')");
				}
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

				
			    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$nom123=$_SESSION['sponsorid'];
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$user_id."', income_id='$nom123', l_date='$date', status=0, level='$l1'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				}
				}	
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

			   Rank_update();

			    //$_SESSION['userpanel_user_id']=$user_id;
				header("Location:thankyou.php");
	header("Location:userpanel/index.php");
	}
	
	
	else{
	header("Location:pin.php?msg=Your E Pin Is Incorrect");
	}
}
	else{
	header("Location:pin.php?msg=Please enter the pin");
	}

}

	






/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages)
{
	$date=date('Y-m-d');
	 $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$packages."'"));
	$spc=$comm['sponsor_commission'];
	$pb=$comm['pb'];
	$withdrawal_commission=$pb*$spc/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0)
	{
	//mysql_query("update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Sponsor Income','Earn Sponsor Income from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Sponsor Income','$invoice_no','Sponsor Income','1','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");	
	}
}
/* Sponsor Commission Code Ends Here*/
?>