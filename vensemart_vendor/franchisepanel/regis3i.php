<?php
include("../lib/config.php");


$_SESSION['sid']=$_POST['sid'];
$_SESSION['tst']=$_POST['ts'];


//check we have username post var


if(isset($_POST["sid"]))


{


    //check if its an ajax request, exit if not


    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {


        die();


    }   





        //try connect to db


       //trim and lowercase username


    $sid =  strtolower(trim($_POST["sid"])); 
    $tst =  strtolower(trim($_POST["ts"]));


    


    //sanitize username


    $sid = filter_var($sid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);


    


    //check username in db


    $results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM $tst WHERE ((user_id='$sid' or username='$sid'))");


    


    //return total count


    $username_exist = mysqli_num_rows($results); //total records


    $row_ref=mysqli_fetch_assoc($results);

    if($row_ref['designation'] == 'Stockist' || $row_ref['designation'] == 'Shopee'){

        $tst = $row_ref['designation'];


    } else {

        if ($row_ref['user_status'] == 0) {
            $cx = 'active';
        } else {
            $cx = 'inactive';
        }

         $tst = $cx.' distributor.';
    }
        

    //if value is more than 0, username is not available


    if(!$username_exist) {


          echo "<font color='#FF0000'><strong>"."  Invalid user id selected !"."</strong></font>";


    }else{


        echo "<font color='#009999'><strong>".  $row_ref['first_name']." ".$row_ref['last_name']." is your ".$tst." !</strong></font>";


    }


    


    //close db connection


   


}




















?>