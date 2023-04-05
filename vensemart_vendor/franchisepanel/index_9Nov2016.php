<?php include("header.php");?>
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
  <div class='popup'>
<div class='cnt223'>
<img src='exit.png' alt='quit' class='x' id='x' /> 
<div style="height:500px; overflow-y:scroll; width:100%; padding:10px;"> 
<p>
  
 
  <a href="index.php" class="btn btn-primary">Go To Dashboard</a>
   <?php
      $args_product = mysqli_query($GLOBALS["___mysqli_ston"], "select * from promo");
      while($args_product1=mysqli_fetch_array($args_product))
      {
          echo "<h3>".$args_product1['news_name']."</h3>";print_r("<br/>");
        echo $args_product1['description'];print_r("<br/>");print_r("<br/>");
               
      }
       ?>
</div></p></div></div>
<br/>
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
<?php

if($f['user_rank_name']=='Normal User')
{
$ers=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' order by id asc limit 1"));
$ers123=$ers['date'];
}
else
{
   $quer=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from rank_achiever where user_id='$userid' and move_rank='Manager'"));
   $ers123=$quer['qualify_date'];
            
}

$ers1=date('Y-m-d', strtotime($ers123. ' + 29 days'));
$ers12=date('Y-m-d', strtotime($ers1. ' + 1 days'));

$ers1s=date('Y-m-d', strtotime($ers123. ' + 14 days'));
$ers12s=date('Y-m-d', strtotime($ers1s. ' + 1 days'));



$ers1sd=date('Y-m-d', strtotime($ers123. ' + 44 days'));
$ers12sd=date('Y-m-d', strtotime($ers1sd. ' + 1 days'));

$date = strtotime($ers12);
$remaining = $date - time();
$days_remaining1 = floor($remaining / 86400);
$hours_remaining = floor(($remaining % 86400) / 3600);
if($days_remaining1<0)
{
  $days_remaining=0;
}
else
{
  $days_remaining=$days_remaining1;
}
?>
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-4 col-sm-4">
            <h1>Dashboard</h1>
           
          </div>

          <div class="col-md-8 col-sm-8">

            <ol class="breadcrumb pull-right no-margin-bottom">
          
             <!--  <li class="active">
              <?php if($days_remaining!=0 && $f['user_rank_name']=='Normal User')
              { ?>
              <h3> Your rank bonus is valid until <span class="green"> <?php echo $ers12s;?> (15 Days)  and <?php echo $ers12;?> (30 Days)</span></h3> 

              <?php }
                 else if($days_remaining!=0 && $f['user_rank_name']=='Manager')

              { ?>
              <h3> Your rank bonus is valid until <span class="green"> <?php echo $ers12;?> (30 Days)  and <?php echo $ers12sd;?> (45 Days)</span></h3> 

              <?php }
               else { ?> <h3>Your rank bonus already expire</h3> <?php } ?>


              </li> -->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->
        
        
        <div class="container-fluid">
          <div class="row">
          
          
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
$total_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total1 from credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Leadership Income' OR ttype='Referral Bonus' OR ttype='Binary Income' OR ttype='Entertainment Bonus' OR ttype='Matching Income')"));

// Code for display last day income //
$yesterday_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Leadership Income' OR ttype='Referral Bonus' OR ttype='Binary Income' OR ttype='Entertainment Bonus' OR ttype='Matching Income') and receive_date between '$start_weeks1' and '$end_weeks1'"));

// Code for display this week income //
$week_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total3 from credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Leadership Income' OR ttype='Referral Bonus' OR ttype='Binary Income' OR ttype='Entertainment Bonus' OR ttype='Matching Income') and receive_date between '$start' and '$end'"));

// Code for display total sponsor income //
$sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total4 from credit_debit where user_id='$userid' and ttype='Referral Bonus'"));

// Code for display total Binary income //
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where user_id='$userid' and ttype='Binary Income'"));

// Code for display total Matching income //
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total6 from credit_debit where user_id='$userid' and ttype='Matching Income'"));

// Code for display total downline member //
$total_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid'"));

// Code for display total left downline member //
$total_left_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='left'"));

// Code for display total right downline member //
$total_right_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='right'"));

          ?>
          
          	<div class="row row-stat">
                            <div class="col-md-4">
                                <div class="panel panel-success-alt noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><i class="fa fa-dollar"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">My Total Bonus</h5>
                                            <h1 class="mt5 white">MYR <?php if($total_earning['total1']=='' || $total_earning['total1']==0) { echo '0.00'; } else  { echo number_format($total_earning['total1'],2); } ?></h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Last Week Bonus</h5>
                                                <h4 class="nomargin white">MYR <?php if($yesterday_earning['total2']=='' || $yesterday_earning['total2']==0) { echo '0.00'; }
                                                else  { echo number_format($yesterday_earning['total2'],2); } ?>

                                                </h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">This Week Bonus</h5>
                                                <h4 class="nomargin white">MYR 
<?php if($week_earning['total3']=='' || $week_earning['total3']==0) { echo '0.00'; } 
                                                else  { echo number_format($week_earning['total3'],2); } ?>
                                                </h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                            <div class="col-md-4">
                                <div class="panel panel-primary noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><i class="fa fa-users"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">Total Referral Bonus</h5>
                                            <h1 class="mt5 white">MYR 
<?php if($sponsor_earning['total4']=='' || $sponsor_earning['total4']==0) { echo '0.00'; } 
                                                else  { echo number_format($sponsor_earning['total4'],2); } ?>
                                           </h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Total Team Bonus</h5>
                                                <h4 class="nomargin white">MYR 

<?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo '0.00'; } 
                                                else  { echo number_format($binary_earning['total5'],2); } ?>
                                                </h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">Total Matching Bonus</h5>
                                                <h4 class="nomargin white">MYR <?php if($matching_earning['total6']=='' || $matching_earning['total6']==0) { echo '0.00'; }
                                                else  { echo number_format($matching_earning['total6'],2); } ?></h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                            <div class="col-md-4">
                                <div class="panel panel-dark noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            <a title="" data-placement="left" data-toggle="tooltip" class="panel-close tooltips" href="#" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><i class="fa fa-pencil"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin white">Total Team Member</h5>
                                            <h1 class="mt5 white"><?php echo $total_downline;?></h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin white">Total Left Member</h5>
                                                <h4 class="nomargin white"><?php echo $total_left_downline;?></h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin white">Total Right Member</h5>
                                                <h4 class="nomargin white"><?php echo $total_right_downline;?></h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                        </div>
                        
                        
                        
       
            <div class="col-md-6">
              <div class="alert alert-warning fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="ti-close"></i>
                  </button>
                  <strong>Dear <?php echo $f['username'];?>,</strong>
                  <p><?php $welcome=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from contactdetail where id='17'"));
                           echo $welcome['description'];
                  ?></p>
              </div>

             

              <div class="row">
                <div class="col-md-6 no-left-padding">
                  <section class="card hovercard">
                    <div class="cardheader"></div>
                    <div class="avatar">
                        <img alt="" src="<?php echo $userimage;?>">
                    </div>

                    <div class="info">
                        <div class="title">
                            <a href="#"><?php echo $f['first_name']." ".$f['last_name'];?></a>
                        </div>
                        <div class="desc">@<?php echo $f['username'];?></div>
                        <div class="desc"><?php echo $f['country'];?></div>
                        <!-- <div class="desc"><?php echo $f['state'];?>, <?php echo $f['city'];?></div> -->
                        <div class="desc">Rank: <?php echo $f['user_rank_name'];?></div>
                    </div>
                    <!--<div class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm" href="#"><i class="ti-twitter"></i></a>
                        <a class="btn btn-danger btn-sm" rel="publisher" href="#"><i class="ti-google"></i></a>
                        <a class="btn btn-primary btn-sm" rel="publisher" href="#"><i class="ti-facebook"></i></a>
                         </div>-->
                  </section>
                </div>
                <div class="col-md-6 no-right-padding">
                  <section class="panel widget-carousel panel-primary">
                    <header class="panel-heading">
                      <h4 class="panel-title">Official Announcement</h4>
                    </header>
                    <div class="panel-body">

                      <div class="carousel slide" data-ride="carousel" id="quote-carousel-2">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#quote-carousel-2" data-slide-to="0" class="active"></li>
                          <li data-target="#quote-carousel-2" data-slide-to="1" class=""></li>
                          <li data-target="#quote-carousel-2" data-slide-to="2"  class=""></li>
                        </ol>
                        
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
                                 <a href="announcemnet-detail.php?id=<?php echo $direct_member11['n_id'];?>"> <p><?php echo $direct_member11['news_name'];?></p>
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
              </div>

              <section class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title">Recent Transaction</h4>
                </header>
                  <div class="list-group">
                   <?php 
                          $dir1=1;
                          $direct1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$userid' order by id desc limit 10");
                          while($direct_member1=mysqli_fetch_array($direct1)) 
                          { 
                           ?>

                    <a href="#" class="list-group-item">

                        <div class="col-md-6">
                        <i class="ti-comments text-warning"></i> <?php echo $direct_member1['ttype'];?>
                        </div>

                        <div class="col-md-6 text-right">
                          <button class="btn btn-success"><?php echo $direct_member1['receive_date'];?></button>
                        </div>

                        <div class="clearfix"></div>
                    </a>
                          <?php  } ?>
                  </div>
                  <div class="panel-footer text-right">
                    <a href="ewallet-transaction-history.php" class="btn btn-primary">View All</a>
                  </div>
              </section>
            </div> <!-- / col-md-6 -->

            <div class="col-md-6">

              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 no-left-padding">
                  <a href="#" class="text-widget color-1">
                    <header>Total Points:
                    <br/><?php $total_direct_member=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from reward_e_wallet where user_id='$userid' ")); echo $total_direct_member['amount'];?></header>
                   
                  </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 no-right-padding">
                  <a href="#" class="text-widget color-2">
                    <header>E-Wallet:<br/>
                    MYR <?php $ewallet_Amount=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'")); echo number_format($ewallet_Amount['amount'],2);?></header>
           
                  </a>
                </div>
              </div>
              
              <section class="panel">
                <header class="panel-heading">
                  <h4 class="panel-title">This Month Bonus Summary</h4>
                </header>
                <div class="panel-body">
                  
                  	
                    <div class="bargraph">
                    <ul class="bars">

                    <?php 
                    if($sponsor_earning['total4']=='' || $sponsor_earning['total4']==0)
                    {
                      $sponsor_earning=0;
                    }
                    else
                    {
                      $sponsor_earning=$sponsor_earning['total4'];
                    }
                    if($binary_earning['total5']=='' || $binary_earning['total5']==0)
                    {
                      $binary_earning=0;
                    }
                    else
                    {
                      $binary_earning=$binary_earning['total5'];
                    }
                    if($matching_earning['total6']=='' || $matching_earning['total6']==0)
                    {
                      $matching_earning=0;
                    }
                    else
                    {
                      $matching_earning=$matching_earning['total6'];
                    }

                    if($total_earning['total1']=='' || $total_earning['total1']==0)
                    {
                      $total_earning=0;
                    }
                    else
                    {
                      $total_earning=$total_earning['total1'];
                    }


                     ?>
                        <li class="bar1 bluebar" style="height: <?php echo ceil($sponsor_earning/10);?>px;"></li>
                        <li class="bar2 bluebar" style="height: <?php echo ceil($binary_earning/10);?>px;"></li>
                        <li class="bar3 bluebar" style="height: <?php echo ceil($matching_earning/10);?>px;"></li>
                       <li class="bar4 bluebar" style="height: <?php echo ceil($total_earning/10);?>px;"></li>
                       
             
                      
                    </ul>
                
                	<ul class="y-axis"><li></li><li></li><li>Price</li><li></li><li></li></ul>
                	<p>1)Referral &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2)Team &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3)Matching&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4)Total Bonus</p>
                    
                </div>
                    
                  
                </div>
              </section>

              <section class="panel panel-danger">
                <header class="panel-heading">
                  <h3 class="panel-title">Last 10 Referral Member</h3>
                </header>


                  <table class="table table-hover table-condensed">
                    <tbody>

                    <?php 
                          $dir=1;
                          $direct=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' order by id desc limit 10");
                          while($direct_member=mysqli_fetch_array($direct)) 
                          { 
                           ?>
                      <tr>
                        <th scope="row"><?php echo $dir;?></th>
                        <td><?php echo $direct_member['username'];?></td>
                        <td><?php echo $direct_member['first_name']." ".$direct_member['last_name'];?></td>
                        <td><?php echo $direct_member['registration_date'];?></td>
                      </tr>
                     <?php $dir++; } ?>
                    </tbody>
                  </table>


                <div class="panel-footer text-right">
                  <a href="direct-sponsor-member-report.php" class="btn btn-primary">View All</a>
                </div>
              </section>

             

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



  <style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
.cnt223 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
}
.cnt223{
width: 60%;
margin: 0px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 10px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;
margin-top:75px;
}
.cnt223 p{
clear: both;
color: #555555;
text-align: justify;
}
.cnt223 p a{
color: #d91900;
font-weight: bold;
}
.cnt223 .x{
float: left;
height: 35px;
left: -22px;
position: relative;
top: -25px;
width: 34px;
}
.cnt223 .x:hover{
cursor: pointer;
}
</style>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
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