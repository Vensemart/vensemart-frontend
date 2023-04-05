<?php include("header.php");

 

?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <h1>Fund Request</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">
  <a href="fund-request-report.php"><input type="submit" name="updates1" value="View Transaction" class="btn btn-primary"></a>   
           

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post" action="request-fund.php" enctype="multipart/form-data">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Fund Request</h3>
                </header>
                <header class="panel-heading">
                 <br/> <h3 class="panel-title">Ballance : INR <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_e_wallet where user_id='$userid'"));?><strong><?php  echo number_format($data['amount'],2);?></strong> </h3>
                <br/></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="poc_e_wallet" checked="checked" />
            
                  <div class="form-group">
                      <label for="exampleInputAddress">Amount</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="number" name="amounts" required value="" class="form-control" >
                      </div>
                    </div>
                    
                    
                              <div class="form-group">
									<label for="exampleInputAddress">Select bank in which you deposit the payment</label>
									<div class="form_input">
										<select data-placeholder="Bank"  class="form-control" name="bank_name" required>
										     <option value=""> Select Bank Name And Account Number</option>
										    <option value="HDFC Bank"> HDFC Bank [ Account Number : 50200048425985][ Account Name : Business Forever Online Marketing Pvt. Ltd][ IFSC Code : HDFC0003696]</option>
										   <option value="Bandhan Bank"> Bandhan Bank [Account No. : 10190007114679][ Account Name : Business Forever Online Marketing Pvt. Ltd][ IFSC Code : BDBL0001743]</option>
										    </select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="exampleInputAddress">Payment Mode</label>
									<div class="form_input">
										<select data-placeholder="Bank"  class="form-control" name="account_number" required>
										       <option value="">Select Payment Mode</option>
    										   <option value="Check Deposit">Check Deposit</option>
										   <option value="NEFT">NEFT</option>
										   <option value="IMPS">IMPS</option>
										   <option value="RTGS">RTGS</option>
										   <option value="CASH">CASH</option>
										   <option value="Wallet">Wallet</option>
										   <option value="Credit / Dabit Card">Credit / Debit Card</option>
										    </select>
									</div>
								</div>
								
					<div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction / Reference / UTR Number</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="transaction_nu" required value="" class="form-control" >
                      </div>
                    </div>
            
                  <div class="form-group">
                      <label for="exampleInputAddress">Account Holder Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account_name" required value="" class="form-control" >
                      </div>
                    </div>
                    
                    
                     <div class="form-group">
                      <label for="exampleInputAddress">Payment Proof Image</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                           <input type="file" name="filess" required value="" class="form-control" >
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                  </div>
                    </div>
            <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="update" value="Submit" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->


<?php include("footer.php");?>

    </main> <!-- /playground -->


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
  <script type="text/javascript">
    $(document).ready(function() {
    $("#userid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var userid = $(this).val();
    if(userid.length < 1){$("#checksponser").html('');return;}
    if(userid.length >= 1){
    
    $.post('regis7.php', {'userid':userid}, function(data) {
    $("#checksponser").html(data);
    });
    }
    }); 
    });
  </script>
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