<?php
    require("connect.php");

    if(isset($_POST["search"]))
    {
    	$search = mysqli_real_escape_string($con, $_POST["search"]);
    	$query = "
    	SELECT * FROM spaces
    	WHERE location LIKE '%".$search."%'
    	";

      $result = mysqli_query($con, $query);
    }
    else
    {
    	echo "type in a query";
    }

?>

<html>

  <head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/search.css" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </head>

  <body>

    <div class="container mt-5 mb-5">
<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2 class="text-center">Search Results for <?php echo $_POST["search"] ?></h2><br><br>
    <ul class="timeline">
      <?php
              if(mysqli_num_rows($result) > 0)
              {
                  while($row = mysqli_fetch_array($result))
                  {
                      echo "<li>";
                      echo "<a href='book.php?id=".$row["id"]."'>".$row["name"]. ",". $row["location"]."</a>";
                      echo "<a href='book.php?id=".$row["id"]."' class='float-right'>Shs.".$row["price"]."</a>";
                      echo "<p>".$row["description"]."</p>";
                      echo "</li>";
                  }

              }
              else{
                  // echo "data not found";
              }
       ?>
    </ul>
  </div>
</div>
</div>
+  </body>

</html>
