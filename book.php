<?php
    require("connect.php");

    if(isset($_GET["id"]))
    {
      $id = $_GET['id'];
      $query = "
      SELECT * FROM spaces
      WHERE id='".$id."'
      ";

      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0)
      {
          $row = mysqli_fetch_array($result);
      }

    }

    if(isset($_GET["m"])){
      $m = stripslashes($_REQUEST["id"]) ;
    }

    $alert = '<div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>
      Enter a valid email address
    </div>'

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
            <h1 class="text-center"><?php echo $row['name']; ?></h1>
            <p class="text-center">Description of the booking space located in <?php echo $row["location"]; ?> </p>
            <p><?php echo $row["description"]; ?>
              <br><br>
              <hr>
            <div class="row">
                <div class=col-md-4><h4>Total Space</h4></div>
                <div class=col-md-4></div>
                <div class=col-md-4><h3><?php echo $row["available"]; ?></h3></div>
            </div>
            <hr>
            <div class="row">
                <div class=col-md-4><h4>Booked Space</h4></div>
                <div class=col-md-4></div>
                <div class=col-md-4><h3><?php echo $row["booked"]; ?></h3></div>
            </div>
            <hr>
            <div class="row">
                <div class=col-md-4><h4>Price</h4></div>
                <div class=col-md-4></div>
                <div class=col-md-4><h3>Ush.<?php echo $row["price"]; ?></h3></div>
            </div><br><hr>
            <div class="row">
                <form action="process.php?id='1'" method="post">
                  <div class="col-auto">
                      <button class="btn btn-lg btn-success" type="submit">Book Now</button>
                  </div>
                </form>


            </div>
          </div>

        </div>
      </div>
  </body>
</html>
