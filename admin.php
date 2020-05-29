<?php

include("config.php");

session_start();

if(!isset($_SESSION['name'])){
    header('location:loginAdmin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/admin3.css">
    <title>Boombox Admin</title>
</head>
<body>
   <?php require_once 'process.php'; ?>
   
    <?php

    if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    <div class="container">
   
   <?php

    $mysqli = new mysqli('localhost', 'root', '', 'boombox') or die(mysqli_error($mysqli));  
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    $resultVideo = $mysqli->query("SELECT * FROM videos") or die($mysqli->error);
    //pre_r($result->fetch_assoc());
  ?>
    <br>
    <div class="row justify-content-center korisnici">
        <table class="table">
            <thead>
            <h2 style="text-align: center;">Korisnici</h2>
                <tr>
                    <th>Ime</th>
                    <th>Lozinka</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a href="admin.php?edit=<?php echo $row['id']; ?>"
                    class="btn btn-info">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                    class="btn btn-danger">Delete</a>
                    
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

    
  <?php

    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

   ?>
    <div class="row justify-content-center ">
        <div class="kard">
            <h3 style="text-align: center;">Dodaj korisnika</h3>
            <div>
                
                <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label>Ime</label>
                    <input type="text" name="name" class="form-control"
                    value="<?php echo $name; ?>" placeholder="Unesi ime korisnika" required> 
                </div>
                <div class="form-group">
                    <label>Lozinka</label>
                    <input type="password" name="password" class="form-control"
                    value="<?php echo $password ?>" placeholder="Unesi lozinku korisnika" required>
                </div>
                <div class="form-group">
                <?php
                 if ($update == true ):
                ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
                 <?php else: ?>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
                 <?php endif; ?>
                </div>
            </form>
            </div>
            
        </div>
    </div>
    </div>
    <br><br>
    <div class="row justify-content-center video">
    
        <table class="table">
            <thead>
            <h2 style="text-align: center;">Video</h2>
                <tr>
                    <th>Ime</th>
                    <th>Lokacija</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <?php
            while($row = $resultVideo->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td>
                    <a href="processVideo.php?delete=<?php echo $row['id']; ?>"
                    class="btn btn-danger">Delete</a>
                    
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <div class="kard">
            <h4 style="text-align: center;">Dodaj video</h4>
            <br>
            <form action="upVideo.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button class="btn btn-primary"type="submit" value="upload" name="upload">Upload</button>
            </form>
        </div>
    </div>
    <br>
</body>
</html>
