<?php include("header.php");

if(isset($_POST['submit']))
{
$first1=$_POST['first_name1'];
$first2=$_POST['first_name2'];  
$first3=$_POST['first_name3'];  
$first4=$_POST['first_name4'];  
$first5=$_POST['first_name5'];  
$first41=$_POST['first_name41'];  
$first51=$_POST['first_name51']; 
$first6=$_POST['first_name6'];  
$first7=$_POST['first_name7'];  
$first8=$_POST['first_name8'];  
$first9=$_POST['first_name9'];  
$first10=$_POST['first_name10'];  
$first11=$_POST['first_name11'];  
$first12=$_POST['first_name12'];  
$first13=$_POST['first_name13'];  
$first14=$_POST['first_name14'];  
$first15=$_POST['first_name15'];  
if($first41!=$first4)
{
header("location:update-profile.php?msg=Password do not match !");
 exit; 
}
if($first51!=$first5)
{
header("location:update-profile.php?msg=Transaction Password do not match!");
 exit; 
}
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set first_name='$first1', last_name='$first2', email='$first3', password='$first4', t_code='$first5', address='$first6', country='$first7', state='$first8', city='$first9', zipcode='$first10', telephone='$first11', dob='$first12', sex='$first13', merried_status='$first14', aboutus='$first15' where user_id='$userid'");
header("location:update-profile.php?msg=Member Profile Updated Successfully !");
}


if(isset($_POST['update']))
{
  $first21=$_POST['Account1'];
  $first22=$_POST['Account2'];
  $first23=$_POST['Account3'];
  $first24=$_POST['Account4'];
  $first25=$_POST['Account5'];

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set acc_name='$first21', bank_nm='$first22', branch_nm='$first23', ac_no='$first24', swift_code='$first25' where user_id='$userid'");
header("location:update-profile.php?msg=Bank Detail Updated Successfully !");
}



if(isset($_POST['modify']))
{
$filename12 = time()."main_".$_FILES["uploadedfile"]["name"];
move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"images/" .$filename12);
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set image='$filename12' where user_id='$userid'");
header("location:update-profile.php?msg=Member Profile Photo Updated Successfully !");  
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">
    <div class="animsition">  
    
   
      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
   <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

        
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
   
      <?php include("top.php");?>
        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Update Profile</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Profile</a></li>
              <li><a href="#">Update Profile</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6">

              <section class="panel">
                <header class="panel-heading">
                  <h3 class="panel-title">Personal Information</h3>
                </header>
                <div class="panel-body">
                  <form name="input" method="post" name="user">
                    <div class="form-group">
                      <label for="exampleInputName">First Name:</label>
                      <input type="text" name="first_name1" class="form-control" id="exampleInputName" value="<?php echo $f['first_name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLName">Last Name:</label>
                      <input type="text" name="first_name2" class="form-control" id="exampleInputLName" value="<?php echo $f['last_name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email:</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="ti-email"></i></span>
                        <input type="email" name="first_name3" class="form-control" id="exampleInputEmail1" value="<?php echo $f['email'];?>">
                      </div>
                    </div>

                    <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputPassword1">Password:</label>
                      <input type="password" name="first_name4" class="form-control" id="exampleInputPassword1" value="<?php echo $f['password'];?>">
                    </div>
                    <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputPassword1">Confirm Password:</label>
                      <input type="password" name="first_name41" class="form-control" id="exampleInputPassword1" value="<?php echo $f['password'];?>">
                    </div>
                   <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputPassword2">Transaction Password:</label>
                      <input type="password" name="first_name5" class="form-control" id="exampleInputPassword2" value="<?php echo $f['t_code'];?>">
                    </div>

                    <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputPassword2">Confirm Transaction Password:</label>
                      <input type="password" name="first_name51" class="form-control" id="exampleInputPassword2" value="<?php echo $f['t_code'];?>">
                    </div>
                     <br>
                      <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputAddress">Address:</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="ti-home"></i></span>
                        <input type="text" name="first_name6" class="form-control" id="exampleInputAddress"value="<?php echo $f['address'];?>">
                      </div>
                    </div>



                    <div class="form-group col-md-6 no-right-padding">
                      <label>Country</label>
                      <select class="form-control" name="first_name7" readonly>
                      <option value="<?php echo $f['country'];?>"><?php echo $f['country'];?></option>
                      <option value="Singapore">Singapore</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="China">China</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Vietnam">Vietnam</option>
                      <option disabled="disabled">---------------------------</option>
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
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option> 
                      <option value="India">India</option> 
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
                      <option value="Virgin Islands, British">Virgin Islands, British</option>
                      <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                      <option value="Wallis and Futuna">Wallis and Futuna</option> 
                      <option value="Western Sahara">Western Sahara</option> 
                      <option value="Yemen">Yemen</option> 
                      <option value="Zambia">Zambia</option> 
                      <option value="Zimbabwe">Zimbabwe</option>
                      </select>
                    </div>

                     <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputUrl">State:</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="ti-world"></i></span>
                        <input type="text" name="first_name8" class="form-control" id="exampleInputUrl" value="<?php echo $f['state'];?>">
                      </div>
                    </div>

                    <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputCity">City:</label>
                      <input type="text" name="first_name9" value="<?php echo $f['city'];?>" class="form-control" id="exampleInputCity">
                    </div>

                    <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputZip">Zip Code:</label>
                      <input type="text" name="first_name10" value="<?php echo $f['zipcode'];?>" class="form-control" id="exampleInputZip">
                    </div>

                     <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputCity">Contact Number:</label>
                      <input type="text" name="first_name11" value="<?php echo $f['telephone'];?>" class="form-control" id="exampleInputCity">
                    </div>

                    <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputZip">Date Of Birth (yyyy-mm-dd):</label>
                      <input type="text" name="first_name12" value="<?php echo $f['dob'];?>" class="form-control" id="exampleInputZip">
                    </div>
                    <br>
                    <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputState">Gender:</label>
                      <select class="form-control" name="first_name13" id="exampleInputState">
                        <option value="<?php echo $f['sex'];?>"><?php echo $f['sex'];?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>       
                    </div>

                     <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputState">Marital Status:</label>
                      <select class="form-control" name="first_name14" id="exampleInputState">
                        <option value="<?php echo $f['merried_status'];?>"><?php echo $f['merried_status'];?></option>
                         <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Other">Other</option>
                      </select>       
                    </div>

                     <!--<div class="form-group">
                      <label for="exampleInputAddress">Profile Description:</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="first_name15" value="<?php echo $f['aboutus'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>-->

                    <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>
                  </form>
                </div>
              </section>

            </div> <!-- / col-md-6 -->

            <div class="col-md-6">
<form name="bankinfo" method="post">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Update Bank Information</h3>
                </header>
                <div class="panel-body">

           <div class="form-group">
                      <label for="exampleInputAddress">Account Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="Account1" value="<?php echo $f['acc_name'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Account Number</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="Account2" value="<?php echo $f['ac_no'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                <div class="form-group">
                      <label for="exampleInputAddress">Bank Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="Account3" value="<?php echo $f['bank_nm'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
              
                <div class="form-group">
                      <label for="exampleInputAddress">Branch Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="Account4" value="<?php echo $f['branch_nm'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
              
                <div class="form-group">
                      <label for="exampleInputAddress">Ifsc / Swift Code</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="Account5" value="<?php echo $f['swift_code'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
              

                </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="update" value="Update" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

              </section>

</form>
              <!-- / section -->


              <form name="image" method="post" enctype="multipart/form-data">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Change Profile Photo</h3>
                </header>
                <div class="panel-body">
                            <div style="text-align:center;"> <img src="<?php echo $userimage;?>" style="border:2px solid #000;"></div><br/>
            <div class="form-group">
                      <label for="exampleInputFile">Picture</label>
                      <input type="file" name="uploadedfile" id="exampleInputFile" required>
                    </div>
              

                </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="modify" value="Upload" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>

              </section>

</form>
              <!-- / section -->

            </div>

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->


<?php include("footer.php");?>

    </main> <!-- /playground -->


    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
 <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>