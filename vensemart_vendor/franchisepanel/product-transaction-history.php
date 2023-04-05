<?php include("header.php");?>

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
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>Ewallet Transaction History</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Ewallet</a></li>
              <li><a href="#">Ewallet Transaction History</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->
        <?php
              
              $query123="";

if(isset($_POST['submits']))
{

//$page_flag=0;

$frm=$_POST['from'];
$til=$_POST['to'];

$s_date=date('Y-m-d',strtotime($frm));
$e_date=date('Y-m-d',strtotime($til));




  
if($frm!='' && $til!='')
{
$query123="AND  purchase_date BETWEEN '$s_date' AND '$e_date' ";  
  
  
}
  //$query123=" and p_date>='$date1' and   p_date<='$date2' ";  


}   

     
        ?>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Product Transaction History</h4>
                </header><br>
                 <div class="row">
    
<div class="col-sm-12">
<form name="tree" method="post" action="#" >

<div class="col-sm-3">
<input name="from" value=""  placeholder="Start Date" id="bdate" type="text" class="form-control">
</div>
<div class="col-sm-3">
<input  placeholder="End Date" name="to" value="" id="bdate1" type="text" class="form-control">
</div>

<div class="col-sm-2">
<input type="submit" name="submits" value="Submit" class="btn btn-success">           
</div>
</form>
</div></div> 
                              </br>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Sender Id</th>
                        <th>Sender Username</th>
                        

                        <th>Receiver Id</th>
                         <th>Receiver Username</th>
                        <!-- <th>Product Name</th> -->
                        <!-- <th>Quantity</th> -->
                        <!-- <th>Product Type</th> -->
                        <th>Date</th>
                        <th>View</th>
                       

                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from puc_transfer_detail where (sender_id='$userid' || receiver_id='$userid' ) $query123 GROUP BY invoice_no order by pd_id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['invoice_no'];?></td>
                        <?php $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='".$data1['sender_id']."'"));?>
                           <?php $data111=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='".$data1['receiver_id']."'"));?>
                        <td><?php echo $data1['sender_id'];?></td>
                         <td><?php echo $data11['username'];?></td>
                        
                         <td><?php echo $data1['receiver_id'];?></td>
                           <td><?php echo $data111['username'];?></td>
                          <!-- <td><?php echo $data1['product_name'];?></td> -->
                           <!-- <td><?php echo $data1['quantity'];?></td> -->

                       <!-- <td><?php
 $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `products` where product_id='".$data1['p_id']."'"));
                         echo $poc_product_details['product_type'];?></td> -->
                          <td><?php echo $data1['purchase_date'];?></td>
                          <td><a href="puc-transfer-invoice-detail.php?inv=<?php echo $data1['invoice_no'];?>" style="color: green;">View Invoice</a>

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


          <!--<div class="col-md-12 text-center">

 <a href="bh_export_ewallet_transaction.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div>-->



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

    <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>
  </body>
</html>