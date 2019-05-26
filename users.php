<html>

  <head>
    <title>Users</title>
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
  <h4 class="card-title">Users of Media Advertising</h4>
  <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
</div>
  <div class="card">
      <!-- <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> Add a new Location</button> -->
      <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Phone Numner</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
            <?php
                require("connect.php");

                $query = "
                SELECT * FROM users";

                $result = mysqli_query($con, $query);

                $i = 1;

                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<th>".$i."</th>";
                        echo "<td>".$row["fname"]."</td>";
                        echo "<td>".$row["lname"]."</td>";
                        echo "<td>".$row["contact"]."</td>";
                        echo "<td>".$row["location"]."</td>";
                        echo "</tr>"; $i++;
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
