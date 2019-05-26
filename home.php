<?php
    session_start();
    if(!isset($_SESSION['username'])){
       header("Location: logon.php");
    }
?>

<html>

  <head>
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </head>
  <style>
    h1{margin:100px auto}

    .form-control-borderless {
        border: none;
    }

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}

#res{
    border:1px solid #e0e0e0;
    top:0px;
    margin-top:-15px;
    padding:0;
}

#res td a{
  color:#000;
  text-decoration: none;
}

#res td:hover{
  background:#d0d0d0;
  cursor:pointer;
}

  </style>

  <body>

    <nav class="main-navigation">
        <div class="navbar-header animated fadeInUp">
            <a class="navbar-brand" href="home.php">Media Advertising</a>
        </div>
        <ul class="nav-list">
            <li class="nav-list-item">
                <a href="home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-list-item">
                <a href="#" class="nav-link">Available Spaces</a>
            </li>
            <li class="nav-list-item">
                <a href="logout.php" class="nav-link">Logout</a>
            </li>
        </ul>

    </nav>


    <div class="container">
    <br/>
	<div class="row justify-content-center">
    <div class="page-header">
      <h1>Search Available Advertising Space</h1>
    </div>
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm" method="post" action="search.php">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input autocomplete="off" class="form-control form-control-lg form-control-borderless" id="search" name="search" type="search" placeholder="Search locations or keywords">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                      <div id="result"></div>
                  </div>
              <!--end of col-->
        </div>

        <div id="result"></div>


</div>

<style>

body {
    margin: 0;
    padding: 0;
}

a.navbar-brand {
    float: left;
    height: 50px;
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
    text-decoration: none;
    color: orangered;
    font-family: cursive;
    font-weight: 700;

}

nav.main-navigation {
    position: relative;
}

nav.main-navigation ul.nav-list {
    margin: 0;
    padding: 0;
    list-style: none;
    position: relative;
    text-align: right;
}

.nav-list li.nav-list-item {
    display: inline-block;
    line-height: 40px;
    margin-left: 30px;
    margin-top: 15px;
}

a.nav-link {
    text-decoration: none;
    font-size: 18px;
    font-family: sans-serif;
    font-weight: 500;
    cursor: pointer;
    position: relative;
    color: #404040;
}

@keyframes FadeIn {
    0% {
        opacity: 0;
        -webkit-transition-duration: 0.8s;
        transition-duration: 0.8s;
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }


    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
        pointer-events: auto;
        transition: cubic-bezier(0.4, 0, 0.2, 1);
    }
}

.nav-list li {
    animation: FadeIn 1s cubic-bezier(0.65, 0.05, 0.36, 1);
    animation-fill-mode: both;
}

.nav-list li:nth-child(1) {
    animation-delay: .3s;
}

.nav-list li:nth-child(2) {
    animation-delay: .6s;
}

.nav-list li:nth-child(3) {
    animation-delay: .9s;
}

.nav-list li:nth-child(4) {
    animation-delay: 1.2s;
}

.nav-list li:nth-child(5) {
    animation-delay: 1.5s;
}

/* Animation */

@keyframes fadeInUp {
    from {
        transform: translate3d(0, 40px, 0)
    }

    to {
        transform: translate3d(0, 0, 0);
        opacity: 1
    }
}

@-webkit-keyframes fadeInUp {
    from {
        transform: translate3d(0, 40px, 0)
    }

    to {
        transform: translate3d(0, 0, 0);
        opacity: 1
    }
}

.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
    -webkit-animation-duration: 1s;
    -webkit-animation-fill-mode: both
}

.animatedFadeInUp {
    opacity: 0
}

.fadeInUp {
    opacity: 0;
    animation-name: fadeInUp;
    -webkit-animation-name: fadeInUp;
}




</style>
  </body>
</html>

<script>
$(document).ready(function(){
	// load_data();
	function load_data(query)
	{
		$.ajax({
			url:"ajax.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}

	$('#search').keyup(function(){
		var search = $(this).val();
    // $(".page-header h1").fadeOut(1000);
		if(search != '')
		{
			load_data(search);
		}
		else
		{
      // $(".page-header h1").fadeIn(1000);
      // $("h4").fadeOut(1000);
      $("#res").fadeOut();
			//load_data();
		}
	});
});
</script>
