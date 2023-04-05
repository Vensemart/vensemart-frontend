<?php include("includes/header.php");


$querys1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalleftamount from manage_bv_history where income_id='$userid' and position='left' and description!='Next Pair Forwarded' and description!='Carry Forward BV' and description!='Royalty PV Distribution'"));
$leftamt=$querys1['totalleftamount'];

if ($leftamt>0) {
   $leftamt=$leftamt;
}else{
   $leftamt=0; 
}


$querys12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalrightamount from manage_bv_history where income_id='$userid' and position='right' and description!='Next Pair Forwarded' and description!='Carry Forward BV' and description!='Royalty PV Distribution'"));
$rightamt=$querys12['totalrightamount'];
if ($rightamt>0) {
   $rightamt=$rightamt;
}else{
   $rightamt=0; 
}
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Welcome to C@F International</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/core.css" rel="stylesheet" type="text/css" />
        <link href="css/components.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.css" rel="stylesheet" type="text/css" />
        <link href="css/pages.css" rel="stylesheet" type="text/css" />
        <link href="css/menu.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php  include("includes/topbar.php"); ?>

            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
           <?php  include("includes/sidebar.php"); ?>
            <!-- Left Sidebar End -->
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                         <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Rewards</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Policy Section</a>
                                        </li>
                                        <li class="active">
                                           My Rewards
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
              
  <div class="col-md-12">
    <section class="panel widget-carousel panel-primary">
      <header class="panel-heading">
        <h3 style="color:#fff;margin:0;padding:0; text-align: center;">RANK ADVANCEMENT BONUS</h3>
      </header>  
      <table class="table table-bordered table-striped" style="background-color: #fff;">
        <tr>
        
          <th style="background:#192242;color:#fff;">S_No.</th>
          <th style="background:#192242;color:#fff;">Rank</th>
           <th style="background:#192242;color:#fff;">Rewards</th>
       
          <th style="background:#192242;color:#fff;">Weak Leg PV</th>
       
          <th style="background:#192242;color:#fff;">Status</th>
        </tr>
        
      

    
      <tr>
                      <td>1</td>
                      <td>Crown Associate</td>
                      <!--<td>L-5000 : R-5000</td>-->
                      <td>You will get ( $100 Cash and $300 worth of product)</td>
                      
                     <!--<td>5000pv</td>-->
                     <td>5000pv on lesser leg</td>
                     
                         <td><?php 
                         
                    $total_referralasasas1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where ref_id='$userid' and user_plan>=5"));     
                                  
   
                         if($leftamt>=5000 && $rightamt>=10000 ) {
                             $aa='Crown Associate';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='1' and user_id='".$f['user_id']."'"));
                              // echo "total row".$query1;
                               if($query1==0 && $total_referralasasas1>=4 && $f['user_plan']>=5)
                               {
                                $aa='Crown Associate';
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','$200','$aa','1')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>
            <tr>
                      <td>2</td>
                      <td>Crown Master</td>
                      <td>You will get a total of $200 Cash and a Product worth $400</td>
                      <!--<td>10,000pv</td>-->
                      <td>10000pv on less leg, <br>which is 5000pv + 10000pv= 15000pv.</td>
                     
                     
                         <td><?php if($leftamt>=10000 && $rightamt>=30000) {
                             $aa='Crown Master';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='2' and user_id='".$f['user_id']."'"));
                              // echo "total row".$query1;
                               if($query1==0  && $total_referralasasas>=4 && $f['user_plan']>=6)
                               {
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','0','$aa','2')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>
       
             
     
             <tr>
                      <td>4</td>
                      <td>Crown Diamond Master</td>
                      <td>You will get a week Intl Trip Worth $2000, a product worth $500 and a cash worth $500).</td>
                      <td>60,000pv</td>
                     
                     
                         <td><?php if($leftamt>=10000 && $rightamt>=60000) {
                             $aa='Ruby';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='4' and user_id='".$f['user_id']."'"));
                              // echo "total row".$query1;
                               if($query1==0  && $total_referralasasas>=4 && $f['user_plan']>=6)
                               {
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','0','$aa','4')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>

         <tr>
                      <td>5</td>
                      <td>Crown Minister</td>
                      <td>You will get a Car Award worth $7000 and cash worth $500 and $500 shopping voucher.</td>
                      <td>150,000pv</td>
                     
                     
                         <td><?php if($leftamt>=200000 && $rightamt>=150000) {
                             $aa='Emerald';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='5' and user_id='".$f['user_id']."'"));
                              // echo "total row".$query1;
                               if($query1==0 && $f['user_plan']>=6 && $total_referralasasas>=4)
                               {
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','0','$aa','5')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>



          <tr>
                      <td>6</td>
                      <td>Crown Ambassador</td>
                      <td>You will get a SUV Worth $20,000 and $1000 cash and $500 shopping voucher.</td>
                      <td>250,000pv</td>
                     
                     
                         <td><?php if($leftamt>=250000 && $rightamt>=350000) {
                             $aa='Black Diamond';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='6' and user_id='".$f['user_id']."'"));
                              // echo "total row".$query1;
                               if($query1==0 && $f['user_plan']>=6 && $total_referralasasas>=4)
                               {
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','0','$aa','6')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>


    <tr>
                      <td>7</td>
                      <td>Crown Director</td>
                      <td>You will get the 2nd Intl Trip worth $5000, 4bedroom bungalow fund worth $30,000</td>
                      <td>500,000pv</td>
                     
                     
                         <td><?php if($leftamt>=500000 && $rightamt>=1000000) {
                             $aa='Black Diamond';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='6' and user_id='".$f['user_id']."' "));
                              // echo "total row".$query1;
                               if($query1==0 && $f['user_plan']>=6 && $total_referralasasas>=4)
                               {
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','0','$aa','6')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>


    <tr>
                      <td>8</td>
                      <td>Crown Trustee</td>
                      <td>You will get a Mega Duplex Housing Fund Worth $50,000 and a Cash Bonus worth $10,000.</td>
                      <td>900,000PV</td>
                     
                     
                         <td><?php if($leftamt>=2000000 && $rightamt>=9000000) {
                             $aa='Black Diamond';
                               $query1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select reward from rank_achiever where reward_id='6' and user_id='".$f['user_id']."' "));
                              // echo "total row".$query1;
                               if($query1==0 && $f['user_plan']>=6 && $total_referralasasas>=4)
                               {
                                mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO rank_achiever (`user_id`,`qualify_date`,`status`,`reward`,`reward_id`) VALUES ('".$f['user_id']."','$date','0','$aa','6')");
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='$aa' where user_id='$userid'");
                                         }
                            ?>
                                 <img src="../crown2wealthadmin/images/qualified.png" width="50px;">
                                          <?php 
                                          } else { ?> <img src="../crown2wealthadmin/images/notqwalify.png" width="50px;"> <?php } ?></td>
          </tr>
      


      </table>
    </section>
  </div>
</div>
                              <!-- Bootstrap Modals -->
                  
                       
                        <!-- end row -->

                    </div> <!-- container -->

            <!-- content -->

              <?php  include("includes/footer.php"); ?>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/jquery.slimscroll.js"></script>

        <!-- Counter js  -->
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>

        <!-- Sparkline charts -->
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/jquery.profile.js"></script>

        <!-- App js -->
        <script src="js/jquery.core.js"></script>
        <script src="js/jquery.app.js"></script>

    </body>
</html>