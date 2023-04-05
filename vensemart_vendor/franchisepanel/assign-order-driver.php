<?php
 include("header.php");
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 


$invoice_no=$_GET['inv'];

if(isset($_POST['submit']))
{
    
    
$driver_id=$_POST['driver_id'];

 mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set driver_id='$driver_id' where invoice_no='$invoice_no'");
header("location:puc-placed-order-report.php?msg=Driver Assigned for the order!");


}


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

          <div class="col-md-8">
            <h1>Manual Order Assign</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6">

              <section class="panel">
                <header class="panel-heading">
                  <h3 class="panel-title">Order Information</h3>
                </header>
                <?php
                      $data=mysqli_query($GLOBALS["___mysqli_ston"],  "select * from  amount_detail where invoice_no ='$invoice_no' ");
                      $data1=mysqli_fetch_array($data);
                      ?>
            <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],  "SELECT * FROM `user_registration` where  user_id='".$data1['user_id']."'"));?>

                      
                <div class="panel-body">
                  <form name="input" method="post" name="user">
                    <div class="form-group">
                      <label for="exampleInputName">Full Name:</label>
                      <input type="text" name="first_name1" class="form-control" id="exampleInputName" value="<?php echo $user['first_name'];?> <?php echo $user['last_name'];?>" readonly>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Invoice No:</label>
                      <!--<div class="input-group">-->
                        <!--<span class="input-group-addon"><i class="ti-email"></i></span>-->
                        <input type="text" name="first_name3" class="form-control" id="exampleInputEmail1" value="<?php echo $invoice_no;?>" readonly>
                      <!--</div>-->
                    </div>

                    <div class="form-group no-left-padding">
                      <label for="exampleInputPassword1">Total Amount:</label>
                      <input type="text" name="first_name4" class="form-control" id="exampleInputPassword1" value="<?php echo $data1['total_amount'];?>" readonly>
                    </div>
                    <div class="form-group  no-left-padding">
                      <label for="exampleInputPassword1">Select Driver:</label>
                   <select name="driver_id" class="form-control" required >
                       <option value=""> Select Driver id</option>
                       <?php
                      $dataw=mysqli_query($GLOBALS["___mysqli_ston"],  "select user_id,first_name,last_name,username from  user_registration where type ='2' ");
                     while($data1ww=mysqli_fetch_array($dataw)){
                      ?>
                      <option value="<?php echo $data1ww['user_id'];?>"> <?php echo $data1ww['first_name'];?>  <?php echo $data1ww['last_name'];?>  (<?php echo $data1ww['user_id'];?>)  </option>
                      
                      <?php }?>
                   </select>
                   
                    </div>
                    
                    
                    
                    <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>
                  </form>
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



  </body>
</html>