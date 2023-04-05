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
             <div class="row" style="margin-top:30px;">
                 <div class="col-md-8"></div>
                  <div class="col-md-4" style="text-align:right;"><a href="javascript:window.history.go(-1)" class="btn btn-success">Back</a></div>
             </div>
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                 
                <p>Requested Product Details</p>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                       <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    Product Name
                                </th>
                                 <th style="text-align:center;">
                                    Product Image
                                </th>

                                <th style="text-align:center;">
                                    Product Price
                                </th>
                                <th style="text-align:center;">
                                    Qty
                                </th>
                                <th style="text-align:center;">
                                     Product Type
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from request_purchase_detail where invoice_no='".$_GET['invoice_no']."'");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                       // echo "select * from eshop_products where product_id='".$data1['p_id']."'";
                                        $data3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from eshop_products where product_id='".$data1['p_id']."'"));
                                 // echo "image".$data3['actual_image'];
                                    ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo strtoupper($data1['product_name']);?>
                                </td>
                                 <td>
                                    <img src="../cmsadmin/product_images/<?php echo $data3['actual_image'];?>" height="80" style="border:2px solid #000;">
                                   
                                </td>
                                <td>
                                    <?php echo $data1['price'];?>
                                </td>
                                <td>
                                    <?php echo $data1['quantity'];?>
                                </td>
                                <td>
                                    <?php echo $data3['product_type'];?>
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