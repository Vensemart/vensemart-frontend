<?php
//include('lib/config.php');
//include("dashboard/includes/header.php"); 
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
 <?php include('includes/head.php'); ?>
</head>
<body>

    <?php include("includes/header.php"); ?>
	
	    <!--Message-Part-Start-->
		    <div class="alert alert-success" style="display:none;">
                  <button data-dismiss="alert">×</button>
                  <strong>Success ! </strong> Product Added Successfully. 
			</div>
			
			<div class="alert alert-error" style="display:none;">
                 <button data-dismiss="alert">×</button>
                  <strong>Error ! </strong> Something went wrong.please try again. 
			</div>
			
			<div class="alert alert-error1" style="display:none;">
                 <button data-dismiss="alert">×</button>
                  <strong>Warning ! </strong>please try to new. 
			</div>
			<!--Message-Part-End-->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <?php include('includes/mobile_navigation.php'); ?>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">info@yourdomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->



    <!-- main wrapper start -->
    <main>
        <!-- hero slider area start -->
        <div class="hero-slider-wrapper mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-active slick-dot-style">
                            <!-- slider item start -->
              <?php $banner=mysqli_query($GLOBALS["___mysqli_ston"], "select * from banner where status=1 order by id DESC Limit 2");
            while($data=mysqli_fetch_array($banner)) { ?> 
                            <div class="hero-item-inner">
                                <div class="hero-slider-item d-flex align-items-center bg-img" data-bg="<?php echo SITE_URL; ?>cmsadmin/cat_images/<?php echo $data['image'];?>">
                                    <div class="hero-slider-content">
                                        
                                      
                                        <a href="shop.php" class="btn btn-slider">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- slider item start -->

                            <!-- slider item start -->
                            <!--<div class="hero-item-inner">-->
                            <!--    <div class="hero-slider-item d-flex align-items-center bg-img" data-bg="assets/img/slider/home1-slide2.jpg">-->
                            <!--        <div class="hero-slider-content">-->
                            <!--            <h1>Serving Breakfast, <br> Lunch And Dinner</h1>-->
                            <!--                <h4>Best Place For All PPV Events Pastas, <br> Wings, Ribs, Gourmet Burgers & Seafood</h4>-->
                            <!--                    <a href="shop.html" class="btn btn-slider">shop now</a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- slider item start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider area end -->

        
		<div class="shop-main-wrapper pt-40 pb-40">
            <div class="container custom-container">
				<div class="row">
					<div class="col-lg-12 text-center">
						
						
						<ul class="nav nav-pills nav-justified" style="margin:0 -10px;">
						    <?php if(isset($_SESSION['userpanel_user_id']) && $_SESSION['userpanel_user_id'] != ""){ 
						        $userdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_SESSION['userpanel_user_id']."'")); 

                $tptal_repurchase11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as totalleftamount from eshop_purchase_detail where user_id='".$_SESSION['userpanel_user_id']."' and (product_type='Activation Product' || product_type='Upgrade Product') and pay_status=1"));
$anual=0;
if ($tptal_repurchase11['totalleftamount']>0) {
    $tptal_repurchase11['totalleftamount']=$tptal_repurchase11['totalleftamount'];
   
}
                                if($userdata['user_rank_name'] == 'Free User'){ ?>
                                    <li class='nav-item'>
        								<a class='nav-link active' data-toggle='tab' href='#s1'>Activation Product</a>
        							</li>             
                                <?php }else if($userdata['user_rank_name'] == 'Affiliate'){ ?>
                               <?php   if($tptal_repurchase11['totalleftamount'] >=100){ ?>
                                   <li class='nav-item'>
                                        <a class='nav-link active' data-toggle='tab' href='#s3'>Repurchase Product</a>
                                    </li>

                                 <?php }else {?>
                                    <li class='nav-item'>
                                        <a class='nav-link active' data-toggle='tab' href='#s2'>Upgrade Product</a>
                                    </li>
        							<li class='nav-item'>
                                        <a class='nav-link' data-toggle='tab' href='#s3'>Repurchase Product</a>
                                    </li>
                                <?php } } ?>
						    <?php }else{ ?>
    							<li class='nav-item'>
    								<a class='nav-link active' data-toggle='tab' href='#s1'>Activation Product</a>
    							</li>
    							<li class='nav-item'>
    								<a class='nav-link ' data-toggle='tab' href='#s2'>Upgrade Product</a>
    							</li>
    							<li class='nav-item'>
    								<a class='nav-link ' data-toggle='tab' href='#s3'>Repurchase Product</a>
    							</li>
							<?php } ?>
						</ul>
						
						<!--<ul class="nav nav-pills nav-justified" style="margin:0 -10px;">
						  <li class='nav-item'>
							<a class='nav-link active' data-toggle='tab' href='#s1' onclick="show_div('activation')">Activation Product</a>
						  </li>
						  <li class='nav-item'>
							<a class='nav-link ' data-toggle='tab' href='#s2' onclick="show_div('upgrade')">Upgrade Product</a>
						   </li>
						   <li class='nav-item'>
							 <a class='nav-link ' data-toggle='tab' href='#s3' onclick="show_div('repurchase')">Repurchase Product</a>
						   </li>
						   
						 </ul>-->
						<!--<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Activation Product</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Upgrade Product</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Repurchase Product</a>
						  </li>
						</ul>-->
						<br />
					</div>
				</div>
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <!--<div class="sidebar-title">
                                    <h3>categories</h3>
                                </div>-->
                                <div class="sidebar-body">

                                    <!-- mobile menu navigation start -->
                                    <div class="shop-categories">
                                        <nav>
                                            <ul class="mobile-menu">
                                                 <?php  $cat_query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_categories where parent_cat='0'"); 
                                                while($parent_cat = mysqli_fetch_array($cat_query)){
                                            ?>
                                            
                                                <li class="menu-item-has-children">
													<!--<a href="shop.php?cat_id=<?php echo $parent_cat['category_id']; ?>"><?php echo $parent_cat['name']; ?></a>-->
													<a href="#"><?php echo $parent_cat['name']; ?></a>
                                                    <ul class="dropdown">
                                                        <?php  $sub_cat_query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_categories where parent_cat='".$parent_cat['category_id']."'"); 
                                                            while($sub_cat = mysqli_fetch_array($sub_cat_query)){
                                                        ?>
                                                        <li><a href="shop.php?sub_cat_id=<?php echo $sub_cat['category_id']; ?>"><?php echo $sub_cat['name']; ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- mobile menu navigation end -->
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->
                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a href="#" data-target="grid-view" class="active"><i class="fa fa-th"></i></a>
                                                <a class="" href="#" data-target="list-view"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                               <!-- <select class="nice-select" name="sortby" >
                                                    <option value="trending">Relevance</option>
                                                    <option value="name-asc">Name (A - Z)</option>
                                                    <option value="name-desc">Name (Z - A)</option>
                                                    <option value="price-asc">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="brand-asc">Brand (A - Z)</option>
                                                    <option value="brand-desc">Brand (Z - A)</option>
                                                </select>-->
                                                <form id="sort-form" action="shop.php" method="get">
                                                    <input id="sort-by" type="hidden" name="type" value="<?php if(isset($_GET['type'])){ echo $_GET['type']; } ?>"/>
                                                    <input id="sort-by" type="hidden" name="sortby" value=""/>
                                                </form>
                                                <div class="nice-select" tabindex="0">
                                                    <span class="current">Relevance</span>
                                                    <ul class="list">
                                                        <li data-value="trending" onclick="sort_by('default');" class="option selected">Relevance</li>
                                                        <li data-value="sales" onclick="sort_by('name-asc');" class="option">Name (A - Z)</li>
                                                        <li data-value="sales" onclick="sort_by('name-desc');" class="option">Name (Z - A)</li>
                                                        <li data-value="rating" onclick="sort_by('price-asc');" class="option">Price (Low &gt; High)</li>
                                                        <!--<li data-value="date" onclick="sort_by('');" class="option">Rating (Lowest)</li>-->
                                                        <li data-value="price-asc" onclick="sort_by('brand-asc');" class="option">Brand (A - Z)</li>
                                                        <li data-value="price-asc" onclick="sort_by('brand-desc');" class="option">Brand (Z - A)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->
                            <?php if(isset($_GET['cat_id']) && $_GET['cat_id'] != ''){
							    $where = " AND category=".$_GET['cat_id'];
							}
							if(isset($_GET['sub_cat_id']) && $_GET['sub_cat_id'] != ''){
							    $where .= " AND sub_category=".$_GET['sub_cat_id'];
							}
							
							if(isset($_GET['sortby']) && $_GET['sortby'] != '' && $_GET['sortby'] == 'name-asc'){
							    $orderby = " order by product_name asc";
							}
							if(isset($_GET['sortby']) && $_GET['sortby'] != '' && $_GET['sortby'] == 'name-desc'){
							    $orderby = " order by product_name desc";
							}
							if(isset($_GET['sortby']) && $_GET['sortby'] != '' && $_GET['sortby'] == 'price-asc'){
							    $orderby = " order by price desc";
							}
							if(isset($_GET['sortby']) && $_GET['sortby'] != '' && $_GET['sortby'] == 'brand-asc'){
							    $orderby = " order by product_brand asc";
							}
							if(isset($_GET['sortby']) && $_GET['sortby'] != '' && $_GET['sortby'] == 'brand-desc'){
							    $orderby = " order by product_brand desc";
							}
							if (isset($_GET['pageno'])) {
                                $pageno = $_GET['page'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 10;
                            $offset = ($pageno-1) * $no_of_records_per_page;
                            $limit = ' LIMIT '.$offset.', '.$no_of_records_per_page;
                        ?>

							<div class="tab-content">
							<?php if(isset($_SESSION['userpanel_user_id']) && $_SESSION['userpanel_user_id'] != ""){ 
						        if($userdata['user_rank_name'] == 'Free User'){ ?>
							    <div class='tab-pane container fade in show active' id='s1'>
							<?php }else{?> 
							    <div class='tab-pane container fade' id='s1'>
							<?php } }else{ ?>
                                <div class='tab-pane container fade in show active' id='s1'>
                            <?php } ?>
                            <div class="shop-product-wrap row pt-40 grid-view">
                                <!--======================================================-->
                                
							<?php       
							
							$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_type like '%Activation Product%'".$where.$orderby);
							$tot_prod = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_type like '%Activation Product%'".$where.$orderby));
							$i = 1;
							
							while($acti_prod = mysqli_fetch_array($query)){ 
							    if($i == 1){ ?>
							         <!-- product single item start -->
                               <div class="col-md-4 col-sm-6">
							   <?php } ?>
							   <script>var anm = '<?php echo $tot_prod; ?>';</script>
							   <input type="hidden" name="tot_type" id="tot_type" value="s1">
                                    <!-- product grid start -->
                                    <input type="hidden" name="tot_data" id="tot_data" value="<?php echo $tot_prod; ?>">
                                    <div class="product-item mb-30">
                                        <div class="product-thumb">
                                            <a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=1">
                                                <img src="<?php echo SITE_URL.'cmsadmin/product_images/'.$acti_prod['actual_image'];?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=1" data-toggle="tooltip" title="" data-original-title="View Details"><i class="ion-bag"></i></a>
                                                
                                                <a href="javascript:void(0);" onclick="add_to_wishlist('<?php echo $acti_prod['product_id']; ?>')" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                            <div class="product-badge product-badge__2">
                                               <!-- <div class="product-label new">
                                                    <span>new</span>
                                                </div>-->
                                                <div class="product-label discount">
                                                    <span>-<?php echo $acti_prod['discount']; ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content">
                                                <div class="product-name">
                                                    <h5><a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=1"><?php echo $acti_prod['product_name']; ?></a></h5>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-old"><del></del></span>
                                                    <span class="price-regular"><?php echo CURRENCY.$acti_prod['price']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->
                                    <?php if($i == 1){ ?>
							         <!-- product list item end -->
                                </div>
							   <?php } 
							   $i++;
							   if($i > 1){ $i = 1; }?>
                                    <?php } ?>
                                <!--======================================================-->
                            </div>
                            <!-- product item list end -->

                            </div>
							
							<!--</div>-->
							<!--jaya-->
							
							
							<!--<div class="tab-pane fade" id="upgrade">-->
							
							<?php if(isset($_SESSION['userpanel_user_id']) && $_SESSION['userpanel_user_id'] != ""){ 
						        if($userdata['user_rank_name'] == 'Free User'){ ?>
							    <div class='tab-pane container fade' id='s2'>
							<?php }else{ ?> 
                        <?php   if($tptal_repurchase11['totalleftamount'] >=100){ ?>
                                <div class='tab-pane container fade' id='s2'>
                         
                            <?php }else{ ?>
							    <div class='tab-pane container fade in show active' id='s2'>
                            

							<?php }} }else{  ?>
                                <div class='tab-pane container fade' id='s2'>
                            <?php } ?>
						
							
								<!-- product item list start -->
                            <div class="shop-product-wrap row pt-40 grid-view" >
                                <!--======================================================-->
							<?php $query1 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_type like '%Upgrade Product%'".$where.$orderby);
							$tot_prod = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_type like '%Upgrade Product%'".$where.$orderby));
							$i = 1;
						
							while($acti_prod = mysqli_fetch_array($query1)){ 
							    if($i == 1){ ?>
							         <!-- product single item start -->
                                    <div class="col-md-4 col-sm-6">
							   <?php } ?>
							   <script>var anm = '<?php echo $tot_prod; ?>';</script>
							   <input type="hidden" name="tot_type" id="tot_type" value="s2">
                                    <!-- product grid start -->
                                    <div class="product-item mb-30">
                                        <input type="hidden" name="tot_data" id="tot_data" value="<?php echo $tot_prod; ?>">
                                        <div class="product-thumb">
                                            <a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=2">
                                                <img src="<?php echo SITE_URL.'cmsadmin/product_images/'.$acti_prod['actual_image'];?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=2" data-toggle="tooltip" title="" data-original-title="View Details"><i class="ion-bag"></i></a>
                                                
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                            <div class="product-badge product-badge__2">
                                               <!-- <div class="product-label new">
                                                    <span>new</span>
                                                </div>-->
                                                <div class="product-label discount">
                                                    <span>-<?php echo $acti_prod['discount']; ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content">
                                                <div class="product-name">
                                                    <h5><a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=2"><?php echo $acti_prod['product_name']; ?></a></h5>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-old"><del></del></span>
                                                    <span class="price-regular"><?php echo CURRENCY.$acti_prod['price']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->
                                    <?php if($i == 1){ ?>
							         <!-- product list item end -->
                                </div>
							   <?php } 
							   $i++;
							   if($i > 1){ $i = 1; }?>
                                    <?php } ?>
                                <!--======================================================-->
                            </div>
                            <!-- product item list end -->
							</div>
								<!--</div>-->
							<!--jaya-->
							
							<!--<div class="tab-pane fade " id="repurchase">-->
						

<?php if(isset($_SESSION['userpanel_user_id']) && $_SESSION['userpanel_user_id'] != ""){ 
                                if($userdata['user_rank_name'] == 'Free User'){ ?>
                                <div class='tab-pane container fade' id='s3'>
                            <?php }else{ ?> 
                        <?php   if($tptal_repurchase11['totalleftamount'] <100){ ?>
                                <div class='tab-pane container fade' id='s3'>
                         
                            <?php }else{ ?>
                                <div class='tab-pane container fade in show active' id='s3'>
                            

                            <?php }} }else{  ?>
                                <div class='tab-pane container fade' id='s3'>
                            <?php } ?>


							
								<!-- product item list start -->
                            <div class="shop-product-wrap row pt-40 grid-view">
                                  <!--======================================================-->
							<?php $query2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_type like '%Repurchase Product%'".$where.$orderby);
							$tot_prod = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM eshop_products WHERE product_type like '%Repurchase Product%'".$where.$orderby));
							$i = 1;
							
							while($acti_prod = mysqli_fetch_array($query2)){ 
							    if($i == 1){ ?>
							         <!-- product single item start -->
                                    <div class="col-md-4 col-sm-6">
							   <?php } ?>
							   <script>var anm = '<?php echo $tot_prod; ?>';</script>
							    <input type="hidden" name="tot_type" id="tot_type" value="s3">
                                    <!-- product grid start -->
                                    <div class="product-item mb-30">
                                        
                                        <div class="product-thumb">
                                            <a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=3">
                                                <img src="<?php echo SITE_URL.'cmsadmin/product_images/'.$acti_prod['actual_image'];?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=3" data-toggle="tooltip" title="" data-original-title="View Details"><i class="ion-bag"></i></a>
                                                
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                            <div class="product-badge product-badge__2">
                                               <!-- <div class="product-label new">
                                                    <span>new</span>
                                                </div>-->
                                                <div class="product-label discount">
                                                    <span>-<?php echo $acti_prod['discount']; ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content">
                                                <div class="product-name">
                                                    <h5><a href="product-details.php?id=<?php echo $acti_prod['product_id']; ?>&type=3"><?php echo $acti_prod['product_name']; ?></a></h5>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-old"><del></del></span>
                                                    <span class="price-regular"><?php echo CURRENCY.$acti_prod['price']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->
                                    <?php if($i == 1){ ?>
							         <!-- product list item end -->
                                </div>
							   <?php } 
							   $i++;
							   if($i > 1){ $i = 1; }?>
                                    <?php } ?>
                                <!--======================================================-->
                            </div>
                            <!-- product item list end -->

							
							</div>
							 
							<!-- start pagination area -->
                            <!--<div class="paginatoin-area text-center">
                               <?php //echo $tot_prod.'========'; ?>
                               <script> alert('hgshfshfs'); alert(anm);</script>
                                <ul class="pagination-box">
                                    <?php //$page = $_GET['page']; ?>
                                    <li><a class="previous" href="?page=1"><i class="ion-ios-arrow-left"></i>Previous</a></li>
                                    <li class="<?php if($page == 1 || $page == ''){ echo 'active'; } ?>"><a href="#">1</a></li>
                                    <li><a class="next" href="#">Next<i class="ion-ios-arrow-right"></i></a></li>
                                </ul>
                            </div>-->
                            <!-- end pagination area -->
							
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>

    </main>
    <!-- main wrapper end -->

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <!--<div class="col-md-5">
                                <div class="product-large-slider mb-20">
                                    <div class="pro-large-img">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="" />
                                    </div>
                                </div>
                            </div>-->
                            <!--<div class="col-md-7">
                                <div class="product-details-des quick-des">
                                    <h5 class="product-name"><a href="#">Private Selection Wild Caught</a></h5>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <div class="pro-review">
                                            <span>1 review(s)</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-old"><del>$90.00</del></span>
                                        <span class="price-regular">$70.00</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                        voluptua. Phasellus id nisi quis justo tempus mollis sed et dui.</p>
                                    <div class="availability mt-10 mb-20">
                                        <i class="ion-checkmark-circled"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                              <a href="cart.php" data-toggle="tooltip" title="Add to Cart"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                    <div class="tag-line mt-18">
                                        <h5>tags:</h5>
                                        <a href="#">fashion</a>
                                        <a href="#">barber</a>
                                    </div>
                                    <div class="like-icon mt-20">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                    <div class="share-icon mt-18">
                                        <h5>share product:</h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

    <!--== Start Footer Area Wrapper ==-->
    <?php include('includes/footer.php');?>
    <!--== End Footer Area Wrapper ==-->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="assets/js/active.js"></script>
</body>


</html>
<script>
function show_div(d){
    if(d == 'upgrade'){
        $("#s1").hide();
        $("#s3").hide();
        $("#s2").show();
    }else if(d == 'repurchase'){
        $("#s1").hide();
        $("#s2").hide();
        $("#s3").show();
    }else{
        $("#s2").hide();
        $("#s3").hide();
        $("#s1").show();
    }
}
function add_to_wishlist(pro_id){
    //alert(pro_id);
    $.ajax({
        url : "add-to-wishlist.php",
        type: 'post',
        data : {'id':pro_id},
        cache: false,
        success: function(data){
            alert(data);
        }
    });
}
function sort_by(value){
    $("#sort-by").val(value);
    $("#sort-form").submit();
}
  function search_result(search_value)
  {
    if(search_value!=""){
   // alert(search_value);return false;
   //window.location.href="search.php?q="+search_value;
   window.location.href="search.php";
    }
  }

</script>