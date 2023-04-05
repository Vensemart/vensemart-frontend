<?php include("header.php");

if($_POST[submit])
{
//$incomeid=$_REQUEST['incomeid'];
$frm=$_REQUEST['from_date'];
//$end_date=$_REQUEST['end_date'];

  if($frm!='')
  {
    
  $query123=" AND payment_date='$frm'";  
    //echo $query123; die();
  }
}  
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

           <!-- <h1>Fund Request History</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            <br/><br/>
            <div class="col-md-12">
                        <form class="form-inline" role="form" method="post" autocomplete="off">
                              
                                 <!--<div class="form-group" id="date">
                                  <label for="date" class="col-lg-2 col-sm-2 control-label">From Date</label>
                                    <div class="col-lg-2">
                                        <input type="text" name="start_date" class="form-control" id="datepicker" placeholder="YYYY-MM-DD" value="<?php echo $frm;?>" required>
                                    </div> 
                                </div>-->
                                
                                <div class="form-group" id="date">
                                  <label for="date" class="col-lg-4 col-sm-6 control-label">Select Date</label>
                                    <div class="col-lg-2">
                                        <input type="date" name="from_date" class="form-control" id="datepicker1" placeholder="YYYY-MM-DD" value="<?php echo $end_date;?>" required>
                                    </div> 
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                    </div>
        </section> <!-- / PAGE TITLE -->
<br/><br/>
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-10">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Search Per Day Cash Sale</h4>
                </header>
                <div class="panel-body">

                  <!--<table class="table datatable">-->
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Total Sale DP</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php        
                     if($_POST[submit])
                   {

                        $totalsale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(net_amount) as total5 FROM `amount_detail` WHERE puc='$userid' and payment_mode='Cash On Franchise'  $query123"));
            
                                          
                     ?>

                      <tr>
                            <td><?php echo $frm;?></td>
                            <td>INR <?php if($totalsale['total5']=='' || $totalsale['total5']==0) { echo '0.00'; } else  { echo number_format($totalsale['total5'],2); } ?></td>
                      
                      </tr>

                      <?php } ?>
                     
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