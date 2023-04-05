<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include("header.php");

$checkid=$_GET['id'];
$invoice_no=$_GET['inv'];
$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail_new where invoice_no='$invoice_no' "));

$userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"select * from product_shipping_billing_address where invoiceno='$invoice_no' ORDER BY id desc LIMIT 1"));

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

    <script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("dvContents").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>DIV Contents</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>
  </head>

  <body class="">
    <div class="animsition">  
    
     <?php include("sidebar.php");?>
     

      <main id="playground">

            
       
         <?php include("top.php");?>

       


        <!-- PAGE TITLE -->
        <div id="print">
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Summary / Payment</h1>
          
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Home</a></li>
              <li><a href="#">Summary / Payment</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
           

            <div class="col-md-12 margin-bottom-30">
              
        <section class="row" id="page-title">

            <div class="panel invoice">
                            <div class="panel-body" id="printablediv">
                                <div class="row">
                                    <div class="col-xs-4 col-xs-12">
                                        
                                <div class="invoice-logo">
                                   <img src="../dashboard/images/logo.png" alt="" width="220" />
                            </div>
                           
                                    </div>
                                        <div class="col-xs-4 col-xs-12">
                                      <h4>TAX INVOICE</h4>
            <h2>Rootpure Marketing Pvt. Ltd.</h2>
                 <p><b>Corporate  Office</b> :   
                                      
                                      <br>ROOTPURE MARKETING PVT LTD <br>
DSM 104, DLF TOWERS, SHIVAJI MARG, 
NEW DELHI - 110015 ,
Ph. 011-41066920<br>
GSTIN :07AAKCR1407P1Z1

                                   </p>
          
                                   
    
                                     </div>
                                    <div class="col-xs-4 col-xs-12" >
                                        <div class="total-purchase hidden-xs" >Total Purchase</div>
                                        <div class="amount">Rs. <?php echo number_format($lfj['net_amount'],2);?>
                                        </div>

                                         <?php  if ($lfj['payment_mode2']=='Self Pickup'){ ?>
<br>
            <p><b>Branch Office</b> :     
                                           
                                           
                                            
                                        <?php  $prss=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM poc_registration WHERE user_id ='".$lfj['puc']."'"));
$prss1=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM poc_registration WHERE user_id ='".$prss['stock_point']."'"));
                                           ?>
                                         <?php echo $prss1['address'];?><br>
                                         City:<?php echo $prss1['city'];?>,State:<?php echo $prss1['state'];?><br>
                                          Phone: <?php echo $prss1['telephone'];?>
                                   </p>
            <h4>GSTIN : <?php echo $prss1['gst'];?></h4>
             <?php } ?>   
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-12">
                                          <address>
                                            
                                            <strong>Billed to :</strong><br>
                                           
                                            
                                     <br/><span><?php echo $userdeailss['FirstName']." ".$userdeailss['LastName'];?></span>
                                        <br/><span><?php echo $userdeailss['Line1'];?></span>
                                        <br/><span><?php echo $userdeailss['Line2'];?></span>
                                <br/><span><?php echo $userdeailss['City'];?>, <?php echo $userdeailss['state'];?>, <?php echo $userdeailss['Country'];?></span>
                                <br/><span><?php echo $userdeailss['Pincode'];?>
                                <br/><span><?php echo $userdeailss['Landmark'];?></span>
                                <br/><span>Tel: <?php echo $userdeailss['MobileNumber'];?></span>
                                        </address>
                                    </div>
                                    <div class="col-xs-4 col-xs-12">
                                        <strong>
                                            Shipped to :
                                        </strong>
                                        <br/><span><?php echo $userdeailss['FirstName']." ".$userdeailss['LastName'];?></span>
                                        <br/><span><?php echo $userdeailss['Line1'];?></span>
                                        <br/><span><?php echo $userdeailss['Line2'];?></span>
                                <br/><span><?php echo $userdeailss['City'];?>, <?php echo $userdeailss['state'];?>, <?php echo $userdeailss['Country'];?></span>
                                <br/><span><?php echo $userdeailss['Pincode'];?>
                                <br/><span><?php echo $userdeailss['Landmark'];?></span>
                                <br/><span>Tel: <?php echo $userdeailss['MobileNumber'];?></span>
                                    </div>
                                    <div class="col-xs-4 col-xs-12 inv-info">
                                        <strong>INVOICE INFO</strong>
                                        <br/> <span> Invoice Number</span>  <?php echo $lfj['invoice_no'];?>
                                        <br/><span> Invoice Date</span> <?php echo $lfj['purchase_date'];?>
                                        <!-- <br/> <span> Expiry Date</span>    <?php echo $lfj['expire_date'];?> -->
                                        <br/><span> Stockist ID</span> <?php echo $lfj['user_id'];?>
                                        <br><span>Bank Ref No :</span> <?php echo !empty($ref['imps'])?$ref['imps']:'N/A';?>

                                        <?php if($lfj['puc']!=''){ ?>
                                          <br><span style='color:green;'><b>Stockist Id :</b></span> <?php echo $lfj['puc'];?>
                                          <?php    $ph=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM poc_registration WHERE user_id='".$lfj['puc']."'"));

                                          ?>
                                         <br><span style='color:green;'><b>Stockpoint Name :</b></span> <?php echo $ph['first_name']." ".$ph['last_name']; ?>

                                      <?php
                                            } ?>
                                        
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                              
                                                <th>ITEM</th>
                                            
                                            <!--     <th>PRICE</th> -->
                                             
                                                <th>DSP</th>
                                                <th>PV</th>
                                                <!--<th>COLOR</th>-->
                                                <!--<th>SIZE</th>-->
                                                <th class="">QUANTITY</th>
                                                <!--   <th class="hidden-xs">DESCRIPTION</th> -->
                                                
                                                <!--<th>GP</th>-->
                                             <!--    <th>DISCOUNT</th> -->
                                                <th>TOTAL</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_purchase_detail_new where invoice_no='$invoice_no'");
                                            $i=0;
                                            $subtotal = 0;
                                            $discount = 0;
                                            while($data=mysqli_fetch_array($query)){
                                               $i++;
                                               $subtotal = $subtotal + $data['net_price'];
                                               $discount = $discount + $data['discount'];
                                               $gst_per = $data['gst'];
                                                $gst = $data['gst'];
                                                $product_gst = $product_gst + $gst;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                              
                                                <td><?php echo  $data['product_name'];?></td>
                                             
                                             <!--    <td class=""><?php echo number_format($data['price'],2);?></td> -->
                                       
                                              
                                              
                                                <td class=""><?php echo number_format($data['dp'],2);?></td>
                                                 <td><?php echo  $data['pv'];?></td>
                                                <!--<td><?php echo  $data['p_color'];?></td>-->
                                                <!--<td><?php echo  $data['p_size'];?></td>-->
                                                <td class=""><?php echo $data['quantity'];?></td>
                                               <!--  <td><?php echo  number_format($data['discount'],2);?></td> -->
                                                <td><?php echo number_format($data['net_price'],2);?></td>
                                                <td>
                                  
                                            </td>
                                          <td>
                                  
                                 
                                 </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <br/>
                                <br/>

                                <div class="row">
                                    <div class="col-xs-8 col-xs-12">
                                        <h4>PAYMENT METHOD</h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                <?php echo $lfj['payment_mode'];?>
               
                                                <?php
                                              if ($lfj['payment_mode2']!='') {
                                                echo "(".$lfj['payment_mode2'].")";
                                              }

                                                ?>
                                            </li>
                                             <li><strong>Payment Status :</strong><?php if ($lfj['status']==0) {
                                               echo"Pending";
                                              }else if ($lfj['status']==2) {
                                               echo"Cancel";
                                              }else{

                                                 echo"Paid";
                                              } ?></li>
                                            <li><strong>Consignment No. :</strong><?= !empty($lfj['dtdcno'])?$lfj['dtdcno']:'N/A'?></li>
                                    <li><strong>Delivery Status :</strong><?php if($lfj['delst']==0){ echo 'Pending';} if($lfj['delst']==1){ echo 'Dispatched';} if($lfj['delst']==2){ echo 'Delivered'; }?></li>
                                         </ul>
                                    </div>
                                    <div class="col-xs-4 col-xs-12">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td><?php echo CURRENCY.number_format($subtotal,2);?></td>
                                            </tr>
                                             <?php  if ($lfj['delivery_charge']!='') { ?>
                                                <tr>
                                                    <td>Shipping Charge</td>
                                                    <td><?php echo $lfj['delivery_charge'];?></td>
                                                </tr>
                                              <?php } ?>
                                              <?php  if ($lfj['delivery_date']!='' && $lfj['delst']!=2) { ?>
                                                <tr>
                                                    <td>Dispatched/ Delivery Date</td>
                                                    <td><?php echo $lfj['delivery_date'];?></td>
                                                </tr>
                                              <?php } ?>
                                            <tr>
                                               
                                            <tr>
                                                <td>
                                                    <strong>GRAND TOTAL</strong>
                                                </td>
                                                <td><strong><?php 
                                               
                                                echo CURRENCY.number_format($lfj['total_amount'],2);?></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br/><br/>
                          <div class="row">
                                    <div class="col-xs-8 col-xs-12">
                                        
                                     <p>Terms & Conditions Receiver's Signature :</p>
                <p>E.& O.E.</p>
                <p>1. Goods once sold will not be taken back.</p>
               
                <p>2. Subject to 'Delhi' Jurisdiction only.</p>
                                    </div>
                               
                                    <div class="col-xs-4 col-xs-12">
                                        
                                   <td style="padding:10px 0;"><p style="height:40px;border-bottom:1px solid #000;padding:0 10px;">Receiver's Signature :</p>
                <h4 style="padding:0 10px;" class="text-right">for Rootpure Marketing Pvt. Ltd.</h4><br /><br />
                <h4 style="padding:0 10px;" class="text-right">Authorised Signatory</h4>
                                    </div>
                                </div><br/><br/>
                                <div class="row">
                                    <div class="col-xs-12 col-xs-12">
                                        <div class="pull-left">
                                            <a href="javascript:void(0);" class="btn btn-primary hidden-print" id="print" style="float:right;" onclick="javascript:printDiv('printablediv')" target="_blank"><span  aria-hidden="true"></span> Print</a>
                                        </div>
                                        <div class="pull-right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  </body>
</html>