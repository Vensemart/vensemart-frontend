<?php include("header.php");
if(isset($_POST['submit']))
{
  $date=$_POST['date'];
  $amount=$_POST['amount'];
  $desc=$_POST['desc'];
  

  $inser=mysqli_query($GLOBALS["___mysqli_ston"], "insert into puc_expense_report  values('','$userid','$amount','$desc','$date')");
  if($inser)
  {
     echo "<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Added  Successfully ')
                                window.location.href='all_expense_report.php';
                                      </SCRIPT>";

  }

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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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

          <div class="col-md-8" style="float:none;color:#900;text-align: center;font-size: 16px;">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            <?php echo @$_GET['msg'];?>
          </div>

          <!--<div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Team Report</a></li>
              <li><a href="#">Total Downline Member Report</a></li>
             
            </ol>

          </div>-->
        </section> <!-- / PAGE TITLE -->

        <div class="col-lg-12 center-block" >
                    
                </div>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Expense Report</h4>
                </header>
                <div class="panel-body">
    <form  method="post" class="form_container left_label">

								<div class="form_grid_12">
									<label class="field_title">Date</label>
									<div class="form_input">
										  <input name="date" type="date" tabindex="1" style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" />
									</div>
								</div>
								<div class="form_grid_12">
									<label class="field_title">Amonut</label>
									<div class="form_input">
										<input name="amount" type="text" tabindex="1" style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" />
									</div>
								</div>
								<div class="form_grid_12">
									<label class="field_title">Description </label>
									<div class="form_input">
										<textarea name="desc" style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" cols="50" rows="5" tabindex="5" ></textarea>
									</div>
								</div>
								<div class="form_grid_12">
									<div class="form_input">
										<button type="submit" name="submit" class="btn btn-primary">Submit</button>
										<!--<a href="support.php"><button type="button" class="btn btn-primary">Back</button></a>-->
									</div>
								</div>
						</form>
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