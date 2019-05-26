<?php
    require("connect.php");

    if (isset($_REQUEST['address']) && isset($_REQUEST['location']) && isset($_REQUEST['available'])
        && isset($_REQUEST['price']) && isset($_REQUEST['description'])){

        // removes backslashes
        $address = stripslashes($_REQUEST['address']);
        $location = stripslashes($_REQUEST['location']);
        $available = stripslashes($_REQUEST['available']);
        $price = stripslashes($_REQUEST['price']);
        $description = stripslashes($_REQUEST['description']);

        //escapes special characters in a string
         $address = mysqli_real_escape_string($con,$address);
         $location = mysqli_real_escape_string($con,$location);
         $available = mysqli_real_escape_string($con,$available);
         $price = mysqli_real_escape_string($con,$price);
         $description = mysqli_real_escape_string($con,$description);

         $query = "INSERT into `spaces` (name, location, available, booked, price, description)
            VALUES ('$address','$location', '$available', 0 ,'$price','$description')";

         $result = mysqli_query($con,$query);

         if($result){
              header("Location: dashboard.php");
          }

          else echo mysqli_error($con);

        }

 ?>
