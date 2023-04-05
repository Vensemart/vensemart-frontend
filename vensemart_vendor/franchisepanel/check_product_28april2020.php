<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if($_GET['aid']==''){
    header('location:puc-purchaseinvoice-report.php?msg=Already Submitted');exit;
  
}
if (isset($_POST['cono']))
{
   $adid=$_POST['adid'];
   $dtdcno=$_POST['dtdcno'];
   $delst=$_POST['delst'];
    $puc_name=$_POST['puc_name'];

   if (!empty($delst))
   {
      $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  amount_detail WHERE am_id='".$adid."' and delst=''");
      $count=mysqli_num_rows($chk);
      if ($count>0)
      {

        $chk1=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  user_registration WHERE user_id='".$puc_name."' ");
      $count1=mysqli_num_rows($chk1);
      if ($count1>0)
      {


        $upq=mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE amount_detail SET delst='".$delst."' WHERE am_id='".$adid."'");
         if ($upq)
         {
          $datarow = mysqli_fetch_array($chk);
           $amount = $datarow['total_amount'];
              $invoice = $datarow['invoice_no'];
          if ($datarow['payment_mode']=='Direct Bank Transfer' && $datarow['payment_mode2']=='Self Pickup') {
      
          
      $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "update poc_e_wallet set amount=(amount+$amount) where user_id='".$f['user_id']."'");
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','".$f['user_id']."','$amount','0','0','".$f['user_id']."','".$datarow['user_id']."','".date('Y-m-d')."','Salf Pickup Delivery','Salf Pickup Delivery','Salf Pickup Delivery','Salf Pickup Delivery','$invoice','Salf Pickup Delivery','0','Fund Wallet','$urls')");
          }
           
           $invoice_no = $datarow['invoice_no'];
           $uid = $datarow['user_id'];
          $product_data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_purchase_detail` where invoice_no='$invoice_no'");

                  while($data_load=mysqli_fetch_array($product_data)){
                         $product_qty=$data_load['quantity'];
                        $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$userid' and product_id='".$data_load['p_id']."'"));
                        $poc_product_details1=$poc_product_details['qty']-$product_qty;
                        $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty='$poc_product_details1' where puc='$userid' and product_id='".$data_load['p_id']."'");

                     }

        

  $details=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  user_registration WHERE user_id='".$uid."' "));
              $check_bv1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as pps from eshop_purchase_detail where invoice_no='$invoice_no' and (product_type='Activation Product' || product_type='Upgrade Product')"));
              $check_bv3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as pps from eshop_purchase_detail where invoice_no='$invoice_no' and product_type='Repurchase Product'"));

if ($datarow['status']!=1) {
  $start=date('Y-m-d');
 

if ($check_bv1['pps']!='' && $check_bv1['pps']>0) {
 if($check_bv1['pps']>=25 && $ref['capping_slab']=='0') {

  mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Affiliate',user_rank_name='Affiliate',capping_slab='1',activation_date='$start' where user_id='$uid'");

}   

  $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$uid'");
  while($upline=mysqli_fetch_array($upliners))
  {
    $income_id=$upline['income_id'];
  $leg=$upline['leg'];
    if ($upline['group_type']==1) {
     $position='left';
    }else{
      $position='right';
    }
    $user_level=$upline['level'];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$uid','$user_level','".$check_bv1['pps']."','$position','$leg','Product Purchase Amount','$start',CURRENT_TIMESTAMP,'0','".$check_bv1['pps']."')");
    //  paring_bonus($income_id);

  }
 
}




if ($check_bv3['pps']!='' && $check_bv3['pps']>0) {

$check_bv31['pps']=$check_bv3['pps']*100;
 $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$uid'");
  while($upline=mysqli_fetch_array($upliners))
  {
    $income_id=$upline['income_id'];
  $leg=$upline['leg'];
    if ($upline['group_type']==1) {
     $position='left';
    }else{
      $position='right';
    }
    $user_level=$upline['level'];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history_repurchase values(NULL,'$income_id','$uid','$user_level','".$check_bv31['pps']."','$position','$leg','Product Purchase Amount','$start',CURRENT_TIMESTAMP,'0','".$check_bv31['pps']."')");
    //  paring_bonus($income_id);

  }
 
}

}
 $rand=rand(1111111111,9999999999);
                              $date=date("Y-m-d");
                               $amount1=$check_bv3['pps']+$check_bv1['pps'];
                                $amount=$amount1*2;
                              if($details['id_no']!=''){
                                  $deduct=$amount*5/100;
                                  $per=5;
                                 }else{
                                   $deduct=$amount*20/100;
                                   $per=20;
                                 } 
                                $final=$amount-$deduct;


                           
                                       mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) VALUES (NULL, '$rand','$puc_name', '$final', '0', '$deduct', '$puc_name', '$uid', '$date', 'Delivery Profit Income', '$amount1', '0', 'Delivery Profit Income', '$rand', 'Delivery Profit Income', '1', 'E Wallet','$per')");

  mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE amount_detail SET status='1' WHERE am_id='".$datarow['am_id']."'");
  mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE eshop_purchase_detail SET pay_status='1' WHERE invoice_no='$invoice_no'");
  


            header('location:puc-purchaseinvoice-report.php?msg=Information Updated Successfully');exit;
         }
         else
         {
            header('location:puc-purchaseinvoice-report.php?msg=Invalid action');exit;
         }
          }
      else
      {
        header('location:check_product.php?aid='.$adid.'&msg=Invalid Receiver Id');exit;
      }
      }
      else
      {
        header('location:puc-purchaseinvoice-report.php?msg=Already Submitted');exit;
      }
      
   }
   else
   {
      header('location:check_product.php?aid='.$adid.'&msg=Fill The Details');exit;
   }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <?php include("title.php");?>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Team Report</a></li>
              <li><a href="#">Total Downline Member Report</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

      
<center><h4><?php echo $_GET['msg'] ?></h4></center>
    



   <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="final_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Billing Form</strong></h3>
                </header>
                
                <div class="panel-body">
                 
              <div class="form-group">
                 <?php   $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  amount_detail WHERE am_id='".$_GET['aid']."' ");
                        $datarow = mysqli_fetch_array($chk);
                        
                  ?>
                      <div class="form-group">
                       
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="puc_name" class="form-control"   value="<?php echo$datarow['user_id']; ?>" required="" readonly>
                              
                              <input type="hidden" name="adid" value="<?php echo $datarow['am_id'];?>">   
                        </div>
                       
                    </div> 
                      <div class="form-group">
                        <label for="exampleInputAddress">Receiver Id </label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="puc_name" class="form-control" id="puc"  value="" required="">
                              
                                
                        </div>
                        <span id="checkotp"></span> 
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputAddress">Select Billing Status</label>
                          <div class="input-group">
                              <span class="input-group-addon"></span>
                             
                                <select name="delst" class="form-control" required>
                        <option value="">Select</option>
                        <option value="2"<?php if ($data21['delst']==2){ echo "selected='selected'"; }?>>Delivered</option>
                      
                      </select>
                         
                          </div>
                    </div>
                   <?php
                   $chk=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  amount_detail WHERE am_id='".$_GET['aid']."'"));
 $product_data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_purchase_detail` where invoice_no='".$chk['invoice_no']."'");
$qty=0;
                  while($data_load=mysqli_fetch_array($product_data)){
                         $product_qty=$data_load['quantity'];
                        $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$userid' and product_id='".$data_load['p_id']."'"));
                        $poc_product_details1=$poc_product_details['qty']-$product_qty;
                        if ($poc_product_details1>0) {
                           $qty=$qty+$product_qty;
                        }

                     }

 $poc_produ=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(quantity) as qtya FROM `eshop_purchase_detail` where invoice_no='".$chk['invoice_no']."'"));

 
                    ?> 
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <?php  if ($poc_produ['qtya']==$qty) { ?>
                  <input type="submit" name="cono"  value="Submit" class="btn btn-success" id="submit">  
                   <?php  }else{ ?>  

<samp style="color: red;">Stock not Available</samp>
                   <?php } ?>         
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

              </section>
              
              
            

            </div> <!-- /col-md-6 -->
  

          </div>

      
        </div> <!-- / container-fluid -->


           


     <?php //include("footer.php");?>


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
    
   
          $(document).ready(function() {
    $("#puc").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var user_id=$("#puc").val();
    if(user_id.length < 1){$("#checkotp").html('');return;}
    if(user_id.length >= 1){
    $("#checkotp").html('<img src="images/preloader.gif" />');
    $.post('regis122.php', {'user_id':user_id}, function(data) {
    $("#checkotp").html(data);
    });
    }
    }); 
    });
          /* $("#puc").on('change', function() {
           var user_id=$("#puc").val();
           alert(user_id);
            $.post('regis122.php',{user_id:user_id}, success: function(result){
           $("#checkotp").html(result);
         }
      });*/
        </script>
  </body>
</html>
