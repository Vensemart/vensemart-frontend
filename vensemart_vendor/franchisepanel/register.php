<?php include('../lib/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 

  <script type="text/javascript"><!--
    function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();
    if (password != confirmPassword)
    $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
    $("#divCheckPasswordMatch").html("Passwords match.");
    }
    //--></script>
    <script type="text/javascript"><!--
    function checkPasswordMatch1() {
    var password1 = $("#txtNewPassword1").val();
    var confirmPassword1 = $("#txtConfirmPassword1").val();
    if (password1 != confirmPassword1)
    $("#divCheckPasswordMatch1").html("Password do not match!");
    else
    $("#divCheckPasswordMatch1").html("Passwords match.");
    }
  //--></script>

  <script type="text/javascript">
    function validates1(){
    x=document.register
    input=x.password.value
    if (input.length<6){
    alert("The Password and Transaction Password cannot contain less than 6 characters and more than 12 characters!")
    return false
    }else {
    return true
    }

    x1=document.register
    input1=x1.transaction_pwd.value
    if (input1.length<6){
    alert("The Password and Transaction Password cannot contain less than 6 characters and more than 12 characters!")
    return false
    }else {
    return true
    }
    }
  </script>
  <script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#email").blur(function (e) {
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var email = $(this).val();

    if(email.length < 1){$("#email").html('');return;}
    if(email.length >= 1){
    $("#checkemail").html('<img src="images/preloader.gif" />');
    $.post('regis2.php', {'email':email}, function(data) {

    $("#checkemail").html(data);
    });
    }
    }); 
    });
    
    
    $(document).ready(function() {
    $("#sponsorid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var sponsorid = $(this).val();
    if(sponsorid.length < 1){$("#checksponser").html('');return;}
    if(sponsorid.length >= 1){
    $("#checksponser").html('<img src="images/preloader.gif" />');
    $.post('regis3.php', {'sponsorid':sponsorid}, function(data) {
    $("#checksponser").html(data);
    });
    }
    }); 
    });

    $(document).ready(function() {
    $("#masterid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var masterid = $(this).val();
    if(masterid.length < 1){$("#checkmaster").html('');return;}
    if(masterid.length >= 1){
    $("#checkmaster").html('<img src="images/preloader.gif" />');
    $.post('regis5.php', {'masterid':masterid}, function(data) {
    $("#checkmaster").html(data);
    });
    }
    }); 
    });

    $(document).ready(function() {
    $("#placementid").blur(function (e) {

    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var refid = $(sponsorid).val();
    //alert(refid);
    var placementid = $(this).val();
    if(placementid.length < 1){$("#checkplace").html('');return;}

    if(placementid.length >= 1){
    $("#checkplace").html('<img src="images/preloader.gif" />');
    $.post('regis4.php', {'placementid':placementid,'refid':refid}, function(data) {
    $("#checkplace").html(data);
    });
    }
    }); 
    });
  </script> 
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skyinfo Registration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
      
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .mar-t-b {
        margin-bottom: 17px;
      }
    </style>

     <style type="text/css">
      .login-page {
        /* background: no-repeat; */
        background-image: url(./images/login1.jpg);
        color: #8a8a8a;
        background-position: unset;
        background-size: cover;
        height: 1050px;
      }

@media (min-width: 768px){


.modal-dialog {
    margin: 30px auto;
    width: 964px;
}}

.modal-body {
    padding: 15px 28px;
    position: relative;
    line-height: 1.8;
}
.modal-title {
    line-height: 1.42857;
    margin: 0;
    padding: 4px 28px;
}

    </style>
    
  </head>
 <?php if(isset($_REQUEST['pl_id']) && $_REQUEST['pl_id']!='')
{
  $pl_id = $_REQUEST['pl_id'];
  $_SESSION['pl_id'] = $pl_id;
}
if(isset($_REQUEST['sponsor_id']) && $_REQUEST['sponsor_id']!='')
{
  $sponsor_id = $_REQUEST['sponsor_id'];
  $_SESSION['ref_id'] = $sponsor_id;
}
if(isset($_REQUEST['binary_pos']) && $_REQUEST['binary_pos']!='')
{
  $binary_pos = $_REQUEST['binary_pos'];
}
$quest=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_SESSION['ref_id']."'"));
$quest1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_SESSION['pl_id']."'")); 



?>
  <body class="login-page">





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          Terms  And Conditions</h4>
      </div>
      <div class="modal-body">
       <p>Coming Soon</p>

      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
      </div>
    </div>
  </div>
</div>




    <div class="animsition">

      <main class="register-container">

        <div class="panel-container" style="max-width: 530px !important;width: 100%;">
          <section class="panel" style="width: 100%;">
            <header class="panel-heading">
              <img src="images/logo.png" class="big-logo" alt=""><br/>
              <h3>Registration</h3>
            </header>
            <div class="panel-body">
              <form name="registration" method="post"  method="post" action="../post-action.php"  onsubmit="return validates1()" >
             <input type="hidden" name="action" value="UserRegistration">   
              <?php @$msg=$_GET['msg'];if($msg!='') { ?>
                     <div class="reg-header">
                        <p align="right"> <br/><span style="color:#F00; float:right; font-weight:bold;"><?php if($msg=='ist') { echo "Register Successfully..! Please Check Your Email."; } else if($msg=='username') {  echo "Username Already Exists";} else if($msg=='sponsor') {  echo "Sponsor Not Exists or Wrong platform choosen by you";}  else if($msg=='email') { echo "Email Already Exists";}  else if($msg=='username1') { echo "Please Enter Username";} else if($msg=='platform') { echo "Please Select Package";} else if($msg=='position') { echo "Please Select Position"; } else { echo @$msg;} ?></span></p>                    
                    </div><?php } ?>
                          <div class="panel-body text-left">
                             
                             
                            <label for="sponser_id" style="margin-left: 9px;">Enter Sponser Id<i style="color:#FF0000;">*</i></label>
                            <div class="col-sm-12 mar-t-b">
                                                        
                          <input type="text" class="form-control"  name="sponsorid" required onblur="checkuser(this.value)"  autocomplete="off" id="sponsorid" title="Sponsor name" value="<?php if($_SESSION['Ref_Name']!='') { echo $_SESSION['Ref_Name']; } else if($_SESSION['ref_id']!='') { echo $_SESSION['ref_id']; }  else {} ?>" <?php if($_SESSION['Ref_Name']!='') { ?> readonly <?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span id="checksponser"></span> 
                            
                                                      <!--<input class="form-control" placeholder="Please Enter Sponsor" data-toggle="tooltip" data-placement="left" data-original-title="The last tip!" type="text">-->
                                                      
                            </div>
                            
                            
                            <div class="clearfix"></div>
                            
                            <label for="position" style="margin-left: 9px;">Select position<i style="color:#FF0000;">*</i></label>
                            <div class="col-sm-12 mar-t-b">
                                    <select class="form-control" name="binary_pos" id="binary_pos" required>
                                        
                                        <option value="left" <?php if($binary_pos=='left') { ?> selected <?php } ?> >Left</option> 
                                        <option value="right" <?php if($binary_pos=='right') { ?> selected <?php } ?>>Right</option> 
                                                        
                                   </select>
                            </div>
                                                   
                            <div class="clearfix"></div>
                                                
                                                    
                                                     <label for="email" style="margin-left: 9px;">Enter a valid email<i style="color:#FF0000;">*</i></label>
                                                     <div class="col-sm-12 mar-t-b">
                                                     <input class="form-control"   type="email" id="email" name="email" required>
                                                     <span id="checkemail"></span> 
                                                    </div>
                                                   
                                                   <div class="clearfix"></div>
                                                    
                                                   
                                                    <label for="firstname" style="margin-left: 9px;">Enter First name<i style="color:#FF0000;">*</i></label>
                                                    <div class="col-sm-12 mar-t-b">
                                                      <input class="form-control" name="firstname" id="firstname" required type="text">
                                                       <span id="efirstname" style="color:#FF0000;"></span>
                                                    </div>
                                                    
                                                     <div class="clearfix"></div>
                                                     
                                                  <label for="lastname" style="margin-left: 9px;">Enter Last name<i style="color:#FF0000;">*</i></label>
                                                     <div class="col-sm-12 mar-t-b">
                                                      <input class="form-control" name="lastname" id="lastname" required type="text">
                                                      <span id="elastname" style="color:#FF0000;"></span>
                                                    </div>
                                                   
                                                      <div class="clearfix"></div>
                                                     
                                                  <label for="mobile" style="margin-left: 9px;">Enter Mobile number<i style="color:#FF0000;">*</i></label>
                                                    <div class="col-sm-12 mar-t-b">
                                                      <input class="form-control"  type="number" name="phone" id="phone"  required>
                                                     <span id="ephone" style="color:#FF0000;"></span>
                                                    </div>
                                                    
                                                    <div class="clearfix"></div>
                                                    
                                                  <label for="pan" style="margin-left: 9px;">Enter pan number<i style="color:#FF0000;">*</i></label>
                                                       <div class="col-sm-12 mar-t-b">
                                                      <input class="form-control"  type="text" name="passport" id="passport"  required>
                                                      <span id="epan" style="color:#FF0000;"></span>
                                                    </div>
                                                    
                                                    <div class="clearfix"></div>
                                                    
                                                    
                                                    <label for="desire" style="margin-left: 9px;">Enter Desired Userid</label>
                                                     <div class="col-sm-12 mar-t-b">
                                                      <input class="form-control" maxlength="6" type="text" name="dziredid" id="dziredid" onkeypress="return isNumberKey(event)" >
                                                        <span id="edziredid" style="color:#FF0000; "></span>
                                                    </div>
                                                    
                                            
                                                    <div class="col-sm-11 mar-t-b">

                                                      <input type="radio" name="term_cond" required data-toggle="modal" data-target="#myModal"> <font class="bldf"><a href="#" data-toggle="modal" data-target="#myModal" target="_blank">I Read Terms &amp; Conditions</a></font>

                                                          <!-- Button trigger modal -->

                                                    </div>
                                                
                                              </div>
                                               <div class="panel-footer2 text-right"><button type="submit" name="submit" class="btn btn-primary btn-lg">Continue</button></div>
                         
                                             <!-- <div class="panel-footer2 text-right"><a href="#" class="btn btn-primary btn-lg" style="padding-right:25px;">Continue</a></div>-->

                                            </div>

                <!-- <div class="form-group text-center">
                  <a href="#" class="btn-login btn btn-primary">Register</a> 
                  <a href="login.html" class="btn-login btn btn-danger">Cancel</a>
                </div> -->
              </form>
              <hr>
              <div class="register-now">
                <p>Already a user? <a href="login.php">Sign in</a></p><br />
              </div>
            </div>
          </section>
        </div>
      </main> <!-- /playground -->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.11.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/jquery.animsition.min.js"></script>
      <script src="js/login.js"></script>


<!--<script type="text/javascript">
 $(document).ready(function() {
    $("#dziredid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var userid = $(this).val();
    if(userid.length < 1){$("#edziredid").html('');return;}
    if(userid.length >= 1){
    $("#edziredid").html('<img src="images/preloader.gif" />');
    $.post('dziredid.php', {'userid':userid}, function(data) {
    $("#edziredid").html(data);
    });
    }
    }); 
    });
</script>-->
    <script type="text/javascript">
 
 $(document).ready(function() {
    $("#passport").blur(function (e) {
 var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
 var txtpan = $(this).val(); 

 if (txtpan.length == 10 ) { 
  if( txtpan.match(regExp) ){ 
 
   $("#epan").html('PAN match found');
  }
  else {
  
   $("#epan").html('Not a valid PAN number');
   event.preventDefault(); 
   $("#passport").val('');
  } 
 } 
 else { 
      
       $("#epan").html('Please enter 10 digits for a valid PAN number');
       $("#passport").val('');
       event.preventDefault(); 
 } 

});
    });
</script>
 <script type="text/javascript">
 
 $(document).ready(function() {
    $("#phone").blur(function (e) {
  var txtphone = $(this).val();

 if (txtphone.length != 10 ) { 

      
       $("#ephone").html('Please enter 10 digits for a valid Phone number');
       $("#phone").val('');
       event.preventDefault(); 
 } else{
  $("#ephone").html('');
 }

});
    });
</script>
 <script type="text/javascript">
 
 $(document).ready(function() {
    $("#firstname").blur(function (e) {
  var firstname = $(this).val();

if(firstname==''){
        $("#efirstname").text("*Please enter the first name");
     
    }

   else if(!/^[A-Za-z0-9_. ]+$/.test(firstname)){
        $("#efirstname").text("* You can not use Special Charecter");
      $("#firstname").val(''); 
    }else{
     $("#efirstname").text("");
    }

});
    });
</script>
 <script type="text/javascript">
 
 $(document).ready(function() {
    $("#firstname").blur(function (e) {
  var firstname = $(this).val();

if(firstname==''){
        $("#efirstname").text("*Please enter the first name");
     
    }

   else if(!/^[A-Za-z0-9_. ]+$/.test(firstname)){
        $("#efirstname").text("* You can not use Special Charecter");
      $("#firstname").val(''); 
    }else{
     $("#efirstname").text("");
    }

});
    });
</script>
 <script type="text/javascript">
 
 $(document).ready(function() {
    $("#dziredid").blur(function (e) {
  var dziredid = $(this).val();


if(!/^[0-9]+$/.test(dziredid)){
        $("#edziredid").text("Please enter only numbers");
      $("#dziredid").val('');  
    }
  else{
     $("#edziredid").text("");
    }

});
    });
</script>
    </div>
  </body>
</html>