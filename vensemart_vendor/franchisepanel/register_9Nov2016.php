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
    $("#divCheckPasswordMatch1").html("e-Wallet Password do not match!");
    else
    $("#divCheckPasswordMatch1").html("Passwords match.");
    }
  //--></script>

  <script type="text/javascript">
    function validates1(){
    x=document.register
    input=x.password.value
    if (input.length<6){
    alert("The Password and Ewallet Password cannot contain less than 6 characters and more than 12 characters!")
    return false
    }else {
    return true
    }

    x1=document.register
    input1=x1.transaction_pwd.value
    if (input1.length<6){
    alert("The Password and Ewallet Password cannot contain less than 6 characters and more than 12 characters!")
    return false
    }else {
    return true
    }
    }
  </script>
  <script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#username").keyup(function (e) {
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var username = $(this).val();
    if(username.length < 1){$("#checkuser").html('');return;}
    if(username.length >= 1){
    $("#checkuser").html('<img src="images/preloader.gif" />');
    $.post('regis2.php', {'username':username}, function(data) {
    $("#checkuser").html(data);
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
    <title>Welcome</title>

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
  </head>

  <body class="login-page">
    <div class="animsition">

      <main class="register-container">

        <div class="panel-container" style="max-width: 960px !important;width: 100%;">
          <section class="panel" style="width: 100%;">
            <header class="panel-heading">
              <img src="../images/logo.png" class="big-logo" alt="SugarCrush">
              <p>Registration</p>
            </header>
            <div class="panel-body">
              <form name="registration" method="post"  method="post" action="../post-action.php"  onsubmit="return validates1()" >
             <input type="hidden" name="action" value="UserRegistration">   
              <?php @$msg=$_GET['msg'];if($msg!='') { ?>
                     <div class="reg-header">
                        <p align="right"> <br/><span style="color:#F00; float:right; font-weight:bold;"><?php if($msg=='ist') { echo "Register Successfully..! Please Check Your Email."; } else if($msg=='username') {  echo "Username Already Exists";} else if($msg=='sponsor') {  echo "Sponsor Not Exists or Wrong platform choosen by you";}  else if($msg=='email') { echo "Email Already Exists";}  else if($msg=='username1') { echo "Please Enter Username";} else if($msg=='platform') { echo "Please Select Package";} else { "Sorry Unable to Register";} ?></span></p>                    
                    </div><?php } ?>
                          <div class="panel-body text-left">

                                                    <div class="col-sm-6 mar-t-b">
                          <input type="text" class="form-control" placeholder="Sponsor Id"  name="sponsorid" required onblur="checkuser(this.value)"  autocomplete="off" placeholder="Please Enter Sponsor Id / Username" id="sponsorid" title="Sponsor name" value="<?php if($_SESSION['Ref_Name']!='') { echo $_SESSION['Ref_Name']; } else {} ?>" <?php if($_SESSION['Ref_Name']!='') { ?> readonly <?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span id="checksponser"></span> 
                            
                                                      <!--<input class="form-control" placeholder="Please Enter Sponsor" data-toggle="tooltip" data-placement="left" data-original-title="The last tip!" type="text">-->
                                                      
                                                    </div>
                                                  <div class="col-sm-6 mar-t-b">
                                                      <select class="form-control" name="platform" id="platform" required>
                                                          <option value="">Select Package</option> 
                                                        <?php 
                      $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance");

                      while($queryf1=mysqli_fetch_array($fquery)) {
                      ?>
                      <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?> ( MYR <?php echo $queryf1['amount'];?> )</option>
                      <?php } ?>
                                                        </select>
                                                    </div>

                                                   
                                                  
                                                    <div class="col-sm-12 mar-t-b">
                                                     <input class="form-control" placeholder="Enter Username" name="username"  required id="username" type="text">
                            <span id="checkuser"></span>
                                                    </div><div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" placeholder="Enter Password"  type="password" name="password" required id="txtNewPassword" >
                                                    </div>
                                                    <div class="col-sm-6 mar-t-b">
                          <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" required  id="txtConfirmPassword" onkeyup="checkPasswordMatch();">
                            <div class="registrationFormAlert" id="divCheckPasswordMatch" style="font-size:16px;color:#009999;"></div>
                            
                                                    </div>
                                                    
                                                   
                                                   <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" style="margin-top: -5px;" placeholder="Enter Transaction Password" type="password" name="transaction_pwd" required id="txtNewPassword1">
                                                    </div>
                                                    <div class="col-sm-6 mar-t-b">
                                                       <input class="form-control" placeholder="Confirm Transaction Password" type="password" name="transaction_pwd1" required   id="txtConfirmPassword1" onkeyup="checkPasswordMatch1();">
                                                      <div class="registrationFormAlert" id="divCheckPasswordMatch1" style="font-size:16px;color:#009999;"></div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" placeholder="Please enter your first name" name="firstname" required type="text">
                                                    </div>
                                                  
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" placeholder="Please enter your last name" type="text" name="lastname" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mar-t-b">
                             <input class="form-control" placeholder="Please enter your phone number" type="number" required name="phone">
                                                     
                                                    </div>
                                                  
                                                    <div class="col-sm-6 mar-t-b">
                                                     <input class="form-control" placeholder="Please enter a valid email address" type="email" required name="email">
                                                    </div>
                                                    
                                                    
                                                    <div class="col-sm-6 mar-t-b">
                                                      <select class="form-control"  name="country" id="country" required>
                                                          <option value="">Select a Country</option> 
                                                          <option value="United States">United States</option> 
                                                          <option value="United Kingdom">United Kingdom</option> 
                                                          <option value="Afghanistan">Afghanistan</option> 
                                                          <option value="Albania">Albania</option> 
                                                          <option value="Algeria">Algeria</option> 
                                                          <option value="American Samoa">American Samoa</option> 
                                                          <option value="Andorra">Andorra</option> 
                                                          <option value="Angola">Angola</option> 
                                                          <option value="Anguilla">Anguilla</option> 
                                                          <option value="Antarctica">Antarctica</option> 
                                                          <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                                                          <option value="Argentina">Argentina</option> 
                                                          <option value="Armenia">Armenia</option> 
                                                          <option value="Aruba">Aruba</option> 
                                                          <option value="Australia">Australia</option> 
                                                          <option value="Austria">Austria</option> 
                                                          <option value="Azerbaijan">Azerbaijan</option> 
                                                          <option value="Bahamas">Bahamas</option> 
                                                          <option value="Bahrain">Bahrain</option> 
                                                          <option value="Bangladesh">Bangladesh</option> 
                                                          <option value="Barbados">Barbados</option> 
                                                          <option value="Belarus">Belarus</option> 
                                                          <option value="Belgium">Belgium</option> 
                                                          <option value="Belize">Belize</option> 
                                                          <option value="Benin">Benin</option> 
                                                          <option value="Bermuda">Bermuda</option> 
                                                          <option value="Bhutan">Bhutan</option> 
                                                          <option value="Bolivia">Bolivia</option> 
                                                          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                                                          <option value="Botswana">Botswana</option> 
                                                          <option value="Bouvet Island">Bouvet Island</option> 
                                                          <option value="Brazil">Brazil</option> 
                                                          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                                                          <option value="Brunei Darussalam">Brunei Darussalam</option> 
                                                          <option value="Bulgaria">Bulgaria</option> 
                                                          <option value="Burkina Faso">Burkina Faso</option> 
                                                          <option value="Burundi">Burundi</option> 
                                                          <option value="Cambodia">Cambodia</option> 
                                                          <option value="Cameroon">Cameroon</option> 
                                                          <option value="Canada">Canada</option> 
                                                          <option value="Cape Verde">Cape Verde</option> 
                                                          <option value="Cayman Islands">Cayman Islands</option> 
                                                          <option value="Central African Republic">Central African Republic</option> 
                                                          <option value="Chad">Chad</option> 
                                                          <option value="Chile">Chile</option> 
                                                          <option value="China">China</option> 
                                                          <option value="Christmas Island">Christmas Island</option> 
                                                          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                                                          <option value="Colombia">Colombia</option> 
                                                          <option value="Comoros">Comoros</option> 
                                                          <option value="Congo">Congo</option> 
                                                          <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                                                          <option value="Cook Islands">Cook Islands</option> 
                                                          <option value="Costa Rica">Costa Rica</option> 
                                                          <option value="Cote D'ivoire">Cote D'ivoire</option> 
                                                          <option value="Croatia">Croatia</option> 
                                                          <option value="Cuba">Cuba</option> 
                                                          <option value="Cyprus">Cyprus</option> 
                                                          <option value="Czech Republic">Czech Republic</option> 
                                                          <option value="Denmark">Denmark</option> 
                                                          <option value="Djibouti">Djibouti</option> 
                                                          <option value="Dominica">Dominica</option> 
                                                          <option value="Dominican Republic">Dominican Republic</option> 
                                                          <option value="Ecuador">Ecuador</option> 
                                                          <option value="Egypt">Egypt</option> 
                                                          <option value="El Salvador">El Salvador</option> 
                                                          <option value="Equatorial Guinea">Equatorial Guinea</option> 
                                                          <option value="Eritrea">Eritrea</option> 
                                                          <option value="Estonia">Estonia</option> 
                                                          <option value="Ethiopia">Ethiopia</option> 
                                                          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                                                          <option value="Faroe Islands">Faroe Islands</option> 
                                                          <option value="Fiji">Fiji</option> 
                                                          <option value="Finland">Finland</option> 
                                                          <option value="France">France</option> 
                                                          <option value="French Guiana">French Guiana</option> 
                                                          <option value="French Polynesia">French Polynesia</option> 
                                                          <option value="French Southern Territories">French Southern Territories</option> 
                                                          <option value="Gabon">Gabon</option> 
                                                          <option value="Gambia">Gambia</option> 
                                                          <option value="Georgia">Georgia</option> 
                                                          <option value="Germany">Germany</option> 
                                                          <option value="Ghana">Ghana</option> 
                                                          <option value="Gibraltar">Gibraltar</option> 
                                                          <option value="Greece">Greece</option> 
                                                          <option value="Greenland">Greenland</option> 
                                                          <option value="Grenada">Grenada</option> 
                                                          <option value="Guadeloupe">Guadeloupe</option> 
                                                          <option value="Guam">Guam</option> 
                                                          <option value="Guatemala">Guatemala</option> 
                                                          <option value="Guinea">Guinea</option> 
                                                          <option value="Guinea-bissau">Guinea-bissau</option> 
                                                          <option value="Guyana">Guyana</option> 
                                                          <option value="Haiti">Haiti</option> 
                                                          <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                                                          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                                                          <option value="Honduras">Honduras</option> 
                                                          <option value="Hong Kong">Hong Kong</option> 
                                                          <option value="Hungary">Hungary</option> 
                                                          <option value="Iceland">Iceland</option> 
                                                          <option value="India">India</option> 
                                                          <option value="Indonesia">Indonesia</option> 
                                                          <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                                                          <option value="Iraq">Iraq</option> 
                                                          <option value="Ireland">Ireland</option> 
                                                          <option value="Israel">Israel</option> 
                                                          <option value="Italy">Italy</option> 
                                                          <option value="Jamaica">Jamaica</option> 
                                                          <option value="Japan">Japan</option> 
                                                          <option value="Jordan">Jordan</option> 
                                                          <option value="Kazakhstan">Kazakhstan</option> 
                                                          <option value="Kenya">Kenya</option> 
                                                          <option value="Kiribati">Kiribati</option> 
                                                          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                                                          <option value="Korea, Republic of">Korea, Republic of</option> 
                                                          <option value="Kuwait">Kuwait</option> 
                                                          <option value="Kyrgyzstan">Kyrgyzstan</option> 
                                                          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                                                          <option value="Latvia">Latvia</option> 
                                                          <option value="Lebanon">Lebanon</option> 
                                                          <option value="Lesotho">Lesotho</option> 
                                                          <option value="Liberia">Liberia</option> 
                                                          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                                                          <option value="Liechtenstein">Liechtenstein</option> 
                                                          <option value="Lithuania">Lithuania</option> 
                                                          <option value="Luxembourg">Luxembourg</option> 
                                                          <option value="Macao">Macao</option> 
                                                          <option value="Macedonia">Macedonia</option> 
                                                          <option value="Madagascar">Madagascar</option> 
                                                          <option value="Malawi">Malawi</option> 
                                                          <option value="Malaysia">Malaysia</option> 
                                                          <option value="Maldives">Maldives</option> 
                                                          <option value="Mali">Mali</option> 
                                                          <option value="Malta">Malta</option> 
                                                          <option value="Marshall Islands">Marshall Islands</option> 
                                                          <option value="Martinique">Martinique</option> 
                                                          <option value="Mauritania">Mauritania</option> 
                                                          <option value="Mauritius">Mauritius</option> 
                                                          <option value="Mayotte">Mayotte</option> 
                                                          <option value="Mexico">Mexico</option> 
                                                          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                                                          <option value="Moldova, Republic of">Moldova, Republic of</option> 
                                                          <option value="Monaco">Monaco</option> 
                                                          <option value="Mongolia">Mongolia</option> 
                                                          <option value="Montserrat">Montserrat</option> 
                                                          <option value="Morocco">Morocco</option> 
                                                          <option value="Mozambique">Mozambique</option> 
                                                          <option value="Myanmar">Myanmar</option> 
                                                          <option value="Namibia">Namibia</option> 
                                                          <option value="Nauru">Nauru</option> 
                                                          <option value="Nepal">Nepal</option> 
                                                          <option value="Netherlands">Netherlands</option> 
                                                          <option value="Netherlands Antilles">Netherlands Antilles</option> 
                                                          <option value="New Caledonia">New Caledonia</option> 
                                                          <option value="New Zealand">New Zealand</option> 
                                                          <option value="Nicaragua">Nicaragua</option> 
                                                          <option value="Niger">Niger</option>
                                                          <option value="Nigeria">Nigeria</option>
                                                          <option value="Niue">Niue</option> 
                                                          <option value="Norfolk Island">Norfolk Island</option> 
                                                          <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                                                          <option value="Norway">Norway</option> 
                                                          <option value="Oman">Oman</option> 
                                                          <option value="Pakistan">Pakistan</option> 
                                                          <option value="Palau">Palau</option> 
                                                          <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                                                          <option value="Panama">Panama</option> 
                                                          <option value="Papua New Guinea">Papua New Guinea</option> 
                                                          <option value="Paraguay">Paraguay</option> 
                                                          <option value="Peru">Peru</option> 
                                                          <option value="Philippines">Philippines</option> 
                                                          <option value="Pitcairn">Pitcairn</option> 
                                                          <option value="Poland">Poland</option> 
                                                          <option value="Portugal">Portugal</option> 
                                                          <option value="Puerto Rico">Puerto Rico</option> 
                                                          <option value="Qatar">Qatar</option> 
                                                          <option value="Reunion">Reunion</option> 
                                                          <option value="Romania">Romania</option> 
                                                          <option value="Russian Federation">Russian Federation</option> 
                                                          <option value="Rwanda">Rwanda</option> 
                                                          <option value="Saint Helena">Saint Helena</option> 
                                                          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                                          <option value="Saint Lucia">Saint Lucia</option> 
                                                          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                                                          <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                                                          <option value="Samoa">Samoa</option> 
                                                          <option value="San Marino">San Marino</option> 
                                                          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                                          <option value="Saudi Arabia">Saudi Arabia</option> 
                                                          <option value="Senegal">Senegal</option> 
                                                          <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                                                          <option value="Seychelles">Seychelles</option> 
                                                          <option value="Sierra Leone">Sierra Leone</option> 
                                                          <option value="Singapore">Singapore</option> 
                                                          <option value="Slovakia">Slovakia</option> 
                                                          <option value="Slovenia">Slovenia</option> 
                                                          <option value="Solomon Islands">Solomon Islands</option> 
                                                          <option value="Somalia">Somalia</option> 
                                                          <option value="South Africa">South Africa</option> 
                                                          <option value="South Georgia">South Georgia</option> 
                                                          <option value="Spain">Spain</option> 
                                                          <option value="Sri Lanka">Sri Lanka</option> 
                                                          <option value="Sudan">Sudan</option> 
                                                          <option value="Suriname">Suriname</option> 
                                                          <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                                                          <option value="Swaziland">Swaziland</option> 
                                                          <option value="Sweden">Sweden</option> 
                                                          <option value="Switzerland">Switzerland</option> 
                                                          <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                                                          <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                                                          <option value="Tajikistan">Tajikistan</option> 
                                                          <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                                                          <option value="Thailand">Thailand</option> 
                                                          <option value="Timor-leste">Timor-leste</option> 
                                                          <option value="Togo">Togo</option> 
                                                          <option value="Tokelau">Tokelau</option> 
                                                          <option value="Tonga">Tonga</option> 
                                                          <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                                                          <option value="Tunisia">Tunisia</option> 
                                                          <option value="Turkey">Turkey</option> 
                                                          <option value="Turkmenistan">Turkmenistan</option> 
                                                          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                                                          <option value="Tuvalu">Tuvalu</option> 
                                                          <option value="Uganda">Uganda</option> 
                                                          <option value="Ukraine">Ukraine</option> 
                                                          <option value="United Arab Emirates">United Arab Emirates</option> 
                                                          <option value="United Kingdom">United Kingdom</option> 
                                                          <option value="United States">United States</option> 
                                                          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                                                          <option value="Uruguay">Uruguay</option> 
                                                          <option value="Uzbekistan">Uzbekistan</option> 
                                                          <option value="Vanuatu">Vanuatu</option> 
                                                          <option value="Venezuela">Venezuela</option> 
                                                          <option value="Viet Nam">Viet Nam</option> 
                                                          <option value="Virgin Islands, British">Virgin Islands, British</option> 
                                                          <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                                                          <option value="Wallis and Futuna">Wallis and Futuna</option> 
                                                          <option value="Western Sahara">Western Sahara</option> 
                                                          <option value="Yemen">Yemen</option> 
                                                          <option value="Zambia">Zambia</option> 
                                                          <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                  
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" id="inputEmail3" placeholder="Enter City" type="text" name="city" id="city"  required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" placeholder="Enter State" type="text" name="state" required>
                                                    </div>
                                                  
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" name="postal"  placeholder="Enter Postal Code" type="text" required>
                                                    </div>
                                                    
                          <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" name="account_number" placeholder="Enter Account Number" required type="text">
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" name="branch_name" placeholder="Enter Branch Name" required type="text">
                                                    </div>
                                                  
                                                    <div class="col-sm-6 mar-t-b">
                                                      <input class="form-control" name="account_name" placeholder="Enter Account Name" required type="text">
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mar-t-b">
                           <input class="form-control" name="bank_name" placeholder="Enter Bank Name" required type="text">
                                                     
                                                    </div>
                                                    <div class="col-sm-12 mar-t-b">

                                                      <input type="radio" name="term_cond" required> <font class="bldf"><a href="#">I Read Terms &amp; Conditions</a></font>
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
                Already a user? <a href="login.php">Sign in</a>
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

    </div>
  </body>
</html>