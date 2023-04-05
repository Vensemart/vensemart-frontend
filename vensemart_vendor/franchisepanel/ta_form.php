<?php include("header.php");

if(isset($_POST['submit']))
{
    
$bil_no=$_POST['bil_no'];
$seller_name=$_POST['seller_name'];
$seller_id=$_POST['seller_id'];  
$email=$_POST['email'];  
$date_from=$_POST['date_from'];  
$date_to=$_POST['date_to'];  
$t_code=$_POST['t_code'];  
$confirm_t_code=$_POST['confirm_t_code']; 
$address=$_POST['address'];  
$lodging_cost=$_POST['lodging_cost'];  
$transport_cost=$_POST['transport_cost'];  
$other_cost=$_POST['other_cost'];  
$total=$_POST['total'];  
 

if($t_code!=$confirm_t_code)
{
header("location:ta_form.php?msg= Transaction Password do not match !");
 exit; 
}
 	 	 	 	 	 	 	 	 	 	 
mysqli_query($GLOBALS["___mysqli_ston"], "insert into travel_expense (`user_id`,`seller_name`,`seller_id`,`email`,`date_from`,`date_to`,`t_code`,`address`,`bill_no`,`lodging_cost`,`transport_cost`,`other_cost`,`total`)
	 values('".$f['user_id']."','$seller_name','$seller_id','".$email."','$date_from','$date_to','$t_code','$address','$lodging_cost','$transport_cost','$other_cost','$total','$bil_no')");

header("location:ta_form.php?msg=form submitted Successfully !");
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
            <!--<h1>Travel Expense form</h1>-->
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Home</a></li>
              <li><a href="#">Travel Expense form</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-12">

              <section class="panel">
                <header class="panel-heading">
                  
                </header>
                <div class="panel-body">
                  <form name="input" method="post" name="user">
                      
                      <div class="col-md-12">
                          <div class="col-md-7"></div>
                          <div class="col-md-1">
                       <label for="exampleInputbill">Bill no:</label>
                       </div>
                       
              <div class="form-group col-md-4 no-left-padding">
                
                 <input type="text" name="bil_no" style="float:right;" class="form-control" id="exampleInputbill" required>
                
              </div>
            </div>
            <h3 class="panel-title" style="text-align:center;">Travel Expense form</h3></br>
            
                      <div class="col-md-4">
                       <label for="exampleInputName">Direct Seller Name:</label>
                       </div>
                    <!--<div class="form-group">-->
                     <div class="form-group col-md-8 no-left-padding">
                      <input type="text" name="seller_name" class="form-control" id="exampleInputName" required>
                    </div>
                   <div class="clearfix"></div>
                    <div class="col-md-4">
                        <label for="exampleInputLName">Direct Seller Id:</label>
                    </div>
                    
                     <div class="form-group col-md-8 no-left-padding">
                      
                      <input type="text" name="seller_id" class="form-control" id="exampleInputLName" required>
                    </div>
                    <div class="clearfix"></div>
                     <div class="col-md-4">
                         <label for="exampleInputEmail1">Email:</label>
                    </div>
                    
                   <div class="form-group col-md-8 no-left-padding">
                      
                      
                       
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                
                <div class="col-md-2">
                    <label for="exampleInputPassword1">Date From:</label>
                    </div>
                    <div class="form-group col-md-4 no-left-padding">
                      
                      <input type="text" name="date_from" class="form-control" id="exampleInputPdate1" required>
                    </div>
                    <div class="col-md-2">
                        <label for="exampleInputPassword1">Date To:</label>
                        </div>
                    <div class="form-group col-md-4 no-right-padding">
                      
                      <input type="text" name="date_to" class="form-control" id="exampleInputdate2" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword2">Transaction Password:</label>
                        </div>
                   <div class="form-group col-md-8 no-left-padding">
                      
                      <input type="password" name="t_code" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="col-md-4">
                         <label for="exampleInputPassword2">Confirm Transaction Password:</label>
                        </div>
                    <div class="form-group col-md-8 no-right-padding">
                     
                      <input type="password" name="confirm_t_code" class="form-control" id="exampleInputPassword2" required>
                    </div>
                     <br>
                     <div class="col-md-4">
                         <label for="exampleInputAddress">Address:</label>
                        </div>
                      <div class="form-group col-md-8 no-left-padding">
                      
                     
                       
                        <input type="text" name="address" class="form-control" id="exampleInputAddress" required>
                     
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputCity">Lodging Cost:</label>
                        </div>
                    <div class="form-group col-md-8 no-left-padding">
                      
                      <input type="text" name="lodging_cost" class="form-control" id="exampleInputCost" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputZip">Transport Cost:</label>
                        </div>

                    <div class="form-group col-md-8 no-right-padding">
                      
                      <input type="text" name="transport_cost" class="form-control" id="exampleInputZip" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputCity">Other Cost:</label>
                        </div>

                     <div class="form-group col-md-8 no-left-padding">
                      
                      <input type="text" name="other_cost" class="form-control" id="exampleInputCity" required>
                    </div>
                    <div class="col-md-4">
                         <label for="exampleInputZip">Total:</label>
                        </div>

                    <div class="form-group col-md-8 no-right-padding">
                     
                      <input type="text" name="total"  class="form-control" id="exampleInputZip" required>
                    </div>
                    <br>
                    


                    <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="submit" value="Submit" style="float:right;" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>
                  </form>
                </div>
              </section>

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