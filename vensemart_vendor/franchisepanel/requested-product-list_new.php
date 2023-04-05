<?php include("header.php");
/*if($_POST['submit'])
{
    print_r($_FILES);die;
   
}*/

if (isset($_POST['cono']))
{
   $adid=$_POST['adid'];
   $dtdcno=$_POST['dtdcno'];
   $delst=$_POST['delst'];
 $date=date("Y-m-d");
   if (!empty($dtdcno) && !empty($delst))
   {
      $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM request_amount_detail WHERE am_id='".$adid."' ");
      $count=mysqli_num_rows($chk);
      if ($count>0)
      {

        $upq=mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE request_amount_detail SET delst='".$delst."' WHERE am_id='".$adid."'");
         if ($upq)
         {
          $datarow = mysqli_fetch_array($chk);
           $invoice_no = $datarow['invoice_no'];
           $uid = $datarow['user_id'];

$data=mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM `request_purchase_detail` where (invoice_no='".$invoice_no."' and user_id='".$datarow['user_id']."' and status=0)");
while($datarow = mysqli_fetch_array($data)){
    $poc_product = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT product_id FROM `poc_product` where puc='".$datarow['user_id']."' and product_id='".$datarow['p_id']."'"));
    if($datarow['p_id']==$poc_product['product_id']){
       mysqli_query($GLOBALS["___mysqli_ston"],"update `poc_product` set qty=qty+ '".$datarow['quantity']."' where product_id='".$poc_product['product_id']."' and puc='".$datarow['user_id']."'");  

        

    mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$datarow['p_id']."',qty='".$datarow['quantity']."',invoive_no='".$datarow['invoice_no']."',puc='".$datarow['user_id']."',stock_point='".$datarow['stock_point_id']."',date='$date',status='1'");


    }else{
       mysqli_query($GLOBALS["___mysqli_ston"],"insert into `poc_product` set product_id='".$datarow['p_id']."',qty='".$datarow['quantity']."',price='".$datarow['price']."',puc='".$datarow['user_id']."'");  

      

           mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$datarow['p_id']."',qty='".$datarow['quantity']."',invoive_no='".$datarow['invoice_no']."',puc='".$datarow['user_id']."',stock_point='".$datarow['stock_point_id']."',date='$date',status='1'");
    }
}
             
mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE request_purchase_detail SET status='1' WHERE invoice_no='".$invoice_no."'");

            header('location:requested-product-list.php?msg=Information Updated Successfully');exit;
         }
         else
         {
            header('location:requested-product-list.php?msg=Invalid action');exit;
         }
      }
      else
      {
        header('location:requested-product-list.php?msg=Already Submitted');exit;
      }
   }
   else
   {
      header('location:requested-product-list.php?msg=Fill The Details');exit;
   }

}



if(isset($_POST['submit']))
{
    $invoice_no=$_POST['invoice_no'];
     $check = getimagesize($_FILES["uploadedfile"]["tmp_name"]);
    if($check == false) {
        
        
       header("location:requested-product-list.php?msg=File is not an image.");
       exit(); 
    }


     $filename12 = time()."main_".$_FILES["uploadedfile"]["name"];

  $target_dir = "paymentproof/";
$target_file = $target_dir . basename($_FILES["uploadedfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif") {
  
    header("location:requested-product-list.php?msg=Sorry, file not  allowed.");
       exit();
}
$filename12 = time()."main_".$_FILES["uploadedfile"]["name"];
move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"paymentproof/" .$filename12);
// echo "update request_amount_detail set payment_proof_image='$filename12' where invoice_no='$invoice_no'";die;
mysqli_query($GLOBALS["___mysqli_ston"], "update request_amount_detail set payment_proof_image='$filename12' where invoice_no='$invoice_no'");
header("location:requested-product-list.php?msg=Member Profile Photo Updated Successfully !");  
}

?>


 <?php 
    $data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail_new $myco order by payment_date desc");
    while($data21=mysqli_fetch_array($data2)) {  ?>
  <!-- Modal -->
<div class="modal fade" id="pro<?php echo $data21['am_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#fff;">Purchase Details</h4>
      </div>
      <div class="modal-body">
        <form method="POST">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <td><strong>Consignment No. : </strong></td>
                    <td>
                      <input type="text" class="form-control" name="dtdcno" placeholder="Enter Consignment No." value="<?php echo $data21['dtdcno'];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td><strong>Delivery Status : </strong></td>
                    <td>
                      <select name="delst" class="form-control" required>
                        <option value="">Select</option>
                        <option value="2"<?php if ($data21['delst']==2){ echo "selected='selected'"; }?>>Received</option>
                      
                      </select>
                      <input type="hidden" name="adid" value="<?php echo $data21['am_id'];?>">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2"><input type="submit" name="cono" value="Submit" class="btn btn-warning"></td>
                </tr>
            
            </table>
        </form>
      </div>
    </div>
  </div>
</div>

<?php } ?>

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
           <center><p style='color:green;'><?php echo $_GET['msg']; ?></p></center>
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                 
                  <p>Requested Product list</p>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                                <th>
                                    S.No
                                </th>
                                 <th>
                                    Stock Point
                                </th> 
                                <th>
                                    Invoice No.
                                </th> 
                              
                                <th>Total Amount</th>                  
                            
                               
                                 
                               <!--    <th style="text-align:center;">
                                   Delivery Status
                                </th> -->
                              
                              
                                 
                                <th>
                                   Payment Status
                                </th>
                                 <th>
                                    View Invoice
                                </th>

                            </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      
                    $data=mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM `amount_detail_new` where user_id='".$_SESSION['puc_user_id']."' order by am_id desc");
                    while($data1=mysqli_fetch_array($data))
                    { 
                     $userdetails=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM `poc_registration` where user_id='".$data1['stock_point_id']."'"));


                     ?>

                      <tr>
                       <td>
                            <?php echo $i;?>
                        </td>
                     <td>
                            (<?php echo $data1['puc'];?>)</br>
                            <?php echo $userdetails['first_name']." ".$userdetails['last_name'];?>

                        </td>
                        <td>
                            <?php echo $data1['invoice_no'];?>
                        </td>
                       
                        <td><?php echo $data1['total_amount'];?></td>
                     

                        
                                 <!--  <td>
                                     <p>(Consignment No.= <?= $data1['dtdcno']?> / Delivery Status: <?php if($data1['delst']==0){ echo 'Pending';} if($data1['delst']==1){ echo '<spam style="color:red;">Dispatched</spam>';} if($data1['delst']==2){ echo 'Delivered'; }?>)</p>
                                </td> -->


                              <!--   <td>
                                <?php if($data1['delst']==1){ ?>
                                  <a href="#" data-toggle="modal" data-target="#pro<?php echo $data1['am_id'];?>" class='btn btn-primary'>Confirm</a>
                                 <?php }else{ ?>
                                       
<spam style='color:red;'>Not Allowed</spam>

                                 <?php  } ?> 
                                 </td>
 -->



                      <!--   <td>
                         <?php
               if($data1['payment_mode']!='Ewallet Payment'){
                          if($data1['status']==0){ ?>
                       <form method="post"enctype="multipart/form-data">
                           <input type="hidden" name="invoice_no" value="<?php echo $data1['invoice_no'];?>">
                        <input type="file" name="uploadedfile">
                        <button class="btn btn-info" name="submit" value="submit">Submit</button>
                        </form>
                         <?php }else{ 
    if($data1['payment_proof_image']!=''){ ?>
                                   <a href="paymentproof/<?php echo $data1['payment_proof_image'];?>" target="_blank" class="btn btn-info">View proof</a>
                                   <?php }else{ ?>
                                       
<spam style='color:red;'>Not Uploaded</spam>

                                 <?php  }}}else{ ?>

                         <spam style='color:green;'><?php echo $data1['payment_mode']; ?></spam>
                               <?php } ?>
                        </td> -->
                        
                        <td>
                            <?php if($data1['status']==0){
                
                            echo '<span style="color:red;">Pending</span>';
                        }
                        else if($data1['status']==2){
                
                            echo '<span style="color:red;">Approved</span>';
                        }else if($data1['status']==3){
                              echo '<span style="color:red;">Cancelled</span>';
                        }
                        ?>
                    
                    </td>
 <td> 
                            <a href="puc-shopping-invoice-detail_new.php?inv=<?php echo $data1['invoice_no'];?>&status=<?php echo $data1['status']; ?>" style="color:blue;">View Invoice</a>
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