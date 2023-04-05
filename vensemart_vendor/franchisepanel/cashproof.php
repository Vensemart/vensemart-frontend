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
            <!--<h1>My Package Invoice</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4" style="float:right;">

           <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Invoice</a></li>-->
              <!--<li><a href="#">My Package Invoice</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->
 <?php
             $qry="";
             if (isset($_POST['submits']))
             {
                 $d1=$_POST['from'];
                 $d2=$_POST['to'];

                 $from=date('Y-m-d',strtotime($d1));
                 $to=date('Y-m-d',strtotime($d2));

                 if (!empty($from && $to))
                 {
                   
                     $qry="AND payment_date BETWEEN '".$from."' AND '".$to."'";

                 }
             }
   
        ?>
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Purchase Invoices</h4>
                  <h6><?= @$_GET['msg']?></h6>
                </header><br>
                <div class="row">

            <div class="col-md-12">
              <form name="tree" id="search_form" method="post" action="#" >

               <div class="col-sm-3">
                  <input name="from" value=""  placeholder="Start Date" id="bdate" type="text" class="form-control">
               </div>
               <div class="col-sm-3">
                  <input  placeholder="End Date" name="to" value="" id="bdate1" type="text" class="form-control">
               </div>

               <div class="col-sm-2">
                  <input type="submit" name="submits" value="Submit" class="btn btn-success">           
               </div>
              
              </form>
            </div>
          </div><br>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>User id</th>
                         <th>Username</th>
                        <th>Invoice No</th>
                        <th>Total Amount</th>
                        
                        <th>Payment Type</th>
                        <th>Date</th>
                        <th>View</th>
                      
                         <th>Status</th>
                         <th>Action</th>                   
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $date_check=$_GET['id'];
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  amount_detail_temp where puc='$userid' $qry and status='0' order by am_id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td scope="row"><?php echo $data1['user_id'];?></td>
                           <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where  user_id='".$data1['user_id']."'"));?>
                          <td><?php echo $user['username'];?></td>
                          <td><a href="shopping-invoice-detail-pending.php?inv=<?php echo $data1['invoice_no'];?>"><?php echo $data1['invoice_no'];?></a></td>
                          <td><?php echo $data1['total_amount'];?></td>
                          <td><?php echo $data1['payment_mode'];?></td>
                          <td><?php echo $data1['payment_date'];?></td>
                          <td><a href="shopping-invoice-detail-pending.php?inv=<?php echo $data1['invoice_no'];?>" style="color: green;">View Invoice</a></td>
                          <td><a class="btn btn-primary" href="gencashinvoice.php?inv=<?php echo $data1['invoice_no'];?>">Approve</a></td>
                        <td><a class="btn btn-primary alert-danger" href="cancel_cashinvoice.php?inv=<?php echo $data1['invoice_no'];?>">Cancel</a></td>
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
   <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({

            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>
  </body>
</html>