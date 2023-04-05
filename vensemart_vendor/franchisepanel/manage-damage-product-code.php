<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if($_SESSION['invoice_no']==''){
    header('location:damage_product.php?msg=Now Allowed1');exit;
  
}


if ($_SESSION['invoice_no']!='')
{

           $date=date("Y-m-d");
           $invoice_no = $_SESSION['invoice_no'];
              $all_data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `amount_detail` where invoice_no='$invoice_no'"));
 $product_data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `eshop_purchase_detail` where invoice_no='$invoice_no'");

                  while($data_load=mysqli_fetch_array($product_data)){
                         $product_qty=$data_load['quantity'];
 $poc_product_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `poc_product` where puc='$userid' and product_id='".$data_load['p_id']."'"));
                        $poc_product_details1=$poc_product_details['qty']-$product_qty;
 mysqli_query($GLOBALS["___mysqli_ston"], "update poc_product set qty='$poc_product_details1' where puc='$userid' and product_id='".$data_load['p_id']."'");

 mysqli_query($GLOBALS["___mysqli_ston"],"insert into `product_quantity_historty` set product_id='".$data_load['p_id']."',qty='".$data_load['quantity']."',invoive_no='".$data_load['invoice_no']."',puc='$userid',stock_point='".$data_load['puc']."',date='$date',status='0'");

 mysqli_query($GLOBALS["___mysqli_ston"],"insert into `damage_invoive_details` set user_id='".$all_data['user_id']."',invoive_no='".$data_load['invoice_no']."',puc='$userid',date='$date',status='0'");

                     }

        
  mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE amount_detail SET damage_status='1' WHERE am_id='".$all_data['am_id']."'");

  
            header('location:damage_product.php?msg=Updated Successfully');exit;
     
      
  
   
    }

