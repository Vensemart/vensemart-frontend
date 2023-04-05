<?php
ob_start();
include("lib/config.php");
define("Currency",'RM');
$value1 = $_GET['action'];
print_r($value1);die;
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

case "Poc_Registration":			
_PocRegistration();
break;

  
case "loginuser":
_LoginUserCode();
break;

case "pocloginuser":
_PocLoginUserCode();
break;


case "ForgotPassword":			
_ForgotPassword();
break;

case "ForgotPasswordPOC":			
_ForgotPasswordPOC();
break;

case "CheckUserEwalletBalance":
_CheckUserEwalletBalance();
break;

case "AddUser":
_AddUser();
break;

case "UpdateUser":
_UpdateUser();
break;

}


function _AddUser()
{

if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['username']) && isset($_POST['password']) )
{
if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) )
{

				global $mxDb;
				$user_id = rand(00000,99999);
				$insert = array(
						'name'=>$_POST['name'],
						'user_id'=>$user_id,
						'username'=>$_POST['username'],
						'password'=>hash("sha256",$_POST['password']),
						'email'=>$_POST['email'],
						'type'=>'sub_admin',
						'date'=>date('Y-m-d'),
						'add_date_time'=>date('Y-m-d H:i:s')

				);

				if($mxDb->insert_record( 'admin', $insert ))
				{
					$privileage = $_POST['privileage'];

					foreach( $privileage as $privil)
					{

						$insert_array = array(

								'privilege_page'=>$privil,

								'date'=>date('Y-m-d'),

								'add_date_time'=>date('Y-m-d H:i:s'),

								'admin_id'=>$user_id

						           );
						$mxDb->insert_record( 'admin_privileges', $insert_array );

					}
					header("Location:cmsadmin/sub-admin-manage.php?msg=Add user successfully");
				}
				else{
					header("Location:cmsadmin/sub-admin-manage.php?msg=Failed record insertion");
				}
			}
			else
				header("Location:cmsadmin/add-sub-admin.php?msg=Please fill fields information");
		}
		else
			header("Location:cmsadmin/add-sub-admin.php?msg=Please fill fields information");

	}

function _UpdateUser()
{

		if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['id']) )
		{
			if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['id']) )
			{
				global $mxDb;
				$user_id = $_POST['id'];

	            $res=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where user_id='$user_id'"));
				$res1=$res['password'];
	            if($res1==$_POST['password'])
				{
					$update = array(
						'name'=>$_POST['name'],
						'username'=>$_POST['username'],
						'email'=>$_POST['email']
				);
				}
				else
				{
				$update = array(
						'name'=>$_POST['name'],
						'username'=>$_POST['username'],
						'password'=>hash("sha256",$_POST['password']),
						'email'=>$_POST['email']
				);
				}
				$where = " user_id=".$user_id;
				if($mxDb->update_record( 'admin', $update, $where ))
				{
					$mxDb->delete_record('admin_privileges', "admin_id='".$user_id."'");
					$privileage = $_POST['privileage'];
					foreach( $privileage as $privil){
						$insert_array = array(
								'privilege_page'=>$privil,
								'date'=>date('Y-m-d'),
								'add_date_time'=>date('Y-m-d H:i:s'),
								'admin_id'=>$user_id
						);
						$mxDb->insert_record( 'admin_privileges', $insert_array );
					}
					header("Location:cmsadmin/sub-admin-manage.php?msg=Update User successfully!&res=1");
				}
				else{
					header("Location:cmsadmin/sub-admin-manage.php?msg=Failed record updateion!&res=1");
				}
			}
			else
				header("Location:cmsadmin/sub-admin-manage.php?msg=Please fill fields information!&res=0");
		}
		else
			header("Location:cmsadmin/sub-admin-manage.php?msg=Please fill fields information!&res=0");
	
}


function _PocRegistration(){
	global $mxDb;
	
	$firstname=$_POST['firstname'];
	$username=$_POST['username'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
    $t_code=$_POST['password'];
	$city=$_POST['city'];
    $address=$_POST['address'];
    $lendmark=$_POST['lendmark'];
    $phone=$_POST['phone'];
    $sex=$_POST['sex'];
$state=$_POST['state'];
$stock_point=$_POST['stock_point'];
$country=$_POST['country'];
$franchise_category=$_POST['franchise_category'];
     if($user_id=='123456' || $user_id=='')
			{
                $user_id=userid();
			}
		if($franchise_category=='Master Franchise')
            {
               $franchise_satus=1;
            }else{

               $franchise_satus=0; 
            }	
				
$gst=$_POST['gst'];
$date=date('Y-m-d');

if($user_id!='')
{
$insert_array = array('user_id'=>$user_id,'username'=>$username,'password'=>$password,'first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email,'user_status'=>"0",'registration_date'=>$date,'t_code'=>$t_code,'telephone'=>$phone, 'address'=>$address,'city'=>$city,'sex'=>$sex,'state'=>$state,'country'=>$country,'lendmark'=>$lendmark,'franchise_category'=>$franchise_category,'franchise_satus'=>$franchise_satus,'stock_point'=>$stock_point,'gst'=>$gst);
			if($mxDb->insert_record('poc_registration', $insert_array))
			{
		   mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_e_wallet values(NULL,'$user_id','0','0')");
		   mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_income_wallet values(NULL,'$user_id','0','0')");
			}
		}
	
if ($stock_point!='') {
// 	header("Location:cmsadmin/poc_registration.php?msg=Registration Successfully");
?>
<script>
    alert('Registration Successfully!!');
    window.location.href="https://vensemart.com/vensemart_vendor/franchisepanel/login.php";
</script>
<?php
// 	header("Location:franchisepanel/login.php?msg=Registration Successfully");
// 	exit;
}else{
// 	header("Location:cmsadmin/poc_registration1.php?msg=Registration Successfully");
// 	header("Location:franchisepanel/login.php?msg=Registration Successfully");
// 	exit;
?>
<script>
    alert('Registration Successfully!!');
    window.location.href="https://vensemart.com/vensemart_vendor/franchisepanel/login.php";
</script>
<?php
}
	

}


/*User Login Code Starts here*/
function _PocLoginUserCode(){
    // echo "test";die;
	global $mxDb;
	 @$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
     @$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
       @$url=$_POST['url'];

       
     if($username!='' && $password!='' )
	 {
		if(strlen($username) && strlen($password))
        {
			 $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') && password = '$password'))");
			 $result=mysqli_fetch_array($query);
					if($num=mysqli_num_rows($query))
					{ 
						$user_id=$result['user_id'];
						$_SESSION['SD_User_Name']=$result['username'];
					
						$_SESSION['puc_user_id']=$user_id;

						/* store the visitor info in table code start here*/
						$guest_ip   = $_SERVER['REMOTE_ADDR'];
       					$fo=$result['first_name']." ".$result['last_name'];
						mysqli_query($GLOBALS["___mysqli_ston"], "insert into visitor values (NULL,'$user_id','".$result['username']."','$fo','$guest_ip',CURRENT_TIMESTAMP)");
						/* store the visitor info in table code ends here*/	

						if($url!='')
				         { 
				        		
				         ?>		
					 	<script type="text/javascript">
						 window.location.href='franchisepanel/index.php';

						</script>

				         <?php
				         exit();  
				         }
				         else
				         {
				         	?>
				        	<script type="text/javascript">
						 window.location.href='franchisepanel/index.php';

						</script> 	
				         <?php
				         exit();
				          }

					}
					else
					{
						header("location:franchise-login.php?msg=wrong");
	       			}
	 		} 
	}
	
}
/*User Login Code Ends here*/



function _ForgotPasswordPOC(){

	global $mxDb;

	$strSubject = "Password Credential From nextgeneration";  

	if($_POST['email']!='')

	{

		$email=$_POST['email'];

		 $res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where email='$email'");

		 $res1=mysqli_num_rows($res);
		 if($res1 == '0')

        {
			  header("location:pucpanel/forgot.php?msg=Email not found in our database!");

		  }

			  else

					  {

          $res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where email='$email'");


		  $res1=mysqli_fetch_array($res);
          $pass=$res1['password'];
          $username=$res1['first_name'];
          $user_id=$res1['user_id'];
          $t_code=$res1['t_code'];

 $desc='Hello '.$username.' Your password is '.$pass.' and your transaction password is '.$t_code.' . Regards Renzglobal'; 
	     
header("location:pucpanel/forgot.php?msg=Password sent to your email id!");
}
}
else
{
header("location:pucpanel/forgot.php?msg=Unable to process try another time!");
}
}
/*Forgot Password Code Ends here */




/*User Login Code Starts here*/
function _LoginUserCode(){
	global $mxDb;
 	@$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
    @$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
    @$url=$_POST['url']; 
    if(!isset($url) && $url == ''){
        $url = $_SESSION['url'];
    }
    if($username!='' && $password!='' ){
		if(strlen($username) && strlen($password)){
			$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') && password = '$password'))");
			$result=mysqli_fetch_array($query);
			if($num=mysqli_num_rows($query)){ 
				$user_id=$result['user_id'];
				$_SESSION['SD_User_Name']=$result['username'];
				$_SESSION['userpanel_user_id']=$user_id;
				$_SESSION['designation']=$result['designation'];
				/* store the visitor info in table code start here*/
				$guest_ip   = $_SERVER['REMOTE_ADDR'];
				$_SESSION['currency']='INR';
                $_SESSION['rates']=1;
				$fo=$result['first_name']." ".$result['last_name'];
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into visitor values (NULL,'$user_id','".$result['username']."','$fo','$guest_ip',CURRENT_TIMESTAMP)");
				/* store the visitor info in table code ends here*/	

				if($url!=''){ ?>		
					<script type="text/javascript">
						window.location.href='<?php echo $url; ?>';
					</script>
					<?php 	exit();  
				}else{ 	?>
				    <script type="text/javascript">
						 //window.location.href='dashboard/dashboard.php';
						  window.location.href='dashboard/index.php';
					</script> 	
		         	<?php
				        exit();
				}
			}else{
				// header("location:login1.php?msg=wrong");
					header("location:dashboard/login1.php?msg=wrong");
	       	}
	 	} 
	}
	
}
/*User Login Code Ends here*/

/*Userid Generate Code Starts Here */
function userid(){
	$table_name='user_registration';
	$encypt1=uniqid(rand(1000000000,9999999999), true);
	$usid1=str_replace(".", "", $encypt1);
	$pre_userid = "".substr($usid1, 0, 7);
	$checkid=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from $table_name where user_id='$pre_userid'");
	if(mysqli_num_rows($checkid)>0){
		userid();
	}else
		return $pre_userid;
}
/*Userid Generate Code Ends Here */


/*Registration Spill Code Starts Here for finding the nomid */
function spill_id1s2($sponserid,$posi){
	global $nom_id;
	$query1="select * from user_registration where nom_id='$sponserid' and binary_pos='$posi'";
	$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
	$row=mysqli_fetch_array($result1);
	$rclid1=$row['user_id'];
	if($rclid1!=""){
		spill_id1s2($rclid1,$posi);
	}else{
		$nom_id=$sponserid;
	}
	return $nom_id;
}

function mem_pos($ref_id123){
	$count_left_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='left'"));
	$count_right_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='right'"));
	// if both leg same 
	if($count_left_count==$count_right_count){
		$posi='left';
	}else{
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

		


/*User Registration Code Starts Here */
function _UserRegistration(){
    
    //print_r($_POST);die;
    
	global $mxDb;
	$date = date("Y-m-d");
	$term_cond 		=	$_POST['term_cond'];
	$firstname 		=	strtoupper($_POST['firstname']);
	$lastname 		=	strtoupper($_POST['lastname']);
	$sponsorid 		=	$_POST['sponsorid'];
	if($sponsorid!=''){
		$sponsorid 	=	$sponsorid;
	}else{
		$sponsorid 	=	'123456';
	}
	$dob                =   $_POST['dob'];
	
	$_POST['group_type']=$_POST['binary_pos'];
	// 	if($_POST['group_type']!=''){
	// 	$_POST['group_type']=$_POST['group_type'];
	// }else{
	// 	$_POST['group_type']='1';
	// }
	
	

$enter_date=date('Y',strtotime($dob));
$check_date=date('Y',strtotime($date));

$adult_check=($check_date-$enter_date);
// echo $adult_check;die;

if ($adult_check<18)
{
	header("location:dashboard/register.php?msg=age");
		exit;
}

	$username 			=	strtoupper($_POST['username']);
	$email 				=	$_POST['email'];
	$country 			=	"India";
	$password 			=	$_POST['password'];
	$gtb_wallet_address	=	$_POST['gtb_wallet_address'];
    //$state 				=	$_POST['state'];
	//$city 				=	$_POST['city'];
    //$address 			=	$_POST['address'];
    //$pincode 			=	$_POST['pincode'];
    $phone 				=	$_POST['phone'];
     $father_name 				=	strtoupper($_POST['father_name']);
     $sex 				=	strtoupper($_POST['gender']);
    $binary_pos 		=	$_POST['binary_pos'];
    $placementid 			=	$_POST['placementid'];
	$nom_id123 			=	$_POST['placementid'];
	$ent 				=	$_POST['ent'];
	$platform 			=	$_POST['platform'];
	$passport 			=	$_POST['passport'];
	//$dob 				=	$_POST['year']."-".$_POST['month']."-".$_POST['day'];
	//$amts 				=	mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='$platform'"));
	//$amount 			=	$amts['amount'];
	$group_type         =   $_POST['group_type'];
	$rank 				=	'Affiliate';
    $tran 				=	$_POST['transaction_pwd'];
	$results 			=	mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' || username='$sponsorid') and user_status='0')");
	$row_ref 			=	mysqli_fetch_assoc($results);
    $ref_id 			=	$row_ref['user_id'];	
	$ref_username 		=	$row_ref['username'];	
	$ref_pos 			=	$row_ref['binary_pos'];
    $ref_id123 			=	$ref_id;

	
    	

 $resultings = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='$placementid' || username='$placementid')");
    $row_refing=mysqli_fetch_array($resultings);
    $nom_id1=$row_refing['user_id'];
$unamecheck =mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='$username' || username='$username')"));
if($unamecheck>0)
{
   header("location:dashboard/register.php?msg=Username Already Exist!");exit;
}
 
	if ($binary_pos!='') {
		$binary_pos =	$binary_pos;
	}else{
	    $binary_pos =	mem_pos($ref_id123);
	}
	if($nom_id123!=''){
    	$nom_id123 	= 	spill_id1s2($nom_id123,$binary_pos);
    }else{
    	$nom_id123 	= 	spill_id1s2($ref_id123,$binary_pos);
    }
    $resultings = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$nom_id123' || username='$nom_id123'))");
    $row_refing = mysqli_fetch_array($resultings);
    $nom_id1 	= $row_refing['user_id'];
    $nom_id 	= $nom_id1;
   
	$_SESSION['firstname']		=	$firstname;
    $_SESSION['lastname']		=	$lastname;
	$_SESSION['sponsorid']		=	$ref_id123;
	$_SESSION['username']		=	$username;
	$_SESSION['ent']			=	$ent;
	
	$_SESSION['email']			=	$email;
    $_SESSION['father_name']	=	$father_name;
    $_SESSION['sex']	        =	$sex;
	$_SESSION['password']		=	$password;
	//$_SESSION['state']			=	$state;
	//$_SESSION['city']			=	$city;
	//$_SESSION['address']		=	$address;
	$_SESSION['phone']			=	$phone;
       $_SESSION['group_type']=$group_type;
	//$_SESSION['lamount']		=	$amount;
	$_SESSION['platform']		=	$platform;
	$_SESSION['nomid']			=	$nom_id;
	$_SESSION['transaction_pwd']=	$password;
    $_SESSION['term_cond']		=	$term_cond;
	$_SESSION['position']		=	$posi;
    $_SESSION['passport']		=	$passport;
    $_SESSION['dob']			=	$dob;
    //$_SESSION['sex']			=	$_POST['sex'];
    $_SESSION['id_no']			=	strtoupper($_POST['id_no']);
    $_SESSION['pincode']		=	$pincode;
    $_SESSION['ranks']			=	$rank;
    $_SESSION['gtb_wallet_address']=	$gtb_wallet_address;    
    $_SESSION['ref_username']	=	$ref_username;
    //jaya code
	$resos=mysqli_query("select * from user_registration where ((user_id='$sponsorid' || username='$sponsorid') and  user_status=='0')");
	$resos1=mysqli_num_rows($resos);
	if($resos1 == '0'){
		header("location:dashboard/register.php?msg=sponsor");
	}else{
			//header("location:dashboard/registration-payment.php");
			//jaya code
		$user_id=userid();
		if($user_id=='123456' || $user_id==''){
  			$user_id=userid();
		}else{
			$_SESSION['user_id']=$user_id;
		}
		$_SESSION['user_id']=$user_id;
        $_SESSION['username']		=	$user_id;
        
        $resultings=0;
        $resultings = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ref_id='".$_SESSION['sponsorid']."'"));
        $resultings1=$resultings+1;
        $_SESSION['leg']=$resultings1;

		if($user_id!='' && $_SESSION['sponsorid']!='' && $_SESSION['username']!='' && $_SESSION['group_type']!=''){
		
			$numcount1=0;
		    $numcount=0;
	        $numcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where ref_id='".$_SESSION['sponsorid']."'"));
	        $numcount1=$numcount+1;

			$insert_array = array(
					'user_id'			=>	$user_id,
					'dob'				=>	$_SESSION['dob'], 
					'zipcode'			=>	$_SESSION['pincode'], 
					'ref_id'			=>	$_SESSION['sponsorid'],
					'nom_id'			=>	$nom_id,
					'username'			=>	$_SESSION['username'],
					'password'			=>	$_SESSION['password'],
					'first_name'		=>	$_SESSION['firstname'],
					'last_name'			=>	$_SESSION['lastname'],
					'email'				=>	$_SESSION['email'],
					'binary_pos'			=>	$binary_pos,
					'admin_status'		=>	"0",
					'user_status'		=>	"0",
					'registration_date'	=>	$date,
					'designation'		=>	'Free User',
					'user_rank_name'	=>	'Free User',
					't_code'			=>	$_SESSION['transaction_pwd'], 
					'father_name'				=>	$_SESSION['father_name'], 
					'sex'				=>	$_SESSION['sex'], 
					//'city'				=>	$_SESSION['city'], 
					'telephone'			=>	$_SESSION['phone'], 
					//'address'			=>	$_SESSION['address'], 
					'user_plan'			=>	$_SESSION['platform'], 
					'id_card'			=>	'NRIC', 
					'id_no'				=>	$_SESSION['id_no'], 
					//'sex'				=>	$_SESSION['sex'], 
					//'dob'				=>	$_SESSION['dob'],
					'gtb_wallet_address'=>	$_SESSION['gtb_wallet_address'],
					'ref_count' 		=>	$numcount1,
					'reg_from'          =>  'website',
					'group_type'        =>  $_POST['group_type'],
					'registration_datetyme'        =>  date("Y-m-d H:i:s"),
					
					'ref_leg'          =>  $resultings1

					
			);

			if($mxDb->insert_record('user_registration', $insert_array)){
				
			
		    	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		    	mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
			
		    	$group=$_POST['group_type'];



	           $resultings=0;
               $resultings = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ref_id='".$_SESSION['sponsorid']."' and user_id!='".$_SESSION['user_id']."'"));
                $resultings1=$resultings+1;
                $leg=$resultings1;
                $user_id = $_SESSION['user_id'];
				$nom123=$_SESSION['sponsorid'];
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$user_id."', income_id='$nom123', l_date='$date', status=0, level='$l1', leg='$leg', `group_type`='$group'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id,ref_leg,group_type from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				$leg=$fetchnompos1['ref_leg'];
				$group=$fetchnompos1['group_type'];
				}
				}
$nom=$nom_id;
$pos=$binary_pos;
	$l 		=	1;
				while($nom!='cmp'){
					if($nom!='cmp'){
						mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='$user_id', income_id='$nom', leg='$pos', l_date='".date('Y-m-d')."', status=0, level='$l'");
						$l++;
						$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom' ");
						$fetchnompos=	mysqli_fetch_array($selectnompos);
						$pos 		=	$fetchnompos['binary_pos'];
						$nom 		=	$fetchnompos['nom_id'];
					}
				}



	/*Inserting Record of BV in manage bv table for all upliners code ends here*/
    $plan_nameing=$_SESSION['platform'];
	//commission_of_referal($_SESSION['sponsorid'],$user_id,$_SESSION['lamount'],$invoice_no,$plan_nameing);
	$_SESSION['userpanel_user_id']=$_SESSION['user_id'];
	$un=$_SESSION['user_id'];

$pw=$_SESSION['password'];

$refid=$_SESSION['sponsorid'];

header("Location:dashboard/thankyou.php?user_id=$un&password=$pw&sponid=$refid");
	exit;



			}else{
                	header("Location:dashboard/register.php?msg=Unable to register now");
                	exit;
			 }
			//jaya code end
		}else{
                header("Location:dashboard/register.php?msg=Unable to register now");
                 exit;
		}
	}
}

function _ForgotPassword(){
	global $mxDb;
	$strSubject = "Password Credential From Rootpure  Pvt. Ltd";  
	if($_POST['user_id']!=''){
		


		// $email=$_POST['email'];
		$user_id=$_POST['user_id'];
		$contact=$_POST['contact'];
		$dob=$_POST['dob'];


		$res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$user_id'");
		$res1=mysqli_num_rows($res);
		if($res1 == '0'){
			header("location:forgot.php?msg=Inavlid Data");

		}else{
          	$res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$user_id'");
			$res1=mysqli_fetch_array($res);
          	$email=$res1['email'];
          	$pass=$res1['password'];
          	$username=$res1['first_name'];
          	$user_id=$res1['user_id'];
          	$t_code=$res1['t_code'];
		$contact=$res1['telephone'];

 $recipient=$res1['telephone'];
  



                          $message=urlencode("Hello ".$username." Your password is ".$pass."  . Regards Rootpure Marketing Pvt. Ltd."); 
                  


    
			header("location:forgot.php?msg=Password sent to your phone no!");
		}
	}else{
		header("location:forgot.php?msg=Unable to process try another time!");
	}
}
/*Forgot Password Code Ends here */



/*Generate Invoice Number format code starts here*/
function _generateInvoiceNo(){
	global $mxDb;
	$rand = mt_rand(100000000000000,99999999999999999);
	$condition = " where invoice_no='".$rand."'";
	$args_invoice = $mxDb->get_information('lifejacket_subscription','invoice_no',$condition,true,'assoc');
	if(isset($args_invoice['invoice_no'])){
		if($args_invoice['invoice_no'] == $rand)
			_generateInvoiceNo();
		else
			return $rand;
	}else
		return $rand;
}
/*Generate Invoice Number format code ends here*/


/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages){
	$date=date('Y-m-d');
	//$commpac=mysql_fetch_array(mysql_query("select * from lifejacket_subscription where user_id='".$ref."' order by id desc limit 0,1"));
	//$commpac1=$commpac['package'];

	$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$packages."'"));
	$spc=$comm['sponsor_commission'];
	$withdrawal_commission=$spc*$amount/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0){		
    	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");

    	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','$rwalletss','$ref','$useridss','$date','Referral Income','Earn Referral Income from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Income','$invoice_no','Referral Income','0','E Wallet',CURRENT_TIMESTAMP,'$urls')");
   	}

}
/* Sponsor Commission Code Ends Here*/
?>