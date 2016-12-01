<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {
  $userId = $_SESSION['id'];
  $queryDriver  = "SELECT *, (SELECT username FROM users WHERE ID = riderID) as riderUser FROM rides WHERE offerID = '$userId'";
  $queryRider   = "SELECT *, (SELECT username FROM users WHERE ID = offerID) as driverUser FROM rides WHERE riderID = '$userId'";  
  $res1   = mysql_query($queryDriver);
  $res2   = mysql_query($queryRider);
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Rides</title>
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
              <a class="nav-link" href="./rides.php">View Ride Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./myRides.php">My Rides</a>
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
              <a class="nav-link " href="./register.php">Register <span class="sr-only">(current)</span></a>
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

      <!-- form -->
      <div class="container">
        <h3>My Rides</h3>
        <?
          if (!isset($_SESSION['userName'])) {
            echo '<p> You are not logged in, you cannot see your rides! </p>';
          } else {
            
            // create table of rides
            if (mysql_num_rows($res1) != 0) {
              echo "<h3>My Rides as a Driver</h3><br />";
              $table =  "<table>";
              $table .= "<tr>";
              // last two columns are message and mark complete
              $table .= "<td>Ride ID</td><td>Driver</td><td>Rider</td><td>Status</td><td></td><td></td>";
              $table .= "</tr>";
              
              while($row = mysql_fetch_array($res1)) {
                
                if (!$row['deleted']) {
                  if ($row['status'] == 0) {
                    $status = "Open";
                  } else if ($row['status'] == 1) {
                    $status = "Accepted";
                  } else {
                    $status = "Complete";
                  }
                  
                  if ($row['riderUser'] == "") {
                    $rider = "None Yet";
                  } else {
                    $rider = $row['riderUser'];
                  }
                  
                  $table .= "<tr>";
                  $table .= "<td><a href='./ride.php?id=".$row['ID']."'>".$row['ID']."</a></td><td>You</td><td>".$rider."</td><td>".$status."</td>";
                  if ($row['riderUser'] != "") {
                    $table .= "<td><a href='./sendMessage.php?sendTo=".$rider."'>Message</a></td><td><a href='#'>Ride Complete</a></td>";
                  }               
                  $table .= "</tr>";
                }
                
              }
              
              $table .= "</table>";
              
              echo $table;
            }

            if (mysql_num_rows($res2) != 0) {
              echo "<h3>My Rides as a Rider</h3><br />";
              $table =  "<table>";
              $table .= "<tr>";
              $table .= "<td>Ride ID</td><td>Driver</td><td>Rider</td><td>Status</td><td></td>";
              $table .= "</tr>";

              while($row = mysql_fetch_array($res2)) {
                
                if (!$row['deleted']) {
                  if ($row['status'] == 0) {
                    $status = "Open";
                  } else if ($row['status'] == 1) {
                    $status = "Accepted";
                  } else {
                    $status = "Complete";
                  }
                  
                  $table .= "<tr>";
                  $table .= "<td><a href='./ride.php?id=".$row['ID']."'>".$row['ID']."</a></td><td>".$row['driverUser']."</td><td>You</td><td>".$status."</td>";
                  $table .= "</tr>";
                }
                
                
              }
              
              $table .= "</table>";
              echo $table;
            } 
            
            if (mysql_num_rows($res1) == 0 && mysql_num_rows($res2) == 0) {
              echo "<p>You have no rides!</p><br />";
              echo "<a href='./'>Click here to go home</a>";
            }
            
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