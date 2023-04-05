<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include("header.php");?><!DOCTYPE html>
<html lang="en">
  <head>
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
                    <div  class="panel-body" id="printablediv">
                        <div class="row">
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <div class="invoice-logo">
                                    <img width="250" alt="" src="../images/logo.png">
                                </div>
                            </div>
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                               <?php
                               if(isset($_GET['type']) && $_GET['type']=='activation')
                               { 
                               ?>
                               <h2>Activation invoice</h2>
                               <?php
                                } 
                                else
                                {
                                 ?>
                                 <h2>Transfer invoice</h2>
                                 <?php   
                                }
                               ?>
                            </div>
                            <?php 
                            $invoiceno=$_GET['inv'];
                            $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from puc_transfer_detail where invoice_no='$invoiceno'");
                                    while($data1=mysqli_fetch_array($data)){

                                          $net_price+=$data1['net_price'];

                                          $senderid=$data1['sender_id'];
                                          $receiverid=$data1['receiver_id'];
                                          $date_t=$data1['purchase_date'];
                                                  }
                                      ?>
                            <div class="col-xs-4 animateme scrollme hidden-xs" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <div class="total-purchase">
                                    Paid Amount
                                </div>
                                <div class="amount">INR  <?php echo $net_price;?> <?php //echo number_format($data1['total_amount'],2);?>                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <?php $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='$senderid'");
                                $address=mysqli_fetch_array($data);?>
                            <div class="col-xs-8 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <strong> From</strong>
                                <br><?php echo ucfirst($address['first_name'])." ".ucfirst($address['last_name']);?>
                                <br><?php echo $address['address']; ?>
                                <br><?php echo $address['city'].", ".$address['state'];?>
                                <br><?php echo $address['country'];?>
                                <br>Tel: +962-<?php echo $address['telephone'];?>   </div>
                            <div class="col-xs-4 inv-info animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                            <?php $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='$receiverid'");
                                $junkie=mysqli_fetch_array($data);?>
                                <strong>TO :</strong>
                                <br> <span> Invoice Number :</span> <?php echo $invoiceno;?>
                                <br> <span> Invoice Date :</span> <?php echo $date_t;?>
                                 <br><?php echo ucfirst($junkie['first_name'])." ".ucfirst($junkie['last_name']);?>
                                <br><?php echo $junkie['address']; ?>
                                <br><?php echo $junkie['city'].", ".$junkie['state'];?>
                                <br><?php echo $junkie['country'];?>
                                <br>Tel: +962-<?php echo $junkie['telephone'];?>   </div>
                        </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <table class="table table-striped table-hover">
                        
            
                            <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th class="hidden-xs">IMAGES</th>
                
                                <th>QUANTITY</th>
                                
                                <th>PRICE</th>
                                <th>TOTAL PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $rp_list=mysqli_query($GLOBALS["___mysqli_ston"], "select * from puc_transfer_detail where invoice_no='$invoiceno'");
                                while($p_list=mysqli_fetch_array($rp_list)){
                                    $pimgcr=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select image from products where product_id='".$p_list['p_id']."'"));
                            ?>
              <tr>
              
                                <td><?php echo ucwords($p_list['product_name']);?></td>
                                <td class="hidden-xs"><img width="40" height="40" src="../cmsadmin/product_images/<?php echo $pimgcr['image'];?>"></td>
        
                                <td class=""><?php echo $p_list['quantity'];?></td>
                <td class=""><?php echo $currency.$p_list['price'];?></td>
                                <td class=""><?php echo $currency.$p_list['net_price'];?></td>
                            </tr>
                           <?php }?>
                            </tbody>
                        </table>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-xs-8 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                               <!--  <h4>PAYMENT METHOD</h4><br>
                                <ul class="list-unstyled">
                                    <li>
                                        <b>FUND WALLET</b>
                                    </li>
                                   
                                </ul> -->
                                <h4>Status</h4>
                                <ul class="list-unstyled">
                                    <li>
                                     <br/><b>Purchased</b>
                               
                                    </li>


                                   
                                </ul>
                            </div>
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td><?php echo $net_price;?><?php// echo $currency.number_format($data1['total_amount'],2);?></td>
                                    </tr>
                  
                  <!--<tr>
                                        <td>Paid Amount</td>
                                        <td>$100</td>
                                    </tr>
                                   
                  <tr>
                                        <td>Pending Amount</td>
                                        <td>$100</td>
                                    </tr>-->
                  
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong><?php echo $net_price;?><?php  //echo $currency.number_format($data1['total_amount'],2);?></strong></td>
                                    </tr>
                                    </tbody>
                                                    </table>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                       

                    </div>
                     <div class="row">
                            <div class="col-md-12 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <div class="pull-left">
                                    <a href="javascript:void(0);" class="btn btn-primary hidden-print" id="print" style="float:right;" onclick="javascript:printDiv('printablediv')" target="_blank"><span  aria-hidden="true"></span> Print</a>
                            
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                <a href="index.php" class="btn btn-danger"><i class="ti-dashboard"></i> Back to Dashboard</a>
                                    <!-- <a href="#" class="btn btn-success">Submit Payment</a>-->
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