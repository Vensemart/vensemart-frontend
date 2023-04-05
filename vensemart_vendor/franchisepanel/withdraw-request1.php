<?php include("includes/header.php");
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
<style type="text/css">
  .pp 
  {
    border: 1px solid rgb(236, 127, 99);
    padding: 50px;
    margin: 20px;
  }
</style>
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

               <div class="row" >
                  <div class="col-md-8 col-md-offset-2">
                      <div class="card-box pp" >
                        <center><strong style="color: red; font-size: 15px;"><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></strong></center>
              <form name="bankinfo" method="post" action="withdrawal-request-confirm1.php">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Withdrawal Request Form</h3>
                <br/>
                 <br/> <h3 class="panel-title">Investment Profit Wallet : $<?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from investment_wallet where user_id='$userid'"));?><strong><?php echo number_format($_SESSION['rates']*$data['amount'],2);?></strong></h3><br/>
                <p>Note: Please note that it will take 7 working days for the withdrawal to be credited into your bank account. (subject to bank processing time). Any withdrawal amount of less than $350 will impose processing fees of 5%.</p> 
               
                <br/></header>
                <div class="panel-body">
            <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="investment_wallet" checked="checked" />
           <div class="form-group">
                      <label for="exampleInputAddress">First Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject1" type="text" tabindex="1" value="<?php echo $f['first_name'];?>"style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="exampleInputAddress">Last Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject2" type="text" tabindex="1" value="<?php echo $f['last_name'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>
<div class="form-group">
                      <label for="exampleInputAddress">Withdrawal Type</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                       <select name="pay_mode" id="pay_mode3" style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control">
                            <option value="">--please select--</option>
                    <!--     <option value="BTC Withdrawal">BTC Withdrawal</option> -->
                         <option value="Bank Withdrawal">Bank Withdrawal</option> 
                         <!--     <option value="Ethereum Withdrawal">Ethereum Withdrawal</option>
                      <option value="IMPS Withdrawal">IMPS Withdrawal</option>-->
                       </select>
                      </div>
                    </div>
                    <div class="form-group" style="display: none;" id="btc">
                      <label for="exampleInputAddress">BTC Address</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="btc_address" type="text" tabindex="1" value="<?php echo $f['btc_address'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress"  />
                  
                      </div>
                    </div>
                      <div class="form-group" style="display: none;" id="acc_name">
                      <label for="exampleInputAddress">Account Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject3" type="text" tabindex="1" value="<?php echo $f['acc_name'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress"  />
                      </div>
                    </div>

  <div class="form-group" style="display: none;" id="ac_no">
                      <label for="exampleInputAddress">Account Number</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject4" type="text" tabindex="1" value="<?php echo $f['ac_no'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress"  />
                      </div>
                    </div>


  <div class="form-group" style="display: none;" id="bank_name">
                      <label for="exampleInputAddress">Bank Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject5" type="text" tabindex="1" value="<?php echo $f['bank_nm'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress"  />
                      </div>
                    </div>


  <div class="form-group" style="display: none;" id="branch_nm">
                      <label for="exampleInputAddress">Branch Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject6" type="text" tabindex="1" value="<?php echo $f['branch_nm'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress"  />
                  
                      </div>
                    </div>



                  <div class="form-group" style="display: none;" id="swift_code">
                      <label for="exampleInputAddress">Swift Code</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject7" type="text" tabindex="1" value="<?php echo $f['swift_code'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress"  />
                  
                      </div>
                    </div>

  <div class="form-group">
                      <label for="exampleInputAddress">Enter Amount</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject8" type="number" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>


  <div class="form-group">
                      <label for="exampleInputAddress">Description</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject9" type="text" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="exampleInputAddress">Enter Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="password" type="password" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>

   <input name="wallet_from" id="wallet_from" type="hidden" tabindex="1" value="withdrawal" />
                <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />
                           
                





          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

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
<script>
$(document).ready(function(){
  $("#pay_mode3").on('change',function(){
        // alert("hello");
   var txt = $(this).val();
   if (txt == 'BTC Withdrawal')
   {
     
     // $("#ethereum").hide();
      $("#bank").hide();
      $("#acc_name").hide();
        $("#ac_no").hide();
        $("#mobile_no").hide();
        $("#bank_name").hide();
        $("#branch_nm").hide();
        $("#swift_code").hide();
        $("#check").hide();
         $("#btc").show();
         /* $("#amount").show();
        $("#desc").show();
        $("#password").show();
         $(".btn").show();
         $('#formId').attr('action', 'withdrawal-request-confirm-bank.php');*/
      
   }
   
    if (txt == 'Bank Withdrawal')
   {
        $("#check").hide();
        $("#btc").hide();
        $("#ethereum").hide();
        $("#acc_name").show();
        $("#mobile_no").show();
        $("#ac_no").show();
        $("#bank_name").show();
        $("#branch_nm").show();
        $("#swift_code").show();
        /*$("#amount").show();
        $("#desc").show();
        $("#password").show();
         $(".btn").show();
         $('#formId').attr('action', 'withdrawal-request-confirm-bank.php');*/
       
      
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