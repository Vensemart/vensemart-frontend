<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> NETASK INDIA PVT. LTD . </title>

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
            background-image: url(./images/franchise8.jpg);
            color: #8a8a8a;
            background-position: center;
            background-size: cover;
        }
        
        .registration {
            background: #fff;
            padding: 10px;
            margin-top: 100px;
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
    </style>
</head>

<body class="login-page">

    <div class="row">

        <div class="col-md-4 center-block">
            <div class="registration">
                <div class="registration-body">
                    <img src="../dashboard/images/logo2.png" class="big-logo" style="width: 180px;">
                    <h3 class="heading">Login to  NETASK INDIA PVT. LTD back office</h3>

                    <form action="../post-action.php" method="post">
                        <input name="action" type="hidden" value="pocloginuser" />
                        <?php if($_GET['msg']!='') { ?>
                            <p class="text-center">
                                <div style="color:red; font-size:14px;font-weight:bold;"><span style="color:#F00;padding-left:10px;"><?php if($_GET['msg']=='wrong') { echo "Wrong Credential Details!";} else if($_GET['msg']=='logout') { echo "You Are Logout!";} else if($_GET['msg']=='Wrong Security Code') { echo "Please Fill correct captcha.";} else { echo urldecode($_GET['msg']); } ?></span>
                                    <br/>
                                    <br/>
                                </div>
                            </p>
                            <?php } ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="iconn"><i class="far fa-user ico"></i></span>
                                        <input type="text" class="form-control text1" id="username" placeholder="Username" name="username" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <!--  <a href="forgot.php" class="pull-right forgot-link"><small>Forgot?</small></a> -->
                                        <span class="input-group-addon" id="iconn"><i class="fas fa-unlock-alt ico"></i></span>
                                        <input type="password" class="form-control text1" id="password" placeholder="Password" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" name="submit" value="Sign in" class="btn-login btn btn-success">
                                </div>

                </div>

                <div class="row register-footer">
                    <div class="col-md-5 col-sm-12">
                        <!--<label class="checkbox">
                            <input type="checkbox" value="remember-me">Remember Me
                        </label>-->
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="forgotPwd">
                            <a href="forgotpoc.php"><i>Forgot Your Password?</i></a>
                        </p>
                    </div>
                </div>

                <!--  <div class="social-login">
                  <p class="text-center">Like Us On
              </p>
                 <p class="text-center"><a href="https://www.facebook.com/" target="_blank"><i class="ti-facebook"></i></a> <a href="https://www.linkedin.com/company/"  target="_blank"><i class="ti-google"></i></a> <a href="https://twitter.com/" target="_blank"><i class="ti-twitter"></i></a> </p>
                </div> -->
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
</body>

</html>