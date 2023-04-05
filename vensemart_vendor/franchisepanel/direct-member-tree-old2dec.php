<?php
include("header.php");
$countsd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'"));
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

           
            
            	<div class="col-md-10 center-block">
                    
                        <div class="table-responsive">
                        
                        	<div class="content">
                        	
                            <table cellspacing="0" cellpadding="0" border="0" align="center" class="tree-table">
                              <tbody><tr align="center">
                                <td width="5%">&nbsp;</td>
                                <td width="5%">&nbsp;</td>
                                <td width="5%">&nbsp;</td>
                                <td width="5%">&nbsp;</td>
                                <td width="5%">&nbsp;</td>
                                <td width="5%">&nbsp;</td>
                                <td width="5%" align="center"><a class="tooltip1" href="my-direct-user-tree.php?id=<?=$userid?>"> <div class="margint10">  
                                <img height="50" class="round-border" id="menu_link2" 


                                  <?php if($datas1['user_rank_name']=="Manager Mentor") { ?>

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

                                     <?php } ?>><?=$userid?><br/><?=$f['username']?> <br/>
                                <p style="width:40px; margin:1em 0 0 0; padding:0"></p></div>
                                <span><img src="images/callout.gif" class="callout">
                                <div class="flyout">
                                  <table width="100%" cellspacing="1" cellpadding="1" border="0">
                                    <tbody>
                                    <tr>
                                      <td align="left">User ID</td>
                                      <td align="left"><?=$userid?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full  Name</td>
                                      <td align="left"><?=$f['first_name'];?> <?=$f['last_name'];?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country</td>
                                      <td align="left"><?=$f['country'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Email</td>
                                      <td align="left"><?=$f['email'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Sponsor  ID</td>
                                      <td align="left"><?=$f['ref_id'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">D.O.J</td>
                                      <td align="left"><?=$f['registration_date'];?></td>
                                    </tr>

                                   

                                    
                                  </tbody></table>
                                </div></span></a></td>
                                    <td width="5%">&nbsp;</td>
                                    <td width="5%">&nbsp;</td>
                                    <td width="5%">&nbsp;</td>
                                    <td width="5%">&nbsp;</td>
                                    <td width="5%">&nbsp;</td>
                                    <td width="5%">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="center"><img width="2" height="25" alt="img" src="images/line.png"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td colspan="10" class="bd-btm"></td>
                                    <td></td>
                                
                                  </tr>
                                  <tr align="center">
                                  <?php $ds=1;
                                  while($ds<=$countsd)
                                    { ?>
                                    <td colspan="2"><img width="2" height="25" alt="img" src="images/line.png"></td>
                                  <?php $ds++; } ?>

                                    
                                  </tr>
 <tr align="center">
                                  <?php 
$que=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'");
while($datas1=mysqli_fetch_array($que)) { ?>
    


                                 
                                    <td colspan="2"><a class="tooltip1" href="my-direct-user-tree.php?id=<?=$datas1['user_id']?>"> 
                                    <div class="margint10">  
                                    <img height="50" class="round-border" id="menu_link2" 

                                    <?php if($datas1['user_rank_name']=="Manager Mentor") { ?>

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

                                     <?php } ?>







                                    ><br/><br/> <?php echo $datas1['user_id'];?><br/><?php echo $datas1['username'];?><br/> 
                                    <p style="width:40px; margin:1em 0 0 0; padding:0"></p></div>
                                    <span><img src="images/callout.gif" class="callout">
                                   
    								<div class="flyout "><table width="98%" cellspacing="1" cellpadding="1" border="0">
									  <tbody><tr>
										<td align="left">User ID</td><td>
<?php echo $datas1['user_id'];?></td></tr>
									
									 <tr>
                                      <td align="left">Full  Name</td>
                                      <td align="left"><?php echo $datas1['first_name'];?> <?php echo $datas1['last_name'];?></td>
                                    </tr>
									 
									  
	                                    <tr>
                                   
                                      <td align="left">Country</td>
                                      <td align="left"><?php echo $datas1['country'];?></td>
                                    </tr>

									 
									  <tr>
										<td align="left">Email</td>
										<td align="left"><?php echo $datas1['email'];?></td>
									  </tr>
									
									  <tr>
										<td align="left">Sponsor  ID</td>
										<td align="left"><?php echo $datas1['ref_id'];?></td>
									  </tr>
									  <tr>
										<td align="left">D.O.J</td>
										<td align="left"><?php echo $datas1['registration_date'];?></td>
									  </tr>

                                   
									</tbody></table>
									</div></span></a>
                                    
                                    
                                    
                                    </td>
                     
   
   
  <?php } ?>
   
   </tr>
  <tr><td>&nbsp;</td></tr>
</tbody></table>
                                        
                                        
                                        
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