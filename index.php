<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/jumbotron.css"/>
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-xs-right">
            <li class="nav-item">
              <a class="nav-link active" href="./">Home <span class="sr-only">(current)</span></a>
            </li>
            <? if (isset($_SESSION['userName'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="./offerRide.php">Offer Ride</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./rides.php">View Ride Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./myRides.php">My Rides</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./messages.php">Messages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./logout.php">Logout</a>
            </li>
            <? else : ?>
            <li class="nav-item">
              <a class="nav-link" href="./register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php">Login</a>
            </li>
            <? endif; ?>
            </ul>
          </nav>
        <h3 class="text-muted">Velocity</h3>
      </div>

      <div class="jumbotron">
        <? if (!isset($_SESSION['userName'])) : ?>
          <h1 class="display-3">Welcome to Velocity!</h1>
          <p class="lead">Velocity is a COMP353 project and also a ride sharing website. On this website, you can offer and accept rides and tasks for different sorts. The first thing you have to do is register or log in. You can do so below.</p>
          <p><a class="btn btn-lg btn-success" href="./register" role="button">Register</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-success" style="background: #0275d8;" href="./login.php" role="button">Log In</a></p>
        <? else : ?>
          <h1 class="display-3">Welcome <? echo $_SESSION['userName']; ?></h1>
          <p class="lead">Interesting in driving someone around or getting a ride somewhere? Start with one of the buttons below!</p>
          <p><a class="btn btn-lg btn-success" href="./myRides.php" role="button">My Rides</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-success" style="background: #0275d8;" href="./rides.php" role="button">View Ride Offers</a></p>
        <? endif; ?>
      </div>


      <footer class="footer">
        <p>&copy; Velocity 2016</p>
      </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>
</html>