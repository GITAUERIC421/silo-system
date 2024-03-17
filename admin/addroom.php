<?php
include_once 'include/class.user.php'; 
$user = new User(); 

if(isset($_POST['submit'])) {
    $roomname = $_POST['roomname'];
    $room_qnty = $_POST['room_qnty'];
    $no_bed = $_POST['no_bed'];
    $bedtype = $_POST['bedtype'];
    $facility = $_POST['facility'];
    $price = $_POST['price'];

    // File upload handling
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a real image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image_path = $targetFile;
            $result = $user->add_room($roomname, $room_qnty, $no_bed, $bedtype, $facility, $price, $image_path);

            if($result) {
                echo "<script type='text/javascript'>
                      alert('Room Added Successfully');
                     </script>";
            } else {
                echo $result;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reg.css" type="text/css">
</head>

<body>
    <div class="container">
        <div class="well">
            <h2>Add Storage Category</h2>
            <hr>
            <form action="" method="post" name="room_category" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="roomname">Grain Type Name:</label>
                    <input type="text" class="form-control" name="roomname" placeholder="super deluxe" required>
                </div>
                <div class="form-group">
                    <label for="room_qnty">Available spaces:</label>&nbsp;
                    <select name="room_qnty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <!-- Add other options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_bed">No of storages:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="no_bed">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <!-- Add other options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="bedtype">Cubes Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="bedtype">
                        <option value="single">single</option>
                        <option value="double">double</option>
                        <!-- Add other options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="facility">Facility</label>
                    <textarea class="form-control" rows="5" name="facility"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price Per Day:</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                    <label for="image">Upload Picture:</label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Room">Add</button>

                <br>
                <div id="click_here">
                    <a href="../admin.php">Back to Admin Panel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
