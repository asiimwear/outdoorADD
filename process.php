<?php

    require("connect.php");

    if(isset($_REQUEST["id"])){
      $id = stripslashes($_REQUEST["id"]) ;
      //escapes special characters in a string

      // $id = mysqli_real_escape_string($con,$id);

      $query = "UPDATE spaces SET booked = booked + 1, available = available - 1 WHERE id=$id";

      // $result = mysqli_query($con,$query) or die(mysql_error());

      // Perform a query, check for error
      if (!mysqli_query($con,$query))
        {
        echo ("Error description: " . mysqli_error($con));
        }

        else{
            header("Location: book.php?id=1&m=".$_REQUEST["id"]);
        }

    }

?>
