<?php
  require('connect.php');

  if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['phoneNumber'], $_REQUEST['fname'],$_REQUEST['lname'],
      $_REQUEST['location'],$_REQUEST['password'],$_REQUEST['confirmpass'])){
      // removes backslashes
      $username = stripslashes($_REQUEST['username']);
      $email = stripslashes($_REQUEST['email']);
      $phoneNumber = stripslashes($_REQUEST['phoneNumber']);
      $fname = stripslashes($_REQUEST['fname']);
      $lname = stripslashes($_REQUEST['lname']);
      $location = stripslashes($_REQUEST['location']);
      $password = stripslashes($_REQUEST['password']);
      $confirmpass = stripslashes($_REQUEST['confirmpass']);

      //escapes special characters in a string
       $username = mysqli_real_escape_string($con,$username);
       $email = mysqli_real_escape_string($con,$email);
       $phoneNumber = mysqli_real_escape_string($con,$phoneNumber);
       $fname = mysqli_real_escape_string($con,$fname);
       $lname = mysqli_real_escape_string($con,$lname);
       $location = mysqli_real_escape_string($con,$location);
       $password = mysqli_real_escape_string($con,$password);
       $confirmpass = mysqli_real_escape_string($con,$confirmpass);

       $query = "INSERT into `users` (username, email, password, fname, lname, contact, location)
          VALUES ('$username','$email', '".md5($password)."', '$fname','$lname','$phoneNumber', '$location')";

       $result = mysqli_query($con,$query);

       if($result){
        echo "<div class='form'>
                <h3>You are registered successfully.</h3>
                  <br/>Click here to <a href='login.php'>Login</a></div>";
        }

      }
?>
