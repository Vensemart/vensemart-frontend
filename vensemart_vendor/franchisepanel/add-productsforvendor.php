<?php 
ob_start();
include("header.php");
if(isset($_POST['submit']))
{
       $user_id=$_SESSION['puc_user_id'];
       $storeId=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from stores where franchise_id='$user_id'"));
       $storeId_new=$storeId['id'];
       
    
  $value1=$_POST['category'];
  $value2=$_POST['subcategory'];
  $value3=$_POST['product_title'];
  $value4=$_POST['productdescription'];
  
  $value5=$_POST['productprice'];
  $value6=$_POST['discount'];
  $value7=$_POST['quantity'];
  $value8=$_POST['availabilityinstock'];
  
  $value9=$_POST['uom_id'];
  
  $image = '';
   
    if(isset($_FILES['upload']['name']) && $_FILES['upload']['name'] != ''){
        $image=time().$_FILES['upload']['name'];
        $uploads_dir = '../../Vensemart/storage/app/product_images';
        $tmp_name =$_FILES["upload"]["tmp_name"];
        move_uploaded_file($tmp_name, $uploads_dir."/".$image); 
    }
    
    
   
  
  $date=date('Y-m-d');

//   $mob=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from my_prospects where mobile='$value2'"));
//   $email=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from my_prospects where email='$value3'"));
//   if($mob>0)
//   {
//         header("location:add-prospects.php?msg=Mobile Number Already Exits Try Different Number!");
//         exit;
//   }
//   if($email>0)
//   {
//           header("location:add-prospects.php?msg=Email  Already Exits Try Different email!");
//           exit;
//   }

   
//   $stop_date1 = date('Y-m-d', strtotime($date . ' +30 day'));
  mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `products` (`shop_id`, `category_id`, `sub_cat_id`, `product_title`, `product_Description`, `product_image`, `product_price`,`discount`,`quantity`,`uom_id`,`in_stock`,`status`) VALUES ('$storeId_new', '$value1', '$value2', '$value3', '$value4', '$image', '$value5','$value6','$value7','$value9','$value8','1')");
  
  header("location:add-productsforvendor.php?msg=Product Added Sucsessfully!");
}
?>
<!DOCTYPE html>
<html lang="en">
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
            <!--<h1>Withdrawal Request</h1>-->
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo urldecode(@$_GET['msg']);?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">e-Wallet</a></li>
              <li><a href="#">e-Wallet Withdrawal Request</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <!--<div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">-->

           <form name="addproducts" method="post"  enctype="multipart/form-data">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Add Products</h3>
                </header>
                <header class="panel-heading">
                 <!--<h3>NOTE : Your prospects will valid for 1 month only </h3>-->
                <br/></header>
                <div class="panel-body">
           
                     <div class="form-group">
                         <label for="exampleInputAddress">Category</label>
                      <!--<input type="text" name="first_name9" value="" class="form-control" id="exampleInputCity">-->
                          <div class="input-group">
                          <select class="form-control" name="category" id="categorysdfdf" required="">
                              <option value="">Choose the Category</option>
                              <?php
                                $query="select * from category where status='1'";
                                $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from category where status='1'"); 
                                  while($data1=mysqli_fetch_array($data))
                                    {
                                        ?>
                                        <option value="<?php echo $data1['id']; ?>"><?php echo $data1['category_name']; ?></option>
                                        <?php
                                    }
                              ?>
                         
                         <!--<option value="no">No</option>-->
                        </select>
                        </div>
                    </div>
                    
                    
                    
                     <div class="form-group">
                         <label for="exampleInputAddress">SubCategory</label>
                      <!--<input type="text" name="first_name9" value="" class="form-control" id="exampleInputCity">-->
                          <div class="input-group">
                          <select class="form-control" name="subcategory" id="sub-category-dropdown" required="">
                              <option value="">Choose the Sub Category</option>
                              
                        </select>
                        </div>
                    </div>
           
               
                    <div class="form-group">
                      <label for="exampleInputAddress">Product title</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="product_title" type="text" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>

                      <div class="form-group">
                          <label for="exampleInputAddress">Product Description </label>
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <textarea name="productdescription"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required > </textarea>
                            
                      
                          </div>
                     </div>

                      <div class="form-group">
                      <label for="exampleInputAddress">Product Image</label>
                      <div class="input-group">
                        
                        <input name="upload" type="file"    class="form-control" accept="image/*" required />
                  
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputAddress">Product Price</label>
                      <div class="input-group">
                        <span class="input-group-addon">₦</span>
                         <input name="productprice" type="number" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                      </div>
                    </div>

                      <div class="form-group">
                         <label for="exampleInputAddress">Discount (%)</label>
                      <div class="input-group">
                        <span class="input-group-addon">%</span>
                         <input name="discount" type="text" minlength="0" maxlength="3" class="inumber"  tabindex="1" value=""   style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                      </div>
                    </div>
                    
                     <div class="form-group">
                         <label for="exampleInputAddress">Quantity</label>
                      <div class="input-group">
                        <span class="input-group-addon">Q</span>
                         <input name="quantity" type="number" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                      </div>
                    </div>
                    
                    
                      <div class="form-group">
                         <label for="exampleInputAddress">Unit of Measurement(UOM)</label>
                      <!--<input type="text" name="first_name9" value="" class="form-control" id="exampleInputCity">-->
                          <div class="input-group">
                          <select class="form-control" name="uom_id"  required="">
                              <option value="">Choose the UOM</option>
                              <?php
                                $query="select * from uom where status='1'";
                                $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from uom where status='1'"); 
                                  while($data1=mysqli_fetch_array($data))
                                    {
                                        ?>
                                        <option value="<?php echo $data1['id']; ?>"><?php echo $data1['name']; ?></option>
                                        <?php
                                    }
                              ?>
                         
                         <!--<option value="no">No</option>-->
                        </select>
                        </div>
                    </div>
                    
                   <div class="form-group">
                         <label for="exampleInputAddress">Availability in Stock</label>
                      <!--<input type="text" name="first_name9" value="" class="form-control" id="exampleInputCity">-->
                          <div class="input-group">
                          <select class="form-control" name="availabilityinstock" id="availabilitystock" required="">
                         <option value="yes">Yes</option>
                         <option value="no">No</option>
                        </select>
                        </div>
                    </div>
                   
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          <!--</div> -->
          <!-- / row -->

         

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
        
         $(document).on('input', '.inumber', function() {
                 $(this).val($(this).val().replace(/\D/g, ''))
            });
        
        $(document).on('change','#categorysdfdf' ,function() {
            var category_id = this.value;
            
            $.ajax({
                url: "fetch-subcategory-by-category.php",
                type: "POST",
                data: {category_id: category_id},
                dataType:"json",
                cache: false,
                success: function(result){
                    
                var html="";
                
                let data = [result];
                
            //     var count=result.length;
              
                if(result==null)
                {
                     html+="<option value>No SubCategory Found</option>";
                    
                
                }
                else
                {
                    for(var i=0;i<result.length;i++)
                    {
                       
                            html+="<option value="+result[i].id+">"+result[i].name+"</option>";
                        //      data.map((data , key) => {
                       
                       
                        // });
                    }
                }
                
                // html+="<option value="">Choose the Sub Category</option>";
               
                // return false;
                
                // $.each(result, function(key,value) {
                //   console.log(key);
                // //   html+="<option value="+value->id+">"+value.name+"</option>"
                //   // Will stop running after "three"
                  
                // });
                $("#sub-category-dropdown").html(html);
                }
            });
         });
        
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
  <script>
$(document).ready(function() {
   
    
});
</script>
  </body>
</html>