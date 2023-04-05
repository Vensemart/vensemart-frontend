<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");

if($_SESSION['puc_user_id']=='')
{
  header('Location:index.php');
  exit;
}
//$_SESSION['puc_user_id']

   function _generateInvoiceNo(){
    global $mxDb;
    $rand = mt_rand(100000000000000,99999999999999999);
    $condition = " where invoice_no='".$rand."'";
    $args_invoice = $mxDb->get_information('lifejacket_subscription','invoice_no',$condition,true,'assoc');
    if(isset($args_invoice['invoice_no']))
    {
        if($args_invoice['invoice_no'] == $rand)
            _generateInvoiceNo();
        else
            return $rand;
        }
        else
            return $rand;
    }


    //     foreach ($_SESSION["cart_products"] as $cart_itm){
    //     // set variables to use in content below
    //     $product_name = $cart_itm["product_name"];
    //     $product_qty = $cart_itm["product_qty"];
    //     $product_id = $cart_itm["product_id"];
    //     $nwds=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],  "select * from eshop_products where product_id='$product_id'"));
    //     $qty=$nwds['qty'];
    //     if ($qty<$product_qty) {
    //         echo "<script language='javascript'> alert('stock not available!'); window.location.href='request-cart-view.php'; </script>";
    //     }
    // }

?>

<?php 
            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

                  if(isset($_POST['wallet_pay']))
                  {
                     $total_amount = $_SESSION['ag'];print_r("<br/>");
                     $invoice_no = $_SESSION['invoce'];
                     $payment_type=$_POST['pay_method'];print_r("<br/>");
if ($_POST['pay_method']=='') {
  $payment_type="dbt";
}
                     
  $wallet_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_e_wallet where user_id='".$f['user_id']."'"));
  $cut_wallet=$wallet_amount['amount'];  /*total amount of sponsor*/
  if ($payment_type=='poc_e_wallet_pay') {

   if($cut_wallet>=$total_amount){
    $payment_type="Ewallet Payment";
    $pay_staus=1;
           $invoice = $_SESSION['invoce'];
           $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "update poc_e_wallet set amount=(amount-$total_amount) where user_id='".$f['user_id']."'");
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into puc_credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','".$f['user_id']."','0','$total_amount','0','".$f['user_id']."','".$datarow['user_id']."','".date('Y-m-d')."','Ewallet Payment Shopping','Ewallet Payment Shopping','Ewallet Payment Shopping','Ewallet Payment Shopping','$invoice','Salf Pickup Delivery','0','Fund Wallet','$urls')");
                         }else{

                           header('location:request-ewallet-payment-shop.php?msg=Insufficient Funds in Your Wallet !!');
                           exit;
                         }
    }else{
    $payment_type="Direct Bank Transfer";
    $pay_staus=0;

  }
                    global $mxDb;
                    
                    $invoice_no = _generateInvoiceNo();
                    $_SESSION['invoce']=$invoice_no;
                    
                    $date=date("Y-m-d");
                   
                    //$username = $_POST['pay_username'];print_r("<br/>");
                 
                 if ($f['franchise_category']=='Master Franchise') {
                  $franchise_type=1;
                 }else{
                    $franchise_type=0;
                    $stock_point=$_POST['stock_point'];
                 }                       
                    /*inserting products in purchase detail table*/

                            foreach($_SESSION["cart_products"] as $cart_itm){
                                global $mxDb;
  
                                // set variables to use in content below
                                $product_name = $cart_itm["product_name"];
                                $product_qty = $cart_itm["product_qty"];
                                $product_price = $cart_itm["product_price"];
                                $size = $cart_itm["size"];
                                $product_id = $cart_itm["product_id"];
                                $product_color = $cart_itm["size"];
                                $product_points = $cart_itm["product_pv"];
                                $product_bv = $cart_itm["product_bv"];
                                $totalbv = ($product_bv*$product_qty);
                                $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                $total_points = ($product_points * $product_qty); //calculate Price x Qty
                                 $nepro=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_products where product_id='$product_id'"));
$gst=$subtotal*$nepro['product_gst']/100;
$tylgst=$tylgst+$gst;
                                  /*$fsc = $cart_itm["fcs"];
                                  
                                $pamt=$product_price*$fsc/100;
                                $pamt1=$pamt*$product_qty;
                                $pamt2=$pamt2+$pamt1;
                                $totalsmts=$totalsmts+$pamt2;*/
                                  
    $poc_product = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT product_id FROM `poc_product` where puc='".$_SESSION['puc_user_id']."' and product_id='".$nepro['product_id']."'"));
    if($nepro['product_id']==$poc_product['product_id']){
       mysqli_query($GLOBALS["___mysqli_ston"],"update `poc_product` set qty=qty+ '".$product_qty."' where product_id='".$nepro['product_id']."' and puc='".$_SESSION['puc_user_id']."'");  

        

    mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$nepro['product_id']."',qty='".$product_qty."',invoive_no='".$datarow['invoice_no']."',puc='".$_SESSION['puc_user_id']."',date='$date',status='1'");


    }else{

       mysqli_query($GLOBALS["___mysqli_ston"],"insert into `poc_product` set product_id='".$nepro['product_id']."',qty='".$product_qty."',price='".$nepro['price']."',puc='".$_SESSION['puc_user_id']."'");  

      

           mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$nepro['product_id']."',qty='".$product_qty."',invoive_no='".$invoice_no."',puc='".$_SESSION['puc_user_id']."',date='$date',status='1'");
    }

   
                                $total_pointsw=$total_pointsw+$total_points;
                                  
                                $total = ($total + $subtotal); //add subtotal to total var

                                $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                 $subtotal1=$subtotal1+$subtotal;
                                $insert_array = array('invoice_no'=>$invoice_no,'product_name'=>$product_name,'user_id'=>$_SESSION['puc_user_id'],'p_id'=>$product_id,'size'=>$size,'quantity'=>$product_qty,'net_price'=>$subtotal,'price'=>$product_price,'pay_mode'=>$payment_type, 'pay_mode'=>$payment_type,'purchase_date'=>$date,'pv'=>$total_points,'tbv'=>$totalbv,'pay_type'=>'Frenchise Shopping','gst'=>$gst,'gst_percent'=>$nepro['product_gst'],'franchise_type'=>$franchise_type,'stock_point_id'=>$stock_point);
                                              
                                $mxDb->insert_record('request_purchase_detail', $insert_array);
                                             
    }
                                            
                                $insert_array1= array('invoice_no'=>$invoice_no,'user_id'=>$_SESSION['puc_user_id'],'net_amount'=>$total_amount,'payment_mode'=>$payment_type, 'total_amount'=>$total_amount, 'payment_date'=>$date, 'puc'=>$_SESSION['puc_user_id'], 'purchase_date'=>$date, 'date'=>$date, 'bv'=>$totalbv,'ttype'=>'Frenchise Shopping', 'gst'=>$tylgst,'dp'=>$subtotal1,'status'=>$pay_staus,'delivery_charge'=>'100','franchise_type'=>$franchise_type,'stock_point_id'=>$stock_point); 
                                $mxDb->insert_record('request_amount_detail', $insert_array1);
            
                                //unset($_SESSION['puc_user_id']);
                                unset($_SESSION['cart_products']);
        
                                header('location:request_invoice-detail1.php?inv='.$invoice_no);
                              // header('location:index.php');
                               // header('location:requested-product-list.php?msg=Request Sent Successfully!');
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
            <!--<h1>Product Request</h1>-->
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
             <!-- <li><a href="#">Eshop</a></li>
              <li><a href="#">Wallet Amount</a></li>-->
            </ol>

          </div>
        </section> <!--/ PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
         
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Submit Your Request For Products</strong></h3>
                </header>
                
                <div class="panel-body">
               <?php if ($f['franchise_satus']==0) { ?>    
              <div class="form-group">
                <label for="exampleInputAddress"> <strong>Available Fund Wallet Amount: <?php 
                    $reds=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_e_wallet where user_id='".$_SESSION['puc_user_id']."'")); echo $reds['amount']; ?></strong></label>
              </div>
                  <?php } ?>
                <div class="form-group">
                      <label for="exampleInputAddress"><strong> Your Total Invoice Amount: <?php echo $_SESSION['ag'];?></strong></label>
                      
                    </div>
                     <?php if ($f['franchise_satus']==0) { ?>     
                      <div class="form-group">
                        <label for="exampleInputAddress">Select Payment Type</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                          
                                <select class="form-control" name="pay_method" id="exampleInputState" required="">
                       <option value="">Select Wallet</option>
                        <?php  if ($f['franchise_category']!='Master Franchise') { ?>
                        <option value="poc_e_wallet_pay">Fund Wallet</option>
                      <?php } ?>
                       <!--  <option value="dbt">Direct Bank Transfer</option> -->
                      </select> 
                        </div>
                    </div>

                   
                    
                    <!--  <div class="form-group">
                        <label for="exampleInputAddress">Select Stock Point</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               
                                <select class="form-control" name="stock_point" id="exampleInputState" required="">
                                  <option value="">--Select Stock Point--</option>
                        <?php 
                                             $q1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM poc_registration where franchise_satus=1");
                                             while($st=mysqli_fetch_array($q1)){
                                        ?>
                                        <option value="<?php echo $st['user_id'];?>">Stock Point Id: <?php echo $st['user_id'];?> [Name: <?php echo $st['username'];?> ]</option>
                                      <?php }?>
                      </select> 
                        </div>
                    </div> -->
              <?php } ?> 
                    <input type="hidden" name="pay_username" required value="<?php echo $f['user_id']; ?>" class="form-control" id="exampleInputAddress">
                    <!--<div class="form-group">
                        <label for="exampleInputAddress">Enter Transaction Password</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               <input type="password" name="pay_password" required value="" class="form-control" id="exampleInputAddress">
                        </div>
                    </div>-->
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="wallet_pay" value="Submit Request" class="btn btn-success">             
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->




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