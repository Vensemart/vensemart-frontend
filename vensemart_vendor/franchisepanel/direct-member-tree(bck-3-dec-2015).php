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

			<div class="col-md-12">
				
				
				<div class="col-md-9 table-responsive">
				
				<table class="table table-bordered text-center">
					 <tbody><tr>
					  <td><b>Empty</b></td>
					   <td><b>Member</b></td>
					  <td><b>Manager<br>L: 47 | R: 0</b></td>
					  <td><b>Senior<br>Manager<br>L: 6 | R: 0</b></td>
					  <td><b>Group<br>Manager<br>L: 0 | R: 0 </b></td>
					  <td><b>Manager<br>Mentor<br>L: 0 | R: 0 </b></td>
					  <td><b>Director<br>L: 0 | R: 0 </b></td>
					 </tr>

					 <tr>
					  <td><img src="images/empty.gif" id="menu_link2" height="45" width="50"></td>
					   <td><img src="images/member.gif" id="menu_link2" height="45" width="50"></td>
					  <td><img src="images/manager.png" id="menu_link2" height="45" width="50"></td>
					  <td><img src="images/sm2.png" id="menu_link2" height="45" width="50"></td>
					  <td><img src="images/group-manager.png" id="menu_link2" height="45" width="50"></td>
					  <td><img src="images/manager-mentor.png" id="menu_link2" height="45" width="50"></td>
					  <td><img src="images/director.png" id="menu_link2" height="45" width="50"></td>
					 </tr>

				</tbody></table>
				
				</div>
				
				<div class="col-md-3">
					<form name="tree" method="get" action="binary-tree.php">
	<input name="id" style="width:150px;" value="" paceholder="Enter Userid" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
<input name="submit" value="Search" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;</form><br>

				</div>

				
					<div class="clearfix"></div>
		   
            
            	<div class="col-md-10 center-block">
				
                    
                        <div class="table-responsive">
                        
                        	<div class="content">
                        	
                            
								<div class="tree" style="height:500px;">
									<ul>
										<li>
											<a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a>
											
											<ul>
												<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
										<li><a href="#" class="tooltip1"><img src="images/manager-mentor.png" class="iicon"/><br />123456<br />FrozenAge<br />2015-10-25<br />Premium
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left">Aric Lim</td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left">Singapore</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left">123456</td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: </td>
                                    </tr>

                                    <tr>
                                      <td align="left">Total BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: </td>
                                    </tr>
                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: </td>
                                    </tr>



                                    
                                  </table>
                                </div>
                                </span>
								</a></li>
								
								
								
											</ul>
											
										</li>
									</ul>
								</div>
							
							
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