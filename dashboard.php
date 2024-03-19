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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    
    <style>
        body{
            color:yellow;
        }
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
    
        }
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 150px;
        }
		body
		{
			background-color: white;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		p
		{
			font-size: 13px;
		}
        .pro_pic
        {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            margin-bottom: 15px;
            margin-right: 15px;
        }
		
    </style>
    
    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/l.png" style="width:100%; height:180px;">      
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="dashboard.php">Home</a></li>
                    <li><a href="room.php">Storage &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Storage Reservation</a></li>
                    
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>  
                    <li><a href="logout.php">Logout</a></li>                  
                </ul>
            </div>
        </nav>

     
        <div class="jumbotron">
        <div class="w3-content w3-section">
            <img class="mySlides w3-animate-fading" src="images/p2.jpg" style="width:100%; height:450px;">
            <img class="mySlides w3-animate-fading" src="images/p3.jpg" style="width:100%; height:450px;">
            <img class="mySlides w3-animate-fading" src="images/p4.jpg" style="width:100%; height:450px;">
            <img class="mySlides w3-animate-fading" src="images/p5.jpg" style="width:100%; height:450px;">
            <img class="mySlides w3-animate-fading" src="images/p6.jpg" style="width:100%; height:450px;">
            <img class="mySlides w3-animate-fading" src="images/p7.jpg" style="width:100%; height:450px;">
        </div>    
        </div>
        
        <hr>
        <?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'silo');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM room_category";
$result = mysqli_query($db, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $columns_per_row = 3; // Change this value as needed

    // Initialize counter
    $count = 0;

    // Start row
    echo "<div class='row'>";

    while ($row = mysqli_fetch_array($result)) {
        // Start column
        echo "<div class='col-md-" . (12 / $columns_per_row) . "'>";
        echo "<div class='well'>";
        echo "<h4>".$row['roomname']."</h4><hr>";
        echo "<h6>No of stores: ".checkRooms($db,$row['roomname'])." ".$row['bedtype']." silo.</h6>";
        echo "<h6>Facilities: ".$row['facility']."</h6>";
        echo "<h6>Price: ".$row['price']." ksh/day.</h6>";
        echo "<a href='./booknow.php?roomname=".$row['roomname']."'><button class='btn btn-primary button'>Book Now</button></a>";
        echo "</div>"; // End of well
        echo "</div>"; // End of column

        // Increment counter
        $count++;

        // If the number of columns per row is reached, start a new row
        if ($count % $columns_per_row == 0) {
            echo "</div>"; // End of row
            echo "<div class='row'>"; // Start new row
        }
    }

    // Close the last row if the total number of columns is not divisible by the columns per row
    if ($count % $columns_per_row != 0) {
        echo "</div>"; // End of row
    }
} else {
    echo "No data exists";
}

function checkRooms($conn,$roomname) {
    $checkRoomsQty = "SELECT * FROM room_category WHERE roomname='$roomname'";
    $checkQuery = mysqli_query($conn,$checkRoomsQty);
    $rows = mysqli_fetch_assoc($checkQuery);
    $rooms_qty = $rows['no_bed']; 
    $checkBookings = "SELECT * FROM bookings WHERE roomname='$roomname'";
    $count = mysqli_num_rows(mysqli_query($conn,$checkBookings));
    return $rooms_qty - $count;
}
?>


        <div class="row" style="color: #ed9e21">
            <div class="col-md-12 well" >
              <h4><strong style="color: #ffbb2b">About</strong></h4><br>
             <p>A silo storage booking system is a digital platform designed to streamline and optimize the management of agricultural storage facilities,
                 specifically silos. Silos are crucial components in the agricultural 
                 supply chain, providing storage for grains and other bulk materials. 
                 Efficient utilization of silos is essential for farmers, grain elevators,
                  and other stakeholders in the agricultural industry.
                   The silo storage booking system aims to enhance the process of reserving,
                    monitoring, and managing silo storage spaces.</p>
            </div>  
        </div>
        
        <div class="row" style="color: #ffbb2b">
            <div class="col-md-4 wellfix">
              <h4><strong>Contact Us</strong></h4><hr>
              Address :Nakuru - kenya<br>
              Mail : yebei@gmail.com <br>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 wellfix">
                <h4><strong>Developed By</strong></h4><hr>
                <a href="#">@yebeikabarak</a>

            </div>
        </div>
        



    </div>
    
    
    
    
    




    <script src="my_js/slide.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>