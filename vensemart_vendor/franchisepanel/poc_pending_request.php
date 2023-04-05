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

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>Referral Member</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Team Report</a></li>
              <li><a href="#">Direct Refferal Member</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Pending Request</h4>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                 
                                <th style="text-align:center;">
                                    Userid / Username
                                </th>
                               
                                <th style="text-align:center;">
                                    Amount
                                </th>                                
                                <th style="text-align:center;">
                                    Transaction Number
                                </th>
                                <th style="text-align:center;">
                                    Payment Mode
                                </th>
                              
                                
                                <th style="text-align:center;">
                                   Payment Proof
                                </th>
                                 <th style="text-align:center;">
                                  Date
                                </th>
                                <th style="text-align:center;">
                                  Action
                                </th>
                                
                               
                            </tr>
                    </thead>
                     <tbody>
                            <?php 
                                  $i=1;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where status='Pending'");
                                  while($data1=mysqli_fetch_array($data))
                                    { ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                               
                                <td>
                                    <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1['user']."'")); echo $user['user_id'];?> / <?php echo $user['username'];?>
                                </td>
                                
                                
                                <td>
                                    <?php echo $data1['amount'];?>
                                </td>
                                <td>
                                    <?php echo $data1['tranno'];?>
                                </td>
                                <td>
                                    <?php echo $data1['payment_mode'];?>
                                </td>
                              
                               
                                <td><?php if ($data1['paymentproof']!='') {
                                 ?>
                                    <a href="../userpanel/paymentproof/<?php echo $data1['paymentproof'];?>" target="_blank">View</a>
                                   <?php
                                } ?>
                                </td>
                                 <td>
                                    <?php echo $data1['posteddate'];?>
                                </td>
                                <td>
                                <select onchange="window.location.href = this.value" name="selectstatus" style="background-color: #3474AB: ">
                                  <option value="">Pending</option>
        
         <option value="approve-status.php?user=<?php echo $data1['user_id'];?>&status=1&id=<?php echo $data1['id']; ?>" <?php if($data1['status']=='1'){ echo "selected";}?>>Approve</option>
         
   
  </select>   
             </td>                   
                               
                               
                            </tr>
                            <?php $i++;} ?>
                            
                      
                            </tbody>
                  </table>


                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->


        <!-- <div class="col-md-12 text-center">

 <a href="bh_export_direct_sponser_report.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div>-->



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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  </body>
</html>