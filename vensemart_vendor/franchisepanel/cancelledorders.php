<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
$storeId=$_SESSION['puc_user_id'];
// print_r($storeId);die;
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
                  <h4 class="panel-title">Cancelled Orders List</h4>
                </header>
                <div class="panel-body">
                <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Order Id</th>
                       
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>User Name</th>
                        <th>Driver Name</th>
                        <th>Driver Mobile Number</th>
                        <th>Amount</th>
                        
                        <th>Status</th>
                        <th>Quantity</th>
                         <th>Payment Mode</th>
                        <th>Order Date</th>
                        
                        <!--<th>Action</th>-->
                       <!--<th>PV</th> -->
                       <!--<th>GST(%)</th> -->
                       <!--<th>Product Type</th> -->
                        <!--<th>Add Product</th>-->
                        <!--<th>Remove Product</th>-->
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          
                        $sata=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  stores where franchise_id='$storeId'");
                        $storedata=mysqli_fetch_array($sata);
                        $store_id=$storedata['id'];
                            $i=1;
                            $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  orders  where orders.shop_id='$store_id' and orders.status=5 ORDER BY id DESC");
                            while($data2=mysqli_fetch_array($data)) {
                    //   $statement = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_id = '".$data2['product_id']."' and shop_id=  '".$f['user_id']."' "));
                        $eshopOderId=$data2['order_id'];
                        $eshop_data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  eshop_purchase_detail where order_id='$eshopOderId'");
                        $eshopfull_data=mysqli_fetch_array($eshop_data);
                        ?>

                      <tr>
                        <td><?php echo $i;?></td>
                        
                        <td><?php echo $data2['order_id'];?></td>
                            
                        
                        
                        <td><?php echo $eshopfull_data['product_name'];?></td>
                        
                        <?php
                            $productId=$eshopfull_data['product_id'];
                            $productata=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  products where id='$productId'");
                        $product_data=mysqli_fetch_array($productata);
                        // $product_image=$product_data['product_image'];
                            if(!empty($product_data))
                            {
                                ?>
                                <td>
                                <img height="53px" width="60px" src="../../Vensemart/storage/app/product_images/<?php echo $product_data['product_image'];?>">
                                </td>
                                <?php
                            }
                            ?>
                        
                        <?php
                            $userId=$data2['user_id'];
                            $userata=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  users where id='$userId'");
                        $user_data=mysqli_fetch_array($userata);
                        // $product_image=$product_data['product_image'];
                            if(!empty($user_data))
                            {
                                ?>
                                <td>
                                <?php echo $user_data['name'];?>
                                </td>
                                <?php
                            }
                            ?>
                            
                             <?php
                            $driverId=$data2['driver_id'];
                            $driverata=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  users where id='$driverId'");
                        $driver_data=mysqli_fetch_array($driverata);
                        // $product_image=$product_data['product_image'];
                            if(!empty($driver_data))
                            {
                                ?>
                                <td>
                                <?php echo $driver_data['name'];?>
                                </td>
                                <?php
                            }
                            ?>
                            
                            <?php
                            $driverId=$data2['driver_id'];
                            $driverata=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  users where id='$driverId'");
                        $driver_data=mysqli_fetch_array($driverata);
                        // $product_image=$product_data['product_image'];
                            if(!empty($driver_data))
                            {
                                ?>
                                <td>
                                <?php echo $driver_data['mobile'];?>
                                </td>
                                <?php
                            }
                            ?>
                            
                        
                        <!--<td></td>-->
                        <td><?php echo $data2['net_amount'];?></td>
                         <td>Cancelled</td>
                         
                         
                         <td> 
                               <?php echo $data2['total_item'];?>
                         </td>
                         
                         <?php
                          if($data2['payment_type']=="1")
                          {
                              ?>
                              <td>Online</td>
                              <?php
                          }
                         ?>
                         
                         <?php
                          if($data2['payment_type']=="2")
                          {
                              ?>
                              <td>Cash on Delivery</td>
                              <?php
                          }
                         ?>
                         
                         <td><?php echo date('d-M-Y',strtotime($eshopfull_data['purchase_date']));?></td>
                      
                      </tr>
                      <?php 
                      $i++;} ?>
                    </tbody>
                    
                    <!--<td colspan="8" class="text-right">-->
                    <!--    <button type="submit" id="dataa" name='sub' class="btn btn-primary">Add</button>-->
                    <!--    <button type="submit" id="dataa" name='deletesub' class="btn btn-danger">Delete</button>-->
                    <!--    </td>-->
                  </table>
                  
                <div style="text-align: right;">
                          <td colspan="4"></td>
                             
                           </div>
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
