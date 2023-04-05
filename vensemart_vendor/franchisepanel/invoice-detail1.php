<?php include("header.php");
$checkid=$_GET['id'];
$invoice_no=$_GET['invoice_no'];
    $checkid=$_GET['id'];
  

    $lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where invoice_no='$invoice_no' "));
    $ref=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT imps FROM pins WHERE pin_no='".$lfj['pin_no']."'"));
    $userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"select * from product_shipping_billing_address where invoiceno='$invoice_no' AND userid='".$f['user_id']."' ORDER BY id desc LIMIT 1"));
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
    
      <!-- start of LOGO CONTAINER -->
      
      <!-- end of LOGO CONTAINER -->

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

               <div class="panel invoice">
                            <div class="panel-body" id="printablediv">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="invoice-logo">
                                            <img src="images/logo.png" alt="" width="120" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <h3>INVOICE</h3>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="total-purchase">Total Purchase</div>
                                        <div class="amount">Rs. <?php echo number_format($lfj['net_amount'],2);?>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <address>
                                            <strong>OFFICE ADDRESS</strong>
                                            <br>Next Generation Deals India Pvt.
                                            <br>
                                              A-21, second floor, sector- 67, 
                                            <br>
                                              NOIDA 201301
                                            <br/>
                                            1800 180 7996<br/>
                                            <strong>GSTIN : </strong>09AAJCR6281J1ZS<br>
                                            <strong>TAN : </strong>MRTR07289C
                                        </address>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <strong>
                                            TO
                                        </strong>
                                        <br/><span><?php echo $userdeailss['FirstNameB']." ".$userdeailss['LastNameB'];?></span>
                                <br/><span><?php echo $userdeailss['Line1B'].' '.$userdeailss['LandMarkB'];?></span>
                                <br/><span><?php echo $userdeailss['CityB'];?>, <?php echo $userdeailss['stateB'];?>, <?php echo $userdeailss['CountryB'];?></span>
                                <br/><span><?php echo $userdeailss['PinCodeB'];?>
                                <br/><span>Tel: <?php echo $userdeailss['MobileNumberB'];?></span>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 inv-info">
                                        <strong>INVOICE INFO</strong>
                                        <br/> <span> Invoice Number</span>  <?php echo $lfj['invoice_no'];?>
                                        <br/><span> Invoice Date</span> <?php echo $lfj['purchase_date'];?>
                                        <!-- <br/> <span> Expiry Date</span>    <?php echo $lfj['expire_date'];?> -->
                                        <br/> <span> Invoice Status :</span>  Paid
                                        <br><span>Bank Ref No :</span> <?php echo !empty($ref['imps'])?$ref['imps']:'N/A';?>
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
                                                <!--   <th class="hidden-xs">DESCRIPTION</th> -->
                                                <th class="">UNIT COST</th>
                                                <th class="">QUANTITY</th>
                                                <th>TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $package123=mysqli_query($GLOBALS["___mysqli_ston"], "select * from purchase_detail where invoice_no='$invoice_no'");
                                            $i=1;
                                            $zing='';
                                            while($packagepurchase=mysqli_fetch_array($package123)){
                                                $pr=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT SUM(product_gst) as pr FROM products WHERE product_id ='".$packagepurchase['p_id']."'"));
                                                $zing=$zing+$pr['pr'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo  $packagepurchase['product_name'];?></td>
                                                <!--  <td class="hidden-xs"><?php echo $packagepurchase['remark'];?></td> -->
                                                <td class=""><?php echo number_format($packagepurchase['price'],2);?></td>
                                                <td class=""><?php echo $packagepurchase['quantity'];?></td>
                                                <td><?php echo number_format($packagepurchase['net_price'],2);?></td>
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                    </table>
                                </div>
                                <br/>
                                <br/>

                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <h4>PAYMENT METHOD</h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                <?php echo 'Shopping Wallet'; //$lfj['payment_mode'];?>
                                            </li>
                                            <li><strong>Consignment No. :</strong><?= !empty($lfj['dtdcno'])?$lfj['dtdcno']:'N/A'?></li>
                                    <li><strong>Delivery Status :</strong><?php if($lfj['delst']==0){ echo 'Pending';} if($lfj['delst']==1){ echo 'Dispatched';} if($lfj['delst']==2){ echo 'Delivered'; }?></li>
                                         </ul>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td>Rs. <?php echo number_format($lfj['dp'],2);?></td>
                                            </tr>
                                            <tr>
                                                <td>Tax</td>
                                                <td>Rs. <?php echo number_format($zing,2);?></td>
                                            </tr>
                                            <tr>
                                               
                                                <td>Delivery Charge :  </td>
                                             <td>Rs.     <?php 

if ($lfj['delivery_charge']=='') {
    echo "0";
}else{
     echo $lfj['delivery_charge'];
}
                                               ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Discount</td>
                                                <td>Rs. 0.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>GRAND TOTAL</strong>
                                                </td>
                                                <td><strong>Rs. <?php echo number_format($lfj['total_amount'],2);?></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <h4>Declaration</h4>
                                        <p>We Declare that this invoice shows actual price of Goods/Packs Described.<br />
                                        All Goods/Packs are being purchased for internal/personal use not for re-sale.</p>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="pull-left">
                                            <a href="javascript:void(0);" class="btn btn-primary hidden-print" id="print" style="float:right;" onclick="javascript:printDiv('printablediv')" target="_blank"><span  aria-hidden="true"></span> Print</a>
                                        </div>
                                        <div class="pull-right">
                                        </div>
                                    </div>
                                </div>
                            </div>
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