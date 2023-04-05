 <nav class="navbar navbar-top navbar-static-top">
          <div class="container-fluid">

            <!-- sidebar collapse and toggle buttons get grouped for better mobile display -->
            <div class="navbar-header nav">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-top">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand show-hide-sidebar hide-sidebar" href="#"><i class="fa fa-outdent"></i></a>
              <a class="navbar-brand show-hide-sidebar show-sidebar" href="#"><i class="fa fa-indent"></i></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-top">

              <!-- start of SEARCH BLOCK -->
              <div class="navbar-form navbar-left navbar-search-block">

                <div class="search-field-container">
                  <input type="text" placeholder="View Shortcut" class="search-field">
                  <a href="#"><i class="ti-search"></i></a>
                </div>

                <!-- start of CLOSE BUTTON -->
                <a href="#" class="btn btn-danger search-close"><i class="ti-close"></i></a>
                <!-- end of CLOSE BUTTON -->

                <div class="container-fluid search-container">
                  <div class="row">

                    <!-- start of CONTACTS COLUMN -->
                    <div class="col-md-4">
                                           <ul>
                        <li>
                          <a href="update-profile.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Update Profile</span>
                          </a>
                        </li>

                        <li>
                          <a href="sponsor-income.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Sponsor Income</span>
                          </a>
                        </li>

                        <li>
                          <a href="binary-income-report.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Binary Income</span>
                          </a>
                        </li>

                        <li>
                          <a href="matching-income-report.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Matching Income</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- end of CONTACTS COLUMN -->

                    <!-- start of MESSAGES COLUMN -->
                    <div class="col-md-4">
              
                      <ul>
                        <li>
                          <a href="binary-bv-report.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Binary BV Report</span>
                          </a>
                        </li>

                        <li>
                          <a href="direct-sponsor-member-report.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Direct Member</span>
                          </a>
                        </li>

                        <li>
                          <a href="downline-member-report.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Downline Member</span>
                          </a>
                        </li>

                        <li>
                          <a href="direct-member-tree.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Direct Member Tree</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- end of MESSAGES COLUMN -->

                    <!-- start of RECENT COLUMN -->
                    <div class="col-md-4">
           
                      <ul>
                        <li>
                          <a href="binary-tree.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Binary Tree</span>
                          </a>
                        </li>

                        <li>
                          <a href="ewallet-transaction-history.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Transaction History</span>
                          </a>
                        </li>

                        <li>
                          <a href="check-ewallet-ballance.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Ewallet Ballance</span>
                          </a>
                        </li>

                        <li>
                          <a href="external-fund-tranfer.php">
                            <div class="img-container">
                              <img src="images/demoimage.gif" alt="">
                            </div>
                            <span style="color:#000;">Fund Transfer</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- end of RECENT COLUMN -->

                  </div>
                </div>

              </div>
              <!-- end of SEARCH BLOCK -->

              <ul class="nav navbar-nav">

                <!-- start of LANGUAGE MENU -->
               <!-- <li class="dropdown language-nav">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="images/United-Kingdom.png" data-no-retina  alt=""> English <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><img src="images/Spain.png" data-no-retina  alt=""> Spanish</a></li>
                    <li><a href="#"><img src="images/France.png" data-no-retina  alt=""> French</a></li>
                    <li><a href="#"><img src="images/Germany.png" data-no-retina  alt=""> German</a></li>
                    <li><a href="#"><img src="images/Italy.png" data-no-retina  alt=""> Italian</a></li>
                  </ul>
                </li> -->
                <!-- end of LANGUAGE MENU -->
                
                <!-- start of OPEN NOTIFICATION PANEL BUTTON -->
                <?php 
                $str11="select * from message where reciever_id='$id' and read_receiver=1 order by id desc";
                $res11=mysqli_query($GLOBALS["___mysqli_ston"], $str11);
                $count11=mysqli_num_rows($res11); ?>
                <li>
                  <a href="#" class="btn-show-chat">
                    <i class="ti-announcement"></i><span class="badge badge-warning"><?php echo $count11;?></span>
                  </a>
                </li>
                <!--<li  data-toggle="tooltip" data-placement="right" title="Check our Online Documentation">
                  <a href="#" class="search-field">
                    <i class="ti-heart" ></i>
                  </a>
                </li>-->
                <!-- end of OPEN NOTIFICATION PANEL BUTTON -->

              </ul>

              <ul class="nav navbar-nav navbar-right">

                <!-- start of USER MENU -->
                <li class="dropdown user-profile">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="height:60px;">
                    <div class="user-img-container">
                      <img src="<?php echo $userimage;?>" alt="My Image"> 
                    </div> 
                    Welcome <?php echo $f['username'];?> ! <br/> <?php //echo $f['user_rank_name']; ?><!--<span class="chat-status success"></span>-->
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="update-profile.php">My Profile</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                  </ul>
                </li>
                <!-- end of USER MENU -->

              </ul>
            </div>
            <!-- end of navbar-collapse -->
          </div>
          <!-- end of container-fluid -->
        </nav>