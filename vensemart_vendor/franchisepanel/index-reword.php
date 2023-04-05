<?php include("header.php");



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

          
        </section> <!-- / PAGE TITLE -->
        
        
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
$total_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total1 from poc_credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Sales Income' OR ttype='Reward Income' OR ttype='Binary Bonus' OR ttype='Repurchase Income' OR ttype='Matching Income')"));

// Code for display last day income //
$yesterday_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from poc_credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Sales Income' OR ttype='Reward Income' OR ttype='Binary Bonus' OR ttype='Repurchase Income' OR ttype='Matching Income') and receive_date between '$start_weeks1' and '$end_weeks1'"));

// Code for display this week income //
$week_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total3 from poc_credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Sales Income' OR ttype='Reward Income' OR ttype='Binary Bonus' OR ttype='Repurchase Income' OR ttype='Matching Income') and receive_date between '$start' and '$end'"));

// Code for display total sponsor income //
$sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total4 from poc_credit_debit where user_id='$userid' and ttype='Sales Income'"));

// Code for display total Split Income //
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(debit_amt) as total5 from poc_credit_debit where user_id='$userid' and ttype='POC Fund Added'"));


// Code for display total Split Income //
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from poc_credit_debit where user_id='$userid' and ttype='Fund Transfer'"));


$total_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where puc='".$f['user_id']."' and user_rank_name='Affiliate'"));

$total_downline_inactive=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where puc='".$f['user_id']."' and user_rank_name!='Affiliate'"));
$total_left_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where poc_id='$userid' and status='Pending'"));



$last_week_total_downline_active=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where puc='".$f['user_id']."' and user_rank_name='Affiliate' and registration_date  between '$start_weeks1' and '$end_weeks1'"));

$this_week_total_downline_inactive=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where puc='".$f['user_id']."' and user_rank_name='Affiliate' and registration_date between '$start' and '$end'"));
$total_left_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where poc_id='$userid' and status='Pending'"));
          ?>
          
          	<div class="row row-stat">
                            <div class="col-md-4">
                                <div class="panel panel-success-alt noborder nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                       <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">My Total Bonus</h5>
                                            <h1 class="mt5 white">INR <?php if($total_earning['total1']=='' || $total_earning['total1']==0) { echo '0.00'; } else  { echo number_format($total_earning['total1'],2); } ?></h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Last Week Bonus</h5>
                                                <h4 class="nomargin white">INR <?php if($yesterday_earning['total2']=='' || $yesterday_earning['total2']==0) { echo '0.00'; }
                                                else  { echo number_format($yesterday_earning['total2'],2); } ?>

                                                </h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">This Week Bonus</h5>
                                                <h4 class="nomargin white">INR 
<?php if($week_earning['total3']=='' || $week_earning['total3']==0) { echo '0.00'; } 
                                                else  { echo number_format($week_earning['total3'],2); } ?>
                                                </h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                            <div class="col-md-4">
                               <div class="panel panel-success-alt  nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                       <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-users" style="padding-left:12px;"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">Total Sales Income</h5>
                                            <h1 class="mt5 white">INR 
<?php if($sponsor_earning['total4']=='' || $sponsor_earning['total4']==0) { echo '0.00'; } 
                                                else  { echo number_format($sponsor_earning['total4'],2); } ?>
                                           </h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Total Fund Received</h5>
                                                <h4 class="nomargin white">INR 

<?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo '0.00'; } 
                                                else  { echo number_format($binary_earning['total5'],2); } ?>
                                                </h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">Total Fund Sent</h5>
                                                <h4 class="nomargin white">INR <?php if($matching_earning['total5']=='' || $matching_earning['total5']==0) { echo '0.00'; } else  { echo number_format($matching_earning['total5'],2); } ?></h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                            <div class="col-md-4">
                              <div class="panel panel-success-alt nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-placement="left" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">Total ID Activated</h5>
                                            <h1 class="mt5 white"><?php echo $total_downline;?> <font></font> </h1>
                                        </div><!-- media-body -->


                                      


                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Income Wallet Amount</h5>
                                                <h4 class="nomargin white">INR <?php  $shop11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_income_wallet where user_id='$userid'")); echo $shop11['amount'];?> </h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">Fund Wallet Amount</h5>
                                                <h4 class="nomargin white">INR <?php  $shop1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_e_wallet where user_id='$userid'")); echo $shop1['amount'];?></h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                        </div>
                        
                         <div class="row">
                           

                            <div class="col-md-4">
                              <div class="panel panel-success-alt nwbrd">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-placement="left" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon" style="background:#c37c8a;"><i class="fa fa-pencil"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">Total ID Inactive</h5>
                                            <h1 class="mt5 white"><?php echo $total_downline_inactive;?> <font></font> </h1>
                                        </div><!-- media-body -->


                                      


                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Last Week Active User</h5>
                                                <h4 class="nomargin white"><?php if($last_week_total_downline_active=='' || $last_week_total_downline_active==0) { echo '0'; } 
                                                else  { echo $last_week_total_downline_active; }  ?> </h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">This Week Active User</h5>
                                                <h4 class="nomargin white"> <?php if($last_week_total_downline_inactive=='' || $last_week_total_downline_inactive==0) { echo '0'; } 
                                                else  { echo $last_week_total_downline_inactive; }  ?> </h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                         </div>
                        
       
            <div class="col-md-6">
                         

              <div class="row">
                <div class="col-md-12 no-left-padding">
                
                   <section class="panel widget-carousel panel-primary card hovercard">
                    <header class="panel-heading">
                      <h4 class="panel-title">Perosnal Information</h4>
                    </header>
                    <div class="cardheader"></div>
                    <div class="avatar">
                        <img src="<?php echo $userimage;?>">
                    </div>

                    <div class="info">
                        <div class="title">
                            <a href="#"><?php echo $f['first_name']." ".$f['last_name'];?></a>
                        </div>
                        <div class="desc">@<?php echo $f['username'];?></div>
                        <div class="desc"><?php echo $f['country'];?></div>
                        <div class="desc"><?php echo $f['state'];?>, <?php echo $f['city'];?></div> 
                       

                        <div class="desc"><strong>Account Status : <?php if($f['user_status']==1) { echo "Inactive";} else { echo "Active";}?></strong></div>

                      
                   
                  </section> 


                 
<br/>

                 



                 
                </div>
                
              </div>

            
            </div> <!-- / col-md-6 -->
            <div class="col-md-6">

            <div class="col-md-12 no-right-padding">
                  <section class="panel widget-carousel panel-primary" style="height:325px;">
                    <header class="panel-heading">
                      <h4 class="panel-title">Official Announcement</h4>
                    </header>
                    <div class="panel-body">

                      <div class="carousel slide" data-ride="carousel" id="quote-carousel-2">
                        <!-- Bottom Carousel Indicators -->
                       
                        
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                        
                         <?php 
                          $dir11=0;
                          $direct11=mysqli_query($GLOBALS["___mysqli_ston"], "select * from promo where status='1' order by n_id desc limit 3");
                          while($direct_member11=mysqli_fetch_array($direct11)) 
                          { 
                           ?>
                          <!-- Quote 1 -->
                          <div class="item active">
                            <blockquote>
                              <div class="row">
                                <div class="col-sm-12 animateme scrollme" data-when="enter" data-from="0.2" data-to="<?php echo $dir11;?>" data-crop="false" data-opacity="0" data-scale="0.5" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
                                 <a href="announcemnet-detail.php?id=<?php echo $direct_member11['n_id'];?>"> <p><?php echo $direct_member11['news_name'];?>
                                 <br/><?php echo $direct_member11['description'];?>

                                 </p>
                                </div>
                              </div>
                            </blockquote>
                          </div>
                         <?php } ?>
                         
                        </div>
                      </div>         

                    </div>

                    
                  </section>


                </div>


                 
                  </section>


<br/>
            
       <br/>      


               
             

            </div> <!-- / col-md-6 -->

          </div> <!-- / row -->

          
         
<div class="row">
                  <div class="col-md-12">
                  
                    <table class="table table-bordered redtable">
                      <tr>
                        <td><strong>S.No</strong></td>                        
                        <td><strong>Qualification  (Matching Sales)</strong></td>
                        <td><strong>Monthly Royalty Income (INR)</strong></td>
                         <td><strong>Status</strong></td>
                       
                      </tr>

                      
                        <tr>
                        <td>1</td>
                        <td>50 Lac</td>
                        <td>15,000</td>
                        <td><?php if($leftamt1>=5000000 && $rightamt1>=5000000) { ?> Qualified <?php } else { ?> Not Qualified <?php } ?></td>
                        </tr>

                         <tr>
                        <td>2</td>
                        <td>1 Cr.</td>
                        <td>25,000</td>
                        <td><?php if($leftamt1>=10000000 && $rightamt1>=10000000) { ?> Qualified <?php } else { ?> Not Qualified <?php } ?></td>
                        </tr>

                        <tr>
                        <td>3</td>
                        <td>2 Cr.</td>
                        <td>50,000</td>
                         <td><?php if($leftamt1>=20000000 && $rightamt1>=20000000) { ?> Qualified <?php } else { ?> Not Qualified <?php } ?></td>
                        </tr>

                        <tr>
                        <td>4</td>
                        <td>5 Cr.</td>
                        <td>1,00,000</td>
                        <td><?php if($leftamt1>=50000000 && $rightamt1>=50000000) { ?> Qualified <?php } else { ?> Not Qualified <?php } ?></td>
                        </tr>

                         <tr>
                        <td>5</td>
                        <td>10 Cr.</td>
                        <td>2,00,000</td>
                        <td><?php if($leftamt1>=100000000 && $rightamt1>=100000000) { ?> Qualified <?php } else { ?> Not Qualified <?php } ?></td>
                        </tr>

                       

                       
                    
                      
                    </table>

                </div>
                      </div>   
              



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