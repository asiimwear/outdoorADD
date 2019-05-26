<html>

    <?php
        session_start();

        if(!isset($_SESSION["username"])){
            header("Location: adminlogout.php");
        }

    ?>

  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/dash.css" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/dash.js"></script>
  </head>

  <body>

    <header>
<div class="container bg-info p-5 ">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="nav navbar-nav navbar-right">
        <a class="nav-item nav-link active" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="locations.php">Locations</a>
        <a class="nav-item nav-link" href="users.php">Users</a>
        <a class="nav-item nav-link" href="adminlogout.php">Logout</a>
      </div>
    </div>
  </nav>
</div>
</header>
<!---->
<main>
<div class="container my-5">
     <div class="card-body text-center">
  <h4 class="card-title">Locations Recently Added</h4>
  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
</div>
  <div class="card">
      <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> Add a new Location</button>
      <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Space</th>
              <th scope="col">Location</th>
              <th scope="col">Available</th>
              <th scope="col">Booked</th>
            </tr>
          </thead>
          <tbody>
            <?php
                require("connect.php");

                $query = "
                SELECT * FROM spaces";

                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<th>".$row["id"]."</th>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["location"]."</td>";
                        echo "<td>".$row["available"]."</td>";
                        echo "<td>".$row["booked"]."</td>";
                        echo "</tr>";
                    }

                }
                else{
                    // echo "data not found";
                }
            ?>
          </tbody>
        </table>
  </div>
  <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
        <div class="card-body text-center">
          <h4 class="card-title">Add new advertising space</h4>
          <p class="card-text">Please fill in all the required fields and submit.</p>
        </div>
          <div class=" card col-8 offset-2 my-2 p-3">
        <form action="addloc.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="address" id="listname" placeholder="Enter space address">
          </div>
          <div class="form-group">
            <input  type="text" class="form-control" name="location" id="datepicker" placeholder="Enter Location">
          </div>
          <div class="form-group">
            <input  type="text" class="form-control" name="available" id="available" placeholder="Enter Available Spaces">
          </div>
          <div class="form-group">
            <input  type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="description" id="description" placeholder="Enter a short description"></textarea>
          </div>

         <div class="form-group text-center">
           <button type="submit" rows="20" class="btn btn-block btn-primary">Add Advertising Space</button>
        </div>
      </form>
  </div>
  </div>
</div>
</div>
</div>
</main>
<!---->

<!---->
<footer >
<div class="container bg-info p-5">

</div>
</footer>

  </body>
</html>
