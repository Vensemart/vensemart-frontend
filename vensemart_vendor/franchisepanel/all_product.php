<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <?php include("title.php");?>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                 
                  <p>  product list</p>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Product Image</th>
                        
                        <th>Product Name</th>
                          <th>Product Price</th>
                        <!--<th>DP</th>-->
                        <!--<th>PV</th>-->
                        <!--<th>Quantity</th>-->
                
                         <th>Description</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                    //  $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_product where puc='".$f['user_id']."'");
                      $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from eshop_products where shop_id='".$f['user_id']."'");
                       $arr_product=array();
                      while($data1=mysqli_fetch_array($data))
                      {
                        $data2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_products_main` where product_id='".$data1['product_id']."'"));
                         //$pricee=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_product_varients` where product_id='".$data1['product_id']."'"));
$arr_product[$data2['product_id']]=$data2['description'];
                     ?>

                      <tr <?php if($data1['qty']<=0){ ?>style="background-color: #ffb6b6;" <?php } ?>>
                        <th scope="row"><?php echo $i;?></th>
                        <td>
                            <img src="../cmsadmin/product_images/<?php echo $data2['actual_image'];?>" height="80" style="border:2px solid #000;">
                        </td>
                          <td> <?php echo $data2['product_name'];?></td>
                           <td> <?php echo $data2['price'];?></td>
                          <!--<td> <?php echo $data2['wholesale_price'];?></td>-->
                          <!--<td> <?php echo $data2['points'];?></td>-->
                          <!--<td> <?php echo $data1['qty'];?></td>-->
                       
                            <td><button type="button" class="btn btn-info pro" id="<?php echo $data2['product_id'];?>" data-target="#myModal">view Description</button> </td>
                      </tr>

                      <?php $i++;} 
                    // print_r($arr_product);?>
                    </tbody>
                  </table>


                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Description</h4>
        </div>
        <div class="modal-body">
          <p id ="desc"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

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
  
  <script>
      
      var dataAr=<?php echo json_encode($arr_product); ?>;
      //console.log(dataAr);
      $(".pro").click(function()
      {
          $('#myModal').modal('show')
          var id=$(this).attr('id');
          //console.log(id);
          //var dataAr=JSON.parse(dataAr);
          //console.log(dataAr[]);
          $("#desc").html(dataAr[id]);
      });
      
      
  </script>
  </body>
</html>