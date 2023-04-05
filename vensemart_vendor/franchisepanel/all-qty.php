<?php include("header.php");


if($_POST[submits])
{

//$page_flag=0;

$frm=$_REQUEST['from'];
$til=$_REQUEST['to'];

$dfrom=explode("/",$frm);

$fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 

$dednd=explode("/",$til);
$edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];



$username=$_REQUEST['id'];  



  
if($frm!='' && $til!='')
{
$query123="and  eshop_purchase_detail.purchase_date>='$fdate' and   eshop_purchase_detail.purchase_date<='$edate' ";  
  
  
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
                 
                  <p> Franchise product list</p>
                </header>
                <div class="panel-body">
  <div class="row">
    <div class="col-sm-12">
      <form name="tree" method="post" action="#" >
      
          <div class="col-sm-3">
          <input name="from"   placeholder="Enter Start Date" type="text" id='bdate' class="form-control" value="<?php echo $frm; ?>">
        </div>
          <div class="col-sm-3">
         <input name="to"   placeholder="Enter End Date" type="text" id='bdate1' class="form-control" value="<?php echo $til; ?>">
        </div>
        <div class="col-sm-2">
          <input type="submit" name="submits" value="Submit" class="btn btn-success">           
        </div>
      </form>
    </div>
</div></br> 
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
                                     Product Code
                                </th>
                                <th style="text-align:center;">
                                   Total Sale
                                </th>
                                <!--    <th style="text-align:center;">-->
                                <!--   Remaining Product-->
                                <!--</th>-->
                                <!--  <th style="text-align:center;">
                                   Date
                                </th> -->
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $total=0;
                                  // echo "select * from user_registration $query123";
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_products where shop_id='".$f['user_id']."'"); 
                                  while($data1=mysqli_fetch_array($data))
                                    { 

                                      $tds=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(eshop_purchase_detail.quantity) as sas FROM amount_detail INNER JOIN eshop_purchase_detail ON amount_detail.invoice_no = eshop_purchase_detail.invoice_no where eshop_purchase_detail.p_id='".$data1['product_id']."' and amount_detail.puc='$userid' and amount_detail.status='1' $query123"));
                                     $total=$total+$tds['sas'];
                                     
                                     
                                     
                                        ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                               
                             <td>
                                    <?php  echo $data1['product_name'];?>
                                </td> 
                                <td>
                                    <?php echo $data1['hsn_code']?>
                                </td>
                                
                                <td>
                                <?php 
                                
                                if($tds['sas']==''){
                                echo "0";
                                }else{
                                     echo $tds['sas'];
                                }
                                
                                ?>
                                </td>
                                <!--<td>-->
                                     <?php 
                                 //    $rqty=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select qty from poc_product where puc='$userid' and product_id='".$data1['product_id']."'"));
                               //echo $rqty['qty'];
                                        ?>
                                <!--</td>-->
                                 <!-- <td>
                                     <?php //echo $tds['sas'];?>
                                </td> -->
                                
                            </tr>
                            <?php $i++;} ?>
                            
                      
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