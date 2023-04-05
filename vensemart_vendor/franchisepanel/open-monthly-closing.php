<?php
include("../lib/config.php");
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

if($_POST[submit])
{

$frm=$_REQUEST['date'];
$end_date=$_REQUEST['end_date'];

  if($end_date!='')
  {
    
  $query123=" and  receive_date<='$end_date'";  
    
  }
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
                  <div class="col-sm-12 text-right">

              
                    
                     </div>
                    
                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Open Payout Report
        
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>



    
   
    <div class="total_invoice"  id="printArea">
<br/>
     <form class="form-inline" role="form" method="post" autocomplete="off">
                               
                           
                                <div class="form-group" id="date">
                                  <label for="date" class="col-lg-4 col-sm-4 control-label">Payout End Date</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="end_date" class="form-control" id="datepicker1" placeholder="YYYY-MM-DD" value="<?php echo $end_date;?>">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                            <hr/><br/>


                            <div class="table-responsive">
 <form name="myform" onSubmit="return ValidateData(this);" method="post"  action="open-monthly-excel-reports.php">
                                    <input type="hidden" name="qry" value="<?php echo $query123;?>">
                                      <input type="hidden" name="from" value="<?php echo $frm;?>">
                                      <input type="hidden" name="end_date" value="<?php echo $end_date;?>">
                                         <input type="hidden" name="from" value="<?php echo $frm;?>">

                            <table border="1" style="width:100%;margin:10px;">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                 <th style="text-align:center;">
                                    <input type="button" name="Check_All" value="Check All" onclick="Check(document.myform.check_list)" />
                                </th style="text-align:center;">
                                <th style="text-align:center;">
                                    Userid
                                </th>
                                 <th style="text-align:center;">
                                    Full Name
                                </th> 
                            <th style="text-align:center;">
                                 Matching Bonus
                                </th>
                                <th style="text-align:center;">
                                  Direct Income 
                                </th>
                                <th style="text-align:center;">
                                 Repurchasing Bonus
                                </th>
                                 <th style="text-align:center;">
                                 Sales Rank Reward
                                </th>
                                <th style="text-align:center;">
                                    Travel/Car/House Fund Bonus
                                </th>
                                  <th style="text-align:center;">
                                  Quick Promotion Bonus
                                </th>
                                  <th >
                                 Franchie Bonus
                                </th>
                             
                            
                                <th style="text-align:center;">
                                     Total 
                                </th> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php 

                            if($_POST[submit])
                              {
                                  $i=1;
                                  // $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name='Affiliate' and master_account!='Sub Account'");
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration ");
                                  while($data1=mysqli_fetch_array($data))
                                    {
$direct=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],  "SELECT id from user_registration where ref_id='".$data1['user_id']."' and user_rank_name='Affiliate'"));
                                      // $next_date = date('Y-m-d', strtotime($data1['activation_date'] . ' +1 day'));
$occDate=$data1['activation_date'];

 $forOdNextMonth= date("Y-m-d", strtotime("+1 month", strtotime($occDate)));
 $date=$frm;
   
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
                              
                              $data14=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot3 from credit_debit where user_id='".$data1['user_id']."' and ttype='Sales Rank Reward' and status=1 $query123")); 
                               if($data14['leadtot3']!='')
                              {
                                $tot4 = $data14['leadtot3'];
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

                                 
                                $data18=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot5 from credit_debit where user_id='".$data1['user_id']."' and ttype='Franchie Bonus' and status=1 $query123")); 
                                 if($data18['leadtot5']!='')
                                {
                                  $tot7 = $data18['leadtot5'];
                                }
                                else
                                {
                                  $tot7 = 0;
                                }


                                if($tot1>0 || $tot2>0 || $tot3>0 || $tot4>0 || $tot5>0 || $tot6>0 || $tot7>0)
                                {

                                                              
                                     ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                 <td>
                                    <input type="checkbox" name="list[]" id="list[]" value="<?php echo $data1['user_id'] ?>">
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                                 <td>
                                    <?php echo $data1['first_name']."".$data1['last_name'];?>
                                </td> 
                              <!--  <td>
                                    <?php echo $data1['first_name'];?>
                                </td>-->
                                  <td><?php echo number_format($tot1,2);?> </td>
                                <td><?php echo number_format($tot2,2);?> </td>
                                <td><?php echo number_format($tot3,2);?> </td>
                               
                            
                              
                                <td><?php echo number_format($tot4,2);?> </td>
                                
                                <td><?php echo number_format($tot5,2);?> </td>
                                
                                <td><?php echo number_format($tot6,2);?></td>
  <td><?php echo number_format($tot7,2);?></td>
                                 <td><?php echo number_format($tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7,2);?></td>



                            </tr>
                            <?php $i++;} } }  ?>
                            
                      
                            </tbody>
                            </table>
                             <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                     
                                        <input name="Show" type="submit" class="btn btn-primary" id="Show" value="Generate Payout" onClick="setTimeout('window.location.reload()',3000);">
                                    </div>
                                </div><br/><br/></form>
                            </div></div>
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


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js">
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>

              <script>
  $( function() {
    $( "#datepicker" ).datepicker({"dateFormat": "yy-mm-dd"});
  } );
   $( function() {
    $( "#datepicker1" ).datepicker({"dateFormat": "yy-mm-dd"});
  } );
  </script>


</body>
</html>