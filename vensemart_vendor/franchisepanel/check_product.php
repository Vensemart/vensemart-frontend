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
$adids = $_GET['aid'];

if (isset($_POST['cono']))
{
    $id=$_POST['list'];
   $adid=$_POST['adid'];
   $dtdcno=$_POST['dtdcno'];
   $delst=$_POST['delst'];
    $puc_name=$_POST['puc_name'];
  $date=date('Y-m-d');
   if (!empty($delst) && !empty($id))
   {
      $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  amount_detail WHERE am_id='".$adid."'");
      $count=mysqli_num_rows($chk);
      if ($count>0)
      {

        $chk1=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  user_registration WHERE user_id='".$puc_name."' ");
      $count1=mysqli_num_rows($chk1);
      if ($count1>0)
      {


      
          $datarow = mysqli_fetch_array($chk);
           $datarow111 = mysqli_fetch_array($chk1);
           $userss=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  user_registration WHERE user_id='".$datarow['user_id']."' ");
           $ref = mysqli_fetch_array($userss);
          
              $invoice = $datarow['invoice_no'];
                $invoice_no = $datarow['invoice_no'];
         // if ($datarow['payment_mode']=='Direct Bank Transfer' && $datarow['payment_mode2']=='Self Pickup') {
       
            
         
           $uid = $datarow['user_id'];
           $ttt=0;
           $amount_paid=0;
           $given_price=0;
          $product_data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_purchase_detail` where invoice_no='$invoice_no' and delst='0'");

                  while($data_load=mysqli_fetch_array($product_data)){
                         $product_qty=$data_load['quantity'];
                        $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$userid' and product_id='".$data_load['p_id']."'"));
                        $poc_product_details1=$poc_product_details['qty']-$product_qty;
                        $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty='$poc_product_details1' where puc='$userid' and product_id='".$data_load['p_id']."'");

                          mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$datarow['p_id']."',qty='".$datarow['quantity']."',invoive_no='".$datarow['invoice_no']."',puc='".$datarow['user_id']."',stock_point='".$datarow['user_id']."',date='$date',status='0'");

                            mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE eshop_purchase_detail SET pay_status='1',delst='".$delst."',receiver_id='".$puc_name."',delivery_date='".$date."' WHERE pd_id='".$data_load['pd_id']."'");


$ttt=$ttt+$data_load['pv'];
$given_price=$data_load['net_price']+$data_load['gst'];



    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "update poc_e_wallet set amount=(amount+$given_price) where user_id='".$f['user_id']."'");
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into puc_credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice_no','".$f['user_id']."','$given_price','0','0','".$f['user_id']."','".$datarow['user_id']."','".date('Y-m-d')."','Salf Pickup Delivery','Salf Pickup Delivery','Salf Pickup Delivery','Salf Pickup Delivery','$invoice','Salf Pickup Delivery','0','Fund Wallet','$urls')");


                     }

       

  $details=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  user_registration WHERE user_id='".$uid."' "));
          


 $rand=rand(1111111111,9999999999);
                              $date=date("Y-m-d");
                               $amount1=$ttt;
                                $amount=$amount1*2;
                              // if($details['id_no']!=''){
                              //     $deduct=$amount*3.75/100;
                              //     $per=3.75;
                              //    }else{
                              //      $deduct=$amount*3.75/100;
                              //      $per=3.75;
                              //    } 
                              //   $final=$amount-$deduct;


                           
                              //         mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) VALUES (NULL, '$rand','$puc_name', '$final', '0', '$deduct', '$puc_name', '$uid', '$date', 'Delivery Profit Income', '$amount1', '0', 'Delivery Profit Income', '$rand', 'Delivery Profit Income', '1', 'E Wallet','$per')");




   $recievername= strtoupper($datarow111['first_name']);

        $unumber = $_SESSION['UserNumber'];
        $message=urlencode("Dear customer,Your product of invoice  no ".$datarow['invoice_no']." has been received by Mr ".$recievername.".");
        $curl11=curl_init();
   
  $chk1=mysqli_num_rows(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  eshop_purchase_detail where invoice_no='$invoice_no'  and delst='0'"));
    if($chk1<=0){
       mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE amount_detail SET delst='2' WHERE am_id='".$datarow['am_id']."'"); 
    }




            header('location:puc-purchaseinvoice-report.php?msg=Information Updated Successfully');exit;
        
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
   
    // }else{
    //     header('location:check_product.php?aid='.$adids.'&msg=Please Enter Correct OTP');exit;
    // }

}

 $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  amount_detail WHERE am_id='".$_GET['aid']."' ");
                        $datarow = mysqli_fetch_array($chk);
$checkid=$_GET['id'];

$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where am_id='".$_GET['aid']."' "));
$invoice_no=$lfj['invoice_no'];

?><!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Style CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

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
        <div id="print">
        <section id="page-title" class="row">

        

      
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
           

            <div class="col-md-12 margin-bottom-30">
              
        <section class="row" id="page-title">

          
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
                
                      <div class="form-group">
                       
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="puc_names" class="form-control" value="<?php echo $datarow['user_id']; ?>" required="" readonly>
                              
                              <input type="hidden" name="adid" value="<?php echo $datarow['am_id'];?>">   
                        </div>
                       
                    </div> 
                      <div class="form-group">
                        <label for="exampleInputAddress">Receiver Id </label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="puc_name" class="form-control" value="<?php echo $_SESSION['puc_name']?>" required="">
                              
                                
                        </div>
                        <span id="checkotp"></span> 
                    </div> 
                    
                    <!--<div class="form-group">-->
                    <!--    <label for="exampleInputAddress"></label>-->
                    <!--      <div class="input-group">-->
                    <!--         <span class="input-group-addon">Enter User OTP</span>-->
                    <!--          <input type="text" name="userotp" class="form-control" required>-->
                    <!--      </div>-->
                    <!--</div> -->
                    <!--<div class="form-group">-->
                    <!--    <label for="exampleInputAddress"></label>-->
                    <!--      <div class="input-group">-->
                    <!--         <span class="input-group-addon">Enter Reciever OTP</span>-->
                    <!--          <input type="text" name="recieverotp" class="form-control" required>-->
                    <!--      </div>-->
                    <!--</div>-->
                    
                    
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
         
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
              
                  <input type="submit" name="cono"  value="Submit" class="btn btn-success" id="submit">  
                
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

    </section>
            

            </div>
      
      

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->

        </div>




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
 <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";
              window.print();
              document.body.innerHTML = oldPage;
              location.reload();
        }
    </script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
     <script>
function coderHakan()
{
var sayfa = window.open('','','width=500,height=500');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('printArea').innerHTML);
sayfa.document.close();
sayfa.print();
}
</script>
<script type="text/javascript">
function ValidateData(form)
{
 var chks = document.getElementsByName('list[]');
 var hasChecked = false;
 for (var i = 0; i < chks.length; i++)
 {
  if(chks[i].checked)
  {
   hasChecked = true;
   break;
  }
 }
 if (hasChecked == false)
 {
  alert("Please select at least one Request.");
  return false;
 }
} 
function Check(chk)
{
 var chk = document.getElementsByName('list[]');
 if(document.myform.Check_All.value=="Check All")
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = true ;
  document.myform.Check_All.value="UnCheck All";
 }
 else
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = false ;
  document.myform.Check_All.value="Check All";
 }
}
</script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  </body>
</html>