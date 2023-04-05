<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include("header.php");

$checkid=$_GET['id'];
$invoice_no=$_GET['inv'];
$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where invoice_no='$invoice_no' AND purchase_type='1' "));

$userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS['___mysqli_ston'],"select * from product_shipping_billing_address where invoiceno='$invoice_no' ORDER BY id desc LIMIT 1"));

?><!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Style CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

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
        <div id="print">
        <section id="page-title" class="row">

        

      
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
           

            <div class="col-md-12 margin-bottom-30">
              
        <section class="row" id="page-title">

          
 <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="final_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Billing Form</strong></h3>
                </header>
                
                <div class="panel-body">
                 
              <div class="form-group">
                 <?php   $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM  amount_detail WHERE am_id='".$_GET['aid']."' ");
                        $datarow = mysqli_fetch_array($chk);
                        
                  ?>
                    <div class="panel invoice">
                            <div class="panel-body" id="printablediv">
                               
                                <br/>
                                <br/>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                   <th style="text-align:center;">
                                    <input type="button" name="Check_All" value="Check All" onclick="Check(document.myform.check_list)" /></th>
                                                <th>ITEM</th>
                                                <th>PRODUCT TYPE</th>
                                            <!--     <th>PRICE</th> -->
                                             
                                                <th>DSP</th>
                                                <th>PV</th>
                                                <!--<th>COLOR</th>-->
                                                <!--<th>SIZE</th>-->
                                                <th class="">QUANTITY</th>
                                                <!--   <th class="hidden-xs">DESCRIPTION</th> -->
                                                
                                                <!--<th>GP</th>-->
                                             <!--    <th>DISCOUNT</th> -->
                                                <th>TOTAL</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_purchase_detail where invoice_no='$invoice_no'");
                                            $i=0;
                                            $subtotal = 0;
                                            $discount = 0;
                                            while($data=mysqli_fetch_array($query)){
                                               $i++;
                                               $subtotal = $subtotal + $data['net_price'];
                                               $discount = $discount + $data['discount'];
                                               $gst_per = $data['gst'];
                                                $gst = $data['gst'];
                                                $product_gst = $product_gst + $gst;
                                                $qty=$data['quantity'];
                                            ?>
                                            <tr>
                                             
                                              <td>
                                                          <?php
                  
                        $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$userid' and product_id='".$data['p_id']."'"));

 
                    ?> 
                                     <?php  if ($poc_product_details['qty']>=$qty) { ?>
                 <input type="checkbox" name="list[]" id="list[]" value="<?php echo $data['id'] ?>">
                   <?php }else{ ?>  

<samp style="color: red;">Stock not Available</samp>
                   <?php } ?>     
                                </td>
                                                <td><?php echo  $data['product_name'];?></td>
                                                <td><?php echo  $data['product_type'];?></td>
                                             <!--    <td class=""><?php echo number_format($data['price'],2);?></td> -->
                                 
                                                <td class=""><?php echo number_format($data['dp'],2);?></td>
                                                 <td><?php echo  $data['pv'];?></td>
                                                <!--<td><?php echo  $data['p_color'];?></td>-->
                                                <!--<td><?php echo  $data['p_size'];?></td>-->
                                                <td class=""><?php echo $data['quantity'];?></td>
                                               <!--  <td><?php echo  number_format($data['discount'],2);?></td> -->
                                                <td><?php echo number_format($data['net_price']+$data['gst'],2);?></td>
                                                <td>
                                  
                                            </td>
                                          <td>
                                  
                                 
                                 </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <br/>
                                <br/>

                            
                            
                              
                            </div>
                        </div>
                      <div class="form-group">
                       
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="puc_names" class="form-control" value="<?php echo $datarow['user_id']; ?>" required="" readonly>
                              
                              <input type="hidden" name="adid" value="<?php echo $datarow['am_id'];?>">   
                        </div>
                       
                    </div> 
                      <div class="form-group">
                        <label for="exampleInputAddress">Receiver Id </label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                              <input type="text" name="puc_name" class="form-control" value="<?php echo $_SESSION['puc_name']?>" required="">
                              
                                
                        </div>
                        <span id="checkotp"></span> 
                    </div> 
                    
                    <!--<div class="form-group">-->
                    <!--    <label for="exampleInputAddress"></label>-->
                    <!--      <div class="input-group">-->
                    <!--         <span class="input-group-addon">Enter User OTP</span>-->
                    <!--          <input type="text" name="userotp" class="form-control" required>-->
                    <!--      </div>-->
                    <!--</div> -->
                    <!--<div class="form-group">-->
                    <!--    <label for="exampleInputAddress"></label>-->
                    <!--      <div class="input-group">-->
                    <!--         <span class="input-group-addon">Enter Reciever OTP</span>-->
                    <!--          <input type="text" name="recieverotp" class="form-control" required>-->
                    <!--      </div>-->
                    <!--</div>-->
                    
                    
                     <div class="form-group">
                        <label for="exampleInputAddress">Select Billing Status</label>
                          <div class="input-group">
                              <span class="input-group-addon"></span>
                             
                                <select name="delst" class="form-control" required>
                        <option value="">Select</option>
                        <option value="2"<?php if ($data21['delst']==2){ echo "selected='selected'"; }?>>Delivered</option>
                      
                      </select>
                         
                          </div>
                    </div>
         
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
              
                  <input type="submit" name="cono"  value="Submit" class="btn btn-success" id="submit">  
                
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

    </section>
            

            </div>
      
      

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->

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
 <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";
              window.print();
              document.body.innerHTML = oldPage;
              location.reload();
        }
    </script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
     <script>
function coderHakan()
{
var sayfa = window.open('','','width=500,height=500');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('printArea').innerHTML);
sayfa.document.close();
sayfa.print();
}
</script>
<script type="text/javascript">
function ValidateData(form)
{
 var chks = document.getElementsByName('list[]');
 var hasChecked = false;
 for (var i = 0; i < chks.length; i++)
 {
  if(chks[i].checked)
  {
   hasChecked = true;
   break;
  }
 }
 if (hasChecked == false)
 {
  alert("Please select at least one Request.");
  return false;
 }
} 
function Check(chk)
{
 var chk = document.getElementsByName('list[]');
 if(document.myform.Check_All.value=="Check All")
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = true ;
  document.myform.Check_All.value="UnCheck All";
 }
 else
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = false ;
  document.myform.Check_All.value="Check All";
 }
}
</script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  </body>
</html>