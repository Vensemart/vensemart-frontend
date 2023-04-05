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

                      <div class="row">
                             <div class="col-md-12">
                                <div class="card-box">
                            <section id="page-title" class="row">

          <div class="col-md-2">
            <!--<h1>My Withdrawal Request</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-8 text-center" style="">
        <!-- <?php if(date('D')=='Tue'){ ?> -->
             
        <!--    <?php }else{ ?><p style="color: red;font-style: italic;font-weight: 600;">Withdrawal can only be rquested at Tuesday</p> <?php }?> -->

<?php $quest=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from popup where id='4'"));

if ($quest['status']==1) {
 
      ?>

         <a href="withdraw-request1.php"><input type="submit" name="update" value="New Request Click Here" class="btn btn-primary btn-large"></a>  
   <?php     }   ?>
          </div>
           <div class="col-md-2">
            <!--<h1>My Withdrawal Request</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>
        </section>   <br>     

        <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Withdrawal Request</h4>
                </header>
                <div class="panel-body table-responsive">

                    <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Transaction No</th>
                          <th>Mentor Details</th>
                        <th>Requested Amount</th>
                        <th>Transaction Charge</th>
                        <th>Request date </th>
                        <th> Remark </th>
                        <th>Response Date</th>
                        <th>Status</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request1 where user_id='$userid' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['transaction_number'];?></td>
                             <td>
                                    <?php 
                                    if ($data1['mentor']!='') {
                                      
$data22=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1['mentor']."'"));?>
                           Name:   <?php      echo $data22['first_name']; ?>&nbsp;<?php echo $data22['last_name']; ?>
                                    </br>Telephone No: <?php  echo $data22['telephone']; 


                                    }
                                    ?>
                                </td>
                         <td><?php echo $data1['request_amount'];?></td>
                                <td><?php echo $data1['transaction_charge'];?> %</td>
                          <td><?php echo $data1['posted_date'];?></td>
                  <td><?php echo $data1['admin_remark'];?></td>
                          <td><?php echo $data1['admin_response_date'];?></td>
                          <td><?php if($data1['status']==0)
                                    { 
                                        //echo "Pending";  ?>
                                            <a href="cancelled_user_withdrawal1.php?user=<?php echo $data1['user_id'];?>&id=<?php echo $data1['id'];?>" class="btn btn-danger" title="Click To Cancel">Cancel Request</a>
                                    <?php }
                                      if($data1['status']==1)
                                    { 
                                        echo "Paid";
                                    }
                                     if($data1['status']==2) 
                                    { 
                                        echo "Cancelled";
                                    }
                                    ?>
                            </td>
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>


                </div>
                  </section>   








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
                    } <th>Requested Amount</th>
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