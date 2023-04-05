<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
<?php include("includes/tittle.php");?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        

        <!-- App css -->
       <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/core.css" rel="stylesheet" type="text/css" />
        <link href="css/components.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.css" rel="stylesheet" type="text/css" />
        <link href="css/pages.css" rel="stylesheet" type="text/css" />
        <link href="css/menu.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php  include("includes/topbar.php"); ?>

            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
           <?php  include("includes/sidebar.php"); ?>
            <!-- Left Sidebar End -->
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                       <br/>
                        <!-- end row -->
<span style="color:#F00; font-size:14px; font-weight:bold; text-align:center;"> <?php $my_str=$_GET['msg'];echo urldecode($my_str); print_r("<br/>"); ?> </span>
                      <div class="row">
                             <div class="col-md-12">
                                <div class="card-box">
                               <header class="panel-heading" style="margin-bottom: 0px;">
             <!--<img src="images/logo.png" class="big-logo" style="width: 200px;"> -->
          
            </header>
            <div class="panel-body"> 
            <p style="color:red;float:right;"><?php echo $_GET['msg'];?></p>
      <?php      
      $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from popup where id='7'"));
      if ($data['status']==1) {
 
      ?>      

                    <form name="bankinfo" method="post" action="external-fund-transfer-confirm.php">
     
                    <section class="panel">
                 <header class="panel-heading">
                  <h3 class="panel-title">Income To System Wallet fund transfer</h3>
                <br/>
                 <br/> <h3 class="panel-title">Income-Wallet Ballance : $ <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><strong><?php  echo number_format($_SESSION['rates']*$data['amount'],2);?></strong> </h3>
                <br/></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_apin_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Enter Recipient User ID / Username</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="user" id="sponsorid" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                      <span id="checksponser"></span>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Enter Amount to Transfer</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
              
                 
                       
                 <input type="number" name="amounts" required value=""  class="form-control" id="exampleInputAddress">

                      </div>
                    </div>
                         <div class="form-group">
                      <label for="exampleInputAddress">Enter Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
            
                  <input type="submit" name="update" value="Transfer" class="btn btn-primary">  
                  
                
              </section>

</form>

    <?php

}
              ?>
              <!--<hr>-->
            
            </div>



                                </div>
                            </div>
                        </div>


                       
                        <!-- end row -->

                    </div> <!-- container -->

            <!-- content -->

              <?php  include("includes/footer.php"); ?>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/jquery.slimscroll.js"></script>

        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>

        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.bootstrap.min.js"></script>
        <script src="js/jszip.min.js"></script>
        <script src="js/pdfmake.min.js"></script>
        <script src="js/vfs_fonts.js"></script>
        <script src="js/buttons.php5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>
        <script src="js/dataTables.fixedHeader.min.js"></script>
        <script src="js/dataTables.keyTable.min.js"></script>
        <script src="js/dataTables.responsive.min.js"></script>
        <script src="js/responsive.bootstrap.min.js"></script>
        <script src="js/dataTables.scroller.min.js"></script>
        <script src="js/dataTables.colVis.js"></script>
        <script src="js/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="js/jquery.datatables.init.js"></script>

        <!-- App js -->
        <script src="js/jquery.core.js"></script>
        <script src="js/jquery.app.js"></script>
        
        <script type="text/javascript">
    
    $(document).ready(function() {
    $("#sponsorid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var sponsorid = $(this).val();
    if(sponsorid.length < 1){$("#checksponser").html('');return;}
    if(sponsorid.length >= 1){
    $("#checksponser").html('<img src="images/preloader.gif" />');
    $.post('check_reciever_id.php', {'sponsorid':sponsorid}, function(data) {
    $("#checksponser").html(data);
    });
    }
    }); 
    });
  
  </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>


    </body>
</html>