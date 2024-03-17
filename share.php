<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Storage Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            background-color: whitesmoke;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }


    </style>
    
    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/l.png" style="width:100%; height:180px;">      
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="dashboard.php">Home</a></li>
                    <li class="active"><a href="room.php">Storage &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Storage Reservation</a></li>
                    <li><a href="">Shared Silo</a>
                    </li>
                    <li><a href="review.php">Review</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>    
                    <li><a href="logout.php">Logout</a></li>                 
                </ul>
            </div>
        </nav>
        
        
        
        
        <?php
$sql = "SELECT * FROM room_category";
$result = mysqli_query($user->db, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Show Room Category
        while ($row = mysqli_fetch_array($result)) {
            $originalPrice = $row['price'];
            $discountedPrice = $originalPrice / 2;

            echo "
                <div class='row'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6 well'>
                        <h4>".$row['roomname']."</h4><hr>
                        <h6>No of rooms: ".$row['no_bed']." ".$row['bedtype']." silo.</h6>
                        <h6>Facilities: ".$row['facility']."</h6>
                        <h6>Price: ".$discountedPrice." ksh/day (50% off from ".$originalPrice." ksh  Since it is a Shared Silo Storage).</h6>
                    </div>
                    <div class='col-md-3'>
                        <a href='./booknow.php?roomname=".$row['roomname']."'><button class='btn btn-primary button'>Book Now</button></a>
                    </div>
                </div>";
        }
    } else {
        echo "NO Data Exist";
    }
} else {
    echo "Cannot connect to server" . $result;
}
?>



    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>