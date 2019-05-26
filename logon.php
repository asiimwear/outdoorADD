<html>
<?php
        $msg = "";
    if(isset($_REQUEST['error'])){
        $msg = "Invalid Email Address or Password";
    }
?>

  <head>
    <title>User Login</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/scripts.js"></script>
  </head>

  <body>
    <style>body{ background-image: url("img/adv.jpg"); background-repeat: no-repeat, repeat; background-size: cover;}</style>

    <div class="container login-container">
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 login-form-2">
                    <h1> Outdoor advertising space booking system.</h1>
                    <br />
                    <br />
                    <h3>Login</h3>
                    <form action="login.php" method="post">
                      <p style="color:pink;" class="text-center"><?php echo $msg; ?></p>
                        <div class="form-group">
                            <input required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input required type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>

                        <div class="form-group">

                            <br>
                            <a href="register.html" class="ForgetPwd" value="Login">Don't have an account with us?</a><br><br>
                            <a href="adminlogin.php" class="ForgetPwd" value="Login">Are you an Admin?</a>
                        </div>
                    </form>
                </div>

                <div class="col-md-3"></div>
              </div>
  </body>

</html>
