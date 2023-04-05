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

   
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");         
 






?><!DOCTYPE html>
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

 <div class="col-sm-6 text-left">

                       <h3 style="float: right;color: green;"><?php echo @$_GET['msg'];?></h3>

                    </div>
                   

                </div><br />
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                               Link  Management
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <?php 
 $action = 'adlink';
          $update = false;
          $privileage = array();
          
      
            
            $user_id = $_GET['pid'];
           
            $update = true;
            
            // get product information
             $where = " where user_id='".$_SESSION['user_id']."'";
             $args_user_edit = $mxDb->get_information('admin', '*', $where, true, 'assoc');
             
             $privileage = array();
             $where_privileage = " where admin_id='".$_SESSION['user_id']."'";
             // get privileage
             $args_privileage = $mxDb->get_information('link_privileges', 'privilege_page', $where_privileage, false, 'assoc');
             
             if( $args_privileage ){
               foreach( $args_privileage as $privil ){
                 $privileage[] = $privil['privilege_page'];
               }
             }
             
          

                            ?>
                            <div class="table-responsive">
<form class="form-horizontal" role="form" name='myform' id='myform' method="post" action="" enctype="multipart/form-data" autocomplete='off'>
<input type="hidden" name="action" value="<?php echo $action; ?>"/>

<input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>"/>

                                <div class="col-md-6">
                                 <div class="form-group" >
                                    <label for="inputEmail1" style='width: 40%;' class="col-lg-2 col-sm-2 control-label"><b></b></label><br><br>
                                    <div class="col-lg-10">
                  <?php $men=mysql_query("select * from link_privileges where admin_id='".$_SESSION['user_id']."' ");
                   while($menu=mysql_fetch_array($men))
                   { ?>

                    <?php 
 $link_name=mysql_fetch_array(mysql_query("select * from sub_admin_sub_category where link='".$menu['privilege_page']."'"));
                    $link=$menu['privilege_page'];?>
                          
                           <?php echo $link_name['sub_cat_name'];?><br/><?php  } ?>
                                       
                                    </div>
                                </div> 

                                </div>


                                
                              
                                

                                 


                              


                                <!--   <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail1" style='width: 35%;'  class="col-lg-2 col-sm-2 control-label"><b>Staff Management</b></label><br><br>
                                    <div class="col-lg-10">
                  <?php $men=mysql_query("select * from sub_admin_sub_category where cat_id='11'");
                   while($menu=mysql_fetch_array($men))
                   { ?>
                    <?php $link=$menu['link'];?>
                          
                          <input type="checkbox" name="privileage[]" <?php if(in_array($link,$privileage)):?> checked <?php endif; ?>  value="<?php echo $link;?>" /> <?php echo $menu['sub_cat_name'];?><br/><?php  } ?>
                                       
                                    </div>
                                </div>
                                </div> -->
                                <div style='clear:both'></div>
                                       
                               
                            </form>





                            </div>
                        </section>
                    </div>

                </div>

            </div>
			 
			<script type="text/javascript" src="js/sha256.js"></script> 
<script>	 
function hash()   
{
	 
var password=document.myform.password.value;
var cpass=document.myform.cpass.value;
var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{7,20}$/;
if (password=="")
  {
  alert("Password must be filled out");
  document.myform.password.focus();
   return false;
  }
  if (password!=cpass)
  {
  alert("Confirm password Password must be Same");
  document.myform.cpass.focus();
   return false;
  }
  
if(!re.test(password)) {
 alert("Error: password must contain at least one uppercase,Lower,spaciel char and one number,total 8 char!");
 document.myform.password.focus();
 return false;
 }
 if(password.length != 0)
{
   document.myform.password.value=sha256(password);
   document.myform.cpass.value=sha256(cpass);
 }
}
</script>
			
                       <!--body wrapper end-->


            <!--footer section start-->
           <?php include("footer.php");?>
            <!--footer section end-->



        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->


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

</body>
</html>