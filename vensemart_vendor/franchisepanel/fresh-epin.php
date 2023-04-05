<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
      <script type="text/javascript">
function ValidateData(form)
{
 var chks = document.getElementsByName('list[]');
 var hasChecked = false;
 for (var i = 0; i < chks.length; i++)
 {
  if(chks[i].checked)
  {
   hasChecked = true;
   break;
  }
 }
 if (hasChecked == false)
 {
  alert("Please select at least one Request.");
  return false;
 }
} 
function Check(chk)
{
 var chk = document.getElementsByName('list[]');
 if(document.myform.Check_All.value=="Check All")
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = true ;
  document.myform.Check_All.value="UnCheck All";
 }
 else
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = false ;
  document.myform.Check_All.value="Check All";
 }
}
</script>
    <div class="animsition">  
    
    <?php include("sidebar.php");?>
      <main id="playground">
 
      
         <?php include("top.php");?>
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>My Fresh E Pins</h1>
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
       
          </div>
 
          <div class="col-md-4" style="float:right;">
          <p style="color:green;font-size:20px;"><?php echo $_GET['msg'];?></p> 
           <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">E Pins</a></li>
              <li><a href="#">My Fresh E Pins</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">My Fresh E Pins</h4>
                </header>
                <div class="panel-body">
          <form name="myform" onSubmit="return ValidateData(this);" method="post"  action="transferpin.php">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                             <th>
                                    <input type="button" name="Check_All" value="Check All" onclick="Check(document.myform.check_list)" />
                                </th>
                        <th>Pin No</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Used By</th>
                        <th>Used Date</th>
                       
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from franchise_pins where receiver_id='$userid'  and status='0' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                         <td>
                            <input type="checkbox" name="list[]"  value="<?php echo $data1['pin_no'] ?>">
                         </td>
                        <td><?php echo $data1['pin_no'];?></td>
                         <td><?php echo $data1['amount'];?></td>
                                <td>Fresh</td>
                          <td><?php echo $data1['crt_date'];?></td>
                        <td><?php echo $data1['used_by'];?></td>
                          <td><?php echo $data1['t_date'];?></td>
                         
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>

    <div style="text-align:center;"><input type="text"  name="user" value="" placeholder="Enter Userid / Username"  id="sponsorid" required> <br><span id="checksponser"></span></div><br/><br/>
                         <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                     
                                        <input name="submit" type="submit" class="btn btn-primary" id="Show" value="Done" onClick="setTimeout('window.location.reload()',3000);">
                                    </div>
                                </div></form>
                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

        <!--<div class="col-md-12 text-center">

 <a href="bh_export_fresh_epin.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div>-->


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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
               <script type="text/javascript">
     $(document).ready(function() {
        //alert('hello');
    $("#sponsorid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var sponsorid = $(this).val();
    if(sponsorid.length < 1){$("#checksponser").html('');return;}
    if(sponsorid.length >= 1){
    $("#checksponser").html('<img src="images/preloader.gif" />');
    $.post('regis12.php', {'username':sponsorid}, function(data) {
    $("#checksponser").html(data);
    });
    }
    }); 
    });
</script>
  </body>
</html>