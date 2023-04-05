<?php include("header.php");?>
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
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Fund Request History</h1>
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Ewallet</a></li>-->
              <li><a href="#">Fund Request Report</a></li>
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Fund Request Report</h4>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User Id</th>
                        <th>Transaction No</th>
                        <th>Amount</th>
                        <th>Account Holder Name</th>
                       
                        <th>Bank Name</th>
                        <th>Payment Type</th>
                        <th>Transaction Number</th>
                        <th>Date</th>
                        <th>Payment Proof</th>
                        <th>Status</th>
                        <th>Admin Approve Date</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from franchise_paymentproof where user_id='$userid'");
                 
                      while($data1=mysqli_fetch_array($data))
                      {
 $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='".$data1['sender_id']."'"));
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['user_id'];?></td>
                       
                        <td><?php echo $data1['transaction_number'];?></td>
                        <td><?php echo $data1['amount'];?></td>
                          <td><?php echo $data1['acc_name'];?></td>
                          <td><?php echo $data1['bank_name'];?></td>
                         
                          <td><?php echo $data1['ac_no'];?></td>
                          <td><?php echo $data1['transaction_nu'];?></td>
                          <td><?php echo $data1['datee'];?></td>
                        <td><a href="paymentproof/<?php echo $data1['bank_recipt_proof'];?>" target="_blank">View</a></td>
                        <?php 
                        if($data1['status']=='0'){
                            $status = "Pending";
                        }
                        if($data1['status']=='1'){
                            $status = "Approve";
                        }
                        if($data1['status']=='2'){
                            $status = "Cancel";
                        }
                        ?>
                         <td><?php echo $status;?></td>
                          <td><?php echo $data1['admin_date'];?></td>
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>


                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  </body>
</html>