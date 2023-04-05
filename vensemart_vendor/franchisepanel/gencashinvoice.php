<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
//include("rank-update.php");


?>


<?php 
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];












                 

                  if(isset($_GET['inv']))
                  {
                    $inv=$_GET['inv'];
                    $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from purchase_detail_temp where invoice_no='".$inv."'");
                    while($gers=mysqli_fetch_array($data)){
                   
                    $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='".$f['user_id']."' and product_id='".$gers['p_id']."' and type='Repurchase'"));
                                       $poc_product_details1=$poc_product_details['qty']-$gers['quantity'];

                                       if ($poc_product_details1<0)
                                       {
                                        $msg="Insufficent Quantity";
                                       
                                           header("location:cashproof.php?msg=$msg");
                                             exit;
                                       }
                                       else
                                       {

                                           $insert_array = array('invoice_no'=>$inv,'product_name'=>$gers['product_name'],'user_id'=>$gers['user_id'],'p_id'=>$gers['p_id'],'quantity'=>$gers['quantity'],'net_price'=>$gers['net_price'],'price'=>$$gers['price'],'pay_mode'=>$gers['pay_mode'], 'pay_type'=>$gers['pay_type'],'purchase_date'=>$gers['purchase_date'],'pv'=>$gers['pv']);
                                  
                                              $mxDb->insert_record('purchase_detail', $insert_array);
                                             
                                       // $check="update poc_product set qty='$poc_product_details1' where puc='".$f['user_id']."' and product_id='".$gers['p_id']."' and   type='Repurchase'";
                                       // echo $check;die;
 $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty='$poc_product_details1' where puc='".$f['user_id']."' and product_id='".$gers['p_id']."' and   type='Repurchase'");        
                    }

                  }
                                
                                           
                                             
                                              $data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail_temp where invoice_no='".$inv."'");

                                             while ($gers2=mysqli_fetch_array($data2)){
                                                 $insert_array1= array('invoice_no'=>$inv,'user_id'=>$gers2['user_id'],'net_amount'=>$gers2['net_amount'],'payment_mode'=>$gers2['payment_mode'], 'total_amount'=>$gers2['total_amount'], 'payment_date'=>$gers2['payment_date'], 'purchase_date'=>$gers2['purchase_date'], 'date'=>$gers2['date'], 'puc'=>$gers2['puc'],'shipping_status'=>'2'); 
                                        
                                                  $mxDb->insert_record('amount_detail', $insert_array1);
                                              }
                                                 
                 
          $data3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit_temp where invoice_no='".$inv."'");  

    while($gers3=mysqli_fetch_array($data3)){                  


 mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit(`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`)
   values('".$gers3['invoice_no']."','".$gers3['user_id']."','".$gers3['credit_amt']."','".$gers3['debit_amt']."','".$gers3['admin_charge']."','".$gers3['receiver_id']."','".$gers3['user_id']."','".$gers3['date']."','".$gers3['ttype']."','".$gers3['TranDescription']."','".$gers3['Cause']."','".$gers3['Remark']."','".$gers3['invoice_no']."','".$gers3['product_name']."','".$gers3['status']."','By Cash','".$gers3['current_url']."')");
}



$data4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  poc_credit_debit_temp where invoice_no='".$inv."'");
while($gers4=mysqli_fetch_array($data4)){


 mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_credit_debit(`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`)
   values('".$gers4['invoice_no']."','".$gers4['user_id']."','".$gers4['credit_amt']."','".$gers4['debit_amt']."','".$gers4['admin_charge']."','".$gers4['receiver_id']."','".$gers4['sender_id']."','".$gers4['receive_date']."','".$gers4['ttype']."','".$gers4['TranDescription']."','".$gers4['Cause']."','".$gers4['Remark']."','".$gers4['invoice_no']."','".$gers4['product_name']."','".$gers4['status']."','By Cash','".$gers4['current_url']."')");
}


$data5=mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE amount_detail_temp SET status='1' WHERE invoice_no='".$inv."'");
$data6=mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE purchase_detail_temp SET status='1' WHERE invoice_no='".$inv."'");
$data7=mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE credit_debit_temp SET status='1' WHERE invoice_no='".$inv."'");
$data8=mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE poc_credit_debit_temp SET status='1' WHERE invoice_no='".$inv."'");

  

 header("location:cashproof.php");
  exit;
 
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