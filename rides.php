<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {

  $userID = $_SESSION['id'];
  $query  = "SELECT * FROM rides WHERE status = 0 AND offerID != '$userID'";
  $res  = mysql_query($query);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Rides</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/jumbotron.css"/>
  </head>

  <body>


    <div class="container">

    <!-- nav start -->
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-xs-right">
            <li class="nav-item">
              <a class="nav-link " href="./">Home</a>
            </li>
            <? if (isset($_SESSION['userName'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="./offerRide.php">Offer Ride</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./rides.php">View Ride Offers</a>
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

      <!-- nav end -->

      
      <div class="container">
      
      <h3>View Rides</h3>

          <?
          if (!isset($_SESSION['userName'])) {
            echo '<p> You are not logged in, you cannot see open rides! </p>';
          } else {
            
            // create table of rides
            $table =  "<table>";
            $table .= "<tr>";
            $table .= "<td>Ride ID</td><td>Driver ID</td><td>Start Destination</td><td>End Destination</td><td></td>";
            $table .= "</tr>";
            
            while($row = mysql_fetch_array($res)) {
                
              $table .= "<tr>";
              $table .= "<td><a href='./ride.php?id=".$row['ID']."'>".$row['ID']."</a></td><td>".$row['offerID']."</td><td>".$row['start_postal']."</td><td>".$row['end_postal']."</td><td><a href=./actions.php?actionSelect=take-ride&rideID=".$row['ID'].">Take this ride!</a></td>";
              $table .= "</tr>";
            }
            
            $table .= "</table>";
            echo '<h3>Here is a list of rides currently available</h3>';
            echo $table;
            
          }
          ?>

      </div>

      <br />


      <!-- end form -->

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