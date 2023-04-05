<?php
ob_start();
include("../lib/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo PROJECT_NAME;?> </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .login-page {
            /* background: no-repeat; */
            background-image: url(images/428f28de525ea9384046d21634f81c9e.jpg);
            color: #8a8a8a;
            background-position: center;
            background-size: cover;
            min-height: 150vh;
        }
        
        .registration {
            background: #fff;
            padding: 10px;
            margin-top: 50px;
        }
        
        .registration-body {
            padding: 0px 25px;
            text-align: center;
        }
        
        .register-footer {
                padding: 2px 20px;
        }
        
        .heading {
            padding-bottom: 34px;
        }
        .form-group{
            text-align: left;
        }
    </style>

    <style type="text/css">
      
        
        .input-group {
            padding-bottom: 12px;
        }
        #iconn {
            border: 1px solid #c4bbbb;
            border-color: #edebeb;
            color: white;
            padding: 8px 14px;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
            border-right: none;
        }
        
        .text1 {
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
            height: 43px;
            background: #d2d2d2b5;
        }
       
        .ico {
            color: #333;
        }
        
        .btn {
            width: 100%;
            height: 45px;
            font-size: 18px;
        }
        
        input[type=radio],
        input[type=checkbox] {
            margin: 7px 0 0;
            margin-top: 1px \9;
            line-height: normal;
        }
        
        .radio,
        .checkbox {
            display: block;
    min-height: 34px;
    margin-top: 12px;
    margin-bottom: 15px;
    padding-left: 16px;
    color: #2c2727;
        }
        
        .forgotPwd {
            text-align: right;
            margin-top: 12px;
        }
        
        .forgotPwd a {
            color: #2c2727;
            font-size: 14px;
        }
        
        .radio input[type=radio],
        .radio-inline input[type=radio],
        .checkbox input[type=checkbox],
        .checkbox-inline input[type=checkbox] {
                float: left;
    margin-left: -18px;
    margin-top: 5px;
        }
        
        .btn-success {
            color: #fff;
            background-color: #FE5387;
            border-color: #FE5387;
            border-radius: 5px;
        }
        
        .btn-success:hover {
            color: #fff;
            background-color: #ed326b;
            border-color: #ed326b;
        }
        
        @media only screen and (max-width: 600px) {
            .forgotPwd {
                text-align: right;
                margin-top: -49px;
            }
        }
        i.fa.fa-times {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background: #f00;
            border-radius: 50px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
        .fullLengthTwoinput{
            display:flex;
            justify-content:flex-start;
        }
        .fullLengthTwoinput .mobilecode{
            width:81px;
            margin-right:10px;
        }
    </style>
</head>

<body class="login-page">

    <div class="row">

        <div class="col-md-4 center-block">
            <div class="registration">
                <div class="registration-body">
                    <i class="fa fa-times" onclick="history.back()"></i>
                    
                    <h3 class="heading">Register to <?php echo PROJECT_NAME;?> </h3>

                    <form action="../post-action.php" method="post" enctype="multipart/form-data">
                         <input name="action" type="hidden" value="Poc_Registration" />
                           
                          <div class="form-group">
                            <label for="Name">Store Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="fullname" required>
                            
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                            
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Mobile Number</label>
                            <div class="fullLengthTwoinput">
                                <select class="form-control mobilecode" name="countrycode">
                                    <?php 
                                     $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                                    $shops="select * from countries  where status='1' ORDER BY  id desc";
                                    $kd=mysqli_query($db,$shops);
                                    // $db->query($shops);
                                    // $res=mysqli_fetch_array($kd);
           
                                    while($data2=mysqli_fetch_array($kd))
                                    {
                                    ?>
                                        <option class="form-option"><?php echo $data2['country_code'];?></option>
                                        
                                    <?php
                                     }
                                    ?>
                                </select>
                                <input class="form-control">
                            </div>
                            <!--<input type="text" minlength="0" maxlength="10" class="form-control inumber" placeholder="Enter mobile" name="phone" required>-->
                            
                          </div>
                          
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="password" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="confirmpassword" required>
                          </div>
                          
                          <div class="form-group">
                              <label for="country">Country</label>
                              <select name="country" class="form-control">
                                   <option value="">Choose the Country</option>
                            <?php 
                                $db = mysqli_connect('localhost', 'vensrazg_pontus', '.?u$y;uNI+$z', 'vensrazg_pontus');
                                $countries="select * from countries  where status='1' ORDER BY  id desc";
                                $kd=mysqli_query($db,$countries);
                                while($data2=mysqli_fetch_array($kd))
                                {
                            ?>
                            <option value="<?php echo $data2['id'];?>"><?php echo $data2['country_name'];?></option>
                            <?php
                               }
                             ?>
                                  
                              </select>
                          </div>
                          
                          <div class="form-group ">
                            <label class="form-check-label" for="address">Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="address" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputGroupFile01">Upload an identity</label>  
                            <input type="file" class="form-control" id="upload" name="upload" required>
                          </div>
                          
                          
                          
                           <div class="form-group">
                            <label for="inputGroupFile01">Upload a Store Image</label>  
                            <input type="file" class="form-control" id="upload" name="storeimage" required>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.animsition.min.js"></script>
    <script src="js/login.js"></script>

    </div>
    <script>
        $(document).ready(function(){
           $(document).on('input', '.inumber', function() {
                 $(this).val($(this).val().replace(/\D/g, ''))
            });
        });
    </script>
</body>

</html>