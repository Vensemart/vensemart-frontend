<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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


    <?php 


$invoice_no=$_GET['inv'];
$uid=$_GET['user_id'];

/*if(isset($_POST['submit']))
{


   
   $name=$_POST['name'];
   $lastname=$_POST['lastname'];
   
   $email=$_POST['email'];
   $mobile=$_POST['mobile'];

   $_SESSION['name']=$name." ".$lastname;
    $_SESSION['email']=$email;
     $_SESSION['mobile']=$mobile;
  
   $line1=$_POST['line1'];
   $line2=$_POST['line2'];
   
   $Landmark=trim($_POST['Landmark']);
   
   $country=$_POST['country11'];
   $state=$_POST['state'];
   $stateb=$_POST['stateb'];
   $city=$_POST['city'];
   $pin=$_POST['pin'];
   
   $name_billing=$_POST['name_billing'];
   $last_nameb=$_POST['last_nameb'];
   
   $emailb=$_POST['emailb'];
   $mobileb=$_POST['mobileb'];
   
   $lin1b=$_POST['lin1b'];
   $lin2b=$_POST['lin2b'];
   
   $landmarkb=trim($_POST['landmarkb']);
   
   $countryb=$_POST['countryb'];
   $cityb=$_POST['cityb'];
   $pincodeb=$_POST['pincodeb'];
   
   if($name!='' && $email!='' && $lastname!='' && $mobile!='' && $line1!='' && $country!='' && $city!='' && $pin!='' && $name_billing!='' && $last_nameb!='' && $emailb!='' && $mobileb!='' && $lin1b!='' && $countryb!='' && $cityb!='' && $pincodeb!='')
   {
       $incount=mysqli_num_rows(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM product_shipping_billing_address WHERE invoiceno='".$invoice_no."' AND userid='".$uid."' ORDER BY id DESC LIMIT 1"));
       
       if($incount>=1)
       {
         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE product_shipping_billing_address  SET FirstName='".$name."',LastName='".$lastname."', EmailID='".$email."',MobileNumber='".$mobile."',Line1='".$line1."',Line2='".$line2."',Landmark='".$Landmark."',Country='".$country."',state='".$state."',City='".$city."',Pincode='".$pin."',FirstNameB='".$name_billing."',LastNameB='".$last_nameb."',EmailIDB='".$emailb."',MobileNumberB='".$mobileb."',Line1B='".$lin1b."',Line2B='".$lin2b."',LandMarkB='".$landmarkb."',CountryB='".$countryb."',stateB='".$stateb."',CityB='".$cityb."',PinCodeB='".$pincodeb."' WHERE invoiceno='".$invoice_no."'");  
       }
       else
       {
         mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO product_shipping_billing_address  SET FirstName='".$name."',LastName='".$lastname."', EmailID='".$email."',MobileNumber='".$mobile."',Line1='".$line1."',Line2='".$line2."',Landmark='".$Landmark."',Country='".$country."',state='".$state."',City='".$city."',Pincode='".$pin."',FirstNameB='".$name_billing."',LastNameB='".$last_nameb."',EmailIDB='".$emailb."',MobileNumberB='".$mobileb."',Line1B='".$lin1b."',Line2B='".$lin2b."',LandMarkB='".$landmarkb."',CountryB='".$countryb."',stateB='".$stateb."',CityB='".$cityb."',PinCodeB='".$pincodeb."', invoiceno='".$invoice_no."', userid='".$uid."'");    
       }
        
    

    header('location:update-billing.php?inv='.$invoice_no.'&msg=Update Successfully');

  }else
  {
    header('location:update-billing.php?msg=Fill The Details');
  }
}*/

    ?>
  </head>

  <body class="">
    <div class="animsition">  
    
    <?php include("sidebar.php");?>
      <main id="playground">
 
      
         <?php include("top.php");?>
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>My Package Invoice</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4" style="float:right;">

           <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Invoice</a></li>-->
              <!--<li><a href="#">My Package Invoice</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->
        <?php
             $qry="";
             if (isset($_POST['submits']))
             {
                 $d1=$_POST['from'];
                 $d2=$_POST['to'];

                 $from=date('Y-m-d',strtotime($d1));
                 $to=date('Y-m-d',strtotime($d2));

                 if (!empty($from && $to))
                 {
                   
                     $qry="AND payment_date BETWEEN '".$from."' AND '".$to."'";

                 }
             }
   



                                    error_reporting(0);
                                    if($_REQUEST['msg']!='')
                                    {
                                    
                                    ?>
                                    <div class="" style="margin-top:20px; margin-bottom:20px; text-align:center; ">
                                        <h3 style="color:green;"><?=$_REQUEST['msg']?></h3>
                                    </div>
                                    <?php
                                    }
                                      
                                      //$shipdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from product_shipping_billing_address where invoiceno='$invoice_no' "));
                               $shipdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='".$_SESSION['puc']."' || username='".$_SESSION['puc']."')"));
                             
        ?>
        

        <div class="container-fluid">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Purchase Invoices</h4>
                </header><br>
                <div class="row">
<div class="">

            <form  method="post" action="ewallet-payment-shop.php">
                      
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="text-center">Billing Address</h3>
                         
                                        <hr>

                                              <div class="col-xs-12 col-sm-6 col-md-6">
                                                 <div class="form-group">
                                                     <input type="text" required="required" name="name" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?php echo $shipdata['first_name'];?>">
                                                </div>
                                 </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lastname" value="<?php echo $shipdata['last_name'];?>" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                    </div>
                                </div>

                                          <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                            <input type="text" name="email" required="required" id="first_name" value="<?php echo $shipdata['email'];?>" class="form-control input-sm" placeholder="Email id">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="mobilenumber" required="required" name="mobile" value="<?php echo $shipdata['telephone'];?>" id="last_name" class="form-control input-sm" placeholder="Mobile no">
                                    </div>
                                </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                  <input type="text" name="line1" required="required" id="first_name" value="<?php echo $shipdata['address']." ".$shipdata['Line2'];?>" class="form-control input-sm" placeholder="Enter Complete Address">
                                  </div>
                                  </div>


                                 
                                          <!--<div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <lable>Nearest LandMark</lable>
                                            <textarea required="required" class="form-control" name="Landmark" placeholder="landmark"><?php echo $shipdata['lendmark'];?>                                 
                                            </textarea>
                                    </div>
                                </div>-->

                                          <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                            <input type="text" name="country11" required="required" value="<?php echo $shipdata['country'];?>"  id="country" class="form-control input-sm" placeholder="country">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                            <!-- <input type="text" name="state" required="required" id="state" value="<?php echo $shipdata['state'];?>"  class="form-control input-sm" placeholder="state"> -->
                                  <select name="state" id="state" class="form-control input-sm" required>
                                    
                                    <?php  
                                    $data22=mysqli_query($GLOBALS["___mysqli_ston"], "select * from states where country_id='101'");

                                   while($data11=mysqli_fetch_array($data22)){?>

                    <option value="<?php echo $data11['name'];?>" <?php if($shipdata['stateB']==$data11['name']){echo "selected='selected'";}?>><?php echo $data11['name'];?></option>



                                    <?php } ?>
                                  </select>
                                </div>
                                </div>
                                   <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                            <input type="text" name="city" required="required" id="country" value="<?php echo $shipdata['city'];?>"  class="form-control input-sm" placeholder="city">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <input type="text" required="required" name="pin" id="pin" value="<?php echo $shipdata['zipcode'];?>"  class="form-control input-sm" placeholder="pincode">
                                    </div>
                                </div>
                                              
                                   


                                  </div>


                                  <div class="col-md-6 shipping col-sm-6 col-xs-12">
                                        <h3 class="text-center">Shipping Address</h3>

                                        <hr>

 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    
                                  <input type="checkbox"  name="billingtoo" onclick="FillBilling(this.form)">
                                  <label for="inputEmail1" class="control-label">Click here if same as billing address </label>

                                  </div>
                                  </div>

                                              <div class="col-xs-12 col-sm-6 col-md-6">
                                                 <div class="form-group">
                                                     <input type="text" required="required" name="name_billing" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?php echo $shipdata['FirstNameB'];?>">
                                                </div>
                                 </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text"  name="last_nameb" id="last_name" class="form-control input-sm" placeholder="Last Name" value="<?php echo $shipdata['LastNameB'];?>">
                                    </div>
                                </div>

                                          <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                            <input type="text" name="emailb" required="required" id="first_name" class="form-control input-sm" placeholder="Email id" value="<?php echo $shipdata['EmailIDB'];?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text"  required="required" name="mobileb" id="last_name" class="form-control input-sm" placeholder="Mobile no" value="<?php echo $shipdata['MobileNumberB'];?>">
                                    </div>
                                </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" required="required" name="lin1b" id="" class="form-control input-sm" placeholder="Enter Complete Address" value="<?php echo $shipdata['Line1B'];?>">
                                    </div>
                                </div>
                               

                                          <!--<div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                             <lable>LandMark</lable>
                                            <textarea required="required" class="form-control" placeholder="Landmark" name="landmarkb"> <?php echo $shipdata['LandMarkB'];?>                                               
                                            </textarea>
                                    </div>
                                </div>-->
                               
                              

                                          <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                            <input type="text" required="required" name="countryb" id="countryb" class="form-control input-sm" placeholder="country" value="<?php echo $shipdata['CountryB'];?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                           <!--  <input type="text" required="required" name="stateb" id="stateb" class="form-control input-sm" placeholder="state"> -->

                                 <select name="stateb" id="stateb" class="form-control input-sm" required>
                                    <option value="" >Select State</option> 
                                    <?php  
                                    $data44=mysqli_query($GLOBALS["___mysqli_ston"], "select * from states where country_id='101'");

                                   while($data66=mysqli_fetch_array($data44)){?>

                                    <option value="<?php echo $data66['name'];?>" <?php if($shipdata['stateB']==$data66['name']){echo "selected='selected'";}?>><?php echo $data66['name'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                </div>


                                   <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                      <input type="text" required="required" name="cityb" id="cityb" class="form-control input-sm" placeholder="city" value="<?php echo $shipdata['CityB'];?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <input required="required" type="text" name="pincodeb" id="pincodeb" class="form-control input-sm" placeholder="pincode" value="<?php echo $shipdata['PinCodeB'];?>">
                                    </div>
                                   
                                </div>

                                <div id="continue"  class="col-md-12">
                                      <input type="submit" name="submit" value="continue" class="btn btn-primary pull-right"/>
                                  </div>
                              </div> 
                                  
                              
                    </div>
                    </form>
          </div><br>



                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
   <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({

            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>
       <script language="javascript" type="text/javascript">


function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.name_billing.value = f.name.value;
    f.last_nameb.value = f.lastname.value;
    f.emailb.value = f.email.value;
    f.mobileb.value = f.mobile.value;
    f.lin1b.value = f.line1.value;


    //f.landmarkb.value = f.Landmark.value;
    f.countryb.value = f.country11.value;
    

    f.cityb.value = f.city.value;
    f.stateb.value = f.state.value;
    f.pincodeb.value = f.pin.value;

  }
}

</script>

  </body>
</html>