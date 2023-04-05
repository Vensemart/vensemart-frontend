<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
//print_r($_POST);die;

if(isset($_POST['sub'])  && ($_POST['type']=='add') ){
//echo "id".$_POST['product_id'];die;

//	foreach($_POST['product_id'] as $key => $value){
	//	$_POST['product_id'] =  $_POST['product_id'];    // filter_var($value, FILTER_SANITIZE_STRING);

	unset($_POST['type']);
	unset($_POST['return_url']); 
    $statement =mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products_main WHERE product_id='".$_POST['product_id']."' LIMIT 1");

	while($data=mysqli_fetch_array($statement)){
    $stat =mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `eshop_products`( `product_id`, `shop_id`, `category`, `sub_category`, `hsn_code`, `product_brand`, 
    `product_name`, `size_ids`, `size`, `qty`, `price`, `discount`, `wholesale_price`, `rp`, `dp`, `weight`, `product_gst`, `actual_image`, `image`, `m_image`, `l_image`, `f_image`, `image_2`, `image_3`, `product_type`, `description`, `date`, `add_date_time`, `last_modify`, `status`, `shipping_charge`, `tax`, `uom_id`) 
    VALUES ('".$_POST['product_id']."','".$f['user_id']."','".$data['category']."', '','".$data['hsn_code']."', '' , '".$data['product_name']."',
    '' ,'','','','','','','','','','','','','','','','','','','','','','','','','')  ");
      
     }
   //   }

}


if(isset($_POST['sub'])  && ($_POST['type']=='deletesub') ){
   // foreach($_POST['product_id'] as $key => $value){
   //print_r($_POST);die;
	//$_POST['product_id'] = $_POST['product_id']; //filter_var($value, FILTER_SANITIZE_STRING);
    $statement =mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM eshop_products WHERE product_id='".$_POST['product_id']."' and shop_id=  '".$f['user_id']."'    ");
 //}
}



if( isset($_POST["remove_code"]))
{		
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
		    $new_product['product_id'] = filter_var($value, FILTER_SANITIZE_STRING);
    $statement =mysqli_query($GLOBALS["___mysqli_ston"], "delete FROM eshop_products WHERE product_id='".$new_product['product_id']."'  and shop_id=  '".$f['user_id']."'    ");
			//unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url 
//header('Location:request-cart-view.php');
 
header('Location:add-product-for-shop.php');

?>