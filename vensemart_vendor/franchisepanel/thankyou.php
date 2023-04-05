<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skyinfo Registration Confirmation</title>

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
    background-image: url(./images/login1.jpg);
    color: #8a8a8a;
    background-position: center;
    background-size: cover;
}
    </style>
  </head>

  <body class="login-page">
    <div class="animsition">

      <main class="login-container">

        <div class="panel-container">
          <section class="panel" style="width: 682px;">
            <header class="panel-heading">
             <img src="images/logo.png" class="big-logo">
              <h2>Registration Confirmation</h2>
            </header>
            <div class="panel-body">
              <h3 class="text-success">You have registered successfully with following details:</h3>
                <table class="table table-bordered table-hover table-striped">
             
                  
                 
                  <tr>
                    <th>Username</th>
                    <td><?php echo $_GET['username']; ?></td>
                  </tr>
                  
                  <tr>
                    <th>Password</th>
                    <td><?php echo $_GET['password']; ?></td>
                  </tr>                 
                </table>
                
                <p>
                  <br/>
                  <a class="btn btn-success" href="login.php" style="float: left;">Click here to login</a>
                  <a class="btn btn-success" href="register.php" style="float: right;">Register</a>
                </p>
             
             
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