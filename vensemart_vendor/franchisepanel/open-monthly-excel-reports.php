<?php 
ob_start();
include("../lib/config.php");
/*   CSV Export*/
			  function escape_csv_value($value) {
    $value = str_replace('"', '""', $value); // First off escape all " and make them ""
    if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
        return '"'.$value.'"'; // If I have new lines or commas escape them
    } else {
        return $value; // If no new lines or commas just return the value
    }
}

function redirectURL($url) {
	    echo '<script> window.location.href="'.$url.'"
		</script>"';

}

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=open-monthly-excel-reports.csv");
header("Pragma: no-cache");
header("Expires: 0");
		   if(isset($_POST['Show']))
		   {
			   $from=$_POST['from'];
               $end_date=$_POST['end_date'];
			   $id=$_POST['list'];
			   $query123=$_POST['qry'];
			   $date=date('Y-m-d');
			   $description=$_POST['description'];


                              

			  
			  	    $title = '';
              $title .= "Userid,Matching Income,Direct Income ,Repurchasing Bonus,Sales Rank Reward,Travel/Car/House Fund Income,Quick Promotion Bonus,Franchie Bonus,Total,Beneficiary Name ,Beneficiary Ac No,Bank Name,Branch Name,IFSC,Start Date,End Date"."\n";
         echo $title;
if(!empty($id))
{
    foreach($id as $check) 
    {
			  
      			$selectuser_id=$check;
      			$request_amount=$amount['amt'];
            $request_amount=$request_amount;// $sql = "select * from user_registration where user_rank_name='Affiliate' and master_account!='Sub Account' and  user_id='$check'";
            $sql = "select * from user_registration where user_rank_name='Affiliate' and  user_id='$check'";
            $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						$totc_unpaid = 0;
						$total = 0;
						$content = '';

						while($data1=mysqli_fetch_assoc($res))
						{
  $bank=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from bank_statement_proof_list where user_id='".$data1['user_id']."'")); 
                       $occDate=$data1['activation_date'];
                        $forOdNextMonth= date("Y-m-d", strtotime("+1 month", strtotime($occDate)));                    
                        $direct=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],  "SELECT id from user_registration where ref_id='".$data1['user_id']."' and user_rank_name='Affiliate'"));
                        
                      
                              $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot1 from credit_debit where user_id='".$data1['user_id']."' and ttype='Binary Income' and status=1 $query123")); 
                               if($data11['leadtot1']!='')
                              {
                                $tot1 = $data11['leadtot1'];
                              }
                              else
                              {
                                $tot1 = 0;
                              }

                               $data12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot2 from credit_debit where user_id='".$data1['user_id']."' and ttype='Direct Income' and status=1 $query123")); 
                               if($data12['leadtot2']!='')
                              {
                                $tot2 = $data12['leadtot2'];
                              }
                              else
                              {
                                $tot2 = 0;
                              }

                             $data13=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot3 from credit_debit where user_id='".$data1['user_id']."' and ttype='Repurchasing Bonus' and status=1 $query123")); 
                               if($data13['leadtot3']!='')
                              {
                                $tot3 = $data13['leadtot3'];
                              }
                              else
                              {
                                $tot3 = 0;
                              }


                               $data14=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot4 from credit_debit where user_id='".$data1['user_id']."' and ttype='Sales Rank Reward' and status=1 $query123")); 
                                 if($data14['leadtot4']!='')
                                {
                                  $tot4 = $data14['leadtot4'];
                                }
                                else
                                {
                                  $tot4 = 0;
                                }



                               

                                 $data15=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot5 from credit_debit where user_id='".$data1['user_id']."' and ttype='Fund Income' and status=1 $query123")); 
                                 if($data15['leadtot5']!='')
                                {
                                  $tot5 = $data15['leadtot5'];
                                }
                                else
                                {
                                  $tot5 = 0;
                                }

                               
                             $data16=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot5 from credit_debit where user_id='".$data1['user_id']."' and ttype='Quick Promotion Bonus' and status=1 $query123")); 
                                 if($data16['leadtot5']!='')
                                {
                                  $tot6 = $data16['leadtot5'];
                                }
                                else
                                {
                                  $tot6 = 0;
                                }
                                
                                $data17=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot5 from credit_debit where user_id='".$data1['user_id']."' and ttype='Franchie Bonus' and status=1 $query123")); 
                                 if($data17['leadtot5']!='')
                                {
                                  $tot7 = $data17['leadtot5'];
                                }
                                else
                                {
                                  $tot7 = 0;
                                }
                               


                                if($tot1>0 || $tot2>0 || $tot3>0 || $tot4>0 || $tot5>0 || $tot6>0 || $tot7>0)
                                {
                                     $total=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7;
                                			$total1=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7;
                                		
                                	         $content .= escape_csv_value(trim($data1['user_id'])).",";
                              	           $content .= escape_csv_value(number_format($tot1,2)).",";
                        	                 $content .= escape_csv_value(number_format($tot2,2)).",";
                    	                     $content .= escape_csv_value(number_format($tot3,2)).",";
          	                               $content .= escape_csv_value(number_format($tot4,2)).",";
                                	                             
                                           $content .= escape_csv_value(number_format($tot5,2)).",";
                                           $content .= escape_csv_value(number_format($tot6,2)).",";
                                           $content .= escape_csv_value(number_format($tot7,2)).",";
                                      
                                           $content .= escape_csv_value(number_format($total1,2)).",";
                                           $content .= escape_csv_value($bank['acc_name']).",";
                                           $content .= "'".escape_csv_value(trim($bank['ac_no'])).",";
                                    	     $content .= escape_csv_value($bank['bank_name']).",";
                                    	     $content .= escape_csv_value($bank['branch_nm']).",";
                              		         $content .= escape_csv_value(trim($bank['swift_code'])).",";
                                	         $content .= escape_csv_value($date).",";
                                           $content .= escape_csv_value($from).",";
                                            $content .= escape_csv_value($end_date).",";
                                					 $content .= "\n";
                                  } 
                          

                         }

                    $invoice_no=rand(100000,999999);
                    	
                    	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                    
                      mysqli_query($GLOBALS["___mysqli_ston"], "insert into closing_credit_debit values(NULL,'$invoice_no','$check','$total','$tot1','$tot3','$tot4','$tot5','$tot6','$tot2','$tot7','$end_date','NA','NA')");	  
       $title .= "Userid,Matching Income,Direct Income ,Repurchasing Bonus,Sales Rank Reward,Travel/Car/House Fund Income,Quick Promotion Bonus,Franchie Bonus,Total,Beneficiary Name ,Beneficiary Ac No,Bank Name,Branch Name,IFSC,Start Date,End Date"."\n";                
                      	$z=mysqli_query($GLOBALS["___mysqli_ston"], "update credit_debit set status=0 where user_id='$check' and status=1 and (ttype='Binary Income' || ttype='Direct Income' || ttype='Repurchasing Bonus' || ttype='Sales Rank Reward' || ttype='Quick Promotion Bonus' || ttype='Franchie Bonus' || ttype='Fund Income') $query123");	
 
                    echo $content;


}	
   }	}   
		 
			
			
			
			 //header("location:withdrwal-request-manage.php");
		
		   
		   
		   ?>
		   