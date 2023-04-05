<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
//include("rank-update.php");
 foreach ($_SESSION["cart_products"] as $cart_itm){
                                             // set variables to use in content below
                                              $product_name = $cart_itm["product_name"];
                                              $product_qty = $cart_itm["product_qty"];
                                               $product_id = $cart_itm["product_id"];
 $nwds=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],  "SELECT * FROM `poc_product` where puc='$userid' and product_id='$product_id'"));
                                  $qty=$nwds['qty'];
                                  if ($qty<$product_qty) {
                                    echo "<script language='javascript'> alert('stock not available!'); window.location.href='transfer-cart-view.php'; </script>";
                                  }
                                              }
?>


<?php 
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

/* Retail Commission Code Starts Here*/
/*function  Unilevel_Commission($users,$invoice_no,$total_amount)
{
  $date=date('Y-m-d');
  $need_rank=mysql_query("select * from poc_registration where user_id='$users'");
  $income=mysql_fetch_array($need_rank);
  
  $usersid=$income['ref_id'];
 
  $queryt=mysql_fetch_array(mysql_query("select * from poc_registration where user_id='$usersid'"));
  $queryt_rank=$queryt['user_rank_name'];

  
  
  if($income=='Normal User')
  {
    $spc=15;//Non qualified condition
  }
  else  if($income!='Normal User')
  {
     $spc=50;
  }
   
  else
  {
    $spc=0;//Non qualified condition
  }
 
  
  $withdrawal_commissiond=$total_amount*$spc/100;
  $withdrawal_commission=$withdrawal_commissiond;
  $rwallet=$withdrawal_commission;
  if($withdrawal_commission!='' && $withdrawal_commission!=0 && $upto<=$level)
  {
    mysql_query("update poc_e_wallet set amount=(amount+$rwallet) where user_id='$usersid'");
 
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  mysql_query("insert into credit_debit values(NULL,'$invoice_no','$usersid','$rwallet','0','0','$usersid','$users','$date','Retail Income','Earn Retail Income','Earn Retail Bonuses for $invoice_no Invoice','Earn Retail for $invoice_no Invoice','$invoice_no','Earn Retail Bonuses for $invoice_no Invoice','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");  
  }
  

}*/
/* Retail Commission Code Ends Here*/



                 /*generate invoice number*/
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

                      /*make payment*/

                  if(isset($_POST['wallet_pay']))
                  {
                    global $mxDb;
                    $date=date("Y-m-d");
                    $payment_type=$_POST['pay_method'];print_r("<br/>");
                    $username = $_POST['pay_username'];print_r("<br/>");

                    $check_receiver_id=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where (user_id='".$_POST['receiver_id']."' || username='".$_POST['receiver_id']."')"));
                    $receiver_id=$check_receiver_id['user_id'];print_r("<br/>");
                    $t_password = $_POST['pay_password'];print_r("<br/>");
                    $total_amount = $_SESSION['ag'];print_r("<br/>");

                     
$check_username=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where (user_id='$receiver_id' || username='$receiver_id')"));

    if($check_username<=0)
    {
      header("location:transfer-shop-product.php?msg=PUC Not Available !");
      exit;
    }

        if($receiver_id==$userid)
    {
      header("location:transfer-shop-product.php?msg=Not Allowed!");
      exit;
    }






                

                    $condition1 = " where (username='".$username."' || user_id='".$username."')";
                    $args_sponsor1 = $mxDb->get_information('poc_registration', 'user_id', $condition1, true, 'assoc');

                    $paid_id1=$args_sponsor1['user_id']; 

                               if($paid_id1){

                                  if( ($username != '' && $t_password != '')){

                                    $condition = " where user_id='".$paid_id1."' and t_code='".$t_password."'";
                                    $args_sponsor = $mxDb->get_information('poc_registration', 'user_id', $condition, true, 'assoc');
                                    $paid_id=$args_sponsor['user_id'];
                                    
                                    if( isset($args_sponsor['user_id']) ){
                                      
                                    $wallet_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewallet_table where user_id='$paid_id'"));
                                     $cut_wallet=$wallet_amount['amount'];  /*total amount of sponsor*/
                                    /*echo "$cut_wallet<br>"; */
                                    
                                     $match_wallet1=$total_amount;
                                    /*echo "$match_wallet1";*/
                                    
                                            
                                                    
                                            $invoice_no = _generateInvoiceNo();
                                             $amt=$cut_wallet-$match_wallet1;
                                                      
                                      /*inserting products in purchase detail table*/

                                      foreach ($_SESSION["cart_products"] as $cart_itm){
                                             // set variables to use in content below
                                              $product_name = $cart_itm["product_name"];
                                              $product_qty = $cart_itm["product_qty"];
                                              $product_price = $cart_itm["product_price"];
                                              $product_id = $cart_itm["product_id"];
                                              $product_color = $cart_itm["product_color"];
                                              $product_points = $cart_itm["product_points"];
                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                  $total_points = ($product_points * $product_qty); //calculate Price x Qty

                                  $fsc = $cart_itm["fcs"];
                                  
                                  $pamt=$product_price*$fsc/100;
                                  $pamt1=$pamt*$product_qty;
                                  $pamt2=$pamt2+$pamt1;
                                  $totalsmts=$totalsmts+$pamt2;

                                  $total_pointsw=$total_pointsw+$total_points;
                                  
                                            $total = ($total + $subtotal); //add subtotal to total var

                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                 


                                            $insert_array = array('invoice_no'=>$invoice_no,'product_name'=>$product_name,'sender_id'=>$_SESSION['userpanel_user_id'],'receiver_id'=>$receiver_id,'p_id'=>$product_id,'quantity'=>$product_qty,'net_price'=>$subtotal,'price'=>$product_price,'pay_mode'=>$ewallet_table1, 'pay_type'=>$ewallet_table1,'purchase_date'=>$date,'pv'=>$total_points);
                                              
                                              $mxDb->insert_record('puc_transfer_detail', $insert_array);
                                             
            $product_type1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `products` where product_id='$product_id'"));
                       $product_type=$product_type1['product_type'];                                    
    $poc_product_check=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$receiver_id' and product_id='$product_id'"));
             if ($poc_product_check>0) {
                    $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$receiver_id' and product_id='$product_id'"));
                                       $poc_product_details1=$poc_product_details['qty']+$product_qty;
                   $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty='$poc_product_details1' where puc='$receiver_id' and product_id='$product_id'");
             }else{
             mysqli_query($GLOBALS["___mysqli_ston"], "INSERT into poc_product (`id`,`product_id`,`qty`,`price`,`puc`,`type`)
                       values(NULL,'$product_id','$product_qty','$product_price','$receiver_id','$product_type')");

             }

             if ($product_type=='Fresh')
             {
                  
                   $rand=rand(1111111,9999999);
$e_wallet='PUC Wallet';
$ttype='Product Transfer';
$desc='Fresh Product Transfer';
$charge=0;
$receive_date=date('Y-m-d');
                  $goku_amount=$product_price*$product_qty;

                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO poc_credit_debit(transaction_no,user_id,credit_amt,debit_amt,admin_charge,receiver_id,sender_id,receive_date,ttype,TranDescription,Cause,Remark,invoice_no,product_name,status,ewallet_used_by,current_url) VALUES('".$rand."','".$f['user_id']."','".$goku_amount."','".$charge."','".$charge."','".$receiver_id."','".$f['user_id']."','".$receive_date."','".$ttype."','".$desc."','".$desc."','".$desc."','".$rand."','".$product_name."','".$charge."','".$e_wallet."','".$urls."')");
             
              mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE poc_e_wallet SET amount=(amount+$goku_amount) WHERE user_id='".$receiver_id."'");
$sender=$f['user_id'];
               mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE poc_e_wallet SET amount=(amount-$goku_amount) WHERE user_id='".$sender."'");

             }




 $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty=(qty-$product_qty) where puc='".$f['user_id']."' and product_id='$product_id'");
          
                                              }
                                  


 //Unilevel_Commission($_SESSION['userpanel_user_id'],$invoice_no,$total_pointsw);

  



                                           header('location:product_eshop.php?msg=Product transferred successfully!');
                       
                                         
                                      }
                                      else{
                                         header('location:transfer-shop-product.php?msg=Transaction password doesnot correct!!!');
                                      }
                                  }
                              }
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
            <h1>Pay By Wallet</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Eshop</a></li>
              <li><a href="#">Wallet Amount</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="poc_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                
                </header>
                
                <div class="panel-body">
                  
             
                    
              <div class="form-group">
                        <label for="exampleInputAddress">Enter Receiver Id</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               <input type="text" name="receiver_id" required value="" class="form-control" id="user">
                                <span id="checkuser"></span> 
                        </div>
                    </div>
                     
                    <input type="hidden" name="pay_username" required value="<?php echo $f['user_id']; ?>" class="form-control" id="exampleInputAddress">
                    <div class="form-group">
                        <label for="exampleInputAddress">Enter Transaction Password</label>
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
    <script type="text/javascript">
    $(document).ready(function() {
    $("#user").blur(function (e) {
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var user = $(this).val();

    if(user.length < 1){$("#user").html('');return;}
    if(user.length >= 1){
    $("#checkuser").html('<img src="images/preloader.gif" />');
    $.post('regis17.php', {'user':user}, function(data) {

    $("#checkuser").html(data);
    });
    }
    }); 
    });</script>
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