<?php
    require('connect.php');
    session_start();


    if (isset($_POST['email']) && isset($_POST['password'])){

      $email = stripslashes($_REQUEST['email']);
      //escapes special characters in a string
      $email = mysqli_real_escape_string($con,$email);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($con,$password);

      $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
      $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

      if($rows==1){
          $_SESSION['username'] = $email;
          // Redirect user to index.php
          header("Location: home.php");
      } else{
          header("Location: logon.php?error=1");
      }

    }
    else{

      }
?>
