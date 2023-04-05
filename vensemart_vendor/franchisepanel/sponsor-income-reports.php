<?php
include("../lib/config.php");
include("pagignation.php");


// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999);

 
?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <?php include("header.php");?>

    <!--easy pie chart-->
    <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="css/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="css/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
   
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

  

    
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
               <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
                    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">

                  

                </div><br />

                <div class="row">
                    <div class="col-sm-12 text-right">
                      <!--   <a href="export_sponsor_income_report.php" class="btn btn-success">Export In Excel</a> -->
                    </div>
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                Franchise Direct Income

                              
      
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>

                              </br>
    
  
                           <div>

                              <div class="table-responsive">
                                  <form name="widget" method="post"  action="">
                                   <div class="search-name" style="float: right; margin-bottom:20px;"> <strong> Search Here</strong> <strong>:</strong>
        <input type="text" name="search" class="input" maxlength="200" value="<?=$search;?>" />
        <input type="submit" name="submit"  value="submit" class="btn btn-success" />
      </div>
      </form>

                        <table border="1px" class="table table-bordered table-hover role" style="background:#FFF; border-color:#000;">
                          <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    Userid
                                </th>
                                <!--<th style="text-align:center;">
                                    Username
                                </th>-->
                                <th style="text-align:center;">
                                    Full Name
                                </th>
                                  <th style="text-align:center;">
                                   Sender Id
                                </th>
                                <th style="text-align:center;">
                                    Commission
                                </th>
                                <th style="text-align:center;">
                                    TDS
                                </th>
                                <th style="text-align:center;">
                                    Net Amount
                                </th>
                              <!--   <th style="text-align:center;">
                                    Transaction Type
                                </th>
                                <th style="text-align:center;">
                                    Remark
                                </th> -->
                                <th style="text-align:center;">
                                    Status
                                </th>
                                 <th style="text-align:center;">
                                   Date
                                </th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $search=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_REQUEST['search']));
                              $config_query_count="SELECT count(id) as counter from credit_debit where ttype='Franchise Direct Income' ";
                              $config_query_record="SELECT * from credit_debit where ttype='Franchise Direct Income' ";

                          		if($search!='')
                          		{
                             // echo $search;die;

                          			$config_query=" AND  (user_id LIKE '%".$search."%' || username LIKE '%".$search."%')";
                          				             
                          		}
                          		
                          	
                              	$config_query.=" order by id asc";
                              	$config_query_count.= $config_query;	
                              	$config_query_record.= $config_query;	
                              	//echo $config_query_record;die;
                              	$res_config_count=mysqli_query($GLOBALS["___mysqli_ston"],$config_query_count);
                              	$num_rec= mysqli_fetch_array($res_config_count);
                                  $num=$num_rec['counter'];
                                  
                                       
                                  $per_page=PER_PAGE_ADMIN;
                              		$values = new Paging();
                              		$valu=$values->getpage_data($num, $per_page);
                              		$val=explode("~",$valu);
                              		$cur=$val[0];
                              		$start=$val[1];
                              		$max_pages=$val[2];
                              		$config_query_record.=" LIMIT $start, $per_page " ;
                          	
                              	 $data=mysqli_query($GLOBALS["___mysqli_ston"],$config_query_record);
                              		if($num>0)
                                      {	
                                           $row = 0;
                                           if($_REQUEST['startp']!='' || $_REQUEST['startp']!=0){
                                              $row = 0;
                                              $allcount = $num;

                                              $val = $row + $_REQUEST['startp'];
                                              if( $val < $allcount ){
                                                  $row = $val;
                                              }
                                          }
                                          if($start!='0')
                                          {
                                              $row = $start;
                                              $allcount = $num;

                                              $val =  $start;
                                              if( $val < $allcount ){
                                                  $row = $val;
                                              }
                                          }
                                          
                                         $sno = $row + 1;
                                        while($row_config=mysqli_fetch_array($data))
                          				{
                          			     
 ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $sno;?>
                                </td>
                                <td>
                                    <?php echo $row_config['user_id'];?>
                                </td>
                                <!--<td>-->
                                    <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$row_config['user_id']."'")); //echo $user['username'];?>
                                <!--</td>-->
                                <td>
                                    <?php echo $user['first_name']." ".$user['last_name'];?>
                                </td>
                                
                                 <td>
                                    <?php echo $row_config['sender_id'];?>
                                </td>
                                
                                <td>
                                     <?php echo number_format($row_config['credit_amt']+$row_config['admin_charge'],2);?>
                                </td>
                                <td>
                                     <?php echo number_format($row_config['admin_charge'],2);?>
                                </td>
                                <td>
                                     <?php echo number_format($row_config['credit_amt'],2);?>
                                </td>
                              <!--   <td>
                                  <?php echo $row_config['ttype'];?>
                                </td>
                                <td>
                                     <?php 
                                    echo $row_config['TranDescription'];

                                      


                                     ?>
                                </td> -->
                                <td>
                                     <?php if($row_config['status']==0) echo "Paid"; else echo "Pending";?>
                                </td>
                                 <td>
                                     <?php echo $row_config['receive_date'];?>
                                </td>

                                
                               
                            </tr>
           
                          <tbody>
                            <?php
                            
                                        $sno ++;
                    			      }
                    			      
                    			       // $_SESSION['start_page']=$i;    
                    			       ?>
                    			         <input type="hidden" name="row" value="<?php echo $row; ?>">
                    			          <input type="hidden" name="allcount" value="<?php echo $num; ?>">
                    			       <?
                    					$p="search=".$search;
                    					$getpaging = new Paging();
                    					$getpage=$getpaging->get_paging($num, $start, $cur, $max_pages, $p, $per_page);
                    				} 
                                    else
                    				{
                    					
                    					?>
                                <tr>
                                  <td align="center" colspan="12"><font color="#FF0000">Sorry no data found !</font></td>
                                </tr>
                                <?
                    					
                    					}
                                    
                                
                              ?>       
                      
                            </tbody>
                          </table>
                        </div>
                      </div>
                          
                    </section>

                  </div>

                </div>

            </div>
            <!--body wrapper end-->


            <!--footer section start-->
           <?php include("footer.php");?>
            <!--footer section end-->



        </div>
        <!-- body content end-->
    </section>


 <script type="text/javascript">
/*$( document ).ready(function() {
$('#employee_grid').DataTable({
         "bProcessing": true,
         "serverSide": true,        
  "pageLength": 20,
         "ajax":{
            url :"response.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
          }
        });   

      
});
*/

</script>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery.min.js"></script>
<script src="js/switchery-init.js"></script>

<!--flot chart -->
<script src="js/jquery.flot.js"></script>
<script src="js/flot-spline.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.tooltip.min.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.selection.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>

<!--Data Table-->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.tableTools.min.js"></script>
<script src="js/bootstrap-dataTable.js"></script>
<script src="js/dataTables.colVis.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/dataTables.scroller.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<!--data table init-->
<script src="js/data-table-init.js"></script>

<!--common scripts for all pages-->

<script src="js/scripts.js"></script>




<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js">
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
       


</body>
</html>