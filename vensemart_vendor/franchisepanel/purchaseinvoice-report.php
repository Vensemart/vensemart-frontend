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


    <?php 


if (isset($_POST['cono']))
{
   $adid=$_POST['adid'];
   $dtdcno=$_POST['dtdcno'];
   $delst=$_POST['delst'];

   if (!empty($dtdcno) && !empty($delst))
   {
      $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM amount_detail WHERE am_id='".$adid."' ");
      $count=mysqli_num_rows($chk);
      if ($count>0)
      {
         $upq=mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE amount_detail SET dtdcno='".$dtdcno."',delst='".$delst."' WHERE am_id='".$adid."'");
         if ($upq)
         {
            $rem=mysqli_fetch_array($chk);
             $ph=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT telephone FROM user_registration WHERE user_id='".$rem['user_id']."'"));
             //Message Function
             


            header('location:purchaseinvoice-report.php?msg=Information Updated Successfully');exit;
         }
         else
         {
            header('location:purchaseinvoice-report.php?msg=Invalid action');exit;
         }
      }
      else
      {
        header('location:purchaseinvoice-report.php?msg=Already Submitted');exit;
      }
   }
   else
   {
      header('location:purchaseinvoice-report.php?msg=Fill The Details');exit;
   }

}


$life='';
if($_POST['consearch'])
{
   
  $rim=mysqli_real_escape_string($GLOBALS['___mysqli_ston'],$_REQUEST['conos']);
  $ring=explode(',', $rim);
  foreach ($ring as $value)
  {
    $rem[]="'".$value."'";
  }
  $connos=implode(',',$rem);
  if(!empty($connos))
  {
      $myco=" and dtdcno IN(".$connos.") ";
  }
}

    ?>
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
        <?php
             $qry="";
             if (isset($_POST['submits']))
             {
                 $d1=$_POST['from'];
                 $d2=$_POST['to'];

                 $from=date('Y-m-d',strtotime($d1));
                 $to=date('Y-m-d',strtotime($d2));

                 if (!empty($from && $to))
                 {
                   
                     $qry="AND payment_date BETWEEN '".$from."' AND '".$to."'";

                 }
             }
   
        ?>

        <div class="container-fluid">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Purchase Invoices</h4>
                </header><br>
                <div class="row">
<?php 
                                  $data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail $myco order by payment_date desc");
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
                      <input type="text" class="form-control" name="dtdcno" placeholder="Enter Consignment No." value="<?php echo $data21['dtdcno'];?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Delivery Status : </strong></td>
                    <td>
                      <select name="delst" class="form-control">
                        <option value="0"<?php if ($data21['delst']==0){ echo "selected='selected'"; }?>>Pending</option>
                        <option value="1"<?php if ($data21['delst']==1){ echo "selected='selected'"; }?>>Dispatched</option>
                        <option value="2"<?php if ($data21['delst']==2){ echo "selected='selected'"; }?>>Delivered</option>
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
            <div class="col-md-12">
              <form name="tree" id="search_form" method="post" action="#" >

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
            </div>
          </div><br>
                <div class="panel-body">

                  <table class="table datatable">
                <!--   <table class="table responsive-data-table table-responsive data-table"> -->
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    Purchaser
                                </th>                         
                                <th style="text-align:center;">
                                   Amount
                                </th>
                                 <th style="text-align:center;">
                                   Invoice
                                </th>
                                 <th style="text-align:center;">
                                   Date
                                </th>
                                 <th style="text-align:center;">
                                   State
                                </th>
                                <!--  <th style="text-align:center;">
                                   Ref No
                                </th> -->
                                 <th style="text-align:center;">
                                   Paid Status
                                </th>
                                <th style="text-align:center;">
                                   Delivery Status
                                </th>
                                <th style="text-align:center;">
                                    Delivery
                                </th>
                                 <th style="text-align:center;">
                                    Address Manage
                                </th>
                                <th style="text-align:center;">
                                   View Invoice
                                </th>
                              <!--   <th style="text-align:center;">
                                  Login Status
                                </th> -->
                                
                                <!--  <th style="text-align:center;">
                                   Action
                                </th> -->

                                
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;

                                  $data=mysqli_query($GLOBALS['___mysqli_ston'],"select * from amount_detail where puc='".$f['user_id']."' $myco order by payment_date ASC");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                      $userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"select * from product_shipping_billing_address where invoiceno='".$data1['invoice_no']."' AND userid='".$data1['user_id']."' ORDER BY ID DESC LIMIT 1"));
                                         $zam=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT user_status FROM user_registration WHERE user_id='".$data1['user_id']."'"));

                                         $ref=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"SELECT imps FROM pins WHERE pin_no='".$data1['pin_no']."'"));
                                      ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                               
                                 
                                 <td>
                                    <?php echo $data1['total_amount'];?>
                                </td>
                                 <td>
                                    <?php echo $data1['invoice_no'];?>
                                </td>
                                 <td>
                                    <?php echo $data1['payment_date'];?>
                                </td>
                                <td>
                                    <?php echo $userdeailss['stateB'];?>
                                </td>
                                <!--  <td>
                                    <?php echo !empty($ref['imps'])?$ref['imps']:'N/A';?>
                                </td> -->
                                 <td>
                                    <?php if($data1['status']==0) echo "Paid"; else echo "Pending";?>
                                </td>
                                 <td>
                                     <p>(Consignment No.= <?= $data1['dtdcno']?> / Delivery Status: <?php if($data1['delst']==0){ echo 'Pending';} if($data1['delst']==1){ echo 'Dispatched';} if($data1['delst']==2){ echo 'Delivered'; }?>)</p>
                                </td>
                                <td>
                                  <a href="#" data-toggle="modal" data-target="#pro<?php echo $data1['am_id'];?>" style='color: green;'>Manage</a>
                                 
                                 </td>
                                 <td>
                                  <a href="update-billing.php?inv=<?php echo $data1['invoice_no'];?>&user_id=<?php echo $data1['user_id'];?>" style='color: green;'>Manage</a>
                                 </td>
                                 <td>
                                 <!--<a href="invoice_details123?id=<?php echo $data1['am_id'];?>&invoice_no=<?php echo $data1['invoice_no'];?>"><?php echo $data1['invoice_no'];?></a>-->
                                 <a href="invoice-detail1.php?id=<?php echo $data1['am_id'];?>&invoice_no=<?php echo $data1['invoice_no'];?>" style='color: green;'>View</a>
                                 </td>

                                 <!-- <td><?php if($zam['user_status']=='0'){ echo "Active";} if($zam['user_status']=='1'){ echo "Blocked";}?></td> -->
                                 
                               <!-- <td>
                                    
                                     <select onchange="window.location.href = this.value" name="select">
        <option value="update-delivery-status.php?id=<?php echo $data1['am_id'];?>&invoice_no=<?php echo $data1['invoice_no'];?>&status=1"  <?php if($data1['shipping_status']=='1' && $data1['shipping_status']==''){ echo "selected";}?>>Pending</option>
         <option value="update-delivery-status.php?id=<?php echo $data1['am_id'];?>&invoice_no=<?php echo $data1['invoice_no'];?>&status=2" <?php if($data1['shipping_status']=='2'){ echo "selected";}?>>Delivered</option>
   
  </select>
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