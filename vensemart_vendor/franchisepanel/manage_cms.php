<?php

include("../lib/config.php");

// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 

   
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");         
 



     $sql3=mysql_query("select * from website_cms where id='1'");
  $name=mysql_fetch_assoc($sql3);
  
  if(isset($_POST['submit']))
 {
 $name=$_POST['name'];
 
mysql_query("update website_cms set name='$name' where id='1'");
 header("location:manage_cms.php?msg= Updated Successfully !");  
 }

   if(isset($_POST['submit1']))
 {
$email=$_POST['email'];
  mysql_query("update website_cms set email='$email' where id='1'");
 header("location:manage_cms.php?msg= Updated Successfully !");  
 }

    if(isset($_POST['submit2']))
 {
$contact=$_POST['contact'];
mysql_query("update website_cms set contact='$contact' where id='1'");
 header("location:manage_cms.php?msg= Updated Successfully !");  
 }
    if(isset($_POST['submit3']))
 {
$referral=$_POST['referral'];
mysql_query("update website_cms set referral='$referral' where id='1'");
 header("location:manage_cms.php?msg= Updated Successfully !");  
 }

     if(isset($_POST['submit4']))
 {
$address=$_POST['address'];
mysql_query("update website_cms set address='$address' where id='1'");
 header("location:manage_cms.php?msg= Updated Successfully !");  
 }


  if(isset($_POST['modify']))
 {
 $filename12 = time()."main_".$_FILES["uploadedfile"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["uploadedfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
  
    header("location:manage_cms.php?msg=Sorry, file not  allowed.");
       exit();
}

  $check = getimagesize($_FILES["uploadedfile"]["tmp_name"]);
    if($check == false) {
        
        
       header("location:manage_cms.php?msg=File is not an image.");
       exit(); 
    }
 move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"images/" .$filename12);

 mysql_query("update website_cms set logo='$filename12' where id='1'");
 header("location:manage_cms.php?msg=logo Updated Successfully !");  
 }



     if(isset($_POST['submit5']))
 {


 header("location:backup.php?msg= Export Successfully !");

 }
?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include("header.php");?>

    <!--easy pie chart-->
    <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="css/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="css/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal2 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal3 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal4 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal5 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal6 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}.modal7 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}
.close1 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}
.close2 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close2:hover,
.close2:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}
.close3 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close3:hover,
.close3:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}
.close4 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close4:hover,
.close4:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}

.close5 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close5:hover,
.close5:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}.close6 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close6:hover,
.close6:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}
.close7 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close7:hover,
.close7:focus {
    color: #de1a1a;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #3a4c3a;
    color: white;
    border-bottom: 5px solid #151716 !important;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #3a4c3a;
    color: white;
}
</style>
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
               <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
                    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">
 <div class="row">

 <div class="col-sm-6 text-left">

                       <h4 class="text-center" style="color: green;"><?php echo @$_GET['msg'];?></h4>

                    </div>
                   

                </div><br />
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                             <h4 style="color: green;">  <b>Manage Website Details</b></h4>
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>

                            <div class="table-responsive" style="background-color:#c4cbd0;">






                   
           
                                <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                          <h4  ><u><b><a id="myBtn" style="color: #0a251f;">Logo management</a></b></u></h4><br/>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Choose Website Logo</h2>
    </div>
    <form method="post"  enctype="multipart/form-data">

    <div class="modal-header">
        <br>
        <?php
if ($name['logo']!='') {?>
<img src="images/<?php echo $name['logo'];?>" style="width: 200px;height: 100px; margin-left: 100px; background-color: white;"  >
  <?php
}
        ?>    <br>  <br>              
   <input type="file" name="uploadedfile" class="form-control" id="inputPassword1"  required >
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="modify" value="Update" class="btn btn-primary" >
                                  
                                </div>
    </div>
    </form>
  </div>

</div>                           </div>
                                </div> 

                                </div>

                                <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                     
                          <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn2" style="color: #0a251f;">Manage website name </a></b><u></h4><br/>
<div id="myModal1" class="modal1" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close1">&times;</span>
      <h2>Enter Website Name</h2>
    </div>
    <form method="post" action="">

    <div class="modal-header">
                             
   <input type="text" name="name" class="form-control" id="inputPassword1" value="<?php echo $name['name'];?>" required >
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit" value="Update" class="btn btn-primary" >
                                  
                                </div>
    </div>
    </form>
  </div>

</div>                                
                                    </div>
                                </div> 

                                </div>
<div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                          
                          <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn3" style="color: #0a251f;">Manage  Email</a></b></u></h4><br/>
<div id="myModal2" class="modal2" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close2">&times;</span>
      <h2>Enter Website Email</h2>
    </div>
    <form method="post" action="">

    <div class="modal-header">
                             
   <input type="text" name="email" class="form-control" id="inputPassword1" value="<?php echo $name['email'];?>" required >
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit1" value="Update" class="btn btn-primary" >
                                  
                                </div>
    </div>
    </form>
  </div>
</div>      
                                    </div>
                                </div> 

                                </div>
                             
                             <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                
                            <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn4" style="color: #0a251f;">Manage Contact No</a></b></u></h4><br/>
<div id="myModal3" class="modal3" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close3">&times;</span>
      <h2>Enter Contact No</h2>
    </div>
    <form method="post" action="">

    <div class="modal-header">
                             
   <input type="text" name="contact" class="form-control" id="inputPassword1" value="<?php echo $name['contact'];?>" required >
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit2" value="Update" class="btn btn-primary" >
                                  
                                </div>
    </div>
    </form>
  </div>

</div>         
                                    </div>
                                </div> 

                                </div>
                

                  <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                
                            <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn5" style="color: #0a251f;">Website Url</a></b></u></h4><br/>
<div id="myModal4" class="modal4" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close4">&times;</span>
      <h2>Enter Referral Link</h2>
    </div>
    <form method="post" action="">

    <div class="modal-header">
                             
   <input type="text" name="referral" class="form-control" id="inputPassword1" value="<?php echo $name['referral'];?>" required >
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit3" value="Update" class="btn btn-primary" >
                                  
                                </div>
    </div>
    </form>
  </div>

</div>         
                                    </div>
                                </div> 

                                </div>
                                
                      <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                
                            <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn6" style="color: #0a251f;">Address</a></b></u></h4><br/>
<div id="myModal5" class="modal5" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close5">&times;</span>
      <h2>Enter Address</h2>
    </div>
    <form method="post" action="">

    <div class="modal-header">
                             
   <textarea type="text" name="address" class="form-control" id="inputPassword1" value="" required style="width: 450px;height: 150px;"><?php echo $name['address'];?> </textarea>
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit4" value="Update" class="btn btn-primary" >
                                  
                                </div>
    </div>
    </form>
  </div>

</div>         
                                    </div>
                                </div> 

                                </div>         
                                
<div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                
                            <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn7" style="color: #0a251f;">Export MySQL database</a></b></u></h4><br/>
<div id="myModal6" class="modal6" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close6">&times;</span>
      <h2>Export MySQL database</h2>
    </div>
    <form method="post" action="">

    <div class="modal-header">
                             
   <p style="border-style: outset;background-color: #929c92;;color: black;"><input type="checkbox" name="checkbox" value="check" class="agree" required="" /><b> Are You Want To Export MySQL database ? </p>
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit5" class="submit5" id="submit5" value="Submit" class="btn btn-primary" style="display: none;float: right;background-color: #08f53b;">
                                  
                                </div>
    </div>
    </form>
  </div>

</div>         
                                    </div>
                                </div> 

                                    </div>
             <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                          
                
                            <h4 style="color: #2f26b5;" ><u> <b><a id="myBtn8" style="color: #0a251f;">Flush MySQL database</a></b></u></h4><br/>
<div id="myModal7" class="modal7" style="display: none;">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500px;">
  <div class="modal-header">
      <span class="close7">&times;</span>
      <h2>Flush MySQL database</h2>
    </div>
    <form method="post" action="delete_data.php">

    <div class="modal-header">
                             
   <p style="border-style: outset;background-color: #929c92;;color: black;"><input type="checkbox" name="checkbox" value="check" class="agree1" required="" /><b> Are You Want To Flush MySQL database ? </p>
                                      
                                    
    </div>
   
    <div class="modal-footer">
      <div class="form-group">
                                   
                                   <input type="submit" name="submit6" class="submit6" id="submit6" value="Update" class="btn btn-primary" style="display: none;float: right;background-color: #08f53b;">
                                  
                                </div>
    </div>
    </form>
  </div>

</div>         
                                    </div>
                                </div> 

                                </div>                 


              
                            </form>





                            </div>
                        </section>
                    </div>

                </div>

            </div>
			 
			<script type="text/javascript" src="js/sha256.js"></script> 
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
// Get the modal
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal3 = document.getElementById('myModal3');

// Get the button that opens the modal
var btn3 = document.getElementById("myBtn4");

// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("close3")[0];

// When the user clicks the button, open the modal 
btn3.onclick = function() {
    modal3.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span3.onclick = function() {
    modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal4 = document.getElementById('myModal4');

// Get the button that opens the modal
var btn4 = document.getElementById("myBtn5");

// Get the <span> element that closes the modal
var span4 = document.getElementsByClassName("close4")[0];

// When the user clicks the button, open the modal 
btn4.onclick = function() {
    modal4.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span4.onclick = function() {
    modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal5 = document.getElementById('myModal5');

// Get the button that opens the modal
var btn5 = document.getElementById("myBtn6");

// Get the <span> element that closes the modal
var span5 = document.getElementsByClassName("close5")[0];

// When the user clicks the button, open the modal 
btn5.onclick = function() {
    modal5.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span5.onclick = function() {
    modal5.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal4) {
        modal5.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal6 = document.getElementById('myModal6');

// Get the button that opens the modal
var btn6 = document.getElementById("myBtn7");

// Get the <span> element that closes the modal
var span6 = document.getElementsByClassName("close6")[0];
var agree1 = document.getElementsByClassName("agree")[0];
var submit51 = document.getElementsByClassName("submit5")[0];
// When the user clicks the button, open the modal 
btn6.onclick = function() {
    modal6.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span6.onclick = function() {
    modal6.style.display = "none";
}
agree1.onclick = function() {
    submit5.style.display = "block";
}
submit51.onclick = function() {
    modal6.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal4) {
        modal6.style.display = "none";
    }
}
</script>

	<script>
// Get the modal
var modal7 = document.getElementById('myModal7');

// Get the button that opens the modal
var btn7 = document.getElementById("myBtn8");

// Get the <span> element that closes the modal
var span7 = document.getElementsByClassName("close7")[0];
var agree21 = document.getElementsByClassName("agree1")[0];
var submit61 = document.getElementsByClassName("submit6")[0];
// When the user clicks the button, open the modal 
btn7.onclick = function() {
    modal7.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span7.onclick = function() {
    modal7.style.display = "none";
}
agree21.onclick = function() {
    submit6.style.display = "block";
}
submit61.onclick = function() {
    modal7.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal7) {
        modal7.style.display = "none";
    }
}
</script>		
                       <!--body wrapper end-->


            <!--footer section start-->
           <?php include("footer.php");?>
            <!--footer section end-->



        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->


<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery.min.js"></script>
<script src="js/switchery-init.js"></script>

<!--flot chart -->
<script src="js/jquery.flot.js"></script>
<script src="js/flot-spline.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.tooltip.min.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.selection.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>

<!--Data Table-->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.tableTools.min.js"></script>
<script src="js/bootstrap-dataTable.js"></script>
<script src="js/dataTables.colVis.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/dataTables.scroller.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<!--data table init-->
<script src="js/data-table-init.js"></script>

<!--common scripts for all pages-->

<script src="js/scripts.js"></script>


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>
 <script>
 $(document).ready(function() {
  $( ".openmodel" ).click(function() {
   

  $( "#dialog" ).dialog();
});

  } );


 

  </script>
</body>
</html>