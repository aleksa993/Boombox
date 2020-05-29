<?php

include("config.php");

session_start();

if(!isset($_SESSION['name'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/home2.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>

<div class="container">

<a class="btn btn-secondary btn-lg float-right" href="logout.php" role="button">Logout</a><br>

    <h1>Welcome <?php echo $_SESSION['name']; ?> </h1>
    <br><br><br><br>

    <div>
 
     <?php
     $fetchVideos = mysqli_query($con, "SELECT location FROM videos ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
 
       echo "<div class='embed-responsive embed-responsive-16by9' controls controlsList='nodownload' >";
       echo "<iframe class='embed-responsive-item' controls controlsList='nodownload' src='".$location."' controls ' ></iframe>";
       echo "</div>";
       echo "<br><br>";
     }
     ?>
 
    </div>



    </div>
</body>
</html>