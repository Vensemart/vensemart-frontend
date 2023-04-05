<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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

        <div class="col-lg-12 center-block" style="float:none;">
                    
                </div>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title"> Product</h4>
                </header>
                 <form method="post" action="request-cart-update.php">
                <div class="panel-body">
 
                <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>MRP</th>
                        <th>DP</th>
                       <!--  <th>PV</th> -->
                       
                        <!-- <th>GST(%)</th> -->
                       <!--   <th>Product Type</th> -->
                  
                       
                        <th>Select Product</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                     
                        <?php
                            $i=1;
                            $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from   eshop_products");
                            while($data2=mysqli_fetch_array($data)) {
                      
                         
                        ?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $data2['product_name'];?></td>
                        <td><img height="53px" width="60px" src="../cmsadmin/product_images/<?php echo $data2['actual_image'];?>"></td>
                        
                        <td><?php echo $data2['price'];?></td>
                         <td><?php echo $data2['wholesale_price'];?></td>
                      <!--   <td><?php echo $data2['points'];?></td> -->
                       
                      <!--  <td><?php echo $data2['product_gst'];?></td> -->
                       <!--   <td><?php echo $data2['product_type'];?></td>  -->
                      
                        <td><input type="checkbox" name="product_id[]" value="<?php echo $data2['product_id'];?>" /></td>

                      </tr>

                      <?php 
                      $i++;} ?>
                     
                    </tbody>
                    <td colspan="8" class="text-right"><button type="submit" id="dataa" name='sub' class="btn btn-primary">Add To Cart</button></td>
                  </table>
                  
                <div style="text-align: right;">
                          <td colspan="4"></td>
              
                             <input type="hidden" name="return_url" value="<?php 
                                $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                                echo $current_url; ?>" />
                                   
                            <input type="hidden" name="product_qty" value="1" />
                            <input type="hidden" name="type" value="add" />   
                           </div>
                                  </form>
                          </div>
                </div>

              </section>
              
              
            

            </div> <!-- /col-md-6 -->





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
  

  
  </body>
</html>
