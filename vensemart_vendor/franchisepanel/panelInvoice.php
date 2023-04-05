<?php include("header.php");
unset($_SESSION["InCart"]);
if (isset($_GET['i']) && isset($_GET['a'])) {
  if ($_GET['i'] != '' && $_GET['a'] != '') {
    $BT = $_GET['i'];
    $SenderType = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['a']);
    if ($BT == 3) {
     $BillingType = 'Shoppe Sponsoring Invoice';
     $Tables = 'shopee_registration';
     $IdTitle = 'Shoppe Id';
     $Comms = 2.5;
     $XyS = 'HS';
     $qtS = 1;
     $ProductTable = 'user_stock_sponsoring';
    } elseif ($BT == 4) {
      $BillingType = 'Shoppe Repurchase Invoice';
      $Tables = 'shopee_registration';
      $IdTitle = 'Shoppe Id';
      $Comms = 2.5;
      $pack = '(In Pack)';
      $XyS = 'HR';
      $qtS = 2;
      $ProductTable = 'user_stock';
    } else{
      $BillingType = 'Not a valid Invoice Category';
    }
    
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
          
          .blink_me {
              /*animation: blinker 1s linear infinite;*/
              font-weight: bold;
              color: red;
              float: right;
            }

            @keyframes blinker {  
              50% { opacity: 0; }
            }


        </style>

  </head>

  <body class="">
    <div class="animsition">  
    
   
      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
   <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->
      <main id="playground">
        
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
   
      <?php include("top.php");?>
        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->

        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1><?=$BillingType;?></h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
         </div>
             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Shopee</a></li>
              <li><a href="#">Invoice</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-12">

              <section class="panel">
                <!-- <header class="panel-heading">
                  <h3 class="panel-title">Personal Information</h3>
                </header> -->
                <div class="panel-body">
                <span class="blink_me">Do Not Press BACK button or Refresh the page!!!</span>
                <form class="form-horizontal" role="form" method="post" action="CreateInvoiceCode.php">

                              <!-- Extra hidden fields -->

                                                             
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                <input type="hidden" name="comms" id="comms" value="<?php echo $Comms;?>">
                                <input type="hidden" name="BillingType" value="<?php echo $XyS;?>">
                                <input type="hidden" name="BillerId" id="BillerId" value="<?php echo $SenderType;?>">
                                <input type="hidden" name="BtsType" id="BtsType" value="<?php echo $qtS;?>">
                                <input type="hidden" name="Elbat" id="Elbat" value="<?php echo $Tables;?>">
                                <input type="hidden" name="Pdtbl" id="Pdtbl" value="<?php echo $ProductTable;?>">

                                <input type="hidden" name="subTotal" id="subTotalH" />
                                <input type="hidden" name="TaxValue" id="TaxValueH" />
                                <input type="hidden" name="grandTotal" id="grandTotalH" />
                                <input type="hidden" name="Commission" id="CommissionH" />
                                
                              <!-- Extra hidden fields closed -->
                         
                              <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $IdTitle;?></label>
                                    <div class="col-lg-3">
                                        <input type="text" name="sid" id="sid" class="form-control" list="browsers1" required="">
                                        <span id="checksponser"></span>
                                        <!-- <datalist id="browsers1">
                                          <?php $getProduct = mysqli_query($GLOBALS["___mysqli_ston"], "select user_id,first_name from $Tables");
                                            while($getProduct1 = mysqli_fetch_assoc($getProduct)){ ?>

                                            <option value="<?=$getProduct1['user_id']?>"><?=$getProduct1['first_name'].' {'.$getProduct1['user_id'].'}';?></option>

                                            <?php 
                                            }
                                           ?>

                                         </datalist> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Change Default Shipping Address?</label>
                                    <div class="col-lg-1">
                                        <input type="radio" name="shipping" onclick="show_div(this.value)" value="Yes"> Yes
                                      </div>
                                      <div class="col-lg-2">
                                        <input type="radio" name="shipping" onclick="show_div(this.value)" value="No" checked=""> No
                                       
                                    </div>
                                  
                                </div>

                                <div id="showMe" style="display: none;">

                                <div class="form-group">
                                
                                  <div class="col-lg-6">
                                        <input type="text" name="saName" id="saName" class="form-control"  placeholder="Enter First Name" />
                                    </div>

                                    <div class="col-lg-6">
                                        <input type="text" name="saLName" id="saLName" class="form-control"  placeholder="Enter Last Name" />
                                    </div>

                                    </div>

                                    <div class="form-group">
                                
                                  <div class="col-lg-6">
                                        <input type="text" name="saAddress" id="saAddress" class="form-control"  placeholder="Enter Your Address" />
                                    </div>

                                    <div class="col-lg-6">
                                        <input type="text" name="saCity" id="saCity" class="form-control"  placeholder="Enter Your City" />
                                    </div>

                                    </div>

                                    <div class="form-group">
                                
                                  <div class="col-lg-6">
                                      <select name="saState" id="saState" class="form-control">
                                        <option value="0">Select</option> 
                                        <?php $state = mysqli_query($GLOBALS["___mysqli_ston"], "select StateName, StateID from state order by StateName ASC");
                                        while($state1 = mysqli_fetch_assoc($state)){ ?>
                                        <option value="<?=$state1['StateName']?>"><?=$state1['StateName']?></option>
                                        <?php } ?>
                                      </select>
                                       
                                    </div>

                                    <div class="col-lg-6">
                                        <input type="text" name="saPin" id="saPin" class="form-control"  placeholder="Enter Pin Code" />
                                    </div>

                                    </div>

                                    <div class="form-group">
                                
                                  <div class="col-lg-6">
                                        <input type="text" name="saContact" id="saContact" class="form-control"  placeholder="Enter Contact Number" />
                                    </div>

                                    <div class="col-lg-6">
                                        <input type="text" name="saLandmark" id="saLandmark" class="form-control"  placeholder="Enter Landmark" />
                                    </div>

                                    </div>
                                    <hr/>

                                </div>

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Enter Product Details</label>
                                    
                                </div>

                                <div id="advChild">
                                  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"></label>
                                     
                                      <div class="col-lg-4">
                                          <input type="text" id="sku1" class="form-control" list="browsers" value="<?php echo @$_POST['sku'];?>" placeholder="SKU Code Or Product Name" onclick="return validate_user();" />
                                          <span id="ProductResponse"></span>

                                           <datalist id="browsers">
                                            <?php $getProduct = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT p.product_name, p.product_code FROM `products` as p INNER JOIN $ProductTable as us ON us.product_code = p.product_code where us.user_id = '$userid'");
                                              while($getProduct1 = mysqli_fetch_assoc($getProduct)){ ?>

                                              <option value="<?=$getProduct1['product_code']?>"><?=$getProduct1['product_name'].' {'.$getProduct1['product_code'].'}';?></option>

                                              <?php 
                                              }
                                             ?>

                                           </datalist>

                                      </div>

                                      <div class="col-lg-3">
                                          <input type="text" id="qty1" class="form-control" value="<?php echo @$_POST['qty'];?>" placeholder="Enter Pack" />
                                          <span id="CheckAvailQty"></span>

                                          <!--  <input type="text" name="qty[]" id="qty1" class="form-control" value="<?php echo @$_POST['qty'];?>" placeholder="Enter Pack" onblur="calculate(this.value, document.getElementById('sku1').value);" required=""> -->
                                      </div>
                                      <div class="col-lg-2" id="ShowBtn">
                                       <input type="button" name="mc_signup_submit" style='background:#65b688;border:0px' onclick="add_product(document.getElementById('sku1').value,document.getElementById('qty1').value);" value="Add" id="btn-add" class="btn btn-primary" />
                                       <!--  <input type="button" name="mc_signup_submit" style='background:#65b688;border:0px' value="Add" id="btn-add" class="btn btn-primary" onclick="return checklast(document.getElementById('qty'<?=$i?>).value)"> -->
                                      </div>
                                      <div class="col-lg-2" id="ShowBtnLoader" style="display: none">
                                       
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                <div class="col-lg-12">
                                  <table class="table table-striped" id="product_table">
                                    <thead>
                                      <tr>
                                        <th>S.No</th>
                                        <th>Product Name</th>
                                        <th>Quantity<?=$pack?></th>
                                        <th>Rate</th>
                                        <th>BV</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <!-- <tr >
                                        <td>#1</td>
                                        <td>Natural Magnesium Chloride</td>
                                        <td>2Pc</td>
                                        <td>400</td>
                                        <td>1,017.00</td>
                                        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
                                      </tr> -->
                                    </tbody>
                                  </table>
                                </div>
                              </div>   

                              <div class="clearfix"></div>

                              <div class="">
                              <div class="col-md-4">

                                <p><h5><strong>Mode Of Payment</strong></h5></p>
                                 <p><input type="radio" name="pay_mode" value="CASH" onclick="show_div_bill_type(this.value)" required /> Cash</p>
                                 <p><input type="radio" name="pay_mode" value="CHEQUE" onclick="show_div_bill_type(this.value)" required /> Cheque/ DD/ Transfer</p>
                                 
                                 <p style="display:none;" id="uprec">
                                    <input type="text" id="pay_remark" name="pay_remark" placeholder="Enter remark" class="form-control" /><br/>
                                  Upload Scan Copy: <input type="file" id="prooffile" name="pay_proof" class="file-control" />
                                  </p>

                              </div> 


                              <div class="col-md-4">

                                <span id="submitLoader" style="display: none;"><img src="images/loaderx.gif"></span>

                              </div>       

                              <div class="col-md-4">

                                <div class="form-group">
                                  <div class="">
                                    <table class="table table-striped">
                                     
                                      <tbody>
                                         <tr>
                                          <td><strong>Total BV:</strong></td><td><span id="subTotalBV" style="font-weight: bold;">00</td>
                                          </tr>
                                        <tr>
                                          <td>Sub Total:</td><td><span id="subTotal">0.00</span></td>
                                          </tr>
                                         
                                          <tr>
                                          <td>Taxes:</td><td><span id="TaxValue">0.00</td>
                                          </tr>
                                          <tr>
                                          <td><strong>Grand Total:</strong></td><td><span id="grandTotal" style="font-weight: bold;">0.00</td>
                                          </tr>
                                            <tr>
                                          <td>Commission (<?=$Comms?>%):</td><td><span id="Commission">0.00</span></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                  </div>
                                </div> 
                                <span id="submitLBtn">
                                <input type="submit" class="btn btn-primary" name="CreateInvoice" id="CreateInvoice" value="Submit" onclick="return confirmCheck();">
                                </span>
                              </div>   
                              </div> 
                            </form>
                  
                    </div>
                  </section>

            </div> <!-- / col-md-6 -->

            

            </div>

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->


<?php //include("footer.php");?>

    </main> <!-- /playground -->

<!-- add more fields jquery -->
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> 
    <script type="text/javascript">


  function show_div(elemVal){

        if (elemVal == 'Yes') {
            
            var hiddenDiv1 = document.getElementById("showMe");
            hiddenDiv1.style.display = (this.value == "") ? "none":"block";

            $('#shippindAddress').val('2');

            $("#saName").prop('required',true);
            $("#saLName").prop('required',true);
            $("#saAddress").prop('required',true);
            $("#saCity").prop('required',true);
            $("#saState").prop('required',true);
            $("#saPin").prop('required',true);
            $("#saContact").prop('required',true);
            //$("#saLandmark").prop('required',true);
                   
        } if (elemVal == 'No') {

            var hiddenDiv = document.getElementById("showMe");
            hiddenDiv.style.display = (this.value == "") ? "none":"none";
            $('#shippindAddress').val('1');

            $("#saName").prop('required',false);
            $("#saLName").prop('required',false);
            $("#saAddress").prop('required',false);
            $("#saCity").prop('required',false);
            $("#saState").prop('required',false);
            $("#saPin").prop('required',false);
            $("#saContact").prop('required',false);
            //$("#saLandmark").prop('required',false);

        }
    }




function show_div_bill_type(elemValx){

  
    if (elemValx == 'CASH') {
        
        gunn('#prooffile').attr('required', false);
        gunn('#pay_remark').attr('required', false);
            gunn('#uprec').hide();   

       
    } else if(elemValx == 'CHEQUE') {
      gunn('#pay_remark').attr('required', true);
       gunn('#prooffile').attr('required', false);
            gunn('#uprec').show();   
    }
}




function add_product(pid, qty){


        var pro_id = pid.replace(/\s/g, '');
        var qty1 = qty.replace(/\s/g, '');
        var coms =  document.getElementById("comms").value;
        var BtsType =  document.getElementById("BtsType").value;

        if(pro_id.length < 1){gunn("#ValidateProductAdd").html('Not a valid product name or id.');return;}
        if(qty1 < 1){gunn("#ValidateProductAdd").html('Not a valid quantity');return;}
        gunn("#ShowBtn").hide();
        gunn("#ShowBtnLoader").html('<img src="images/preloader.gif" height="32px" width="32px"/>');
                
        //gunn("#checksponser").html('<img src="images/preloader.gif" height="32px" width="32px"/>');
        gunn.post('AjaxAddProduct.php', {'pid':pro_id,'qty':qty1,'cm':coms, 'bts': BtsType,'do':'ADD'}, function(data) {
        //alert(data);
        var res = $.parseJSON(data);
        //alert(res.result);
        $("#product_table").append('<tr id="'+res.result[10]+'"><td>'+res.result[0]+'</td><td>'+res.result[1]+'</td><td>'+res.result[2]+'</td><td>'+res.result[3]+'</td><td>'+res.result[4]+'</td><td>'+res.result[5]+'</td><td><a href="javascript:void(0)" data-id="125"><span class="glyphicon glyphicon-remove remCF" data-id="'+pro_id+'"></span></a></td></tr>');
       

              $(".remCF").on('click',function(){
                          
              
                $(this).parent().parent().parent().remove();

                var xxx = $(this).data("id");

                      
                remove_product(xxx);
              });

            document.getElementById("subTotal").innerHTML = res.result[6].toFixed(2);
            document.getElementById("Commission").innerHTML = res.result[7].toFixed(2);
            document.getElementById("TaxValue").innerHTML = res.result[8].toFixed(2);
            document.getElementById("grandTotal").innerHTML = res.result[9].toFixed(2);
            document.getElementById("subTotalBV").innerHTML = res.result[11].toFixed(2);

            document.getElementById("subTotalH").value = res.result[6].toFixed(2);
            document.getElementById("CommissionH").value = res.result[7].toFixed(2);
            document.getElementById("TaxValueH").value = res.result[8].toFixed(2);
            document.getElementById("grandTotalH").value = res.result[9].toFixed(2);

            document.getElementById("sku1").value = '';
            document.getElementById("qty1").value = '';
             gunn("#ShowBtnLoader").hide();
              gunn("#ShowBtn").show();
              document.getElementById("ProductResponse").innerHTML = '';

        });

}

function remove_product(pid11){

      var pro_id2 = pid11.replace(/\s/g, '');

      var coms =  document.getElementById("comms").value;

     // alert('yaha tak to sahi hai '+pro_id2);
       
        gunn.post('AjaxAddProduct.php', {'pid':pro_id2,'cm':coms,'do':'Remove'}, function(data) {

       // alert('ye hai response '+data);
        //var res = $.parseJSON(data);
       // alert(res.result);
     var res1 = $.parseJSON(data);

         
        document.getElementById("subTotal").innerHTML = res1.result[0].toFixed(2);
        document.getElementById("Commission").innerHTML = res1.result[1].toFixed(2);
        document.getElementById("TaxValue").innerHTML = res1.result[2].toFixed(2);
        document.getElementById("grandTotal").innerHTML = res1.result[3].toFixed(2);
        document.getElementById("subTotalBV").innerHTML = res1.result[4];

        document.getElementById("subTotalH").value = res1.result[0].toFixed(2);
        document.getElementById("CommissionH").value = res1.result[1].toFixed(2);
        document.getElementById("TaxValueH").value = res1.result[2].toFixed(2);
        document.getElementById("grandTotalH").value = res1.result[3].toFixed(2);

        document.getElementById("sku1").value = '';
        document.getElementById("qty1").value = '';
        // $('#btn-add').prop("disabled",false);

      });

}



function validate_user(){

      if (document.getElementById('sid').value == '') {

      alert('Please Enter Stockist Id Before Billing.');
      document.getElementById('sid').focus();
      return false;

      }
    }


    function confirmCheck(){

      if(gunn("#sid").val() == '' || gunn("#grandTotalH").val() == ''){

        alert('No product or member id selected.');
        return false;

      } else {

        var ch_conf = confirm('Are you sure you want to save this invoice?');

        if (ch_conf == true) {

          gunn("#submitLBtn").hide();
          gunn("#submitLoader").show();

          return true;
        } else {
          return false;
        }
      }

   }

 $(document).ready(function() {
          $('#sku1').on('blur', function(e) {
          var ccc = $("#sku1").val();
          var Pdtbl = $("#Pdtbl").val();
          var BtsType =  $('#BtsType').val();
          var ui = $("#BillerId").val();
          document.getElementById("qty1").value = '';
          
          gunn.post('AjaxAddProduct.php', {'pid':ccc,'Pdtbl':Pdtbl,'ui':ui,'do':'PreCheck'}, function(data) {

          var inData = data;

          //alert(inData);
          if (inData >= 0) {

            if (inData == 0) {

              document.getElementById("ProductResponse").innerHTML = '<span style="color:red;">Available quantity of this product is '+inData+'. Please select different product..</span>';

              document.getElementById("sku1").value = '';
              document.getElementById("qty1").value = '';
              return false;

            } else {

              if(BtsType == 2){
              inData = (inData / 2); 
              var newIndata = inData + ' + '+inData; 
              } else {
                newIndata = inData; 
              }

              document.getElementById("ProductResponse").innerHTML = '<span style="color:red;">Available quantity of this product is '+newIndata+' in your stock.</span>';

            }

           
          } else {

            document.getElementById("ProductResponse").innerHTML = inData;
            
            document.getElementById("sku1").value = '';
            document.getElementById("qty1").value = '';
            return false;


          }
      
        });
      });
    });



 $(document).ready(function() {

    $('#qty1').on('keyup', function(e) {

    var qtys = $('#qty1').val();
    var pids = $('#sku1').val();
    var Pdtbl = $("#Pdtbl").val();
    var ui = $("#BillerId").val();

    var BtsType =  $('#BtsType').val();

    //alert('check what');

      if (!/^[0-9]+$/.test(qtys) ) {

      
        alert("Please enter only numbers in quantity!!!");
        document.getElementById("qty1").value = '';

      } else if(qtys == 0){

        
         alert("You can not enter ZERO or Lesser Value!!!");
         document.getElementById("qty1").value = '';
        //$("#message"+ss).html("Entered Pack First");

      } else {
        gunn.post('AjaxAddProduct.php', {'pid':pids,'qty':qtys,'BtsType':BtsType,'Pdtbl':Pdtbl,'ui':ui,'do':'CheckAddQty'}, function(data) {

          if (data == 1) {
            //alert("You can not add more than your available quantity.");
            document.getElementById("CheckAvailQty").innerHTML = '<span style="color:red;">You can not add more than available quantity.</span>';
            document.getElementById("qty1").value = '';
            return false;
          }
          document.getElementById("CheckAvailQty").innerHTML = '';
        });
      } 
  });
});


            
        var gunn = jQuery;
        gunn.noConflict();

        gunn(document).ready(function() {
          gunn("#sid").blur(function (e) {
            gunn(this).val(gunn(this).val().replace(/\s/g, ''));
              var sid = gunn(this).val();
              var tst = gunn('#Elbat').val();
                if(sid.length < 1){gunn("#checksponser").html('');return;}
                if(sid.length >= 1){
                gunn("#checksponser").html('<img src="images/preloader.gif" height="32px" width="32px"/>');
                gunn.post('regis2.php', {'sid':sid,'ts':tst}, function(data) {
                gunn("#checksponser").html(data);
              });
            }
          }); 
        });
    </script>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
 <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>