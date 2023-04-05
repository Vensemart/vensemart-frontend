<?php include("header.php");

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
    
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css'/>

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

            
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
       <?php include("top.php");?>

        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->

<style>
.green{color:green;}
 
h3{
font-size:1em;
font-weight:bold;
font-family:Arial, Helvetica, sans-serif;
}
 
</style>

        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

           <div class="col-md-8 col-sm-8"></br>
           <h3 style="color: #06635e;">Your User Id &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <?php echo $f['user_id'];?><br>Your Username : <?php echo $f['username'];?></h3>
          </div>
         
    <?php $total_balance = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select *  from poc_e_wallet where user_id='$userid'"));

if ($f['franchise_category']!='Master Franchise') {
	
    ?></br>
         <b> <p style="color:#06635e;float:right;">Wallet Balance :&nbsp; &nbsp;<?php echo number_format($total_balance['amount'],2);?></p></b>
<?php } ?>

        </section>
          <section id="page-title" class="row">

         

          
        </section>
        <!-- / PAGE TITLE -->
        
        
        <div class="container-fluid">
          <div class="row">
         <br/>
          
<?php 

$previous_weeks1 = strtotime("-1 week +1 day");

$start_weeks1 = strtotime("last sunday midnight",$previous_weeks1);
$end_weeks1 = strtotime("next saturday",$start_weeks1);

$start_weeks1 = date("Y-m-d",$start_weeks1);
$end_weeks1 = date("Y-m-d",$end_weeks1);


$d = strtotime("today");
$start_week = strtotime("last sunday midnight",$d);
$end_week = strtotime("next saturday",$d);
$start = date("Y-m-d",$start_week); //First Day of Week
$end = date("Y-m-d",$end_week);  // Last day of week
$last_date = date('Y-m-d', strtotime('-1 Day')); // Last day date

// Code for display total income //
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_amount) as total6 from amount_detail where seller_id='$userid' and order_status='4'  "));
// $amount_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_amount) as totalamt from amount_detail where seller_id='$userid' and status='1' and (delst='1')"));
$amount_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_amount) as totalamt from request_amount_detail where seller_id='$userid' and status='1'"));


$totalpurchase=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(dp) as total7 from amount_detail where seller_id='$userid' and status='1'"));
// echo "select sum(dp) as total7 from amount_detail where seller_id='$userid' and status='1'";
// die();
$total_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total1 from puc_credit_debit where user_id='$userid' and  ttype='Sales Income'"));

$total_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where seller_id='".$f['user_id']."' and order_status='4'"));


$total_downline11=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where seller_id='".$f['user_id']."' and order_status!='4'"));

$last_week_total_downline_active=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where seller_id='".$f['user_id']."' and user_rank_name='Affiliate' and registration_date  between '$start_weeks1' and '$end_weeks1'"));

$this_week_total_downline_inactive=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where seller_id='".$f['user_id']."' and user_rank_name='Affiliate' and registration_date between '$start' and '$end'"));
$total_left_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where poc_id='$userid' and status='Pending'"));

if ($f['franchise_category']!='Master Franchise') {
	
          ?>
          
          	<div class="row row-stat">
                            <div class="col-md-4"> 
                              <div class="panel panel-success-alt noborder nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div>
                                       <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">My Total Sale </h5>
                                            <h1 class="mt5 white"><?php echo CURRENCY; ?> <?php if($matching_earning['total6']=='' || $matching_earning['total6']==0) { echo '0.00'; } else  { echo number_format($matching_earning['total6'],2); } ?></h1>
                                        </div>
                                      
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <!--<div class="col-md-3"> -->
                            <!--  <div class="panel panel-success-alt noborder nwbrd">-->
                            <!--        <div class="panel-heading noborder">-->
                            <!--            <div class="panel-btns" style="display: none;">-->
                            <!--                <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>-->
                            <!--            </div>-->
                            <!--           <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>-->
                            <!--            <div class="media-body">-->
                            <!--                <h5 class="md-title nomargin white">My Total Sale DP</h5>-->
                            <!--                <h1 class="mt5 white">INR <?php if($totalpurchase['total7']=='' || $totalpurchase['total7']==0) { echo '0.00'; } else  { echo number_format($totalpurchase['total7'],2); } ?></h1>-->
                            <!--            </div>-->
                                      
                                        
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <!--<div class="col-md-3"> -->
                            <!--  <div class="panel panel-success-alt noborder nwbrd">-->
                            <!--        <div class="panel-heading noborder">-->
                            <!--            <div class="panel-btns" style="display: none;">-->
                            <!--                <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>-->
                            <!--            </div>-->
                            <!--           <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>-->
                            <!--            <div class="media-body">-->
                            <!--                <h5 class="md-title nomargin white">My Total Confirm Sale DP</h5>-->
                            <!--                <h1 class="mt5 white">INR <?php if($amount_earning['totalamt']=='' || $amount_earning['totalamt']==0) { echo '0.00'; } else  { echo number_format($amount_earning['totalamt'],2); } ?></h1>-->
                            <!--            </div>-->
                                        
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            
                            <!--<div class="col-md-3">-->
                            <!--   <div class="panel panel-success-alt  nwbrd">-->
                            <!--        <div class="panel-heading noborder">-->
                            <!--            <div class="panel-btns" style="display: none;">-->
                            <!--                <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>-->
                            <!--            </div>-->
                            <!--           <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-users" style="padding-left:12px;"></i></div>-->
                            <!--           <div class="media-body">-->
                            <!--                <h5 class="md-title nomargin white">My Total Bonus</h5>-->
                            <!--                <h1 class="mt5 white">INR <?php if($total_earning['total1']=='' || $total_earning['total1']==0) { echo '0'; } else  { echo number_format($total_earning['total1'],2); } ?></h1>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <div class="col-md-4">
                              <div class="panel panel-success-alt nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;"><a title="" data-placement="left" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a></div>
                                        <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>
                                      <div class="media-body">
                                            <h5 class="md-title nomargin white">Total Paid Invoice Count</h5>
                                            <h1 class="mt5 white"> <?php if($total_downline=='' || $total_downline==0) { echo '0'; } else  { echo $total_downline; } ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="panel panel-success-alt nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-placement="left" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>
                                      <div class="media-body">
                                            <h5 class="md-title nomargin white">Total Pending Invoice</h5>
                                            <h1 class="mt5 white"> <?php if($total_downline11=='' || $total_downline11==0) { echo '0'; } else  { echo $total_downline11; } ?></h1>
                                        </div>

                                    </div>
                                </div>
                            </div>
                         </div> 
                         
                            <!-- <div class="col-md-3">-->
                            <!--  <div class="panel panel-success-alt nwbrd">-->
                            <!--        <div class="panel-heading noborder">-->
                            <!--            <div class="panel-btns" style="display: none;">-->
                            <!--                <a title="" data-placement="left" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>-->
                            <!--            </div>-->
                            <!--            <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>-->
                            <!--          <div class="media-body">-->
                            <!--                <h5 class="md-title nomargin white">Paid Payout</h5>-->
                                            <!--<h1 class="mt5 white">INR <?php if($total_downline=='' || $total_downline==0) { echo '0'; } else  { echo $total_downline; } ?></h1>-->
                                            
                            <!--            </div>-->

                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                         </div> 
<?php } ?>
                         

              <div class="row">
                <div class="col-md-6 no-left-padding">
                
                   <section class="panel widget-carousel panel-primary card hovercard">
                    <header class="panel-heading">
                      <h4 class="panel-title">Personal Information</h4>
                    </header>
                    <div class="cardheader"></div>
                    <div class="avatar">
                        <?php
                        
                        
                        // Create connection
                        $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                        $shops="select * from poc_registration  where user_id='$userid'";
                        $kd=mysqli_query($db,$shops);
                        
                       
                        while($data2=mysqli_fetch_array($kd))
                        {
                        
                         ?>
                    
                      <img src="https://vensemart.com/vensemart_vendor/cmsadmin/warehouse_images/<?php echo $data2['image'];?>" alt="My Image">
                      <?php
                        }
                      ?>
                        
                        
                        
                    </div>

                    <div class="info">
                        <div class="title">
                            <a href="#"><?php echo $f['first_name']." ".$f['last_name'];?></a>
                        </div>
                        <div class="desc"><?php echo $f['email'];?></div>
                        <div class="desc">
                            <?php 
                                $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                                $countryId=$f['country'];
                                $countries="select * from countries  where id='$countryId'";
                                $kd=mysqli_query($db,$countries);
                                while($data2=mysqli_fetch_array($kd))
                                {
                                     
                                    
                                    
                            ?>
                                 <?php echo $data2['country_name'];?>
                            <?php
                                }
                            ?>
                            
                            
                            </div>
                        <div class="desc">
                            
                             <?php 
                                $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                                $stateId=$f['state'];
                                $states="select * from states  where id='$stateId'";
                                $kdd=mysqli_query($db,$states);
                                while($data3=mysqli_fetch_array($kdd))
                                {
                                    
                            ?>
                                 <?php echo $data3['state_name'];?>
                            <?php
                                }
                            ?>
                            
                            
                            <?php 
                                $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                                $cityId=$f['city'];
                                $cities="select * from cities  where id='$cityId'";
                                $kddd=mysqli_query($db,$cities);
                                while($data4=mysqli_fetch_array($kddd))
                                {
                                    
                            ?>
                                 ,<?php echo $data4['city_name'];?>
                            <?php
                                }
                            ?>
                            </div> 
                       

                        <div class="desc"><strong>Account Status : <?php if($f['is_verified']==1) { echo "Active";} else { echo "Inactive";}?></strong></div>
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
  
  
  
<script type="text/javascript">
                        var timerId;
                        var ind = document.getElementById("indicator");
                        var colors = ["red", "blue", "green", "skyblue", "purple", "orange", "brown", "gray"];
                        window.onload = startCycle();
                            function startCycle() {
                            timerId = setInterval(changeColor, 500);
                            }
                                function getColor(){
                                return colors[Math.floor(Math.random() * colors.length)];
                                }
                        function changeColor() {
                        let color = getColor();
                            if(color == ind.innerHTML){
                            color = getColor();
                            }
                        ind.style.color = color;
                        }
</script>

  </body>
</html>