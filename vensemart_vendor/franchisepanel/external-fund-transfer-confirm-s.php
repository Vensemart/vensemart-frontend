<?php 
ob_start();
include("includes/header.php");
if($_POST['amounts']=='' || $_POST['user']=='')
{
   echo "<script language='javascript'> alert('Enter Details!'); window.location.href='external-fund-transfer-s.php'; </script>";
}

if(is_numeric($_POST['amounts']))
{
}
else
{
   echo "<script language='javascript'> alert('Enter Numbers only!'); window.location.href='external-fund-transfer-s.php'; </script>";
}


 if( $_POST['t_password'] != $f['password'] )
      {
        
          echo "<script language='javascript'> alert('Wrong Password!'); window.location.href='external-fund-transfer-s.php'; </script>";
        }

      $roesding=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));
 if( $roesding['user_id'] == $f['user_id'] )
      {
        
          echo "<script language='javascript'> alert('You Cannot transfer to your own account!'); window.location.href='external-fund-transfer-p.php'; </script>";
        }


$roesd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));

if($roesd==0)
      {
          echo "<script language='javascript'> alert('Sorry no such member found!'); window.location.href='external-fund-transfer-s.php'; </script>";
      }
      else
      {
        $roesding=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));
        $usersid=$roesding['user_id'];

        // $newcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where (income_id='".$f['user_id']."' || down_id='".$f['user_id']."') and (income_id='$usersid' || down_id='$usersid')"));
        // if($newcount>0)
        // {}
        // else
        // {
        //       echo "<script language='javascript'> alert('User not found in your  team!'); window.location.href='external-fund-tranfer-s.php'; </script>";
        // }


      }





?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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

                      <div class="row">
                             <div class="col-md-12">
                                <div class="card-box">
                                    
  <form name="bankinfo" method="post" action="external-fund-transfer-code-s.php">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Shopping Wallet fund transfer confirmation</h3>
                </header>
               
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="shopping_e_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Confirm Userid / Username</label>
                      <div class="input-group">
                      
                        <?php echo $_POST['user'];?>
                        <input type="hidden" name="user" required value="<?php echo $_POST['user'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Confirm amount to transfer</label>
                      <div class="input-group">
                       
                        <?php echo $_POST['amounts'];?>
                        <input type="hidden" name="amounts" required value="<?php echo $_POST['amounts'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                         
              <input type="hidden" name="t_password" required value="<?php echo $_POST['t_password'];?>" class="form-control" id="exampleInputAddress">
                     
                 
                  <input type="submit" name="update" value="Transfer" class="btn btn-primary">       
              </section>

</form>
                                




                                
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