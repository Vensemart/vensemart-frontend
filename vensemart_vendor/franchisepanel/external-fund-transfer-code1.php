<?php
ob_start();
include("header.php");
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 $min_amount=1;
if(isset($_POST['update'])){
  
  if( !empty($_POST['amounts']) && !empty($userid))
  {
    if( $_POST['amounts'] >= $min_amount )
    {
      if( $_POST['t_password'] == $f['t_code'] )
      {
        // transfer request
        $wallet=$_POST['wallet'];
        
          $wallets='final_e_wallet';
          $msg='Fund Wallet';
          $wallets1='commission_e_wallet';
          $msg1='Payout Wallet';
        


        $admin_amount=0;
        $total_charge=0;
        $sql = "select amount from $wallets where user_id ='".$userid."'";
        $rsts = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        $args_wallet = mysqli_fetch_assoc($rsts);
        
        
        $total_charge = $_POST['amounts'];
        
        if( $args_wallet['amount'] >= $total_charge)
        {
          // get receiver user_id
          $rands=rand(0000000001,9999999999);
          $ttype="Fund Transfer";
          $walleting="Payout Wallet";
          $sql_receiver = "select user_id, first_name, last_name from user_registration where (user_id = '".$userid."' or username = '".$userid."')";
          
          $rst_receiver = mysqli_query($GLOBALS["___mysqli_ston"], $sql_receiver);
          //$rst_receivers = mysql_fetch_array($rst_receiver);
          if( mysqli_num_rows($rst_receiver) > 0 ){
            
            $args_receiver = mysqli_fetch_assoc($rst_receiver);
            
            $admin_charge=0.00;
            // get final E-wallet amount
            $sql="select amount from $wallets where user_id='".$args_receiver['user_id']."'";
            $args_wallet_receiver = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $sql));
            
            $final_amount = $args_wallet_receiver['amount']+$_POST['amounts'];
            
            //transfer fund to receiver
            $sql_cr_Dr = "insert into credit_debit set user_id='".$args_receiver['user_id']."',"; 
            $sql_cr_Dr .= "credit_amt='".$_POST['amounts']."', admin_charge='".$admin_amount."', ";
            $sql_cr_Dr .= "receiver_id='".$args_receiver['user_id']."', sender_id='".$userid."', ";
            $sql_cr_Dr .= "receive_date='".date("Y-m-d")."', ";
            $sql_cr_Dr .= "TranDescription='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_cr_Dr .= "Remark='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_cr_Dr .= "Cause='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_cr_Dr .= "transaction_no='".$rands."',";
            $sql_cr_Dr .= "invoice_no='".$rands."',";
            $sql_cr_Dr .= "ttype='".$ttype."',";
            $sql_cr_Dr .= "product_name='".$ttype."',";
            $sql_cr_Dr .= "ewallet_used_by='".$msg."',";
            $sql_cr_Dr .= "current_url='".$urls."',";
            $sql_cr_Dr .= "debit_amt=0,";
            $sql_cr_Dr .= "status=0";
            
            mysqli_query($GLOBALS["___mysqli_ston"], $sql_cr_Dr) or die($sql_cr_Dr.mysqli_error($GLOBALS["___mysqli_ston"]));
            //echo "<br>";
            //update wallet amount
            $update_wallet = "update $wallets set amount='".$final_amount."' where user_id='".$args_receiver['user_id']."'";
            mysqli_query($GLOBALS["___mysqli_ston"], $update_wallet)or die(mysqli_error($GLOBALS["___mysqli_ston"]));
            
            //echo "<br>";
            
            //deduct amount from sender e-wallet
            $sql_transfer = "insert into credit_debit set user_id='".$userid."',";
            $sql_transfer .= "debit_amt='".($_POST['amounts']+$admin_amount)."', admin_charge='".$admin_amount."', ";
            $sql_transfer .= "receiver_id='".$args_receiver['user_id']."', sender_id='".$userid."', ";
            $sql_transfer .= "receive_date='".date("Y-m-d")."', ";
            $sql_transfer .= "TranDescription='Transfer fund $".$_POST['amounts']." to ".$args_receiver['first_name']." ".$args_receiver['last_name']." with ".$admin_charge."% admin charge',";
            $sql_transfer .= "Remark='Transfer fund ".$_POST['amounts']." SGD to ".$args_receiver['first_name']." ".$args_receiver['last_name']." with ".$admin_charge."% admin charge',";
            $sql_transfer .= "Cause='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_transfer .= "transaction_no='".$rands."',";
            $sql_transfer .= "invoice_no='".$rands."',";
            $sql_transfer .= "ttype='".$ttype."',";
            $sql_transfer .= "product_name='".$ttype."',";
            $sql_transfer .= "ewallet_used_by='".$msg1."',";
            $sql_transfer .= "current_url='".$urls."',";
            $sql_transfer .= "credit_amt=0,";
            $sql_transfer .= "status=0";
            
            mysqli_query($GLOBALS["___mysqli_ston"], $sql_transfer)or die($sql_transfer.mysqli_error($GLOBALS["___mysqli_ston"]));
            
            //echo "<br>";
            //update wallet amount
            $update_wallet = "update $wallets1 set amount='".($args_wallet['amount']-$total_charge)."' where user_id='".$userid."'";
            mysqli_query($GLOBALS["___mysqli_ston"], $update_wallet)or die(mysqli_error($GLOBALS["___mysqli_ston"]));;
            
            //exit;
            echo "<script language='javascript'> alert('Fund transferred successfully!'); window.location.href='external-fund-tranfer1.php'; </script>";
          }
          else{
            echo "<script language='javascript'> alert('Please enter correct User ID or user_name'); </script>";
            header("location:external-fund-tranfer1.php");
          }
          
        }else{
          echo "<script language='javascript'> alert('Insufficient fund in your Payout Wallet'); </script>";
          header("location:external-fund-tranfer1.php");
        }
        
      }
      else{
        echo "<script language='javascript'> alert('Please enter correct transaction password'); </script>";
        header("location:external-fund-tranfer1.php");
      }
      
    }
    else{
      echo "<script language='javascript'> alert('Please enter min ".$min_amount." SGD transfer to user wallet'); </script>";
      header("location:external-fund-tranfer1.php");
    }
    
  }
  else{
    echo "<script language='javascript'> alert('Please fill fields'); </script>";
    header("location:external-fund-tranfer1.php");
  }
  
}
header("location:external-fund-tranfer1.php");
?>