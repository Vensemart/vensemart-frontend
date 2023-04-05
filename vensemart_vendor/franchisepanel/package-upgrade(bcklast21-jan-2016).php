<?php include("header.php");?>
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
    
      <!-- start of LOGO CONTAINER -->
     
      <!-- end of LOGO CONTAINER -->

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
        <!-- end of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Upgrade Membership</h1>

          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Membership</a></li>
              <li class="active">Upgrade Membership</li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">

      NOTE :  <br/> Upgrade within 30 days - 10% penalty <br/>
Upgrade within 60 days - 15% penalty<br/>
Upgrade after 60 days - 20% penalty<br/>

        <?php if(@$_GET['msg']!='') { ?><br/> <div style="color:red;width:100%;"><?php echo $_GET['msg'];?><br/><br/></div> <?php } ?>
          <div class="row">
<?php $alredy=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' order by id desc limit 1");
$yesno=mysqli_num_rows($alredy); 
 $der=mysqli_fetch_array($alredy);
if($yesno>0)
{
  
   $packid=$der['package'];
}
else
{
  $packid=0;
}

if($packid==1 || $packid==3)
{
  echo "<h3>".'Sorry. You are not eligible for Upgrade. Contact Admin.'."</h3>";
}


if($packid==4)
{
  echo "<h3>".'You are already upgraded to Premium Membership.'."</h3>";
}

 //Old Package Fetch Detail
                // $commding=$der['date'];
                // $datetime1 = new DateTime($commding);
                // $datetime2 = new DateTime($date);
                // $interval = $datetime1->diff($datetime2);
                // $interval->format('%a');


                // if($interval<=30)
                // {
                //   $percent=110;
                // }
                // else if($interval>=30 && $interval<=60)
                // {
                //   $percent=115;
                // }
                // else
                // {
                //   $percent=120;
                // }


  $Adate= $der['date'];

 $todaydate=(date("Y-m-d"));
       



 $datetime1 = new DateTime($Adate);
$datetime2 = new DateTime();
$interval = $datetime1->diff($datetime2);

  $intervalss=$interval->format('%a');
 



             if($intervalss<=30)
                {
                   $percent=110;
                }
                else if($intervalss>=30 && $intervalss<=60)
                {
                   $percent=115;
                }
                else if($intervalss>60)
                {
                  $percent=120;
                }



?>
       <?php 
             $i=1;
             $fetch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id>'$packid' && id!=3");
             while($data=mysqli_fetch_array($fetch))
              {
              ?><form name="input<?php echo $i;?>" method="post" method="post" action="lifejacket_buy_code.php">
            <div class="col-md-6">
              <div class="widget price-table">
                <section class="panel panel-<?php if($i==1) { ?>success<?php } else { ?>primary<?php } ?>">
                  <header class="panel-heading">
                    <h4 class="panel-title"><?php echo $data['name'];?></h4>
                  </header>
                  <div class="panel-body">
                    <div class="price text-success">
                     <?php $amou=(($data['amount']*$percent/100)-$der['amount']); echo $amou; ?> <small>SGD</small>
                    </div>
                  </div>

                  <input type="hidden" name="amount" value="<?php  echo $amou;?>">
                  
                </section>
              <!--  <div class="plan-info" style="font-size:16px;">
                  Referral Bonus : <?php echo $data['sponsor_commission'];?> %
                </div>
                <div class="plan-info" style="font-size:16px;">
                  Team Bonus : <?php echo $data['binary_bonus'];?> %
                </div>
                <div class="plan-info" style="font-size:16px;">
                    Generation Bonus : <?php echo $data['matching'];?> %
                </div>-->
                <div class="plan-info">
                  <?php echo $data['description'];?>
                </div>
                <input type="hidden">

                <div class="plan-info">
                  <input type="password" class="form-control" required name="password" placeholder="Enter Transaction Password">
                </div>

                <input type="hidden" name="package_id" value="<?php echo $data['id'];?>">
           
                <div class="plan-info">
          
                
                <input type="submit" name="submit<?php echo $i;?>" value="Upgrade" class="add-to-cart btn btn-success">
</div>
              </div>     </div> <!-- / widget price-table -->
</form><!-- / col-md-3 -->
<?php $i++;} ?>
            </div> 
 

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->



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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  </body>
</html>