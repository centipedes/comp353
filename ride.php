<?php 
  session_start(); 
  include('connDb.php');
  if (isset($_SESSION['userName'])) {
    $rideID = $_GET['id'];
    $query  = "SELECT *, (SELECT username FROM users WHERE ID = offerID) as driverUser, (SELECT username FROM users WHERE ID = riderID) as riderUser FROM rides WHERE ID = '$rideID'";
    $commentQuery = "SELECT *, (SELECT username FROM users WHERE ID = commenterID) as commenter FROM comments WHERE rideID = $rideID";
    $res  = mysql_query($query);
    $resComment = mysql_query($commentQuery);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ride</title>
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
              <a class="nav-link" href="./register.php">Register <span class="sr-only">(current)</span></a>
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
      
      <h3>Ride #<? echo $rideID; ?></h3>

      <?
        if (!isset($_SESSION['userName'])) {
          echo '<p> You are not logged in, you cannot see this ride! </p>';
        } else {
          
          if (mysql_num_rows($res) != 0) {
            $table =  "<table>";
            $table .= "<tr>";
            $table .= "<td>ID</td><td>Driver</td><td>Rider</td><td>Status</td>";
            $table .= "</tr>";
            
            while($row = mysql_fetch_array($res)) {
                
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
              $table .= "<td>".$row['ID']."</td><td>".$row['driverUser']."</td><td>".$rider."</td><td>".$status."</td>";
              $table .= "</tr>";
              
            }
            
            $table .= "</table>";
            echo '<h3>Here are the ride details</h3>';
            echo $table;

          } else {
            echo 'This ride does not exist! <br />';
          }
          
        }
      ?>

      <!-- ADD COMMENT SECTION -->
          
      <? if (mysql_num_rows($res) != 0) : ?> <!-- ride exists -->
          
      <h4> Leave a comment </h4>
      <?
      
      if (mysql_num_rows($resComment) != 0) {
          $table =  "<table>";
          $table .= "<tr>";
          $table .= "<td>Username</td><td>Comment</td>";
          $table .= "</tr>";
          
          while($row = mysql_fetch_array($resComment)) {
            $table .= "<tr>";
            $table .= "<td>".$row['commenter']."</td><td>".$row['comment']."</td>";
            $table .= "</tr>";
          }
          $table .= "</table>";
          
          echo $table;

        } else {
          echo 'There are no comments yet, add one! <br /> <br /> <br />';
        }
      ?>
      <form id="leaveComment" action="actions.php" method="post">             
          <label for="comment">Comment</label><br />
          <textarea name="comment" style="resize: none;"></textarea><br />
          <input type="hidden" value="<? echo $rideID ?>" name="rideID" />
          <input type="hidden" value="leaveComment" name="actionSelect" />
          <input type="submit" name="go" value="Submit" />
      </form>
      
      <? endif; ?>
          
          
          <!-- END COMMENT SECTION -->

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