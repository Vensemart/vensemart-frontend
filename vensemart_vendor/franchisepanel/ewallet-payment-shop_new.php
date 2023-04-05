<?php 

error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");

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

if(isset($_POST['submit']))
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
   
   if($name!='' && $email!='' &&  $mobile!='' && $line1!='' && $country!='' && $city!='' && $pin!='' && $name_billing!='' &&  $emailb!='' && $mobileb!='' && $lin1b!='' && $countryb!='' && $cityb!='' && $pincodeb!='')
   {




 $invoice_no = _generateInvoiceNo();
$_SESSION['invoce']=$invoice_no;


       $incount=mysqli_num_rows(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM product_shipping_billing_address WHERE invoiceno='".$invoice_no."' AND userid='".$uid."' ORDER BY id DESC LIMIT 1"));
       
       if($incount>=1)
       {
         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE product_shipping_billing_address  SET FirstName='".$name."',LastName='".$lastname."', EmailID='".$email."',MobileNumber='".$mobile."',Line1='".$line1."',Line2='".$line2."',Landmark='".$Landmark."',Country='".$country."',state='".$state."',City='".$city."',Pincode='".$pin."',FirstNameB='".$name_billing."',LastNameB='".$last_nameb."',EmailIDB='".$emailb."',MobileNumberB='".$mobileb."',Line1B='".$lin1b."',Line2B='".$lin2b."',LandMarkB='".$landmarkb."',CountryB='".$countryb."',stateB='".$stateb."',CityB='".$cityb."',PinCodeB='".$pincodeb."' WHERE invoiceno='".$invoice_no."'");  
       }
       else
       {
         mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO product_shipping_billing_address  SET FirstName='".$name."',LastName='".$lastname."', EmailID='".$email."',MobileNumber='".$mobile."',Line1='".$line1."',Line2='".$line2."',Landmark='".$Landmark."',Country='".$country."',state='".$state."',City='".$city."',Pincode='".$pin."',FirstNameB='".$name_billing."',LastNameB='".$last_nameb."',EmailIDB='".$emailb."',MobileNumberB='".$mobileb."',Line1B='".$lin1b."',Line2B='".$lin2b."',LandMarkB='".$landmarkb."',CountryB='".$countryb."',stateB='".$stateb."',CityB='".$cityb."',PinCodeB='".$pincodeb."', invoiceno='".$invoice_no."', userid='".$uid."'");    
       }
        
    

  //  header('location:update-billing.php?inv='.$invoice_no.'&msg=Update Successfully');

  }else
  {
    header('location:update-billing.php?msg=Fill The Details');
  }
}




if($userid=='')
{

  header('Location:puc_product.php');
  exit;
}
//include("rank-update.php");
 foreach ($_SESSION["cart_products"] as $cart_itm){
                                             // set variables to use in content below
                                              $product_name = $cart_itm["product_name"];
                                              $product_qty = $cart_itm["product_qty"];
                                               $product_id = $cart_itm["product_id"];
 $nwds=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],  "select * from poc_product where product_id='$product_id'"));
                                  $qty=$nwds['qty'];
                                  if ($qty<$product_qty) {
                                    echo "<script language='javascript'> alert('stock not available!'); window.location.href='cart-view_new.php'; </script>";
                                  }
                                              }
?>


<?php 
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];



                      /*make payment*/

                  if(isset($_POST['wallet_pay']))
                  {

                   
$ewallet_table1='Cash On Franchise';

                               $new_wlt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],  "select * from poc_e_wallet where user_id='".$f['user_id']."'"));
                                              $my_amount=$new_wlt['amount'];
                                              $deduction_amt=$_SESSION['ag'];

                                              $amt_to_check=($my_amount-$deduction_amt);
                                             // echo $amt_to_check;die;
                                           
                                              
                                                  

                                                       global $mxDb;
                    $date=date("Y-m-d");
                    $payment_type=$_POST['pay_method'];print_r("<br/>");
                    $username = $_POST['pay_username'];print_r("<br/>");
                    $t_password = $_POST['pay_password'];print_r("<br/>");
                    $total_amount = $_SESSION['ag'];print_r("<br/>");

                                                                           
                 

                    $condition1 = " where (username='".$username."' || user_id='".$username."')";
                    $args_sponsor1 = $mxDb->get_information('poc_registration', 'user_id', $condition1, true, 'assoc');

                    $paid_id1=$args_sponsor1['user_id']; 

                               if($paid_id1){

                                  if( ($username != '' && $t_password != '') && ($payment_type!='')){

                                    $condition = " where user_id='".$paid_id1."' and password='".$t_password."'";
                                    $args_sponsor = $mxDb->get_information('poc_registration', 'user_id', $condition, true, 'assoc');
                                    $paid_id=$args_sponsor['user_id'];
                                    
                                    if( isset($args_sponsor['user_id']) ){
                                   
                                    $wallet_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewallet_table where user_id='$paid_id'"));
                                     $cut_wallet=$wallet_amount['amount'];  /*total amount of sponsor*/
                                    /*echo "$cut_wallet<br>"; */
                                    
                                     $match_wallet1=$total_amount;
                                    /*echo "$match_wallet1";*/
                                    
                                               
                                                    
                                            $invoice_no = $_SESSION['invoce'];
                                             $amt=$cut_wallet-$match_wallet1;
                                                      
                                      /*inserting products in purchase detail table*/

                                      foreach ($_SESSION["cart_products"] as $cart_itm){
 $product_check=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_products` where  product_id='".$cart_itm["product_id"]."'"));
                                             // set variables to use in content below
                                              $product_name = $cart_itm["product_name"];
                                              $product_qty = $cart_itm["product_qty"];
                                              $product_price = $cart_itm["product_price"];
                                                $product_mrp = $product_check["price"];
                                              $product_id = $cart_itm["product_id"];
                                              $product_color = $cart_itm["product_color"];
                                              $product_points = $cart_itm["product_points"];
                                              $product_bv = $cart_itm["product_bv"];
                                               $product_mrp1 = ($product_mrp*$product_qty);
                                              $totalbv = ($product_bv*$product_qty);
                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                              $gst=$subtotal*$product_check["product_gst"]/100;
                                              $tlgst=$gst+$tlgst;
                                  $total_points = ($product_points * $product_qty); //calculate Price x Qty

                                  $fsc = $cart_itm["fcs"];
                                  
                                  $pamt=$product_price*$fsc/100;
                                  $pamt1=$pamt*$product_qty;
                                  $pamt2=$pamt2+$pamt1;
                                  $totalsmts=$totalsmts+$pamt2;

                                  $total_pointsw=$total_pointsw+$total_points;
                                  
                                            $total = ($total + $subtotal); //add subtotal to total var

                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                 
                

                                            $insert_array = array('invoice_no'=>$invoice_no,'product_name'=>$product_name,'user_id'=>$userid,'p_id'=>$product_id,'quantity'=>$product_qty,'net_price'=>$subtotal,'price'=>$product_price,'pay_mode'=>$ewallet_table1, 'pay_type'=>$ewallet_table1,'purchase_date'=>$date,'pv'=>$totalbv,'dp'=>$product_price,'gst'=>$gst,'gst_percent'=>$product_check['product_gst'],'ttype'=>'Franchise Shopping','product_type'=>$product_type);
                                              
                                             $mxDb->insert_record('eshop_purchase_detail_new', $insert_array);
                                             
                                              
           
                    $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$userid' and product_id='$product_id'"));
                                       $poc_product_details1=$poc_product_details['qty']-$product_qty;
                   $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty='$poc_product_details1' where puc='$userid' and product_id='$product_id'");
             

                          mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$product_id."',qty='".$product_qty."',invoive_no='".$invoice_no."',puc='$userid',stock_point='".$f['stock_point']."',date='$date',status='0'");

           
                                              }
                                            
                                            $insert_array1= array('invoice_no'=>$invoice_no,'user_id'=>$userid,'net_amount'=>$total_amount,'payment_mode'=>$ewallet_table1, 'total_amount'=>$total_amount, 'payment_date'=>$date, 'purchase_date'=>$date, 'date'=>$date, 'puc'=>$f['stock_point'],'dp'=>$product_price,'mrp'=>$product_mrp1,'pp'=>$totalbv,'ttype'=>'Franchise Shopping'); 
                                            $mxDb->insert_record('amount_detail_new', $insert_array1);
            
                                        



  $datee = date('Y-m-d');








  


unset($userid);
unset($_SESSION['BillingType']);

unset($_SESSION['cart_products']);

   



 //Unilevel_Commission($_SESSION['puc_user_id'],$invoice_no,$total_pointsw);

  



                                           header('location:puc-shopping-invoice-detail_new.php?inv='.$invoice_no);
                       
                                          }
                                           else{
                                         header('location:ewallet-payment-shop_new.php?msg=Password doesnot correct!!!');
                                      }
                                      }
                                     
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
           
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="poc_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Bill Now</strong></h3>
                </header>
                 <?php 
                 if($_SESSION['BillingType']=='1')
{
$product_type="Activation Product";

}
if($_SESSION['BillingType']=='2')
{
$product_type="Upgrade Product";

}
if($_SESSION['BillingType']=='3')
{
$product_type="Repurchase Product";

}
         $results1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='".$userid."' || username='".$userid."')"));

                  ?>  
               <div class="container-fluid">
                    <div class="row">
                         <div class="col-sm-6 col-md-2"></div>
                    <div class="col-sm-6 col-md-8 " style="background-color: rgb(41, 51, 53);padding:10px;color:white;text-align: justify;;">
      Username: <?php echo$results1['username']; ?><br>
      Full Name: <?php echo $results1['first_name']."".$results1['last_name']; ?><br>
      Address: <?php echo$results1['address']; ?>, <br>Lendmark: <?php echo$results1['lendmark']; ?>
     City: <?php echo$results1['lendmark']; ?>,<br>state: <?php echo$results1['state']; ?>
        Country: <?php echo$results1['country']; ?>
          
    </div>
    <div class="col-sm-6 col-md-2"></div>
    </div>
  </div><br>
<!--<center><h4 style="color: green;">Username: <?php echo$results1['username']; ?><br>Billing Type: <?php echo $product_type; ?></h4></center>-->
                <div class="panel-body">
                  
              <div class="form-group">
                     
                      
                    </div>
                  
                <div class="form-group">
                      <label for="exampleInputAddress"><strong>  Total Invoice Amount: <?php echo $_SESSION['ag'];?></strong></label>
                      
                    </div>
                   
                    <input type="hidden" name="pay_username" required value="<?php echo $f['user_id']; ?>" class="form-control" id="exampleInputAddress">
                    <div class="form-group">
                        <label for="exampleInputAddress">Enter Password</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               <input type="password" name="pay_password" required value="" class="form-control" id="exampleInputAddress">
                        </div>
                    </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="wallet_pay" value="PAY" class="btn btn-success">             
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

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