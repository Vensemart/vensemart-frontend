<?php include("header.php");
if(isset($_POST['submits'])){
        $frm=date('Y-m-d',strtotime($_POST['from']));
        $til=date('Y-m-d',strtotime($_POST['to']));

        if($_POST['from']!='' && $_POST['to']!=''){
            $query123 =" AND purchase_date BETWEEN '$frm' AND '$til' ";
        }else{
            $query123="";
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
            <!--<h1>My Package Invoice</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4" style="float:right;">

           <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Invoice</a></li>-->
              <!--<li><a href="#">My Package Invoice</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <center><p style='color:green;'><?php echo $_GET['msg']; ?></p></center>
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">On the way Orders</h4>
                </header>
                <div class="panel-body">
               <div class="row">  
                    <div class="col-sm-12">
                        <!--<form name="tree" method="post" action="#" >-->
                        <!--    <div class="col-sm-2">-->
                        <!--        <input name="from" value="<?php echo $frm;?>"  placeholder="MM/DD/Yr" id="bdate" type="text" class="form-control" autocomplete="off">-->
                        <!--    </div>-->
                        <!--    <div class="col-sm-2">-->
                        <!--        <input  placeholder="MM/DD/Yr" name="to" value="<?php echo $til;?>" id="bdate1" type="text" class="form-control" autocomplete="off">-->
                        <!--    </div>-->
                        <!--    <div class="col-sm-1">-->
                        <!--      <input type="submit" name="submits" value="Submit" class="btn btn-success">         -->
                        <!--    </div>-->
                        <!--</form>-->
                    </div>
                </div><br><br>
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>User id</th>
                         <th>Full Name</th>
                        <th>Invoice No</th>
                        <th>Total Amount</th>
                        <th>Purchase Date</th>
                         <th>Payment Type</th>
                        <th>Delivery Status</th>
                         <th>Manage Delivery Status </th>
                     
                        <th>Delivery Date</th>
                      
                         <th>View Invoice</th>
                     
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $total=0;
                      //echo "select * from  amount_detail where puc='$userid' $query123 order by am_id desc";
                      // echo "select * from  poc_amount_detail where user_id='$userid' order by id desc";
                      // exit();
                      $data=mysqli_query($GLOBALS["___mysqli_ston"],  "select * from  amount_detail where order_status ='3' and seller_id='$userid' $query123 order by am_id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                          $total=$total+$data1['total_amount'];
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td scope="row"><?php echo $data1['user_id'];?></td>
                             <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],  "SELECT * FROM `user_registration` where  user_id='".$data1['user_id']."'"));?>
                        <td><?php echo $user['first_name']." ".$user['last_name'];?></td>
                        <td><a href="puc-shopping-invoice-detail.php?inv=<?php echo $data1['invoice_no'];?>"><?php echo $data1['invoice_no'];?></a></td>
                        <td><?php echo $data1['total_amount'];?></td>
                        <td><?php echo $data1['date'];?></td>
                        <td><?php echo !empty($data1['payment_mode']) ? $data1['payment_mode'] : 'COD';?>
                           <?php if ($data1['payment_mode2']!='') { 
                            echo "(".$data1['payment_mode2'].")";
                          } ?>
                            
                        </td>
                        <td>
                                      <p>(<!-- Consignment No.= <?= $data1['dtdcno']?> /  -->Delivery Status: <?php if($data1['delst']==0){ echo 'Pending';} if($data1['delst']==1){ echo '<spam style="color:red;">Dispatched</spam>';} if($data1['delst']==2){ echo 'Delivered'; }?>)</p>
                        </td>


                        <td>
                        <?php if($data1['delst']=='0'){ ?>
                                
                                  <a href="update-status.php?id=<?php echo $data1['am_id'];?>"   class='btn btn-primary'>Confirm</a>
                                 <?php }else{ ?>

<spam style='color:red;'>Not Allowed</spam>
                              <?php   } ?> 
                                 </td>
                       <td><?php echo $data1['delivery_date'];?></td>
                           <td><a href="puc-shopping-invoice-detail.php?inv=<?php echo $data1['invoice_no'];?>" style="color: green;">View Invoice</a>

                           </td>
                      
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                   <table align="center" >
                            <tr></tr>
                            <tr>
                      <td></td>
                      <td></td>
                      <td style="font-weight:bold;text-align:center;"><h4>Total Amount = </h4></td>
                      <td><span><h4><?php echo number_format($total,2); ?></h4></span></td>
                      </tr>

                      </table>


                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

           <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
<form name="inactive" method="post" action="update-delivery-status.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Description</h4>
        
      </div>
      <div class="modal-body">
        <input type="hidden" id="setid" name="id" />
        <input type="hidden" id="setval" name="status"/>
        <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Description" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="subremark" value="Submit" class="btn btn-success">
      </div>
       </form>
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
$(document).change(function(){
  $(".openmodel").click(function() {

     var ide=$(this).attr('id');

     var value=$(this).val();

     var setid=$("#setid").val(ide);
     var setvalue=$("#setval").val(value);
     $('#myModal').modal();
     //$("#myModal").dialog("open"); 
     
    //alert("hii");
  });
});
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
       <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $( function() {
    $( "#bdate" ).datepicker();
  } );
  </script>
    <script>
  $( function() {
    $( "#bdate1" ).datepicker();
  } );
</script>

  </body>
</html>