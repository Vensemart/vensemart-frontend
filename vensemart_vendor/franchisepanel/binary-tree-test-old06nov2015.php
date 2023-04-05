<?php
include("header.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
{
$userids=$_REQUEST['id'];
$stre="select * from user_registration where user_id='$userids' || username='$userids'";
$rese=mysqli_query($GLOBALS["___mysqli_ston"], $stre);
$xe=mysqli_fetch_array($rese);
$userid=$xe['user_id'];
}
else
{
  $userid=$userid;
  $id=$userid;
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
            
            <?php $count112=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid'"));?>
            <p class="lead">You have <span class="label label-warning"><?php echo $count112;?></span> downline members</p>
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
                        <li><a href="#">Genealogy</a></li>
              <li class="active">Downline</li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid white-bg">

          <div class="row">

<?php 
if(isset($_GET['id']))
{
  $userid=$_GET['id'];
}
else
{
  $userid=$userid;
}

$fz=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' or username='$userid'"));
$userid=$fz['user_id'];
?>      
            
            
            
            
				<div class="col-md-12">
              
              <div class="table-responsive">
                    
                	<div class="tree">
                    <ul>
                        <li>
                            <a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
                            
                            <span>
                                <img class="callout" src="images/callout.gif" />
                                    <div class="flyout">
                                        <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                            <tr>
                                                <td align="left">User ID</td>
                                                <td align="left"><?=$user12['user_id'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Full  Name</td>
                                                <td align="left">sdf</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Country</td>
                                                <td align="left">dfsf</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Email</td>
                                                <td align="left">asdfaf</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Sponsor  ID</td>
                                                <td align="left">werewr</td>
                                            </tr>
                
                                            <tr>
                                                <td align="left">D.O.J</td>
                                                <td align="left">hjhk</td>
                                            </tr>
                
                                            <tr>
                                                <td align="left">Stage</td>
                                                <td align="left">234</td>
                                            </tr>
                                            <tr>
                                                <td align="left">User status</td>
                                                <td align="left">active</td>
                                            </tr>
                                         </table>
                                        </div>
                                    </span>
                                </a>
								
								
								<ul>
								
									<li>
										<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
										
										<span>
											<img class="callout" src="images/callout.gif" />
												<div class="flyout">
													<table width="100%" border="0" cellspacing="1" cellpadding="1">
														<tr>
															<td align="left">User ID</td>
															<td align="left"><?=$user12['user_id'] ?></td>
														</tr>
														<tr>
															<td align="left">Full  Name</td>
															<td align="left">sdf</td>
														</tr>
														<tr>
															<td align="left">Country</td>
															<td align="left">dfsf</td>
														</tr>
														<tr>
															<td align="left">Email</td>
															<td align="left">asdfaf</td>
														</tr>
														<tr>
															<td align="left">Sponsor  ID</td>
															<td align="left">werewr</td>
														</tr>
							
														<tr>
															<td align="left">D.O.J</td>
															<td align="left">hjhk</td>
														</tr>
							
														<tr>
															<td align="left">Stage</td>
															<td align="left">234</td>
														</tr>
														<tr>
															<td align="left">User status</td>
															<td align="left">active</td>
														</tr>
													 </table>
													</div>
												</span>
											</a>
											
											
											<ul>
											
												<li>
													<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
													
													<span>
														<img class="callout" src="images/callout.gif" />
															<div class="flyout">
																<table width="100%" border="0" cellspacing="1" cellpadding="1">
																	<tr>
																		<td align="left">User ID</td>
																		<td align="left"><?=$user12['user_id'] ?></td>
																	</tr>
																	<tr>
																		<td align="left">Full  Name</td>
																		<td align="left">sdf</td>
																	</tr>
																	<tr>
																		<td align="left">Country</td>
																		<td align="left">dfsf</td>
																	</tr>
																	<tr>
																		<td align="left">Email</td>
																		<td align="left">asdfaf</td>
																	</tr>
																	<tr>
																		<td align="left">Sponsor  ID</td>
																		<td align="left">werewr</td>
																	</tr>
										
																	<tr>
																		<td align="left">D.O.J</td>
																		<td align="left">hjhk</td>
																	</tr>
										
																	<tr>
																		<td align="left">Stage</td>
																		<td align="left">234</td>
																	</tr>
																	<tr>
																		<td align="left">User status</td>
																		<td align="left">active</td>
																	</tr>
																 </table>
																</div>
															</span>
														</a>
														
														
														<ul>
														
															<li>
																<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																
																<span>
																	<img class="callout" src="images/callout.gif" />
																		<div class="flyout">
																			<table width="100%" border="0" cellspacing="1" cellpadding="1">
																				<tr>
																					<td align="left">User ID</td>
																					<td align="left"><?=$user12['user_id'] ?></td>
																				</tr>
																				<tr>
																					<td align="left">Full  Name</td>
																					<td align="left">sdf</td>
																				</tr>
																				<tr>
																					<td align="left">Country</td>
																					<td align="left">dfsf</td>
																				</tr>
																				<tr>
																					<td align="left">Email</td>
																					<td align="left">asdfaf</td>
																				</tr>
																				<tr>
																					<td align="left">Sponsor  ID</td>
																					<td align="left">werewr</td>
																				</tr>
													
																				<tr>
																					<td align="left">D.O.J</td>
																					<td align="left">hjhk</td>
																				</tr>
													
																				<tr>
																					<td align="left">Stage</td>
																					<td align="left">234</td>
																				</tr>
																				<tr>
																					<td align="left">User status</td>
																					<td align="left">active</td>
																				</tr>
																			 </table>
																			</div>
																		</span>
																	</a>
																	
																</li>
																
																
																<li>
																	<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																	
																	<span>
																		<img class="callout" src="images/callout.gif" />
																			<div class="flyout">
																				<table width="100%" border="0" cellspacing="1" cellpadding="1">
																					<tr>
																						<td align="left">User ID</td>
																						<td align="left"><?=$user12['user_id'] ?></td>
																					</tr>
																					<tr>
																						<td align="left">Full  Name</td>
																						<td align="left">sdf</td>
																					</tr>
																					<tr>
																						<td align="left">Country</td>
																						<td align="left">dfsf</td>
																					</tr>
																					<tr>
																						<td align="left">Email</td>
																						<td align="left">asdfaf</td>
																					</tr>
																					<tr>
																						<td align="left">Sponsor  ID</td>
																						<td align="left">werewr</td>
																					</tr>
														
																					<tr>
																						<td align="left">D.O.J</td>
																						<td align="left">hjhk</td>
																					</tr>
														
																					<tr>
																						<td align="left">Stage</td>
																						<td align="left">234</td>
																					</tr>
																					<tr>
																						<td align="left">User status</td>
																						<td align="left">active</td>
																					</tr>
																				 </table>
																				</div>
																			</span>
																		</a>
																		
																	</li>
																	
																</ul>
														
														
													</li>
													
													
													<li>
														<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
														
														<span>
															<img class="callout" src="images/callout.gif" />
																<div class="flyout">
																	<table width="100%" border="0" cellspacing="1" cellpadding="1">
																		<tr>
																			<td align="left">User ID</td>
																			<td align="left"><?=$user12['user_id'] ?></td>
																		</tr>
																		<tr>
																			<td align="left">Full  Name</td>
																			<td align="left">sdf</td>
																		</tr>
																		<tr>
																			<td align="left">Country</td>
																			<td align="left">dfsf</td>
																		</tr>
																		<tr>
																			<td align="left">Email</td>
																			<td align="left">asdfaf</td>
																		</tr>
																		<tr>
																			<td align="left">Sponsor  ID</td>
																			<td align="left">werewr</td>
																		</tr>
											
																		<tr>
																			<td align="left">D.O.J</td>
																			<td align="left">hjhk</td>
																		</tr>
											
																		<tr>
																			<td align="left">Stage</td>
																			<td align="left">234</td>
																		</tr>
																		<tr>
																			<td align="left">User status</td>
																			<td align="left">active</td>
																		</tr>
																	 </table>
																	</div>
																</span>
															</a>
															
															
															<ul>
															
																<li>
																	<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																	
																	<span>
																		<img class="callout" src="images/callout.gif" />
																			<div class="flyout">
																				<table width="100%" border="0" cellspacing="1" cellpadding="1">
																					<tr>
																						<td align="left">User ID</td>
																						<td align="left"><?=$user12['user_id'] ?></td>
																					</tr>
																					<tr>
																						<td align="left">Full  Name</td>
																						<td align="left">sdf</td>
																					</tr>
																					<tr>
																						<td align="left">Country</td>
																						<td align="left">dfsf</td>
																					</tr>
																					<tr>
																						<td align="left">Email</td>
																						<td align="left">asdfaf</td>
																					</tr>
																					<tr>
																						<td align="left">Sponsor  ID</td>
																						<td align="left">werewr</td>
																					</tr>
														
																					<tr>
																						<td align="left">D.O.J</td>
																						<td align="left">hjhk</td>
																					</tr>
														
																					<tr>
																						<td align="left">Stage</td>
																						<td align="left">234</td>
																					</tr>
																					<tr>
																						<td align="left">User status</td>
																						<td align="left">active</td>
																					</tr>
																				 </table>
																				</div>
																			</span>
																		</a>
																		
																	</li>
																	
																	
																	<li>
																		<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																		
																		<span>
																			<img class="callout" src="images/callout.gif" />
																				<div class="flyout">
																					<table width="100%" border="0" cellspacing="1" cellpadding="1">
																						<tr>
																							<td align="left">User ID</td>
																							<td align="left"><?=$user12['user_id'] ?></td>
																						</tr>
																						<tr>
																							<td align="left">Full  Name</td>
																							<td align="left">sdf</td>
																						</tr>
																						<tr>
																							<td align="left">Country</td>
																							<td align="left">dfsf</td>
																						</tr>
																						<tr>
																							<td align="left">Email</td>
																							<td align="left">asdfaf</td>
																						</tr>
																						<tr>
																							<td align="left">Sponsor  ID</td>
																							<td align="left">werewr</td>
																						</tr>
															
																						<tr>
																							<td align="left">D.O.J</td>
																							<td align="left">hjhk</td>
																						</tr>
															
																						<tr>
																							<td align="left">Stage</td>
																							<td align="left">234</td>
																						</tr>
																						<tr>
																							<td align="left">User status</td>
																							<td align="left">active</td>
																						</tr>
																					 </table>
																					</div>
																				</span>
																			</a>
																			
																		</li>
																		
																	</ul>
															
														</li>
														
													</ul>
											
										</li>
										
										
										
										
										
										
										
										<li>
											<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
											
											<span>
												<img class="callout" src="images/callout.gif" />
													<div class="flyout">
														<table width="100%" border="0" cellspacing="1" cellpadding="1">
															<tr>
																<td align="left">User ID</td>
																<td align="left"><?=$user12['user_id'] ?></td>
															</tr>
															<tr>
																<td align="left">Full  Name</td>
																<td align="left">sdf</td>
															</tr>
															<tr>
																<td align="left">Country</td>
																<td align="left">dfsf</td>
															</tr>
															<tr>
																<td align="left">Email</td>
																<td align="left">asdfaf</td>
															</tr>
															<tr>
																<td align="left">Sponsor  ID</td>
																<td align="left">werewr</td>
															</tr>
								
															<tr>
																<td align="left">D.O.J</td>
																<td align="left">hjhk</td>
															</tr>
								
															<tr>
																<td align="left">Stage</td>
																<td align="left">234</td>
															</tr>
															<tr>
																<td align="left">User status</td>
																<td align="left">active</td>
															</tr>
														 </table>
														</div>
													</span>
												</a>
												
																					
											
											<ul>
											
												<li>
													<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
													
													<span>
														<img class="callout" src="images/callout.gif" />
															<div class="flyout">
																<table width="100%" border="0" cellspacing="1" cellpadding="1">
																	<tr>
																		<td align="left">User ID</td>
																		<td align="left"><?=$user12['user_id'] ?></td>
																	</tr>
																	<tr>
																		<td align="left">Full  Name</td>
																		<td align="left">sdf</td>
																	</tr>
																	<tr>
																		<td align="left">Country</td>
																		<td align="left">dfsf</td>
																	</tr>
																	<tr>
																		<td align="left">Email</td>
																		<td align="left">asdfaf</td>
																	</tr>
																	<tr>
																		<td align="left">Sponsor  ID</td>
																		<td align="left">werewr</td>
																	</tr>
										
																	<tr>
																		<td align="left">D.O.J</td>
																		<td align="left">hjhk</td>
																	</tr>
										
																	<tr>
																		<td align="left">Stage</td>
																		<td align="left">234</td>
																	</tr>
																	<tr>
																		<td align="left">User status</td>
																		<td align="left">active</td>
																	</tr>
																 </table>
																</div>
															</span>
														</a>
														
														
														<ul>
														
															<li>
																<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																
																<span>
																	<img class="callout" src="images/callout.gif" />
																		<div class="flyout">
																			<table width="100%" border="0" cellspacing="1" cellpadding="1">
																				<tr>
																					<td align="left">User ID</td>
																					<td align="left"><?=$user12['user_id'] ?></td>
																				</tr>
																				<tr>
																					<td align="left">Full  Name</td>
																					<td align="left">sdf</td>
																				</tr>
																				<tr>
																					<td align="left">Country</td>
																					<td align="left">dfsf</td>
																				</tr>
																				<tr>
																					<td align="left">Email</td>
																					<td align="left">asdfaf</td>
																				</tr>
																				<tr>
																					<td align="left">Sponsor  ID</td>
																					<td align="left">werewr</td>
																				</tr>
													
																				<tr>
																					<td align="left">D.O.J</td>
																					<td align="left">hjhk</td>
																				</tr>
													
																				<tr>
																					<td align="left">Stage</td>
																					<td align="left">234</td>
																				</tr>
																				<tr>
																					<td align="left">User status</td>
																					<td align="left">active</td>
																				</tr>
																			 </table>
																			</div>
																		</span>
																	</a>
																	
																</li>
																
																
																<li>
																	<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																	
																	<span>
																		<img class="callout" src="images/callout.gif" />
																			<div class="flyout">
																				<table width="100%" border="0" cellspacing="1" cellpadding="1">
																					<tr>
																						<td align="left">User ID</td>
																						<td align="left"><?=$user12['user_id'] ?></td>
																					</tr>
																					<tr>
																						<td align="left">Full  Name</td>
																						<td align="left">sdf</td>
																					</tr>
																					<tr>
																						<td align="left">Country</td>
																						<td align="left">dfsf</td>
																					</tr>
																					<tr>
																						<td align="left">Email</td>
																						<td align="left">asdfaf</td>
																					</tr>
																					<tr>
																						<td align="left">Sponsor  ID</td>
																						<td align="left">werewr</td>
																					</tr>
														
																					<tr>
																						<td align="left">D.O.J</td>
																						<td align="left">hjhk</td>
																					</tr>
														
																					<tr>
																						<td align="left">Stage</td>
																						<td align="left">234</td>
																					</tr>
																					<tr>
																						<td align="left">User status</td>
																						<td align="left">active</td>
																					</tr>
																				 </table>
																				</div>
																			</span>
																		</a>
																		
																	</li>
																	
																</ul>
														
														
													</li>
													
													
													<li>
														<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
														
														<span>
															<img class="callout" src="images/callout.gif" />
																<div class="flyout">
																	<table width="100%" border="0" cellspacing="1" cellpadding="1">
																		<tr>
																			<td align="left">User ID</td>
																			<td align="left"><?=$user12['user_id'] ?></td>
																		</tr>
																		<tr>
																			<td align="left">Full  Name</td>
																			<td align="left">sdf</td>
																		</tr>
																		<tr>
																			<td align="left">Country</td>
																			<td align="left">dfsf</td>
																		</tr>
																		<tr>
																			<td align="left">Email</td>
																			<td align="left">asdfaf</td>
																		</tr>
																		<tr>
																			<td align="left">Sponsor  ID</td>
																			<td align="left">werewr</td>
																		</tr>
											
																		<tr>
																			<td align="left">D.O.J</td>
																			<td align="left">hjhk</td>
																		</tr>
											
																		<tr>
																			<td align="left">Stage</td>
																			<td align="left">234</td>
																		</tr>
																		<tr>
																			<td align="left">User status</td>
																			<td align="left">active</td>
																		</tr>
																	 </table>
																	</div>
																</span>
															</a>
															
															
															<ul>
															
																<li>
																	<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																	
																	<span>
																		<img class="callout" src="images/callout.gif" />
																			<div class="flyout">
																				<table width="100%" border="0" cellspacing="1" cellpadding="1">
																					<tr>
																						<td align="left">User ID</td>
																						<td align="left"><?=$user12['user_id'] ?></td>
																					</tr>
																					<tr>
																						<td align="left">Full  Name</td>
																						<td align="left">sdf</td>
																					</tr>
																					<tr>
																						<td align="left">Country</td>
																						<td align="left">dfsf</td>
																					</tr>
																					<tr>
																						<td align="left">Email</td>
																						<td align="left">asdfaf</td>
																					</tr>
																					<tr>
																						<td align="left">Sponsor  ID</td>
																						<td align="left">werewr</td>
																					</tr>
														
																					<tr>
																						<td align="left">D.O.J</td>
																						<td align="left">hjhk</td>
																					</tr>
														
																					<tr>
																						<td align="left">Stage</td>
																						<td align="left">234</td>
																					</tr>
																					<tr>
																						<td align="left">User status</td>
																						<td align="left">active</td>
																					</tr>
																				 </table>
																				</div>
																			</span>
																		</a>
																		
																	</li>
																	
																	
																	<li>
																		<a href="#" class="tooltip1"><img src="images/represent.png" class="iicon" /><br />123456<br />Segun
																		
																		<span>
																			<img class="callout" src="images/callout.gif" />
																				<div class="flyout">
																					<table width="100%" border="0" cellspacing="1" cellpadding="1">
																						<tr>
																							<td align="left">User ID</td>
																							<td align="left"><?=$user12['user_id'] ?></td>
																						</tr>
																						<tr>
																							<td align="left">Full  Name</td>
																							<td align="left">sdf</td>
																						</tr>
																						<tr>
																							<td align="left">Country</td>
																							<td align="left">dfsf</td>
																						</tr>
																						<tr>
																							<td align="left">Email</td>
																							<td align="left">asdfaf</td>
																						</tr>
																						<tr>
																							<td align="left">Sponsor  ID</td>
																							<td align="left">werewr</td>
																						</tr>
															
																						<tr>
																							<td align="left">D.O.J</td>
																							<td align="left">hjhk</td>
																						</tr>
															
																						<tr>
																							<td align="left">Stage</td>
																							<td align="left">234</td>
																						</tr>
																						<tr>
																							<td align="left">User status</td>
																							<td align="left">active</td>
																						</tr>
																					 </table>
																					</div>
																				</span>
																			</a>
																			
																		</li>
																		
																	</ul>
															
														</li>
														
													</ul>
											
												</li>
												
											</li>
								
								
							</li>
								
					</ul>
					
					</div>
					
					
					<br /><br />
					
					<table class="table table-bordered text-center">
             <tr>
              <td><b>Empty</b></td>
               <td><b>Member</b></td>
              <td><b>Manager</b></td>
              <td><b>Senior Manager</b></td>
              <td><b>Group Manager</b></td>
              <td><b>Manager Mentor</b></td>
              <td><b>Director</b></td>
             </tr>

             <tr>
              <td><img src="images/empty.gif" width="80" height="45" class="round-border" id="menu_link2"/></td>
               <td><img src="images/member.gif" width="80" height="45" class="round-border" id="menu_link2"/></td>
              <td><img src="images/manager.png" width="80" height="45" class="round-border" id="menu_link2"/></td>
              <td><img src="images/group-manager.png"  width="80" height="45" class="round-border" id="menu_link2"/></td>
              <td><img src="images/manager-mentor.png"  width="80" height="45" class="round-border" id="menu_link2"/></td>
              <td><img src="images/sm2.png" width="80" height="45" class="round-border" id="menu_link2"/></td>
              <td><img src="images/director.png" width="80" height="45" class="round-border" id="menu_link2"/></td>
             </tr>





             </table>
			 
			 
			 
					
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