<?php
	include_once("header.php");
	//check we have username post var
    $uid= $_POST["userID"];
    $rid = $_POST["receiverID"];
	/*$pan =  strtolower(trim($_POST["user_id"]));*/ 
	$date=date("Y-m-d");
	$user = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE user_id='$uid'"));

	$reciever = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE user_id='$rid'"));

	if(!empty($user) && !empty($reciever)) {
	    
	    $_SESSION['UserNumber'] = $user['telephone'];
	    $usernumber = $user['telephone'];
	    $username= strtoupper($user['first_name']);
	   // $_SESSION['otp'] = rand(111111,999999);
	    
	    $_SESSION['puc_name'] = $rid;
	    $recievernumber = $reciever['telephone'];
	    $recievername= strtoupper($reciever['first_name']);
	    $_SESSION['otp1'] = rand(111111,999999);
	   
	   // $message=urlencode("Dear customer,Mr. ".$recievername." wants to receive your products, if you agree,kindly share this  OTP ".$_SESSION['otp']." to pick-up point incharge");
    //     $curl11=curl_init();
	   // curl_setopt($curl11, CURLOPT_URL, "http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=d2d2154a15fd7ad3e2df2b74fc7a7b0&message=$message&senderId=ROOTPU&routeId=8&mobileNos=$usernumber&smsContentType=english");
    //     curl_exec($curl11);
    //     curl_close($curl11);
        
        $message1=urlencode("Dear customer ".$_SESSION['otp1']." is the OTP to receive the product.");
        $curl12=curl_init();
	    curl_setopt($curl12, CURLOPT_URL, "http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=d2d2154a15fd7ad3e2df2b74fc7a7b0&message=$message1&senderId=ROOTPU&routeId=8&mobileNos=$recievernumber&smsContentType=english");
        curl_exec($curl12);
        curl_close($curl12);



      mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO otp_details(`sender_id`, `receiver_id`,`sender_otp`, `receiver_otp`,`sender_no`,`receiver_no`, `date`) VALUES ('".$user['user_id']."','".$reciever['user_id']."','".$_SESSION['otp']."','".$_SESSION['otp1']."','".$user['telephone']."','".$reciever['telephone']."','$date')");
        
        
		echo json_encode(array('result'=>'success'));
	}
	
?>