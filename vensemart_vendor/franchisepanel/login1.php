<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lakshya Infotech Login Panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .login-page {
    /* background: no-repeat; */
    background-image: url(./images/lbg.jpg);
    color: #8a8a8a;
    background-position: center;
    background-size: cover;
}
    </style>


    <style type="text/css">
        body {
          background: url(./images/login1.jpg) top center no-repeat;
        }
        .input-group{
              padding-bottom: 12px;
        }
        #login-name {
            font-size: 65px;
            font-family: arabic typesetting;
            border-bottom-style: ridge;
            color: white;
        }
        
        #login {
           /* background-color: rgba(13, 13, 13, 0.2);*/
            min-height: 500px;
            padding:28px 98px 25px 107px;
            margin: 0 auto;
        }
        
        .user {
            font-size: 29px;
            font-family: arabic typesetting;
            color: white;
        }
        
        #iconn {
          border: 1px solid #fff;
   border-color: #ffffff;
    color: white;
    padding: 8px 14px;
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
    border-right: none;
        }
        
        #iconn1 {
            border: 1px solid #fff;
   border-color: #ffffff;
    color: white;
    padding: 8px 14px;
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
    border-right: none;

        }
        
        #text1 {
               border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
            height: 43px;
                background: #d2d2d2b5;
        }
        
        #text2 {
                border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;    
            height: 43px;
                background: #d2d2d2b5;
        }
        
       .btn {
    width: 100%;
    height: 45px;
    font-size: 18px;
}
input[type=radio], input[type=checkbox] {
    margin: 7px 0 0;
    margin-top: 1px \9;
    line-height: normal;
}
.radio, .checkbox {
    display: block;
    min-height: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-left: 20px;
        color: #fff;
}

.forgotPwd {
    text-align: right;
    margin-top: 12px;
}

.forgotPwd a {
   color: #fff;
   font-size: 15px;
}
.radio input[type=radio], .radio-inline input[type=radio], .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox] {
    float: left;
    margin-left: -20px;
}
.loginbtn{
  border-radius: 5px;


  }
  .btn-success {
    color: #fff;
    background-color: #FE5387;
    border-color: #FE5387;
}

  .btn-success:hover {
    color: #fff;
    background-color: #ed326b;
    border-color: #ed326b;
}

.subtitle {
  margin: 0 0 2em 0;
}
.fancy {
  line-height: 0.5;
  text-align: center;
}
.fancy span {
  display: inline-block;
  position: relative;  
}
.fancy span:before,
.fancy span:after {
      content: "";
    position: absolute;
    height: 0px;
    border: 1px solid white;
    top: 58px;
    width: 163px;
}
.fancy span:before {
  right: 100%;
  margin-right:0px;
}
.fancy span:after {
  left: 100%;
  margin-left: 0px;
}

hr{
      border-bottom: 1px solid #fff;
}

@media only screen and (max-width: 600px) {
.forgotPwd {
    text-align: right;
    margin-top: -33px;
}
}
    </style>
  </head>

  <body class="login-page">
    <div class="animsition">

      <main class="login-container">

        <div class="panel-container">
          <section class="panel">
            <header class="panel-heading">
             <img src="images/logo.png" class="big-logo">
              <h2>User Login Panel</h2>
            </header>
            <div class="panel-body">
              <form action="../post-action.php" method="post">
               <input name="action" type="hidden" value="loginuser" />
                 <?php if($_GET['msg']!='') { ?> <p class="text-center"><div style="color:red; font-size:14px; font-weight:bold;"><span style="color:#F00;padding-left:10px;"><?php if($_GET['msg']=='wrong') { echo "Wrong Credential Details!";} else if($_GET['msg']=='logout') { echo "You Are Logout!";} else if($_GET['msg']=='Wrong Security Code') { echo "Please Fill correct captcha.";} else { echo urldecode($_GET['msg']); } ?></span><br/><br/></div>
              </p><?php } ?>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username"  name="username" required>
                </div>

                <div class="form-group">
                  <label for="password">Password</label> <a href="forgot.php" class="pull-right forgot-link"><small>Forgot?</small></a>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password"  required>
                </div>
                
                <div class="form-group text-center">
                  <input type="submit" name="submit" value="Sign in" class="btn-login btn btn-primary">
                </div>

             
               <!--  <div class="social-login">
                  <p class="text-center">Like Us On
              </p>
                 <p class="text-center"><a href="https://www.facebook.com/" target="_blank"><i class="ti-facebook"></i></a> <a href="https://www.linkedin.com/company/"  target="_blank"><i class="ti-google"></i></a> <a href="https://twitter.com/" target="_blank"><i class="ti-twitter"></i></a> </p>
                </div> -->
              </form>
             
              <div class="register-now">
                Not registered? <a href="register.php">Register now</a>
              </div>
            </div>
          </section>
        </div>
      </main> <!-- /playground -->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.11.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/jquery.animsition.min.js"></script>
      <script src="js/login.js"></script>

    </div>
  </body>
</html>