<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


if(isset($_POST['wallet_pay'])  && $_POST['invoice_no']!='')
{


$results1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM amount_detail WHERE invoice_no='".$_POST['invoice_no']."' and puc='".$f['user_id']."'"));

  if($results1['invoice_no']!='') {
      
     
    $_SESSION['invoice_no']=$results1['invoice_no'];
     header('Location:damage-puc-shopping-invoice-detail.php');
       exit;
  }else{
      header('Location:damage_product.php?msg=Invoice not Available');
       exit;
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

          <div class="col-md-8">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Team Report</a></li>
              <li><a href="#">Total Downline Member Report</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

      
<center><h4><?php echo $_GET['msg'] ?></h4></center>
    



   <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="final_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Enter Invoice No</strong></h3>
                </header>
                
                <div class="panel-body">
                 
              <div class="form-group">
                 
            
                      <div class="form-group">
                        <label for="exampleInputAddress">Enter Invoice No </label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="invoice_no" class="form-control" id="puc"  value="" required="">
                              
                                
                        </div>
                        <span id="checkotp"></span> 
                    </div> 
                  
                    
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="wallet_pay"  value="Submit" class="btn btn-success" id="submit">             
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

              </section>
              
              
            

            </div> <!-- /col-md-6 -->
  

          </div>

      
        </div> <!-- / container-fluid -->


           


     <?php //include("footer.php");?>


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
    
   
          $(document).ready(function() {
    $("#puc").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var user_id=$("#puc").val();
    if(user_id.length < 1){$("#checkotp").html('');return;}
    if(user_id.length >= 1){
    $("#checkotp").html('<img src="images/preloader.gif" />');
    $.post('regis12233.php', {'user_id':user_id}, function(data) {
    $("#checkotp").html(data);
    });
    }
    }); 
    });
          /* $("#puc").on('change', function() {
           var user_id=$("#puc").val();
           alert(user_id);
            $.post('regis122.php',{user_id:user_id}, success: function(result){
           $("#checkotp").html(result);
         }
      });*/
        </script>
  </body>
</html>
