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


               
				
				
			



               

               

              <ul class="nav navbar-nav">

                <!-- start of LANGUAGE MENU -->
              <!--  <li class="dropdown language-nav">
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
                <!-- <li>
                  <a href="#" class="btn-show-chat">
                    <i class="ti-announcement"></i><span class="badge badge-warning"><?php echo $count11;?></span>
                  </a>
                </li>
 -->
                  <style type="text/css">
                  .goog-te-gadget .goog-te-combo
                  {
                    color:#000;
                    background-color: #fff ;
                    padding:10px;
                    width:150px;
                  }
                  .goog-te-gadget {
                    color:#dcdcdc;
                  }
                  .goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active{
                    color:#dcdcdc;
                  }
                  .goog-logo-link img{
                    display:none;
                    display:hidden;
                  }
                  .goog-te-banner-frame{
                    display:none;
                  }
                  .skiptranslate{
                    margin-top: 4px !important;
					margin-left: 115px;
                  }
				  .goog-te-gadget img{
						display:none !important;
					}
					.goog-te-gadget-simple .goog-te-menu-value span{
						padding-right:5px !important;
					}
					.goog-te-banner-frame{
						display:none !important;
					}
                  </style>

  
                <!-- <li  data-toggle="tooltip" data-placement="right">
                  <div id="google_translate_element" style="top:0px;"></div>
                <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,id,th,vi,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </li> -->
                <!-- end of OPEN NOTIFICATION PANEL BUTTON -->
<h3 style="margin-left: 300px;margin-top: 20px; color: white;" ><?php  echo date("l jS \of F Y");?></h3>
              </ul>
             

              <ul class="nav navbar-nav navbar-right">

                <!-- start of USER MENU -->
                <li class="dropdown user-profile">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="height:50px;">
                    <div class="user-img-container">
                    
                     <?php
                        // define('HOSTNAME','localhost');
                        // define('DB_USERNAME','vensrazg_pontus');
                        // define('DB_PASSWORD','.?u$y;uNI+$z');
                        // define('DB_DATABASE','vensrazg_pontus');
                        
                        // Create connection
                        $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                        $shops="select * from poc_registration  where user_id='$userid'";
                        $kd=mysqli_query($db,$shops);
                        // $db->query($shops);
                        // $res=mysqli_fetch_array($kd);
                       
                        while($data2=mysqli_fetch_array($kd))
                        {
                        //     $dbone = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                            
                
                ?>
                    
                      <img src="https://vensemart.com/vensemart_vendor/cmsadmin/warehouse_images/<?php echo $data2['image'];?>" alt="My Image">
                      <?php
                        }
                      ?>
                      
                      
                    </div> 
                    Welcome <?php echo $f['first_name']." ".$f['last_name'];?> ! <br/> <?php //echo $f['user_rank_name']; ?><!--<span class="chat-status success"></span>-->
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="update-profile.php">My Profile</a></li>
                   
                   <!--  <li><a href="support.php">Help</a></li> -->
                     <li><a href="../logoutpoc.php">Sign out</a></li>
                  </ul>
                </li>
                <!-- end of USER MENU -->

              </ul>
            </div>
            <!-- end of navbar-collapse -->
          </div>
          <!-- end of container-fluid -->
        </nav>