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
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>
          <div class="col-md-4">
          </div>
        </section> <!-- / PAGE TITLE -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Payout Report</h4>
                </header>
                <div class="panel-body">
                  <table class="table datatable">
                   <thead>
                            <tr style="text-align:center;">
                                 <th style="text-align:center;">
                                    S.No
                                </th>
                                 <th style="text-align:center;">
                                     Closing Date
                                </th style="text-align:center;">
                                <th style="text-align:center;">
                                    Userid
                                </th>
                                 <th style="text-align:center;">
                                    Full Name
                                </th>
                              <!--  <th style="text-align:center;">
                                    Member Name
                                </th>-->
                                 <th style="text-align:center;">
                               Sales Bonus
                                </th>
                                <th style="text-align:center;">
                                     Total 
                                </th>  
                              <!--    <th style="text-align:center;">
                                     Payout Start Date 
                                </th> 
                                 <th style="text-align:center;">
                                     Payout End Date 
                                </th>  -->
                                <th style="text-align:center;">
                                     Bank Reference No.
                                </th> 
                                <th style="text-align:center;">
                                     Paid Payout
                                </th> 
                                <!--<th style="text-align:center;">
                                     Transfer Date
                                </th>-->
                                <!--  <th style="text-align:center;">
                                     Manage
                                </th>  -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                  $i=1;
                             
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from puc_closing_credit_debit where user_id='$userid'  $query123");
                                  while($data1=mysqli_fetch_array($data)){ ?>
                            <tr style="text-align:center;">
                                <td><?php echo $i;?></td>
                                <td><?php echo $data1['receive_date'];?></td> 
                                <td><?php echo $f['user_id'];?></td>
                                <td><?php echo $f['first_name']."".$f['last_name'];?></td>
                                <td><?php echo $data1['binary_income'];?></td>
                                <td><?php echo $data1['credit_amt'];?></td>
                                <td><?php echo $data1['bank_ref'];?></td>
                       <!--<td><?php //echo $data1['trans_date'];?></td>-->
                        <!--<td> <?php //if($data1['bank_ref']=='' || $data1['bank_ref']=='NA'){?><a href="#" data-toggle="modal" data-target="#pro<?php //echo $data1['id'];?>">#  </a><?php //}else{ echo 'paid'; } ?></td> -->

                                <td> 
                                <?php if($data1['bank_ref']=='' || $data1['bank_ref']=='NA'){?>
                                <a href="#" data-toggle="modal" data-target="#pro<?php echo $data1['id'];?>"><?php echo 'Unpaid'; ?> </a>
                                <?php }else{ ?>
                                <a href="#" data-toggle="modal" data-target="#pro<?php echo $data1['id'];?>"><?php echo 'Paid'; }?> </a>
                                </td> 
                            </tr>
                            <?php $i++;}  ?>
                            </tbody>
                  </table>
                </div>
              </section>
            </div> <!-- /col-md-6 -->
          </div>
        </div> 
     <?php include("footer.php");?>
    </main> <!-- /playground -->
    
     <?php include("rightside-panel.php");?>

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