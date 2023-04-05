<?php include("header.php");






if(isset($_POST['submit'])) 
{
	$user=$_POST['user'];
	$t_password=$_POST['t_password'];
  $platform=$_POST['platform'];
$user_id2=$_GET['user_id'];
	if($t_password!=$f['t_code'])
	{
		header("location:ewallet-downline-activate.php?user_id=$user_id2&msg=Transaction password not matched");
		exit;
	}
	else
	{
		$conts=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where (user_id='$user' || username='$user')");
		$newconts=mysqli_num_rows($conts);
		if($newconts>0)
		{
			$fetching=mysqli_fetch_array($conts);
			$activeuser_id=$fetching['user_id'];

			$reg_user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$activeuser_id'"));
			 $plan = $platform;
			$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$plan."'"));
			        $sponsor_benifit_bonus=$comm['sponsor_commission'];
			        $pb=$comm['pb'];
			        $amount=$comm['amount'];

          $ewa='poc_e_wallet';
  $walls="Fund Wallet";
    $rand = rand(0000000001,9000000000);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+90 days'));
    $lfid="LJ".$activeuser_id.$rand;

			        $lastcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_e_wallet where user_id='".$f['user_id']."' and amount>='$amount'"));
			        if($lastcount>0)
			        {


			mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Affiliate', user_rank_name ='Affiliate', user_plan='$plan' where user_id='$activeuser_id'");

			


			$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$activeuser_id'"); 
			while($upline=mysqli_fetch_array($upliners)) { 
			  $income_id=$upline['income_id']; 
			  $position=$upline['leg']; 
			  $user_level=$upline['level']; 
			  mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$activeuser_id','$user_level','".$pb."','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$pb')"); 
			}

    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$activeuser_id', '$plan', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$activeuser_id."','".$f['user_id']."','$pb')");

	


			$invoice=rand(1000000,9999999);
			$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

		mysqli_query($GLOBALS["___mysqli_ston"], "update poc_e_wallet set amount=(amount-$amount) where user_id='".$f['user_id']."'");
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','".$f['user_id']."','0','$amount','0','".$f['user_id']."','$activeuser_id','".date('Y-m-d')."','Downline Activation','Downline Activation','Downline Activation','Downline Activation','$invoice','Downline Activation','0','Fund Wallet','$urls')");

 

		header("location:poc_user_request.php?user_id=$user_id2&msg=Downline Activated Successfully.");
		exit;
	     }
	     else
	     {
	     	header("location:ewallet-downline-activate.php?user_id=$user_id2&msg=Insuffcient fund in your Fund wallet");
		exit;
	     }



		}
		else
		{
			header("location:poc_user_request.php?user_id=$user_id2&msg=No such user found or its already active");
		exit;
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

          <div class="col-md-12">
            <h1>Activate Downline</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
         
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post" action="">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Activate downline with wallet</h3>
                </header>
                <header class="panel-heading">
                 <br/> <h3 class="panel-title">Fund Wallet Ballance : <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_e_wallet where user_id='$userid'"));?><strong><?php  echo number_format($data['amount'],2);?> INR</strong> </h3>
                <br/></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="poc_e_wallet" checked="checked" />
            
          
                        <input type="hidden" name="user" required value="<?php echo $_GET['user_id'] ?>" class="form-control" id="userid">
                   

 <div class="form-group">
                      <label for="exampleInputAddress">Select Package</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                    <select class="form-control" name="platform" id="platform" required>
                                                         
                                                        <?php 
                      $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance");

                      while($queryf1=mysqli_fetch_array($fquery)) {
                      ?>
                      <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?> ( <?php echo $queryf1['amount'];?> INR )</option>
                      <?php } ?>
                                                        </select></div>
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
                  <input type="submit" name="submit" value="Activate" class="btn btn-primary">             </div>
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