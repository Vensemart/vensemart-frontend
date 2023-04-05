<?php 
ob_start();
include("header.php");
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

if(isset($_POST['update'])){

if($_POST['amounts']=='')
{
   echo "<script language='javascript'> alert('Enter Details!'); window.location.href='fund-request.php'; </script>";
}

if(is_numeric($_POST['amounts']))
{
}
else
{
   echo "<script language='javascript'> alert('Enter Numbers only!'); window.location.href='fund-request.php'; </script>";
}


 if( $_POST['t_password'] != $f['t_code'] )
      {
        
          echo "<script language='javascript'> alert('Wrong Transaction Password!'); window.location.href='fund-request.php'; </script>";
        }
        
    $countutr=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from franchise_paymentproof where transaction_nu='".trim($_POST['transaction_nu'])."'"));    
    if($countutr>0){
        header("location:fund-request.php?msg=Sorry, From This Transaction Number Already Fund Requested!");
       exit();
    }   
        
        
     $check = getimagesize($_FILES["filess"]["tmp_name"]);
    if($check == false) {
        
        
       header("location:fund-request.php?msg=File is not an image.");
       exit(); 
    }


     //$filename12 = time()."main_".$_FILES["filess"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["filess"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif") {
  
    header("location:fund-request.php?msg=Sorry, file not  allowed.");
       exit();
}
$acc_name = $_POST['account_name'];
$bank_name = $_POST['bank_name'];
$acc_number = $_POST['account_number'];
$branch_name = $_POST['branch_name'];

$account_number = $_POST['account_number'];
$ifsc = $_POST['transaction_nu'];

$brcode = $_POST['branch_code'];

$amounts= $_POST['amounts'];
$date = date('Y-m-d');
$filename12 = $_FILES["filess"]["name"];
$rand = rand('1111111111','9999999999');
move_uploaded_file($_FILES["filess"]["tmp_name"],"paymentproof/" .$filename12);

mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO franchise_paymentproof (`user_id`,`amount`,`transaction_number`, `bank_name`, `acc_name`, `ac_no`, `branch_nm`, `transaction_nu`, `bank_recipt_proof`,  `status`,`datee`, `admin_remark`, `admin_date`) VALUES ('$userid','$amounts','$rand','$bank_name','$acc_name','$acc_number','$branch_name','$ifsc','$filename12','0','$date','','')");


require '../mailer/PHPMailerAutoload.php';

$email="vpupadhyay0086@gmail.com";
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = "mail.smtp2go.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = "srdev@maxtratechnologies.net";

//Password to use for SMTP authentication
$mail->Password = "Maxtra@2020";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('srdev@maxtratechnologies.net', 'Business forever');
//Set an alternative reply-to address
#$mail->addReplyTo($email, 'Business forever');
//Set who the message is to be sent to
$mail->addAddress($email, 'Business forever');
//Set the subject line
$mail->Subject = 'Business Forever Stockist Fund Request Confirmation';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Fund Request Details</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="https://www.businessforever.co.in/dashboard/images/logo-black.png" style="margin:0 0 2px 0; width: 150px; "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Fund Request Confirmation
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 200;color: rgb(72, 72, 72);font-size: 12px;line-height: 20px; margin-top: 13px; text-align:left"><b>Dear Member,</b><br /><br />
&nbsp; &nbsp; &nbsp; &nbsp; <b>Congratulations! </b><br/>

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Fund request from Business Forever Stockist Member.</b>
                   
                </div>
                
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                  
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h4> User ID : '.$f['user_id'].'<br>                 
                     Amount : '.$amounts.'<br>
                     Bank Name : '.$bank_name.'<br>
                     Payment Mode : '.$acc_number.'<br></h4>
                  </div>
                You can login into your account by clicking here: <a href="https://www.businessforever.co.in/franchisepanel/login.php"> Login Now </a> <br/>
               
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Business forever online marketing pvt Ltd.</p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

          $mail->send();


header("location:fund-request.php?msg=Request Send Successfully");

}


?>
