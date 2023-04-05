<?php 
include("header.php");
// if ($f['kyc_status']=='1') {
//   header("location:index.php");
// }
$uid = $_SESSION['userpanel_user_id'];
if (isset($_POST['sub'])) 
 {
     $tmp_name=$_FILES['id_proof_image']['tmp_name']; 
     $pic = $_FILES['id_proof_image']['name']; 
     $folder="img/";
	 date_default_timezone_set("Asia/Calcutta");
     $date = date('h_i_s', time());
     $imageDBpath =$folder.$date.$pic;
    $id_number=$_POST['id_number'];
    $check_yes=$_POST['yes'];
    $hid=$_POST['hidden_id'];
   $check1 = getimagesize($_FILES["id_proof_image"]["tmp_name"]);
    if($check1 == false) {
        
        
       header("location:kyc_status.php?msg=File is not an image.");
       exit(); 
    }


     $filename12 = time()."main_".$_FILES["id_proof_image"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["id_proof_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif") {
  
    header("location:kyc_status.php?msg=Sorry, file not  allowed.");
       exit();
}
     $check = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from id_proof_list where user_id='$uid'"));
     if($check=='1')
     {
    
    move_uploaded_file($tmp_name,$folder.$date.$pic);
   mysqli_query($GLOBALS["___mysqli_ston"], "update id_proof_list set user_id='$uid',id_number='$id_number',id_image='$imageDBpath',id_checkbox='$check_yes',status='0' where id='$hid'");
     }
     else {
         	  move_uploaded_file($tmp_name,$folder.$date.$pic);
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into id_proof_list (user_id,id_number,id_image,id_checkbox,status) values ('$uid','$id_number','$imageDBpath','$check_yes','0')");
    header("location:kyc_status.php?msg_id= Record Submit successfully..!");
    exit();
    } 
    
 }
 
if (isset($_POST['pancard'])) 
 {
      $tmp_name=$_FILES['pancard_proof_image']['tmp_name']; 
      $pic = $_FILES['pancard_proof_image']['name']; 
      $folder="img/";
	  date_default_timezone_set("Asia/Calcutta");
      $date = date('h_i_s', time());
      $imageDBpath =$folder.$date.$pic;
    $pan_number=$_POST['pan_number'];
    $check_yes=$_POST['yes'];
    $status = $_POST['status'];
     $h_panid=$_POST['hidden_pan_id'];
     /*validation start*/
    
    $check = getimagesize($_FILES["pancard_proof_image"]["tmp_name"]);
    if($check == false) {
        
        
       header("location:kyc_status.php?msg=File is not an image.");
       exit(); 
    }


     $filename12 = time()."main_".$_FILES["pancard_proof_image"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["pancard_proof_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif") {
  
    header("location:kyc_status.php?msg=Sorry, file not  allowed.");
       exit();
}
    /*validation end*/
      $check1 = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from pancard_proof_list where user_id='$uid'"));
     if($check1=='1')
     {
          move_uploaded_file($tmp_name,$folder.$date.$pic);
   mysqli_query($GLOBALS["___mysqli_ston"], "update pancard_proof_list set user_id='$uid',pancard_number='$pan_number',pancard_image='$imageDBpath',id_checkbox='$check_yes',status='0' where id='$h_panid'");
     }
     else {
    move_uploaded_file($tmp_name,$folder.$date.$pic);
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into pancard_proof_list (user_id,pancard_number,pancard_image,id_checkbox,status) values ('$uid','$pan_number','$imageDBpath','$check_yes','0')");
    header("location:kyc_status.php?msg_pan= Record Submit successfully..!");
    exit();
    } 
 }
    
    /*if (isset($_POST['address'])) 
 {
      $tmp_name=$_FILES['address_proof_image']['tmp_name']; 
      $pic = $_FILES['address_proof_image']['name']; 
      $folder="img/";
	  date_default_timezone_set("Asia/Calcutta");
      $date = date('h_i_s', time());
      $imageDBpath =$folder.$date.$pic;
    $add_proof=$_POST['add_proof'];
    $check_yes=$_POST['yes'];
    $status = $_POST['status'];
    $h_addid=$_POST['hidden_add_id'];
    
      $check2 = mysql_num_rows(mysql_query("select user_id from address_proof_list where user_id='$uid'"));
     if($check2=='1')
     {
          move_uploaded_file($tmp_name,$folder.$date.$pic);
   mysql_query("update address_proof_list set user_id='$uid',address_proof='$add_proof',address_proof_image='$imageDBpath',id_checkbox='$check_yes',status='0' where id='$h_addid'");
     }
     else {
          move_uploaded_file($tmp_name,$folder.$date.$pic);
    mysql_query("insert into address_proof_list (user_id,address_proof,address_proof_image,id_checkbox,status) values ('$uid','$add_proof','$imageDBpath','$check_yes','0')");
    header("location:kyc_status.php?msg_add= Record Submit successfully..!");
    exit();
    } 
 }*/
    
// if (isset($_POST['bank'])) 
//  {
//       $tmp_name=$_FILES['bank_recipt_proof_image']['tmp_name']; 
//       $pic = $_FILES['bank_recipt_proof_image']['name']; 
//       $folder="img/";
// 	  date_default_timezone_set("Asia/Calcutta");
//       $date = date('h_i_s', time());
//       $imageDBpath =$folder.$date.$pic;
//     $bank_name=mysql_escape_string($_POST['bank_name']);
//     $acc_number=$_POST['acc_number'];
//     $check_yes=$_POST['yes'];
//     $status = $_POST['status'];

//     move_uploaded_file($tmp_name,$folder.$date.$pic);
//     mysql_query("insert into bank_statement_proof_list (user_id,bank_name,bank_recipt_proof,id_checkbox,status) values ('$uid','$bank_name','$imageDBpath','$check_yes','0')");
//     header("location:kyc_status.php?msg_bank= Record Submit successfully..!");
//     exit();
 
//  }
 /*if (isset($_POST['bank'])) 
 {
      $tmp_name=$_FILES['bank_recipt_proof_image']['tmp_name']; 
      $pic = $_FILES['bank_recipt_proof_image']['name']; 
      $folder="img/";
    date_default_timezone_set("Asia/Calcutta");
      $date = date('h_i_s', time());
      $imageDBpath =$folder.$date.$pic;
    $bank_name=mysql_escape_string($_POST['account3']);
    $acc_name=$_POST['account1'];
    $ac_no=$_POST['account2'];
    $branch_nm=$_POST['account4'];
    $swift_code=$_POST['account5'];
    $check_yes=$_POST['yes'];
    $status = $_POST['status'];

    move_uploaded_file($tmp_name,$folder.$date.$pic);
    $ch1=mysql_num_rows(mysql_query("select * from bank_statement_proof_list where user_id='$uid'"));
    if ($ch1 > 0) {
       $checker=mysql_query("UPDATE bank_statement_proof_list SET bank_name='$bank_name',acc_name='$acc_name',ac_no='$ac_no',branch_nm='$branch_nm',swift_code='$swift_code',bank_recipt_proof='$imageDBpath',id_checkbox='$check_yes',status='0' where user_id='$uid'");
    }else{
    $checker=mysql_query("insert into bank_statement_proof_list (user_id,bank_name,acc_name,ac_no,branch_nm,swift_code,bank_recipt_proof,id_checkbox,status) values ('$uid','$bank_name','$acc_name','$ac_no','$branch_nm','$swift_code','$imageDBpath','$check_yes','0')");   
    }
   
    if ($checker) {
      mysql_query("UPDATE user_registration set acc_name='$acc_name', ac_no='$ac_no', branch_nm='$branch_nm', bank_nm='$bank_name', swift_code='$swift_code' where user_id='$uid'");
    }
    header("location:kyc_status.php?msg_bank= Record Submit successfully..!");
    exit();
 
 }*/
    
 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include("title.php");?>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        
          <script type="text/javascript">
        function readURL_pan(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pan').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
            <script type="text/javascript">
        function readURL_add(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#addres').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>


         <style type="text/css">
        .col-md-20{
          width:20%;
          float:left;
          padding:10px;
          display:block;
          font-size:13px;
        }
        .border-bottom{
          border-top:3px solid #ddd; 
          clear:both;
        }
        .margo{
          margin-top:10px;
        }
        @media (max-width:950px){
          .col-md-20{
            width:100%;
            float:left;
            display:block;
          }
        }
        </style>
 
  </head>

  <body class="">
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8" style="float:none;color:#900;text-align: center;font-size: 16px;">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            <?php echo @$_GET['msg'];?>
          </div>

          <!-- <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
 
              <li><a href="#">Upload Importent Documents</a></li>
             
            </ol>

          </div> -->
        </section> <!-- / PAGE TITLE -->

        <div class="col-lg-12 center-block" >
                    
                </div>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">All Important Documents</h4>
                </header>
<div class="panel-body">
    
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="20%">Aadhar Proof Number</th>
        <th width="20%">Aadhar Proof Card Image Upload</th>
       <th width="20%">Self Approved</th>
        <th width="20%" >Admin Approval</th>
        <th width="20%">Action</th>
      
      </tr>
    </thead>
    
 <tbody>
      <tr>
           <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Aadhar Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_id'];?></span>
                        </header>
                                    
                        <div class="panel-body">
           
                             <?php $data_id = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from id_proof_list where user_id='$uid'")); ?>
                    
                     <?php $data_id_bm = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from id_proof_list where user_id='$uid'")); 
                     
                     if($data_id_bm=='0' || $data_id['status']=='2') { 
                     
                      
                     ?>
                     
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                                 <td width="20%">
                                     <input type="text" name="id_number" class="form-control" placeholder="Aadhar Number"  style="width:300px;"  required>
                                    </td>
                    
                                    
                                    <td width="5%">
                                    <input type="file" id="id_proof_image" name="id_proof_image" >
                                    </td>
                                    
                                
                                     <td width="10%">
                                     <label><input type="checkbox" name="yes" value="0"></label>
                                     </td>
                                 
                                     <td width="20%">
                                          <?php if($data_id['status']=='1'){ echo "<b>Approoved</b>";} else if($data_id['status']=='0') { echo "<b>Pending</b>"; }else if($data_id['status']=='2') { echo "<b>Cancelled By Admin</b>"; } ?>
                                    </td> 
                                    
                                     <input type="hidden" name="hidden_id" value="<?php echo $data_id['id']; ?>">
                                     
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="sub" value="Submit">
                                    </td>
                                          
                                  
                                
                            </form>
                            
                            <?php } else {
                            
                    
                            ?>
                            
                            
                                     <td width="20%">
                                     <?php echo $data_id['id_number']; ?> 
                                     </td>
                                     <td width="10%">
                                     <img src="<?php echo $data_id['id_image']; ?>" width="50%"/>
                                     </td>
                                     <td width="5%">
                                     <label><input type="checkbox" name="yes" <?php if($data_id['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label>
                                     </td>
                                     <td width="20%">
                                     <?php if($data_id['status']=='1'){ echo "<b>Approoved</b>";} else if($data_id['status']=='0') { echo "<b>Pending</b>"; } ?>
                                     </td>
                         
                                      <td width="20%">
                                          <?php
                                          if($data_id['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?idproof=<?=$data_id['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                                    
                                
                            <?php } ?>
                                  </div>
                    

                    </section>
                </div>
       </tr>
 </tbody>
 
</table>
</div>
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="20%">Pan Card Number</th>
        <th width="20%">Pan Card Image Upload</th>
        <th width="20%">Self Approved</th>
        <th width="20%" >Admin Approval</th>
        <th width="20%">Action</th>
             
      </tr>
    </thead>
    
 <tbody>
      <tr>
          
      <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Pan Card Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_pan'];?></span>
                        </header>
                                    <?php $data_pan = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pancard_proof_list where user_id='$uid'")); ?>
                        <div class="panel-body">
                            
                                 <?php $data_pancrdid = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pancard_proof_list where user_id='$uid'")); 
                                     
                                     if($data_pancrdid=='0' || $data_pan['status']=='2')
                                     {
                                     ?>
                                     
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                         
                                 <td width='20%'>
                                     <input type="text"  style="width:300px;"  name="pan_number" class="form-control" placeholder="Pan Card Number" value="<?php echo $data_pan['pancard_number']; ?>" required>
                                    </td>
                    
                                    
                                    <td width='10%'>
                                    <input type="file" id="pancard_proof_image" name="pancard_proof_image" >
                                    </td>
                                   
                                     <td width='5%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_pan['id_checkbox']=='0') { ?> checked <?php } ?> value="0"></label>
                                     </td>
                                 
                                     <td width='20%'>
                                          <?php if($data_pan['status']=='0'){ echo "<b>Pending</b>";} else if($data_pan['status']=='1') { echo "<b>Approoved</b>"; }else if($data_pan['status']=='2') { echo "<b>Cancelled By Admin</b>"; }  ?>
                                    </td> 
                                    
                                    <input type="hidden" name="hidden_pan_id" value="<?php echo $data_pan['id']; ?>">
                                    
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="pancard" value="Submit">
                                    </td>
                                       
                                
                            </form>
                                <?php } else { ?>
                                
                                <td width='20%'>
                                    <?php echo $data_pan['pancard_number']; ?>
                                    </td>
                                     <td width='10%'>
                                   <img src="<?php echo $data_pan['pancard_image'];?>" width="50%"/>
                                    </td>
                                     <td width='5%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_pan['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label>
                                     </td>
                                      <td width='20%'>
                                          <?php if($data_pan['status']=='0'){ echo "<b>Pending</b>";} else if($data_pan['status']=='1') { echo "<b>Approved</b>"; } ?>
                                    </td> 
                                    
                                 <td width="20%">
                                       <?php
                                          if($data_pan['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?panproof=<?=$data_pan['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                               
                           
                         <?php } ?>
                        </div>

                    </section>
                </div>
             
            </div>
                
 </tbody>
</tr>
</table>
</div>
<!--
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="20%">Select Address Proof</th>
        <th width="20%">Upload Address Proof</th>
        <th width="20%">Self Approved</th>
        <th width="20%" >Admin Approval</th>
        <th width="20%">Action</th>
                <td width="20%">Date</td>
        
      </tr>
    </thead>
    
 <tbody>
      <tr>
          
     <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Address Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_add'];?></span>
                        </header>
                                    <?php $data_add = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from address_proof_list where user_id='$uid'")); ?>
                        <div class="panel-body">
                              <?php $data_addid = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from address_proof_list where user_id='$uid'")); 
                                if($data_addid=='0' || $data_add['status']=='2')
                                     {
                                     ?>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                         
                                <td width='20%'>
                                      <select name="add_proof" class="form-control">
                                   <option value="Adhar Card" <?php if($data_add['address_proof']=='Adhar Card') { ?> selected <?php } ?> >Adhar Card</option>
                                   <option value="Voter Id" <?php if($data_add['address_proof']=='Voter Id') { ?> selected <?php } ?> >Voter Id</option>
                                    <option value="Driving License" <?php if($data_add['address_proof']=='Driving License') { ?> selected <?php } ?> >Driving License</option>
                                       </select>
                                    
                                 </td>
                    
                                    
                               <td width='10%'>
                                    <input type="file" id="address_proof_image" name="address_proof_image">
                                    </td>
                                    
                          <td width='5%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_add['id_checkbox']=='0') { ?> checked <?php } ?> value="0"></label>
                                     </td>
                                 <td width='20%'>
                                          <?php if($data_add['status']=='0'){ echo "<b>Pending</b>";} else if($data_add['status']=='1') { echo "<b>Approved</b>"; } ?>
                                    </td> 
                                       <input type="hidden" name="hidden_add_id" value="<?php echo $data_add['id']; ?>">
                                    
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="address" value="Submit">
                                    </td>
                               <td width="25%">
                                          <?php
                                         echo $data_add['admin_date'];
                                          ?>
                                          </td>
                                
                            </form>
                             <?php } else {  ?>
                             
                                       <td width='20%'>
                                     <?php echo $data_add['address_proof']; ?>
                                      </td>
                    
                                    
                               <td width='20%'>
                                    <img src="<?php echo $data_add['address_proof_image'];?>" width="50%"/>
                                    </td>
                                    
                          <td width='20%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_add['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label>
                                     </td>
                                 <td width='20%'>
                                         <?php if($data_add['status']=='0'){ echo "<b>Pending</b>";} else if($data_add['status']=='1') { echo "<b>Approved</b>"; }else if($data_add['status']=='2') { echo "<b>Cancelled By Admin</b>"; }  ?>
                                    </td>
                             <td width="20%">
                                   <?php
                                          if($data_add['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?addressproof=<?=$data_add['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                 
                                 
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                                     <td width="25%">
                                          <?php
                                         echo $data_add['admin_date'];
                                          ?>
                                          </td>
                             
                             <?php } ?>
                         
                        </div>

                    </section>
                </div>
             
            </div>

 </tbody>
</tr>
</table>
</div>
-->
<!--
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="40%">Bank Details</th>

         <th width="20%">Bank Reciept Upload</th>
       <th width="10%">Self Approved</th>
        <th width="10%" >Admin Approval</th>
        <th width="20%">Action</th>
              
      </tr>
    </thead>
    
 <tbody>
      <tr>
          
      <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Bank Details Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_bank'];?></span>
                        </header>
                                    <?php $data_bank = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from bank_statement_proof_list where user_id='$uid'")); ?>
                        <div class="panel-body">
                             <?php $data_bnkid = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from bank_statement_proof_list where user_id='$uid'")); 
                                     
                                     if($data_bnkid=='0' || $data_bank['status']=='2')
                                     {
                                     ?>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                         
                                 <td width='40%'>
                                     
                                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account1" value="" placeholder='Account Name' class="form-control" style="width:300px;"  >
                      </div>
                    </div>

           <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account2" value="" class="form-control" placeholder='Account Number'  style="width:300px;" >
                      </div>
                    </div>
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account3" value="" class="form-control" placeholder='Bank Name'  style="width:300px;" >
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account4" value="" class="form-control" placeholder='Branch Name'  style="width:300px;" >
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account5" value="" class="form-control" placeholder='Ifsc / Swift Code'  style="width:300px;" >
                      </div>
                </div>
              

                </div>
                </td>
                             
                                    
                                    <td width='20%'>
                                    <input type="file" id="bank_recipt_proof_image" name="bank_recipt_proof_image" >
                                    </td>
                                   
                                     <td width='20%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_bank['id_checkbox']=='0') { ?> checked <?php } ?> value="0"></label>
                                     </td>
                                 
                                     <td width='20%'>
                                          <?php if($data_bank['status']=='0'){ echo "<b>Pending</b>";} else if($data_bank['status']=='1') { echo "<b>Approved</b>"; }else if($data_bank['status']=='2') { echo "<b>Cancelled By Admin</b>"; } ?>
                                    </td> 
                                    
                                    <input type="hidden" name="hidden_bank_id" value="<?php echo $data_bank['id']; ?>">
                                    
                                  
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="bank" value="Submit">
                                    </td>
                                   
                            </form>
                            <?php } else {?>
                            
                            <td width='20%'>
                               <div class="form-group">    
                                   <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account1" value="<?php echo $data_bank['acc_name'];?>" placeholder='Account Name' class="form-control"  <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>

           <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account2" value="<?php echo $data_bank['ac_no'];?>" class="form-control" placeholder='Account Number' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account3" value="<?php echo $data_bank['bank_name'];?>" class="form-control" placeholder='Bank Name' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account4" value="<?php echo $data_bank['branch_nm'];?>" class="form-control" placeholder='Branch Name' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account5" value="<?php echo $data_bank['swift_code'];?>" class="form-control" placeholder='Ifsc / Swift Code' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                </div></td>
                             
                                    
                                    <td width='20%'>
                                    <img src="<?php echo $data_bank['bank_recipt_proof']; ?>" width="50%"/>
                                    </td>
                                   
                                     <td width='20%'>
                                     <label style="color:blue;"><input type="checkbox" name="yes" <?php if($data_bank['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label>
                                     </td>
                                 
                                     <td width='20%'>
                                          <?php if($data_bank['status']=='0'){ echo "<b>Pending</b>";} else if($data_bank['status']=='1') { echo "<b>Approved</b>"; } ?>
                                    </td> 
                                    <td width="20%">
                                         <?php
                                          if($data_bank['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?bankproof=<?=$data_bank['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                       
                                        
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                          
                            
                            <?php }?>
                         
                        </div>

                    </section>
                </div>
             
            </div>
                
 </tbody>
</tr>
</table>
</div>-->






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
  </body>
</html>