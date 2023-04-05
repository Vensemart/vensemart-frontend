<?php
include("header.php");
$countsd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'"));


if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
{
$userids=$_REQUEST['id'];
$stre="select * from user_registration where user_id='$userids' || username='$userids' ";
$rese=mysqli_query($GLOBALS["___mysqli_ston"], $stre);
$xe=mysqli_fetch_array($rese);
$userid=$xe['user_id'];
 $id=$idd;
}
else
{
  $userid=$userid;
  $id=$idd;
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

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Style CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

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
           <h1>My Referral Tree</h1>
            <p class="lead">You have <span class="label label-warning"><?php echo $countsd;?></span> referral members.</p>
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
                        <!--<li><a href="#">Genealogy</a></li>
              <li class="active">Direct Sponsors</li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid white-bg">

          <div class="row">

			<div class="col-md-12">

      <?php 
if(isset($_POST['submit']))
{


  $userid=$_POST['id'];
}
else
{
  $userid=$userid;
}

if(isset($_GET['submit']))
{


  $userid=$_GET['id'];
}
else
{
  $userid=$userid;
}

$fz=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' or username='$userid' "));
$userid=$fz['user_id'];

?>      
            
          <?php
      $LeftMN=0;
      $LeftSM=0;
      $LeftGM=0;
      $LeftMM=0;
      $LeftDT=0;
 
      $RightMN=0;
      $RightSM=0;
      $RightGM=0;
      $RightMM=0;
      $RightDT=0;

      $level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='left'");
          while($yesd1=mysqli_fetch_array($level1))
            {
            $down=$yesd1['down_id'];
            $ok=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$down'")); 
            $ranks=$ok['user_rank_name'];
            if($ranks=='Manager')
            {
            $LeftMN=$LeftMN+1;
            }
            else if($ranks=='Senior Manager')
            {
            $LeftSM=$LeftSM+1;
            }
            else if($ranks=='Group Manager')
            {
            $LeftGM=$LeftGM+1;
            }
            else if($ranks=='Manager Mentor')
            {
            $LeftMM=$LeftMM+1;
            }
            else if($ranks=='Director')
            {
            $LeftDT=$LeftDT+1;
            }

            else
            {
            $LeftMN=$LeftMN;
            $LeftSM=$LeftSM;
            $LeftGM=$LeftGM;
            $LeftMM=$LeftMM;
            $LeftDT=$LeftDT;
            }
            }


            $level2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='right'");
          while($yesd2=mysqli_fetch_array($level2))
            {
            $down2=$yesd2['down_id'];
            $ok2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$down2'")); 
            $ranks2=$ok2['user_rank_name'];
             if($ranks2=='Manager')
            {
            $RightMN=$RightMN+1;
            }
            else if($ranks2=='Senior Manager')
            {
            $RightSM=$RightSM+1;
            }
            else if($ranks2=='Group Manager')
            {
            $RightGM=$RightGM+1;
            }
            else if($ranks2=='Manager Mentor')
            {
            $RightMM=$RightMM+1;
            }
            else if($ranks2=='Director')
            {
            $RightDT=$RightDT+1;
            }
            
            else
            {
             $RightMN=$RightMN;
            $RightSM=$RightSM;
            $RightGM=$RightGM;
            $RightMM=$RightMM;
            $RightDT=$RightDT;
            }
            }

?>  
				
				
				<div class="col-md-9 table-responsive">
				
				<table class="table table-bordered text-center">
					 <tbody>

           <tr>
            <td><b>Empty</b></td>
             <td><b>Member</b></td>
            <td><b>Manager<br>L: <?php echo $LeftMN;?> | R: <?php echo $RightMN;?></b></td>
            <td><b>Senior<br />Manager<br>L: <?php echo $LeftSM;?> | R: <?php echo $RightSM;?></b></td>
            <td><b>Group<br />Manager<br>L: <?php echo $LeftGM;?> | R: <?php echo $RightGM;?> </b></td>
            <td><b>Manager<br />Mentor<br>L: <?php echo $LeftMM;?> | R: <?php echo $RightMM;?> </b></td>
            <td><b>Director<br>L: <?php echo $LeftDT;?> | R: <?php echo $RightDT;?> </b></td>
           </tr>

           <tr>
            <td><img src="images/empty.gif" width="50" height="45" id="menu_link2"/></td>
             <td><img src="images/member.gif" width="50" height="45" id="menu_link2"/></td>
            <td><img src="images/manager.png" width="50" height="45" id="menu_link2"/></td>
            <td><img src="images/sm2.png"  width="50" height="45" id="menu_link2"/></td>
            <td><img src="images/group-manager.png"  width="50" height="45" id="menu_link2"/></td>
            <td><img src="images/manager-mentor.png" width="50" height="45" id="menu_link2"/></td>
            <td><img src="images/director.png" width="50" height="45" id="menu_link2"/></td>
           </tr>

				</tbody></table>
				
				</div>
				
				<div class="col-md-3">
				<form name="tree" method="post" action="direct-member-tree.php">
  <input type="text" name="id" style="width:150px;" value="" paceholder="Enter Userid">&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="submit" name="submit" value="Search">
 <input type="button" value="Back" name="backs"> </a> 
</form><br />

				</div>

				
					<div class="clearfix"></div>
		   
            
            	<div class="col-md-10 center-block">
				
                    
                        <div class="table-responsive">
                        
                        	<div class="content">


                          <?php
if($userid!=$idd)
{
$nums=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid' and income_id='".$idd."'"));
}
else
{
  $nums=1;
}
if($nums==0)
{
  echo "<h3>"."Sorry this user not come under your downline"."</h3>";
}
else
{
?>    
        


                        	
                            
								<div class="tree" style="height:500px;">
									<ul>
										<li>
											<a href="direct-member-tree.php?id=<?php echo $userId?>" class="tooltip1">
                      <img  <?php if($f['user_rank_name']=="Manager Mentor") { ?>

                                    src="images/manager-mentor.png"
                                    <?php } else if($fz['user_rank_name']=="Manager") { ?>
                                     src="images/manager.png"
                                      <?php } else if($fz['user_rank_name']=="Senior Manager") { ?>
                                     src="images/sm2.png"

                                      <?php } else if($fz['user_rank_name']=="Group Manager") { ?>
                                    src="images/group-manager.png"


                                      <?php } else if($fz['user_rank_name']=="Director") { ?>
                                     src="images/director.png"
                                     <?php }
                                     else { ?>
                                      src="images/member.gif"

                                     <?php } ?> class="iicon"/>

                                     <br /><?=$userid?><br/><?php echo $fz['first_name'];?> <?php echo $fz['last_name'];?><br />
                                     <?=date('d-m-Y',strtotime($fz['registration_date']));?><br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?php echo $fz['first_name'];?> <?php echo $fz['last_name'];?></td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left"><?php echo $fz['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $fz['ref_id'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='right'")); echo $regf1; ?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: <?php $regfs1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total1 from manage_bv_history where income_id='$userid' and position='left' and description!='Carry Forward BV'")); if($regfs1['total1']!=0 || $regfs1['total1']!='') { echo $regfs1['total1']; } else { echo "0"; } ?> | R: <?php $regfs2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='$userid' and position='right' and description!='Carry Forward BV'")); if($regfs2['total2']!='' || $regfs2['total2']!=0) { echo $regfs2['total2']; } else { echo "0"; } ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: <?php $regfsd1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$userid."' and position='left' and status=0 and description!='Carry Forward BV'"));  if($regfsd1['total2']!=0 || $regfsd1['total2']!='') { echo $regfsd1['total2']; } else { echo "0"; } ?> | R: <?php $regfsd2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$userid."' and position='right' and status=0 and description!='Carry Forward BV'"));   if($regfsd2['total2']!=0 || $regfsd2['total2']!='') { echo $regfsd2['total2']; } else { echo "0"; } ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: <?php $regfse1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select bv as total2 from manage_bv_history where income_id='".$userid."' and position='left' and description='Carry Forward BV' order by id desc limit 1")); if($regfse1['total2']!='' || $regfse1['total2']!=0) { echo $regfse1['total2']; } else { echo "0"; } ?> | R: <?php $regfse2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select bv as total2 from manage_bv_history where income_id='".$userid."' and position='right' and description='Carry Forward BV' order by id desc limit 1")); if($regfse2['total2']!='' || $regfse2['total2']!=0) { echo $regfse2['total2']; } else { echo "0"; } ?></td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a>
											
											<ul>



                       <?php 
$que=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'");
while($datas1=mysqli_fetch_array($que)) { ?>


												<li><a href="direct-member-tree?id=<?=$datas1['user_id'];?>" class="tooltip1">

                        <img <?php if($datas1['user_rank_name']=="Manager Mentor") { ?>

                                    src="images/manager-mentor.png"
                                    <?php } else if($datas1['user_rank_name']=="Manager") { ?>
                                     src="images/manager.png"
                                      <?php } else if($datas1['user_rank_name']=="Senior Manager") { ?>
                                     src="images/sm2.png"

                                      <?php } else if($datas1['user_rank_name']=="Group Manager") { ?>
                                    src="images/group-manager.png"


                                      <?php } else if($datas1['user_rank_name']=="Director") { ?>
                                     src="images/director.png"
                                     <?php }
                                     else { ?>
                                      src="images/member.gif"

                                     <?php } ?> class="iicon"/>

                        <br /><?php echo $datas1['user_id'];?><br/><?php echo $datas1['first_name'];?> <?php echo $datas1['last_name'];?><br /><?=date('d-m-Y',strtotime($datas1['registration_date']));?><br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $datas1['user_id'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?php echo $datas1['first_name'];?> <?php echo $datas1['last_name'];?></td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left"><?php echo $datas1['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $datas1['ref_id'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($datas1['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>

                                     <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$datas1[user_id]' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$datas1[user_id]' and leg='right'")); echo $regf1; ?></td>
                                    </tr>

                                   

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: <?php $regfs1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total1 from manage_bv_history where income_id='".$datas1['user_id']."' and position='left' and description!='Carry Forward BV'")); if($regfs1['total1']!='' || $regfs1['total1']!=0) { echo $regfs1['total1']; } else { echo "0"; } ?> | R: <?php $regfs2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$datas1['user_id']."' and position='right' and description!='Carry Forward BV'")); if($regfs2['total2']!='' || $regfs2['total2']!=0) { echo $regfs2['total2']; } else { echo "0"; }  ?></td>
                                    </tr>

                                     <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: <?php $regfsd1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$datas1['user_id']."' and position='left' and status=0 and description!='Carry Forward BV'"));  if($regfsd1['total2']!='' || $regfsd1['total2']!=0) { echo $regfsd1['total2']; } else { echo "0"; } ?> | R: <?php $regfsd2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$datas1['user_id']."' and position='right' and status=0 and description!='Carry Forward BV'")); if($regfsd2['total2']!='' || $regfsd2['total2']!=0) { echo $regfsd2['total2']; } else { echo "0"; } ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward Left</td>
                                      <td align="left">L: <?php $regfse1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select bv as total2 from manage_bv_history where income_id='".$datas1['user_id']."' and position='left' and description='Carry Forward BV' order by id desc limit 1")); if($regfse1['total2']!='' || $regfse1['total2']!=0) { echo $regfse1['total2']; } else { echo "0"; } ?> | R: <?php $regfse2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select bv as total2 from manage_bv_history where income_id='".$datas1['user_id']."' and position='right' and description='Carry Forward BV' order by id desc limit 1")); if($regfse2['total2']!='' || $regfse2['total2']!=0) { echo $regfse2['total2']; } else { echo "0"; }  ?></td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										
								<?php } ?>		
								
										
								
									
								
								
								
											</ul>
											
										</li>
									</ul>
								</div>
							 <?php } ?>
							
							</div>
                        
                        </div>
                        
                    </div>
            
            
            
            
            
            
            
            

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

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.inbox.js"></script>
  </body>
</html>