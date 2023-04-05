<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
//  print_r($_POST);die;
//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
//echo "id".$_POST['product_id'];die;

	foreach($_POST['product_id'] as $key => $value)
	
	{ //add all post vars to new_product array
		$new_product['product_id'] = filter_var($value, FILTER_SANITIZE_STRING);
		
   // echo "<pre>".$value;
   
   //$_SESSION['product_qty']=1;


	//remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 

 	//we need to get product name and price from database.
    $statement =mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_id='".$new_product['product_id']."' LIMIT 1");


	while($data=mysqli_fetch_array($statement)){
	

		//fetch product name, price from db and add to new_product array
        $new_product["product_name"] = $data['product_name']; 
        $new_product["product_price"] = $data['wholesale_price'];
        $new_product["product_bv"] = $data['points'];
        $new_product["product_pv"] = $data['points'];
        $new_product["product_qty"]= 1;
         $new_product["mrp"] = $data['price'];
        // $new_product["size"] = $data['size'];
        $new_product['image'] = $data['actual_image'];
        $new_product['fcs'] = $data['fcs'];
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['product_id']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['product_id']]); //unset old array item
            }           
        }
        $_SESSION["cart_products"][$new_product['product_id']] = $new_product; //update or create product session with new item  
    } //while loop end
  }//foreach loop end

}
//update or remove items 
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{		
	//update item quantity in product session
	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
		foreach($_POST["product_qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["product_qty"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url 
header('Location:request-cart-view.php');


?>